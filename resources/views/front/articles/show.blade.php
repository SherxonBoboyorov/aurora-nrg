@extends('layouts.front')

@section('content') 

    <!-- About company start -->

    <div class="about_company" style="background-image: url({{ asset('/front/foto/max_mrx.png)') }}">
        <section class="container">
            <div class="about_company__list">
                <h2 class="about_company__title__h2">{{ $article->{'title_' . app()->getLocale()} }}</h2>

                <ul class="about_company__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                    </li>

                    <li>
                        <a class="about_company__menu_link">{{ $article->{'title_' . app()->getLocale()} }}</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <!-- About company end -->


    <!-- blog-in start-->

    <div class="blog_in">
        <section class="container">

            <div class="blog_in__list">
                <div class="blog_in__img">
                    <img src="{{ asset($article->image) }}" alt="blog">
                </div>
                <h4 class="blog__data">{{  date('d.m.Y', strtotime($article->created_at)) }} </h4>
                <div class="blog_in__text">
                    <p>
                        {!! $article->{'content_' . app()->getLocale()} !!}
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!-- blog-in end -->
    @endsection
