@extends('layouts.front-master')
<style>


/* CSS */
.button-89 {
  --b: 3px;   /* border thickness */
  --s: .45em; /* size of the corner */
  --color: #373B44;
  
  padding: calc(.5em + var(--s)) calc(.9em + var(--s));
  color: var(--color);
  --_p: var(--s);
  background:
    conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--color) 0)
    var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
  transition: .3s linear, color 0s, background-color 0s;
  outline: var(--b) solid #0000;
  outline-offset: .6em;
  font-size: 16px;
padding: 20px !important;
    font-weight: bold !important;
  border: 0;

  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-89:hover,
.button-89:focus-visible{
  --_p: 0px;
  outline-color: var(--color);
  outline-offset: .05em;
}

.button-89:active {
  background: var(--color);
  color: #fff;
}
</style>
@section('content-main')
<div class="main" id="login_bg">
    <div id="login">
        <aside>
            <figure style="height:75px !important;" >
               {{-- <a href="index.html"><img src="{{ asset('assets/frontend') }}/img/logoo.png" width="149" height="42" data-retina="true" alt=""></a> --}}
            </figure>
            @if( session()->has('error') )
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}"  style="text-align: center; margin: 156px auto !important;">
                {{ csrf_field() }}

                <div class="form-group">
                    <span class="input {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="input_field" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="email" class="input_label"><span class="input__label-content">Entrer votre email</span></label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                   </span>

                    <span class="input {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="input_field" name="password" required>
                        <label for="password" class="input_label"><span class="input__label-content">Entrer votre mot de password</span></label>
                          @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </span>
                </div>

                <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                            </label>
                        </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn button-89">
                            Se connecter
                        </button>

                    <br>
                    {{-- <a class="btn btn-link" href="{{ url('inscription') }}">
                        Vous ne possédez pas de compte? <br>Créer votre compte.
                    </a> --}}

                    <a class="btn btn-link" href="#">
                        Mot de passe oublié ?
                    </a>
                </div>
            </form>
        </aside>
    </div>
    <!-- /login -->
</div>
@endsection
