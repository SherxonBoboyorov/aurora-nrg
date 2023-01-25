@extends('layouts.front')

@section('content')

    <!-- About company start -->

    <div class="about_company" style="background-image: url({{ asset('front/foto/max_mrx.png)') }}">
        <section class="container">
            <div class="about_company__list">
                <h2 class="about_company__title__h2">@lang('main.О компании')</h2>

                <ul class="about_company__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                    </li>

                    <li>
                        <a class="about_company__menu_link">@lang('main.О компании')</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>


    <div class="about_company__cart">
        <section class="container">
            @foreach ($pages as $page)


            <h3 class="products__title__h2">{{ $page->{'title_' . app()->getLocale()} }}</h3>

             <div class="about_company__text">
                <p>{!! $page->{'content_' . app()->getLocale()} !!}</p>
             </div>

             {{-- <div class="about_company__img">
                <img src="" alt="{!! $page->{'content_' . app()->getLocale()} !!}">
             </div> --}}

             {{-- <div class="about_company__text">
                <p>
                    {{-- {!! $page->{'content_' . app()->getLocale()} !!} --}}
                {{-- </p>
             </div>  --}}

            <div class="about_company__video__item">
                <div class="about_company__video">
                    <p class="text-center">
                        <a data-fancybox-plyr href="{{ asset($page->video) }}">
                            <img class="inline" width="500" alt="" src="{{ asset($page->image) }}"/>

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

            @endforeach
        </section>
    </div>

    <!-- About company end -->

    @endsection
