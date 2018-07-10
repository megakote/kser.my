<?php

namespace App\Jobs\Parsers;

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
        $directory = env('FILES_EXCHANGE') . 'users';
        $files = Storage::files($directory);
        $lastParse = Config::firstOrNew(['name' => 'lastParseUsers']);
dump($directory);
dump($files);
        foreach ($files as $file) {
            if (Storage::lastModified($file) > $lastParse->value){
                $this->parse($file);
            }
        }

        $lastParse->value = time();
        $lastParse->save();
    }

    private function parse($file)
    {
        $xml = Storage::get($file);
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

        if ($user->clent->dop_ofice == 'истина') {
            foreach ($user->clent->items as $office) {
                $client_office = ClientOffice::firstOrNew(['id_dop' => $office->id_dop]);
                $client_office->fill(['client_id' => $client->id]);
                $client_office->fill( (array) $office->item)->save();
            }
            foreach ($user->clent->faces as $face) {
                $client_office_face = ClientFace::firstOrNew(['office' => $face->office]);
                $client_office_face->fill(['client_id' => $client->id]);
                $client_office_face->fill( (array) $face->face)->save();
            }
        }
    }
}
