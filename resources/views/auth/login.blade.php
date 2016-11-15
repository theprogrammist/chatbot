@extends('layouts.material')
@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}


        <main class="mdl-layout__content">
            <div class="mdl-card mdl-shadow--6dp">
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">Вход</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield {{ $errors->has('email') ? ' is-invalid' : '' }}">
                        <input class="mdl-textfield__input" type="text" id="email" name="email"  value="{{ old('email') }}" />
                        <label class="mdl-textfield__label" for="email">E-Mail адрес</label>
                        <span class="mdl-textfield__error">@if ($errors->has('email')){{ $errors->first('email') }} @endif</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield {{ $errors->has('password') ? ' is-invalid' : '' }}">
                        <input class="mdl-textfield__input" type="password" id="password" name="password" />
                        <label class="mdl-textfield__label" for="password">Пароль</label>
                        <span class="mdl-textfield__error">@if ($errors->has('password')){{ $errors->first('password') }} @endif</span>
                    </div>
                    <label class="mdl-checkbox mdl-js-checkbox" for="checkbox">
                        <input type="checkbox" id="checkbox" class="mdl-checkbox__input" name="remember" >
                        <span class="mdl-checkbox__label">Запомнить</span>
                    </label>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Вход</button>
                </div>
                <a class="android-link mdl-typography--font-thin" href="{{ url('/password/reset') }}">
                    Забыли пароль?
                </a>
            </div>
        </main>

    </form>
@endsection