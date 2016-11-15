<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('html-page-title') wifamily @show</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.grey-indigo.min.css" />
    <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="<?=asset('css/styles.css')?>">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
</head>
<body>
@yield('app')

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="{{url('/')}}/images/tc-s.png" style="height: 31px">
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>
            <!-- Navigation -->
            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    @if (Auth::guest())
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/login') }}">Вход</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/register') }}">Регистрация</a>
                    @else
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Выход
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Оборудование</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Решения</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Эксперты</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Диалоги</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Покупки</a>
                </nav>
            </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="{{url('/')}}/images/tc-s.png" style="height: 31px">
          </span>
            <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <li class="mdl-menu__item" onclick="window.location.href = '{{ url('/login') }}';">Login</li>
                <li class="mdl-menu__item" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </li>
                <li class="mdl-menu__item">Настройки</li>
            </ul>
        </div>
    </div>

    <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <!--img class="android-logo-image" src="{{url('/')}}/images/android-logo-white.png"-->
        </span>
        <nav class="mdl-navigation">
            @if (Auth::guest())
                <a class="mdl-navigation__link" href="{{ url('/login') }}">Вход</a>
                <a class="mdl-navigation__link" href="{{ url('/register') }}">Регистрация</a>
            @else
                <a class="mdl-navigation__link" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    Выход
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
            <a class="mdl-navigation__link" href="">Настройки</a>
            <a class="mdl-navigation__link" href="">Счет</a>
            <div class="android-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Рядом</span>
            <a class="mdl-navigation__link" href="">Эксперты</a>
            <a class="mdl-navigation__link" href="">Магазины</a>
            <a class="mdl-navigation__link" href="">Сервисные центры</a>
            <div class="android-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Ресурсы</span>
            <a class="mdl-navigation__link" href="">Скачать приложение</a>
            <a class="mdl-navigation__link" href="">Официальный блог</a>
            <a class="mdl-navigation__link" href="">WF на Facebook</a>
            <a class="mdl-navigation__link" href="">WF в Twitter</a>
            <div class="android-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Для сотрудничества</span>
            <a class="mdl-navigation__link" href="">Эспертам</a>
            <a class="mdl-navigation__link" href="">Сервисным центрам</a>
            <a class="mdl-navigation__link" href="">Магазинам</a>
        </nav>
    </div>

    <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="android-be-together-section mdl-typography--text-center">

            @yield('content')

            <a href="#bottom">
                <button class="android-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
                    <i class="material-icons">expand_more</i>
                </button>
            </a>
        </div>

        <footer class="android-footer mdl-mega-footer">
            <a name="bottom"></a>
            <div class="mdl-mega-footer--top-section">
                <div class="mdl-mega-footer--left-section">
                    <button class="mdl-mega-footer--social-btn">&#x1F550;</button>
                    &nbsp;
                    <button class="mdl-mega-footer--social-btn">&#x1F4B2;</button>
                    &nbsp;
                    <button class="mdl-mega-footer--social-btn">&#x1F4CC;</button>
                </div>
                <div class="mdl-mega-footer--right-section">
                    <a class="mdl-typography--font-light" href="#top">
                        Вверх
                        <i class="material-icons">expand_less</i>
                    </a>
                </div>
            </div>

            <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">© 2016 Leandev</p>
            </div>

            <div class="mdl-mega-footer--bottom-section">
                <a class="android-link android-link-menu mdl-typography--font-light" id="version-dropdown">
                    О нас
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="version-dropdown">
                    <li class="mdl-menu__item">Миссия</li>
                    <li class="mdl-menu__item">Цели</li>
                    <li class="mdl-menu__item">Принципы</li>
                </ul>
                <a class="android-link android-link-menu mdl-typography--font-light" id="developers-dropdown">
                    Контакты
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="developers-dropdown">
                    <li class="mdl-menu__item">Форма обратной связи</li>
                    <li class="mdl-menu__item">Схема проезда</li>
                </ul>
                <a class="android-link mdl-typography--font-light" href="">Блог</a>
                <a class="android-link mdl-typography--font-light" href="">политика конфиденциальности</a>
            </div>

        </footer>
    </div>
</div>
<!-- a href="http://leandev.ru" target="_blank"
   id="view-source"
   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Скачать приложение</a-->
<script src="{{url('/')}}/$$hosted_libs_prefix$$/$$version$$/material.min.js"></script>
</body>
</html>