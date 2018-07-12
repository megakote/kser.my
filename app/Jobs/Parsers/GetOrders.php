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
use App\Models\RepairWorks;

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
        $files = Storage::files('orders');
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
        try {
            new SimpleXMLElement($xml);
        } catch (\Exception $e) {
            \Log::alert('Недопустимый файл - ' . $file);
            return false;
        }
        $order_xml = new SimpleXMLElement($xml);
        foreach ($order_xml->order as $order) {
            $works = $order->items_zz;

            $arr = $this->makeArray($order);
            $order = Order::firstOrNew(["nomer" => $arr['nomer']]);
            $order->fill($arr)->save();

            if ($works->item){
                $this->addJobs($works, $order);
            }

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
        // Ахалай махалай
        $json = json_encode($works);
        $array = json_decode($json,TRUE);

        $works = [];
        if(!isset($array['item'][0])){
            $works[0] = $array['item'];
        } else {
            $works = $array['item'];
        }

        foreach ($works as $item) {
            $work = new RepairWorks();
            $work->order_id = $order->id;
            $work->fill($item)->save();
        }
    }
}
