@extends('layouts.front')

@section('content')
    


    <!-- About company start -->

    <div class="about_company" style="background-image: url({{ asset('/front/foto/max_mrx.png)') }}">
        <section class="container">
            <div class="about_company__list">
                <h2 class="about_company__title__h2">@lang('main.Блог')</h2>

                <ul class="about_company__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                    </li>

                    <li>
                        <a class="about_company__menu_link">@lang('main.Блог')</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <!-- About company end -->


    <!-- Blog start -->

    <div class="BlogM">
        <section class="container">
            <div class="blog__list">

                @foreach($articles as  $article)
                <div class="blog__item">
                    <a href="{{ route('article', $article->id) }}">
                        <div class="blog__item__img">
                            <img src="{{ asset($article->image) }}" alt="blog">
                        </div>
                        <h4 class="blog__data"> {{  date('d.m.Y', strtotime($article->created_at)) }}</h4>
                        <div class="blog__text">
                            <p>{{ $article->{'title_' . app()->getLocale()} }}</p>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
{{-- 
            <div class="BlogM__pagination">
                <ul class="BlogM__pagination__page">
                    <li>
                        <a href="#!" class="BlogM__pagination__link__left"><i class="fas fa-arrow-left"></i></a>
                    </li>


                    <ul class="BlogM__pagination__page__mrx">
                        <li class="BlogM__active"><a href="#!" class="BlogM__pagination__link">1</a></li>
                        <li><a href="#!" class="BlogM__pagination__link">2</a></li>
                        <li><a href="#!" class="BlogM__pagination__link">3</a></li>
                    </ul>


                    <li>
                        <a href="#!" class="BlogM__pagination__link__left"><i class="fas fa-arrow-right"></i></a>
                    </li>
                </ul>
            </div> --}}

           {{ $articles->links("vendor.pagination.pagination")}}
        </section>
    </div>

    <!-- Blog end -->
    
    @endsection
