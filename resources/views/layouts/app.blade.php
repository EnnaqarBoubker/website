<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="la 1ere plateforme de coaching à marrakech"/>
    <meta property="og:description" content="Mikdad Center La 1ère plateforme de coachs professionnels au Maroc consultez nos cours de coaching à prix raisonnable qui vous donnent un avantage élevé et une grande connaissance et compétences pour que vous puissiez briller. " />
    <meta property="og:image" content="https://centremikdad.ma/assets/frontend/img/logoo.png" />
    content="Formation certifiante de Coach au Maroc | Devenir Coach : formation Coaching Nice, Rennes, Rouen, Bordeaux,  Quebec, La Reunion" />
    <meta name="description" content="Mikdad Center La 1ère plateforme de coachs professionnels au Maroc consultez nos cours de coaching à prix raisonnable qui vous donnent un avantage élevé et une grande connaissance et compétences pour que vous puissiez briller. ">
   <meta name="keywords" content="coach marrakech formation ,marrakech formation, coach marrakech , formation marrakech , coaching marrakech ,Centre, formation, mikdad ,formation, cpf formation,formation continue,bac pro,ecole professionnelle,formation adulte,bac pro informatique,formation qualifiante,formation pour adulte,formation diplomante,trouver une formation,formation professionnelle en france,formation professionnelle,compte professionnel de formation,formation professionnelle continue,formations professionnelles,formation professionnelle adulte,centre de formation professionnelle,compte formation professionnelle,compte de formation professionnelle,compte formation professionnel,la formation professionnelle,baccalauréat professionnel,formation professionnelle salarié,organisme de formation professionnelle,formation professionnelle en france,coaching personnel,coaching scolaire,coaching professionnel,coaching en arabe,coaching définition,coaching village,coaching sportif,coaching maroc,coaching and personal development,coaching au maroc,coaching agadir,coaching and personal development essay,coaching agile,coaching and mentoring,coaching and personal development definition,coaching a marrakech,a coaching relationship focuses on providing marines with the opportunity to do,a coaching leader builds a positive climate by,a coaching institute of english conducts classes,a coaching philosophy should be developed primarily by,a coaching philosophy,a coaching institute provides physics and mathematics classes,a coaching session,a coaching box may not,coaching à domicile,coaching à distance,coaching à 360°,coaching à l'hôpital,coaching à distance prix,coaching à l'emploi,coaching à domicile confinement,coaching à domicile covid,coaching à domicile autorisé,coaching à domicile autorisé confinement,coaching âme soeur,coach âge,h coaching âge,coaching troisième âge,coaching personnes âgées,coaching de l'âme,coaching de l'âme denise linn,coaching pour personnes âgées,b coaching paris,b coaching license soccer,b coaching license,b coaching classes,plan b coaching,b'up coaching,pauline b coaching,f&b coaching,coaching casablanca,coaching commercial,coaching collectif,coaching couple,coaching communication,coaching confiance en soi,coaching centre d'appel,coaching couple gratuit,ça coaching,coach çanta,coach çanta fiyatları,coach çanta fiyat,coach çanta beymen,coach çanta america,coach çeviri,coach çanta istinye park,coaching ç,coaching de vie,coaching developpement personnel,coaching d'équipe,coaching de performance,coaching de groupe,coaching d'entreprise,coaching dans les entreprises,d coaching license,d coaching license soccer,d'm coaching,coaching d'organisation,coaching d'affaires,coaching d'équipe en entreprise,coaching en ligne,coaching en ligne maroc,coaching entrepreneurial,coaching et développement personnel,coaching en entreprise,coaching entrepreneurial pdf,coaching en ligne gratuit,e coaching academy,e coaching tabac info service,e-coaching definition,coaching esport,e-coaching platform,e-coaching tools,coaching et mentoring,coaching et leadership,coaching étudiant,coaching émotionnel,coaching énergétique,coaching équipe,coaching écriture">
    
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
