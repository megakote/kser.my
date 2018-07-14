<?php

namespace App\Jobs\Parsers;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Config;
use App\Models\Client;
use App\Models\ClientOffice;
use App\Models\ClientFace;

use Storage;
use SimpleXMLElement;

class GetUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $files = Storage::files('users');
        $lastParse = Config::firstOrNew(['name' => 'lastParseUsers']);

        foreach ($files as $file) {
            if (!$lastParse->value || Storage::lastModified($file) > $lastParse->value){
                $this->parse($file);
            }
        }

        $lastParse->value = time();
        $lastParse->save();
    }

    private function parse($file)
    {

        $xml = Storage::get($file);

        try {
            new SimpleXMLElement($xml);
        } catch (\Exception $e) {
            \Log::alert('Недопустимый файл - ' . $file);
            return false;
        }

        $user = new SimpleXMLElement($xml);
        $client = Client::firstOrNew(['id_1c' => $user->clent->id_clent]);

        $arr = [
            'name'=> $user->clent->name_clent,
            'address'=> $user->clent->adress,
            'tel'=> $user->clent->tele,
            'manager'=> $user->clent->manager,
            'manager_id'=> $user->clent->manager_ID
        ];

        $client->fill($arr)->save();

        User::firstOrNew([
            'login' => $user->clent->login,
        ])->fill([
            'password' =>  $user->clent->pass,
            'id_1c' => $client->id_1c
        ])->save();

        if ($user->clent->dop_ofice == 'истина') {
            $this->addOffices($user->clent, $client->id);
        }
    }

    private function addOffices($client, $client_id)
    {
        // Ахалай махалай
        $json = json_encode($client->items);
        $array = json_decode($json,TRUE);

        $offices = [];
        if(!isset($array['item'][0])){
            $offices[0] = $array['item'];
        } else {
            $offices = $array['item'];
        }
        foreach ($offices as $office) {
            $office = $this->clearArray($office);
            $client_office = ClientOffice::firstOrNew(['login' => $office['login']]);
            $client_office->fill(['client_id' => $client_id]);
            $client_office->fill($office)->save();
            User::firstOrNew([
                'login' => $office['login'],
            ])->fill([
                'password' => $office['pass'],
                'id_1c' => Client::find($client_id)->id_1c
            ])->save();
        }

        // Ахалай махалай
        $json = json_encode($client->faces);
        $array = json_decode($json,TRUE);

        if (!$array) {
            return;
        }

        $faces = [];
        if(!isset($array['face'][0])){
            $faces[0] = $array['face'];
        } else {
            $faces = $array['face'];
        }
        foreach ($faces as $face) {
            $face = $this->clearArray($face);
            $client_office_face = New ClientFace();
            $client_office_face->fill(['client_id' => $client_id]);
            $client_office_face->fill($face)->save();
        }
    }


    private function clearArray($array)
    {
        $arr = [];
        foreach ($array as $key => $value)
        {
            $arr[$key] = (is_array($value)) ? '' : trim($value);
        }
        return $arr;
    }
}
