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
                        <a href="#" class="orange-pill"><i class="envelop-4"></i>Подать заявку</a>
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
                            <p>Тип<br/> заявки</p>
                        </div>
                        <div class="cell cell-5">
                            <p>Статус</p>
                        </div>
                        <div class="cell cell-6">
                            <p>Сумма</p>
                        </div>
                        <div class="cell cell-7">
                            <p>Дата<br/> доставки</p>
                        </div>
                        <div class="cell cell-8">
                            <p>Ф.И.О.</p>
                        </div>
                        <div class="cell cell-9">
                            <p class="tab-novisible">Подробнее</p>
                        </div>
                    </div>
                    @foreach($orders as $order)
                        <div class="table-row">
                            <div class="cell cell-1">
                                <p>{{ $order->nomer }}</p>
                            </div>
                            <div class="cell cell-2">
                                <p>{{ $order->time_cr }}</p>
                            </div>
                            <div class="cell cell-3">
                                <div class="checkbox-3">
                                    <label for="ch_{{ $order->id }}"></label>
                                    <input type="checkbox" disabled id="ch_{{ $order->id }}" {{ ($order->pay) ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="cell cell-4">
                                <p>Заявка</p>
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
                                <p class="tab-novisible"><a href="#" class="link-2">Подробнее</a></p>
                                <p class="desk-novisible"><a href="#"><i class="more_arrow"></i></a></p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="orders_wrapp">
                    <div class="order_wrapp">
                        <div class="two-cols_2 clearfix">
                            <div class="left">
                                <p><span>Номер заказа:</span> С00697</p>
                            </div>
                            <div class="right">
                                <p class="date">05.08.2011</p>
                            </div>
                        </div>
                        <div class="two-cols_2 clearfix">
                            <div class="left">
                                <p><span>Статус:</span> Выполнен</p>
                            </div>
                            <div class="right">
                                <div class="checkbox-3">
                                    <input type="checkbox" id="ch_15">
                                    <label for="ch_15"></label>
                                </div>
                            </div>
                        </div>
                        <p><span>Тип заявки:</span> Заявка</p>
                        <p><span>Сумма:</span> 15200</p>
                        <p><span>Дата доставки:</span> 10.08.2011</p>
                        <p><span>Ф.И.О.:</span> Алексей Царев</p>
                        <div class="more_wrapp">
                            <a href="#" class="blue_link"><i class="more_arrow"></i>Подробнее</a>
                        </div>
                    </div>

                    <div class="order_wrapp">
                        <div class="two-cols_2 clearfix">
                            <div class="left">
                                <p><span>Номер заказа:</span> С00697</p>
                            </div>
                            <div class="right">
                                <p class="date">05.08.2011</p>
                            </div>
                        </div>
                        <div class="two-cols_2 clearfix">
                            <div class="left">
                                <p><span>Статус:</span> Выполнен</p>
                            </div>
                            <div class="right">
                                <div class="checkbox-3">
                                    <input type="checkbox" id="ch_16">
                                    <label for="ch_16"></label>
                                </div>
                            </div>
                        </div>
                        <p><span>Тип заявки:</span> Заявка</p>
                        <p><span>Сумма:</span> 15200</p>
                        <p><span>Дата доставки:</span> 10.08.2011</p>
                        <p><span>Ф.И.О.:</span> Алексей Царев</p>
                        <div class="more_wrapp">
                            <a href="#" class="blue_link"><i class="more_arrow"></i>Подробнее</a>
                        </div>
                    </div>
                </div>

                <div class="wrapp_2">
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Дополнительный офис:</p>
                        </div>
                        <div class="cell-2">
                            <p>Дубинская</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Ф.И.О. подавшего:</p>
                        </div>
                        <div class="cell-2">
                            <p>Алексаей Царев</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>№ счетов:</p>
                        </div>
                        <div class="cell-2">
                            <p><i class="upload"></i><a href="#" class="orange_link">С0406/40</a></p>
                        </div>
                    </div>
                    <div class="table-3 table-3_2 novisible-730">
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
                                <div class="table-row">
                                    <div class="cell cell-1">
                                        <p>Замена рем комплекта</p>
                                    </div>
                                    <div class="cell cell-2">
                                        <p>1</p>
                                    </div>
                                    <div class="cell cell-3">
                                        <p>15200</p>
                                    </div>
                                    <div class="cell cell-4">
                                        <p>15200</p>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="cell cell-1">
                                        <p>НР 2015 термопленка + бушинги</p>
                                    </div>
                                    <div class="cell cell-2">
                                        <p>2</p>
                                    </div>
                                    <div class="cell cell-3">
                                        <p>1450</p>
                                    </div>
                                    <div class="cell cell-4">
                                        <p>2900</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="orders_active">
                        <div class="title_wrapp">
                            <p>Заказано</p>
                        </div>
                        <div class="inner">
                            <p>Замена рем комплекта</p>
                            <p>Количество: 1</p>
                            <p>Сумма: 15200</p>
                        </div>
                        <div class="inner">
                            <p>НР 2015 термопленка + бушинги</p>
                            <p>Количество: 2</p>
                            <p>Сумма: 2900</p>
                        </div>
                    </div>

                    <div class="table-3 table-3_3">
                        <div class="cell-1">
                            <p>Текст заявки:</p>
                        </div>
                        <div class="cell-2">
                            <textarea></textarea>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Адрес доставки:</p>
                        </div>
                        <div class="cell-2">
                            <p>ул. Дубининская, д.45</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Доставка:</p>
                        </div>
                        <div class="cell-2">
                            <p>Транпортная компания Трансимперия</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Дата доставки:</p>
                        </div>
                        <div class="cell-2">
                            <p>05.08.2016 – 10.08.2016</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Дата выполнения:</p>
                        </div>
                        <div class="cell-2">
                            <p>05.08.2016</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Ф.И.О. мастера:</p>
                        </div>
                        <div class="cell-2">
                            <p>Иванов Иван</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>КПИ:</p>
                        </div>
                        <div class="cell-2">
                            <p>0</p>
                        </div>
                    </div>
                    <div class="table-3">
                        <div class="cell-1">
                            <p>Документы возвращены:</p>
                        </div>
                        <div class="cell-2">
                            <p>Нет</p>
                        </div>
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
