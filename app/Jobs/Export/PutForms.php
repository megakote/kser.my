<?php

namespace App\Jobs\Export;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\Form;

use SimpleXMLElement;

class PutForms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $text = <<<XML
<?xml version="1.0" encoding="WINDOWS-1251"?>
<data>
  <sn>00001527501315</sn>
  <email>karta-kosmos@mail.ru</email>
  <date>28.05.2018</date>
  <time>12:55:15</time>
  <site>ксер.рф</site>
</data>
XML;

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
        $forms =  Form::where('exported', false)->get();

        foreach ($forms as $form) {
            $this->export($form);

            $form->exported = true;
            $form->save();
        }

    }

    private function export($form)
    {
        $xml = new SimpleXMLElement($this->text);

        $xml->time = $form->created_at->format('h:m:s');
        $xml->date = $form->created_at->format('Y.m.d');

        \Storage::put(env('FILES_EXCHANGE') . 'forms/' . time() . '.xml',  $xml->asXML());

    }
}
