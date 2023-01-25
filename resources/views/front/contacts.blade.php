@extends('layouts.front')


@section('content')

    <!-- About company start -->

    <div class="about_company" style="background-image: url({{ asset('front/foto/max_mrx.png)') }}">
        <section class="container">
            <div class="about_company__list">
                <h2 class="about_company__title__h2">@lang('main.Контакты')</h2>

                <ul class="about_company__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                    </li>

                    <li>
                        <a  class="about_company__menu_link">@lang('main.Контакты')</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <!-- About company end -->

    <!-- Contacts start -->
    <div class="contacts">
        <section class="container">
            <div class="contacts__list">
                <h2 class="products__title__h2">@lang('main.Контактная информация')</h2>

                <ul class="contacts__menu">
                    <li>
                        <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="contacts__menu__link"><span>@lang('main.Телефон'):</span> {{ $options->where('key', 'phone')->first()->value }}</a>
                    </li>

                    <li>
                        <a class="contacts__menu__link"><span>@lang('main.Адрес'):</span> {{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}</a>
                    </li>

                    <li>
                        <a href="mailto:{{ $options->where('key', 'email')->first()->value }}" class="contacts__menu__link"><span>@lang('main.email'):</span>{{ $options->where('key', 'email')->first()->value }}</a>
                    </li>
                </ul>

                <h2 class="products__title__h2">@lang('main.Обратная связь')</h2>

                <form action="{{ route('saveCallback') }}" class="contacts__from" method="POST">
                    @csrf
                    <div class="contacts__item">
                        <input class="contacts__input" type="text" name="name" placeholder="ФИО" required>
                        <input class="contacts__input" type="tel" name="phone" placeholder="Телефон" required>
                    </div>

                    <div class="contacts__item">
                        <input class="contacts__input" type="text" name="address" placeholder="Адрес" required>
                        <input class="contacts__input" type="email" name="email" placeholder="Email">
                    </div>

                    <textarea class="contacts__textarea" name="message" placeholder="Комментарий" required></textarea>

                    <div class="about__link__button">
                        <button type="submit" class="contacts__button about__link">@lang('main.Отправить')  <span><i class="fas fa-arrow-right"></i></span></button>
                    </div>
                </form>

                <h2 class="products__title__h2">@lang('main.Мы на карте')</h2>
            </div>
        </section>

        <div class="contacts__mop">
            {!! $options->where('key', 'map')->first()->value !!}
        </div>
    </div>

    <!-- Contacts end -->

    @endsection
