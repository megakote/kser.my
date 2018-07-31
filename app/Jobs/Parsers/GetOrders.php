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
use App\Models\RepairWorksZ;

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
            $worksZ = $order->items_zapravka;

            $arr = $this->makeArray($order);
            $order = Order::firstOrNew(["nomer" => $arr['nomer']]);
            $order->fill($arr)->save();

            if ($works->item){
                $this->addJobs($works, $order);
            }
            if ($worksZ->item){
                $this->addJobsZ($worksZ, $order);
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

    private function addJobsZ($works, $order)
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
            $work = new RepairWorksZ();
            $work->order_id = $order->id;
            $work->fill([
                'n' => (is_array($item['n1'])) ? '' : $item['n1'],
                't' => (is_array($item['n2'])) ? '' : $item['n2'],
                'z' => (is_array($item['n3'])) ? '' : $item['n3'],
                'u' => (is_array($item['n4'])) ? '' : $item['n4'],
                'p' => (is_array($item['n5'])) ? '' : $item['n5'],
                'i' => (is_array($item['n6'])) ? '' : $item['n6'],
                'new' => (is_array($item['n7'])) ? '' : $item['n7'],
                'v' => (is_array($item['n8'])) ? '' : $item['n8'],
                'c' => (is_array($item['n9'])) ? '' : $item['n9'],
                'r' => (is_array($item['n10'])) ? '' : $item['n10'],
                'm' => (is_array($item['n11'])) ? '' : $item['n11'],
                'zm' => (is_array($item['n12'])) ? '' : $item['n12'],
            ])->save();
        }
    }
}
