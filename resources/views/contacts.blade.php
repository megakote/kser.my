@extends('layouts.app')

@section('content')
    <!-- Section 1 Contacts -->

    <section class="contacts_sect grey-bg">

        <img class="bg_shape bg_shape_33" src="/img/shape_14.png" alt="">
        <img class="bg_shape bg_shape_34" src="/img/shape_15.png" alt="">

        <div class="row">

            <div class="breadcrumbs_wrapp">
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a></li>
                    <li><a href="#">Адреса сервисных центров</a></li>
                </ul>
            </div>

            <h1>Контакты</h1>

            <div class="tabs tabs_2">
                <div class="tabs-links offset-ziro">
                    @foreach($contacts as $contact)

                        <div class="contacts_thumb_wrapp">
                            <label class="tab-link" for="tab_2_{{ $contact->id }}"></label>
                            <div class="contacts_thumb">
                                <h3>{{ $contact->name }}</h3>
                                <ul class="info">
                                    <li><i class="map-mark_2"></i>{{ $contact->address }}</li>
                                    <li><i class="tel-2"></i><a href="tel:{{ $contact->tel }}">{{ $contact->tel }}</a></li>
                                    <li><i class="clock-2"></i>{{ $contact->schedule }}</li>
                                    <li><i class="envelop-3"></i><a href="mailto:{{ $contact->mail }}">{{ $contact->mail }}</a></li>
                                </ul>
                            </div>
                    </div>
                    @endforeach
                </div>
                <div class="tabs-content">

                    @foreach($contacts as $contact)
                        <input type="radio" name="tabs_2" class="radio-tab" id="tab_2_{{ $contact->id }}">
                        <div class="tab">
                            <div class="contact_map_wrapp">
                                <div class="col-1">
                                    <div class="contact_map"
                                         data-tel="{{ $contact->tel }}"
                                         data-id="{{ $contact->id }}"
                                         data-mail="{{ $contact->mail }}"
                                         data-address="{{ $contact->address }}"
                                         data-name="{{ $contact->name }}"
                                         data-map="{{ $contact->map }}"
                                         id="map_{{ $contact->id }}"
                                    ></div>
                                </div>
                                <div class="col-2">
                                    <div class="contact_info">
                                        <div class="inner">
                                            <p>Можно позвонить нам по телефону круглосуточно:</p>
                                            <a class="tel-link_2" href="tel:{{ $contact->tel }}">{{ $contact->tel }}</a>
                                        </div>
                                        <div class="inner">
                                            <p>А может, вам удобнее написать нам на почту <a class="link-3" href="mailto:{{ $contact->mail }}">{{ $contact->mail }}</a> ?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>

    </section>

    <!-- /Section 1 Contacts -->

{{--<script type="text/javascript" src="{{ asset('vendors/js/infobox.js') }}"></script>--}}
@endsection