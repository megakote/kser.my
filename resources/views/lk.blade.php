@extends('layouts.app')

@section('content')
    <div class="content">
        <section class="sect-1-cabinet">

            <div class="row">

                <div class="breadcrumbs_wrapp">
                    <ul class="breadcrumbs">
                        <li><a href="/">Главная</a></li>
                        <li><a href="#">Личный кабинет</a></li>
                        <li><a href="#">Заказы</a></li>
                    </ul>
                </div>

                <div class="two-cols-templ_2 clearfix">
                    <div class="left">
                        <h1>Заказы</h1>
                    </div>
                    <div class="right">
                        <a href="#" class="orange-pill show_popup" data-popup-name ="popup_7"><i class="envelop-4"></i>Подать заявку</a>
                    </div>
                </div>

                <div class="two-cols-templ_2 clearfix">
                    <div class="left">
                        <div class="search2_wrapp">
                            <form action="">
                                <input type="text" name="order_id" placeholder="Номер заказа или документа"/>
                                <button type="submit" class="submit_2"><i class="search-icon2"></i>Найти</button>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        {{--<a href="#" class="orange_link"><i class="settings"></i>Расширенный поиск</a>--}}
                    </div>
                </div>
                {{--
                <div class="sort_wrapp">
                    <div class="inner clearfix">
                        <div class="left">
                            <div class="input_wrapp_2">
                                <div class="col-1">
                                    <p>Дополнительный офис</p>
                                </div>
                                <div class="col-2">
                                    <div class="select_wrapp select-wrapp_2">
                                        <select data-placeholder="Все">
                                            <option></option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="input_wrapp_4">
                                <div class="col-1">
                                    <p>Тип заявки</p>
                                </div>
                                <div class="col-2">
                                    <div class="select_wrapp select-wrapp_2">
                                        <select data-placeholder="Все">
                                            <option></option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inner clearfix">
                        <div class="left">
                            <div class="input_wrapp_3">
                                <div class="col-1">
                                    <p>Дата</p>
                                </div>
                                <div class="col-2">
                                    <div class="dates_wrapp">
                                        <div class="date_wrapp">
                                            <input class="date_input" type="text" name="" placeholder="22.12.2015">
                                            <i class="calendar"></i>
                                        </div>
                                        <div class="date_wrapp">
                                            <input class="date_input" type="text" name="" placeholder="22.12.2016">
                                            <i class="calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="input_wrapp_4">
                                <div class="col-1">
                                    <p>Статус</p>
                                </div>
                                <div class="col-2">
                                    <div class="select_wrapp select-wrapp_2">
                                        <select data-placeholder="Все">
                                            <option></option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="scroll_x">

                    <div class="table_2">
                        <div class="table-row table-header">
                            <div class="cell cell-1">
                                <p>Номер</p>
                            </div>
                            <div class="cell cell-2">
                                <p>Дата</p>
                            </div>
                            <div class="cell cell-3">
                                <p>Оплачено</p>
                            </div>
                            <div class="cell cell-4">
                                <p>Тип<br /> заявки</p>
                            </div>
                            <div class="cell cell-5">
                                <p>Статус</p>
                            </div>
                            <div class="cell cell-6">
                                <p>Сумма</p>
                            </div>
                            <div class="cell cell-7">
                                <p>Дата<br /> доставки</p>
                            </div>
                            <div class="cell cell-8">
                                <p>Ф.И.О.</p>
                            </div>
                            <div class="cell cell-9">
                                <p class="tab-novisible">Подробнее</p>
                            </div>
                        </div>
                        @foreach($orders as $order)
                            <div class="table_wrapp">
                                <div class="table-row">
                                    <div class="cell cell-1">
                                        <p>{{ $order->nomer }}</p>
                                    </div>
                                    <div class="cell cell-2">
                                        <p>{{ $order->time_cr }}</p>
                                    </div>
                                    <div class="cell cell-3">
                                        <div class="checkbox-3">
                                            <input type="checkbox" {{ ($order->pay) ? 'checked="checked"' : '' }}  disabled="disabled">
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="cell cell-4">
                                        <p>{{ $order->type }}</p>
                                    </div>
                                    <div class="cell cell-5">
                                        <p>{{ $order->status }}</p>
                                    </div>
                                    <div class="cell cell-6">
                                        <p>{{ $order->prise }}</p>
                                    </div>
                                    <div class="cell cell-7">
                                        <p>{{ $order->exec_time }}</p>
                                    </div>
                                    <div class="cell cell-8">
                                        <p>{{ $order->name_delivery }}</p>
                                    </div>
                                    <div class="cell cell-9">
                                        <p class="tab-novisible"><a href="#" class="link-2 slide_btn">Подробнее</a></p>
                                        <p class="desk-novisible"><a href="#" class="slide_btn"><i class="more_arrow"></i></a></p>
                                    </div>
                                </div>
                                <div class="wrapp_2 sliding_block">
                                    <div class="inner_wrapp">
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Дополнительный офис:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->name_dop }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Ф.И.О. подавшего:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->fio_pod }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>№ счетов:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p><i class="upload"></i><a href="#" class="orange_link">{{ $order->nomer }}</a></p>
                                            </div>
                                        </div>
                                        <div class="table-3 table-3_2">
                                            <div class="cell-1">
                                                <p>Заказано:</p>
                                            </div>
                                            <div class="cell-2">
                                                <div class="table-4">
                                                    <div class="table-row table-header">
                                                        <div class="cell cell-1">
                                                            <p>Наименование работ</p>
                                                        </div>
                                                        <div class="cell cell-2">
                                                            <p>Количество</p>
                                                        </div>
                                                        <div class="cell cell-3">
                                                            <p>Цена</p>
                                                        </div>
                                                        <div class="cell cell-4">
                                                            <p>Сумма</p>
                                                        </div>
                                                    </div>
                                                    @foreach($order->works() as $work)
                                                        <div class="table-row">
                                                            <div class="cell cell-1">
                                                                <p>{{ $work->name }}</p>
                                                            </div>
                                                            <div class="cell cell-2">
                                                                <p>{{ $work->kol }}</p>
                                                            </div>
                                                            <div class="cell cell-3">
                                                                <p>{{ $work->cena }}</p>
                                                            </div>
                                                            <div class="cell cell-4">
                                                                <p>{{ $work->summ }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-3 table-3_3">
                                            <div class="cell-1">
                                                <p>Текст заявки:</p>
                                            </div>
                                            <div class="cell-2">
                                                <div class="text_wrapp">
                                                    {{ $order->text_z }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Адрес доставки:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->address_dost }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Доставка:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->name_delivery }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Дата доставки:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->exec_time }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Дата выполнения:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->exec_act }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Ф.И.О. мастера:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->name_ref }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>КПИ:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ $order->ke }}</p>
                                            </div>
                                        </div>
                                        <div class="table-3">
                                            <div class="cell-1">
                                                <p>Документы возвращены:</p>
                                            </div>
                                            <div class="cell-2">
                                                <p>{{ ($order->docs_back) ? 'Да' : 'Нет' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>


                <div class="two-cols-templ_3 clearfix">
                    <div class="left">
                        <a href="#" class="orange-pill orange-pill_2"><i class="doc_2"></i>Скачать таблицу заказов</a>
                    </div>
                    <div class="right">
                        <p><span>Итого:</span> {{ $orders->sum('prise') }} р.</p>
                        <p><span>Не оплачено:</span> {{ $orders->where('pay', false)->sum('prise') }} р.</p>
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
