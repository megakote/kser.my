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

    private $files;
    private $lastParse;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $directory = env('FILES_EXCHANGE') . 'users';
        $this->files = Storage::files($directory);
        $this->lastParse = Config::firstorNew(['name' => 'lastParseUsers']);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->files as $file) {
            if (Storage::lastModified($file) > $this->lastParse->value)
                $this->parse($file);
        }

        $this->lastParse->value = time();
        $this->lastParse->save();
    }

    private function parse($file)
    {
        $xml = Storage::get($file);
        $user = new SimpleXMLElement($xml);

        $client = Client::firstOrNew(['1c_id' => $user->clent->id_clent]);

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
