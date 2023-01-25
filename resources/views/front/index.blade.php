@extends('layouts.front')

@section('content')

    <!-- slader start -->

    <div class="slader">
        <div class="slader__list">
            @foreach ($sliders as $slider)


            <div class="slader__item" style="background-image: url({{ asset($slider->image) }})">
                <section class="container">
                    <div class="slader__cart">
                        <h1 class="slader__title__h1">{{ $slider->{'title_' . app()->getLocale()} }}</h1>
                        <div class="slader__text">
                            {{ $slider->{'description_' . app()->getLocale()} }}
                        </div>
                    </div>
                </section>
            </div>

            @endforeach
        </div>
    </div>

    <!-- slader end -->


    <!-- Products start -->

    <div class="products">
        <section class="container">
            <h2 class="products__title__h2">@lang('main.Продукция')</h2>

            <div class="products__list">
                @foreach ($categoriys as $categoriy)
                <div class="products__item">
                    <div class="products__icons">
                        <img src="{{ asset($categoriy->image) }}" alt="icons">
                    </div>

                    <div>
                        <h3 class="products__title__h3">{{ $categoriy->{'title_' . app()->getLocale()} }}</h3>
                        <div class="products__text">
                            <p>{!! $categoriy->{'content_' . app()->getLocale()} !!}</p>
                        </div>
                        <a href="{{ url('products', ['categoriy' => $categoriy->id]) }}" class="products__link"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Products end -->


    <!-- About start -->

    <div class="about">
        <section class="container">
            @foreach ($pages as $page)
            <div class="about__list">

                <div class="about__item">
                    <h2 class="products__title__h2">@lang('main.О компании')</h2>
                    <div class="about__text">
                        <p>
                            {!! $page->{'content_' . app()->getLocale()} !!}
                        </p>
                    </div>

                    <div class="about__link__button">
                        <a href="{{ route('about') }}" class="about__link">@lang('main.Подробнее') <span><i class="fas fa-arrow-right"></i></span></a>
                    </div>
                </div>

                <div class="about__item">
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

    <!-- About end -->


    <!-- Company in numbers start -->

    <div class="company">
        <section class="container">
            <h2 class="products__title__h2">@lang('main.Компания в цифрах')</h2>
            <div class="company__list">
                @foreach ($numbers as $number)

                <div class="company__item">
                    <h3 class="company__title__h3"><span class="number">{{ $number->number }}</span>+</h3>
                    <div class="company__item__text">
                        <p>{{ $number->{'title_' . app()->getLocale()} }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Company in numbers end   -->


    <!-- Services start -->

    <div class="services">
        <section class="container">
            <div class="services__list">
                @foreach ($uslugs as $uslug)

                <div class="services__item">
                    <div class="services__item__video">
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

                <div class="services__item">
                    <h2 class="products__title__h2">@lang('main.Услуги') </h2>
                    <div class="services__text">
                        <p>
                            {!! $uslug->{'content_' . app()->getLocale()} !!}
                        </p>
                    </div>

                    <div class="about__link__button">
                        <a href="{{ route('services') }}" class="about__link">@lang('main.Подробнее')<span><i class="fas fa-arrow-right"></i></span></a>
                    </div>
                </div>
                @endforeach

            </div>
        </section>
    </div>

    <!-- Services end -->


    <!-- Blog start -->

    <div class="blog">
        <section class="container">
            <h2 class="products__title__h2">@lang('main.Блог') </h2>
            <div class="blog__list">

                @foreach($articles as  $article)
                <div class="blog__item">
                    <a href="{{ route('article', $article->id) }}">
                        <div class="blog__item__img">
                            <img src="{{ asset($article->image) }}" alt="blog">
                        </div>
                        <h4 class="blog__data"> {{ $article->created_at->format('d.m.Y') }} </h4>
                        <div class="blog__text">
                            <p>{{ $article->{'title_' . app()->getLocale()} }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="about__link__button">
                <a href="{{ route('articles') }}" class="about__link">@lang('main.Подробнее')<span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </section>
    </div>

    <!-- Blog end -->


    <!-- Our partners start -->

    <div class="our_partners">
        <section class="container">
            <h2 class="products__title__h2">@lang('main.Наши партнеры') </h2>
            <div class="our_partners__list">
                @foreach ($usefulResources as $usefulResource)

                <div class="our_partners__item">
                    <a href="{{ $usefulResource->link }}">
                        <img src="{{ asset($usefulResource->image) }}" alt="our_partners">
                    </a>
                </div>

                @endforeach
            </div>
        </section>
    </div>

    <!-- Our partners end -->

    @endsection
