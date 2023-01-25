@extends('layouts.front')

@section('content')

    <div class="about_company" style="background-image: url({{ asset('/front/foto/max_mrx.png)') }}">
        <section class="container">
            <div class="about_company__list">
                <h2 class="about_company__title__h2">{{ $dizel->{'title_' . app()->getLocale()} }}</h2>

                <ul class="about_company__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about_company__menu_link">@lang('main.Главная')</a>
                    </li>
                    <li>
                        <a  class="about_company__menu_link">{{ $dizel->{'title_' . app()->getLocale()} }}</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <div class="petrol_in">
      <section class="container">

          <div class="petrol_in__list">
              <ul class="petrol_in__menu">
                
                  @foreach($list as $item)
                  <li @if( $item->id == $dizel->id) class="petrol_in__active" @endif>
                      <a href="{{ route('product.show', [
                        'dizel' => $item->id,
                        'category_id' => $dizel->categoriy_id
                      ]) }}" class="petrol_in__menu__button">{{ $item->{'title_' . app()->getLocale()} }}</a>
                  </li>
                  @endforeach 
              </ul>

              <div class="petrol_in__menu__cart" aria-labelledby="ui-id-1" id="mrx_{{ $dizel->id }}">
                    <h2 class="products__title__h2">{{ strtoupper($dizel->{'title_' . app()->getLocale()}) }}</h2>
                    <div class="petrol_in__menu__text">
                        <p>
                            {!! $dizel->{'content_' . app()->getLocale()} !!}
                        </p>
                    </div>

                  <div class="about__link__button petrol_in__serch__block">
                      <a href="#!" class="about__link">@lang('main.Оформить заказ') <span><i class="fas fa-arrow-right"></i></span></a>
                  </div>
              </div>


          </div>

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
