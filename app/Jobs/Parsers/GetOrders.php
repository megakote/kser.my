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
        $directory = env('FILES_EXCHANGE') . 'orders';
        $files = Storage::files($directory);
        $lastParse = Config::firstOrNew(['name' => 'lastParseOrders']);

        foreach ($files as $file) {
            if (Storage::lastModified($file) > $lastParse->value)
                $this->parse($file);
        }

        $lastParse->value = time();
        $lastParse->save();

    }

    private function parse($file)
    {
        $xml = Storage::get($file);
        $order_xml = new SimpleXMLElement($xml);
        foreach ($order_xml->order as $order) {
            $works = $order->items_zz;
            if ($order->items_zz) {
                $this->addJobs($order->items_zz);
            }
            $arr = $this->makeArray($order);
            $order = Order::firstOrNew(["nomer" => $arr['nomer']]);
            $order->fill($arr)->save();

            if ($works)
                $this->addJobs($works, $order);
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

    private function addJobs($works, $order)
    {

    }
}
