<?php

namespace App\Jobs\Parsers;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Config;
use App\Models\Client;

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
    }
}
