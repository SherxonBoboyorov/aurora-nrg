@extends('layouts.front')


@section('content')

    <!-- About company start -->

    <div class="about_company" style="background-image: url({{ asset('/front/foto/max_mrx.png)') }}">
        <section class="container">
            <div class="about_company__list">
                @foreach ($categoriys as $categoriy)

                <h2 class="about_company__title__h2">{{ $categoriy->{'title_' . app()->getLocale()} }}</h2>

                <ul class="about_company__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                    </li>

                    <li>
                        <a class="about_company__menu_link">{{ $categoriy->{'title_' . app()->getLocale()} }}</a>
                    </li>
                </ul>
                @endforeach
            </div>
        </section>
    </div>

    <!-- About company end -->

    <!-- Petrol start -->

    <div class="petrol">
      <section class="container">
          <div class="petrol__list">
            @foreach ($dizels as $dizel)

              <div class="petrol__item">
                <h4 class="petrol__title__h4">{{ $dizel->id }}</h4>
                  <h2 class="petrol__title__h2">{{ $dizel->{'title_' . app()->getLocale()} }}</h2>
                  <a href="{{ route('product.show', [
                    'dizel' => $dizel->id,
                    'category_id' => $category_id
                  ]) }}" class="petrol__link"><span><i class="fas fa-arrow-right"></i></span></a>
              </div>
             @endforeach
          </div>
      </section>
  </div>

  <!-- Petrol end -->

    @endsection
