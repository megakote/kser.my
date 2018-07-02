<?php

namespace App\Jobs\Parsers;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Config;
use App\Models\Order;

use Storage;
use SimpleXMLElement;

class GetOrders implements ShouldQueue
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
        $directory = env('FILES_EXCHANGE') . 'orders';
        $this->files = Storage::files($directory);
        $this->lastParse = Config::firstorNew(['name' => 'lastParseOrders']);
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
        $order_xml = new SimpleXMLElement($xml);
        foreach ($order_xml->order as $order) {
            $arr = $this->makeArray($order);
            $order = Order::firstOrNew(["nomer" => $arr['nomer']]);
            $order->fill($arr)->save();
        }
    }

    private function makeArray($obj)
    {
        $arr = [];
        foreach ($obj as $key => $value) {
            $arr[$key] = (string) $value;
        }

        $arr = array_diff_key($arr, ['models' =>'', 'summ_z'  =>'', 'dost_z'  =>'', 'items_z'  =>'', 'items_zz'  =>'', 'items_zapravka' => '', 'model_z' => '']);
        return $arr;
    }
}
