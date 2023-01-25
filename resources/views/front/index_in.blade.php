@extends('layouts.front')
<title>Бензин и дизтопливо в Ташкенте</title>

@section('content')

    <!-- About company start -->

    <div class="about_company" style="background-image: url({{ asset('front/foto/max_mrx.png)') }}">
      <section class="container">
          <div class="about_company__list">
              <h2 class="about_company__title__h2">@lang('main.Продукция')</h2>

              <ul class="about_company__menu">
                  <li>
                      <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                  </li>

                  <li>
                      <a class="about_company__menu_link">@lang('main.Продукция')</a>
                  </li>
              </ul>
          </div>
      </section>
  </div>

  <!-- About company end -->

  <!-- Petrol start -->

  <div class="petrol">
      <section class="container">
          <div class="petrol__list">
            @foreach ($categoriys as $categoriy)
              <div class="petrol__item">
                  <div class="petrol__item__foto">
                      <img src="{{ asset($categoriy->image) }}" alt="">
                  </div>
                  <h2 class="petrol__title__h2">{{ $categoriy->{'title_' . app()->getLocale()} }}</h2>
                  <a href="{{ url('products', ['categoriy' => $categoriy->id]) }}" class="petrol__link"><span><i class="fas fa-arrow-right"></i></span></a>
              </div>
            @endforeach
          </div>
      </section>
  </div>

  <!-- Petrol end -->

@endsection
