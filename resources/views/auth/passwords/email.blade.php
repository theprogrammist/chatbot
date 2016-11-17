@extends('layouts.material')
@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <main class="mdl-layout__content">
            <div class="mdl-card mdl-shadow--6dp">
                @if (session('status'))
                    <mark><div class="mdl-card__supporting-text">{{ session('status') }}</div></mark>
                @endif
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">Запросить сброс пароля</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield {{ $errors->has('email') ? ' is-invalid' : '' }}">
                        <input class="mdl-textfield__input" type="text" id="email" name="email"  value="{{ old('email') }}" />
                        <label class="mdl-textfield__label" for="email">E-Mail адрес</label>
                        <span class="mdl-textfield__error">@if ($errors->has('email')){{ $errors->first('email') }} @endif</span>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Запросить</button>
                </div>
            </div>
        </main>

    </form>
@endsection
