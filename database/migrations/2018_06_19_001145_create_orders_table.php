<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('nomer'); // НОМЕР ЗАЯВКИ В 1С И В Л.К.
            $table->date('time_cr'); // ДАТА СОЗД.ЗАЯВКИ
            $table->integer('id_dop'); // НОМЕР.ДОП.ОФИСА УКАЗАННЫЙ В ЗАЯВКЕ
            $table->string('name_client'); // НАЗВАНИЕ КЛИЕНТА
            $table->string('name_dop'); // НАЗВАНИЕ ДОП.ОФИСА
            $table->string('type'); // ТИП ЗАЯВКИ
            $table->boolean('pay'); // ОПЛАТА ЗАЯВКИ (ИСТИНА/ЛОЖЬ)
            $table->integer('prise'); // СУММА ЗАЯВКИ
            $table->string('status'); // СТАТУС ЗАЯВКИ
            $table->string('bill_number'); // НОМЕР СЧЕТА ПРИКРЕПЛЕННОГО К ЗАЯВКЕ
            $table->date('exec_time'); // ПЛАНИРУЕМАЯ ДАТА ВЫПОЛНЕНИЯ ЗАЯВКИ
            $table->date('exec_act'); // ФАКТИЧЕСКАЯ ДАТА ВЫПОЛНЕНИЯ
            $table->tinyInteger('ke'); // КПИ (КОЭФФИЦИЕНТ ЭФФЕКТИВНОСТИ ОТ 0 ДО 5)
            $table->string('fio_file'); // КОНТАКТНОЕ ЛИЦО
            $table->string('id_file'); // НОМЕР КЛИЕНТА (В БАЗЕ 1С И В Л.К.) - НЕ ЗНАЮ ЗАЧЕМ ПОВТОРНО ДАЕТСЯ ID КЛИЕНТА
            $table->boolean('docs_back'); // ПОДПИСАННЫЕ ДОКУМЕНТЫ ВОЗВРАЩЕНЫ НАМ
            $table->string('name_delivery'); // ИМЯ ДОСТАВЩИКА
            $table->string('name_ref'); // ИМЯ ЗАПРАВЩИКА
            $table->string('fio_pod'); // ФИО ПОДАВШЕГО ЗАЯВКУ (ЭТО КОНТАКТ КЛИЕНТА ИНИЦИИРОВАВШИЙ ЗАЯВКУ)
            $table->text('text_z'); // ТЕКСТ ЗАЯВКИ
            $table->string('master_z'); // ИМЯ МАСТЕРА РЕМОНТИРУЮЩЕГО ТЕХНИКУ ПО ЗАЯВКЕ (= name_delivery)
            $table->string('dop_z'); //
            $table->string('address_dost'); // АДРЕС ДОСТАВКИ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
