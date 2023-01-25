<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="google-site-verification" content="fCApmzb2UeadsPyPcvTeoH-R6cZAtaIvktMDS7cAg8o" />
    <meta name="google-site-verification" content="google-site-verification: google596b95f4ab1952a4.html" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
    <link rel="stylesheet" href="{{ asset('front/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.css/') }}">

    {!! Meta::toHtml() !!}

</head>
<body>

    <!-- header start-->

    <header>
        <div class="header">
            <section class="container">
                <div class="header__list">

                    <div class="header__logo">
                        <a href="{{ route('/') }}">
                            <img src="{{ asset('front/foto/logo.png') }}" alt="logo">
                        </a>
                    </div>

                    <div class="header__item">
                        <ul class="header__link__list">
                            <li><a href="{{ route('about') }}" class="header__link">@lang('main.О компании')</a></li>
                            <li><a href="{{ route('index_in') }}" class="header__link">@lang('main.Продукция')</a></li>
                            <li><a href="{{ route('services') }}" class="header__link">@lang('main.Услуги')</a></li>
                            <li><a href="{{ route('articles') }}" class="header__link">@lang('main.Блог')</a></li>
                            <li><a href="{{ route('contact') }}" class="header__link">@lang('main.Контакты')</a></li>
                        </ul>

                        <!-- language start -->

                        <div class="header__ru">
                            <ul>

                            <div class="header__ru_cart">
                                  <a data-target='dropdown1' class="header__en__link dropdown-trigger">{{ strtoupper(app()->getLocale()) }}</a>
                                  <span class="header__en__link"><i class="fas fa-angle-down"></i></span>
                            </div>

                            <div class="header__ru_none dropdown-content" id='dropdown1'>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if($localeCode != app()->getLocale())
                                    <div class="header__ru_list @if($localeCode == app()->getLocale()) active @endif">
                                        <a rel="alternate" class="header__en__link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ strtoupper($localeCode) }}
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </ul>
                        </div>

                     <!-- language start -->



                        <div class="header__burger__start burger__end"><i class="fas fa-times"></i></div>
                    </div>

                    <div class="header__burger">
						<div class="header__burger__start burger__start"><i class="fas fa-bars"></i></div>
					</div>

                </div>
            </section>
        </div>
    </header>

    <!-- header end-->

    @yield('content')

    <!-- footer start -->

    <footer>
      <div class="footer">
          <section class="container">
              <div class="footer__list">

                  <div class="footer__item">

                      <div class="footer__cart">
                          <div class="footer__logo">
                              <a href="{{ route('contact') }}">
                                  <img src="{{ asset('front/foto/logo.svg') }}" alt="logo">
                              </a>
                          </div>

                          <ul class="footer__menu">
                              <li>
                                  <a href="{{ $options->where('key', 'instagram')->first()->value }}" class="footer__menu__link"><i class="fab fa-instagram"></i></a>
                              </li>

                              <li>
                                  <a href="{{ $options->where('key', 'facebook')->first()->value }}" class="footer__menu__link"><i class="fab fa-facebook-f"></i></a>
                              </li>

                              <li>
                                  <a href="{{ $options->where('key', 'telegram')->first()->value }}" class="footer__menu__link"><i class="fab fa-telegram-plane"></i></a>
                              </li>
                          </ul>
                      </div>

                      <div class="footer__cart">
                          <ul class="footer__menu__tel">
                              <li>
                                  <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="footer__menu__tel__link"><span>@lang('main.Телефон'):</span>{{ $options->where('key', 'phone')->first()->value }}</a>
                              </li>
                              <li>
                                  <a class="footer__menu__tel__link"><span>@lang('main.Адрес'):</span>{{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}</a>
                              </li>
                              <li>
                                  <a href="mailto:{{ $options->where('key', 'email')->first()->value }}" class="footer__menu__tel__link"><span>@lang('main.email'):</span>{{ $options->where('key', 'email')->first()->value }}</a>
                              </li>
                          </ul>
                      </div>
                  </div>

                  <div class="footer__item">
                      <ul class="footer__menu__max">
                          <li>
                              <a href="{{ route('about') }}" class="footer__menu__max__link">@lang('main.О компании')</a>
                          </li>

                          <li>
                              <a href="{{ route('index_in') }}" class="footer__menu__max__link">@lang('main.Продукция')</a>
                          </li>

                          <li>
                              <a href="{{ route('services') }}" class="footer__menu__max__link">@lang('main.Услуги')</a>
                          </li>
                      </ul>

                      <ul class="footer__menu__max">
                          <li>
                              <a href="{{ route('articles') }}" class="footer__menu__max__link">@lang('main.Блог')</a>
                          </li>

                          <li>
                              <a href="{{ route('contact') }}" class="footer__menu__max__link">@lang('main.Контакты')</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </section>
      </div>

      <div class="footer__bottom">
          <section class="container">
                  <div class="footer__bottom__list">
                      <div class="footer__bottom__item">
                          <a href="#!" class="footer__bottom__link">«Aurora NRG». @lang('main.Все права защищены')</a>
                      </div>

                      <div class="footer__bottom__item">
                          <a href="https://sos.uz/" class="footer__bottom__link">© Copyright 2021 - Web developed by SOS Group</a>
                      </div>
                  </div>
          </section>
      </div>
  </footer>


  <!-- footer end -->

  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
  <script type="module">
      import { Fancybox } from "https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.esm.js";
  </script>
  <script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('front/js/materialize.min.js') }}"></script>
  <script src="{{ asset('front/js/slick.min.js') }}"></script>
  <script src="{{ asset('front/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('front/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('front/js/animation.js') }}"></script>
  <script src="{{ asset('front/js/index.js') }}"></script>
  <script src="{{ asset('front/js/mar_ru.js') }}"></script>
</body>
</html>
