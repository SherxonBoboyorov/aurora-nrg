@extends('layouts.front')

@section('content')

    <div class="about_company" style="background-image: url({{ asset('/front/foto/max_mrx.png)') }}">
        <section class="container">
            <div class="about_company__list">
                <h2 class="about_company__title__h2">@lang('main.Услуги')</h2>

                <ul class="about_company__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                    </li>

                    <li>
                        <a  class="about_company__menu_link">@lang('main.Услуги')</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>


    <div class="about_company__cart">
        <section class="container">
            <div class="about_company__video__item">
                <div class="about_company__video">
                    <p class="text-center">
                        <a data-fancybox-plyr href="{{ asset($uslug->video) }}">
                            <img class="inline" width="500" alt="" src="{{ asset($uslug->image) }}"/>

                            <!-- play start -->

                            <div class="button__min is-play" href="#">
                                <div class="button-outer-circle has-scale-animation"></div>
                                <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                <div class="button-icon is-play">
                                    <img class="about__item__img__play" alt="All" src="{{ asset('front/foto/pley.svg') }}">
                                </div>
                            </div>

                            <!-- play end -->
                        </a>
                    </p>
                </div>
            </div>

            <div class="about_company__text">
                <p>
                    {!! $uslug->{'content_' . app()->getLocale()} !!}
                </p>
            </div>


            <div class="about__link__button petrol_in__serch__block">
                <a href="#!" class="about__link">@lang('main.Оформить заказ') <span><i class="fas fa-arrow-right"></i></span></a>
            </div>

            <!-- petrol_in__serch start -->

            <div class="petrol_in__serch">
                <div class="petrol_in__serch__from">
                    <button class="petrol_in__serch__none"><i class="fas fa-times"></i></button>
                    <form action="{{ route('saveSend') }}" method="POST">
                        @csrf
                        <input class="petrol_in__serch__input" type="text" name="name" placeholder="ФИО">
                        <input class="petrol_in__serch__input" type="text" name="phone" placeholder="Телефон">
                        <div class="about__link__button">
                            <button type="submit" class="contacts__button about__link">@lang('main.Отправить') <span><i class="fas fa-arrow-right"></i></span></button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </div>

@endsection
