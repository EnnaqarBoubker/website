<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="Mikdad Center La 1ère plateforme de coachs professionnels au Maroc consultez nos cours de coaching à prix raisonnable qui vous donnent un avantage élevé et une grande connaissance et compétences pour que vous puissiez briller. ">
    <meta name="keywords" content="coach marrakech formation ,marrakech formation, coach marrakech , formation marrakech , coaching marrakech ,Centre, formation, mikdad ,formation, cpf formation,formation continue,bac pro,ecole professionnelle,formation adulte,bac pro informatique,formation qualifiante,formation pour adulte,formation diplomante,trouver une formation,formation professionnelle en france,formation professionnelle,compte professionnel de formation,formation professionnelle continue,formations professionnelles,formation professionnelle adulte,centre de formation professionnelle,compte formation professionnelle,compte de formation professionnelle,compte formation professionnel,la formation professionnelle,baccalauréat professionnel,formation professionnelle salarié,organisme de formation professionnelle,formation professionnelle en france,coaching personnel,coaching scolaire,coaching professionnel,coaching en arabe,coaching définition,coaching village,coaching sportif,coaching maroc,coaching and personal development,coaching au maroc,coaching agadir,coaching and personal development essay,coaching agile,coaching and mentoring,coaching and personal development definition,coaching a marrakech,a coaching relationship focuses on providing marines with the opportunity to do,a coaching leader builds a positive climate by,a coaching institute of english conducts classes,a coaching philosophy should be developed primarily by,a coaching philosophy,a coaching institute provides physics and mathematics classes,a coaching session,a coaching box may not,coaching à domicile,coaching à distance,coaching à 360°,coaching à l'hôpital,coaching à distance prix,coaching à l'emploi,coaching à domicile confinement,coaching à domicile covid,coaching à domicile autorisé,coaching à domicile autorisé confinement,coaching âme soeur,coach âge,h coaching âge,coaching troisième âge,coaching personnes âgées,coaching de l'âme,coaching de l'âme denise linn,coaching pour personnes âgées,b coaching paris,b coaching license soccer,b coaching license,b coaching classes,plan b coaching,b'up coaching,pauline b coaching,f&b coaching,coaching casablanca,coaching commercial,coaching collectif,coaching couple,coaching communication,coaching confiance en soi,coaching centre d'appel,coaching couple gratuit,ça coaching,coach çanta,coach çanta fiyatları,coach çanta fiyat,coach çanta beymen,coach çanta america,coach çeviri,coach çanta istinye park,coaching ç,coaching de vie,coaching developpement personnel,coaching d'équipe,coaching de performance,coaching de groupe,coaching d'entreprise,coaching dans les entreprises,d coaching license,d coaching license soccer,d'm coaching,coaching d'organisation,coaching d'affaires,coaching d'équipe en entreprise,coaching en ligne,coaching en ligne maroc,coaching entrepreneurial,coaching et développement personnel,coaching en entreprise,coaching entrepreneurial pdf,coaching en ligne gratuit,e coaching academy,e coaching tabac info service,e-coaching definition,coaching esport,e-coaching platform,e-coaching tools,coaching et mentoring,coaching et leadership,coaching étudiant,coaching émotionnel,coaching énergétique,coaching équipe,coaching écriture">
     <meta property="og:title" content="la 1ere plateforme de coaching à marrakech"/>
    <meta property="og:description" content="Mikdad Center La 1ère plateforme de coachs professionnels au Maroc consultez nos cours de coaching à prix raisonnable qui vous donnent un avantage élevé et une grande connaissance et compétences pour que vous puissiez briller. " />
    <meta property="og:image" content="https://centremikdad.ma/assets/frontend/img/logoo.png" />
    <meta name="author" content="Centre Mikdad">
    
    <title>Agence Mikdad - Coach</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('assets/backend/img')}}/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('assets/backend/img')}}/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('assets/backend/img')}}/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{asset('assets/backend/img')}}/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{asset('assets/backend/img')}}/apple-touch-icon-144x144-precomposed.png">

    <!-- Bootstrap core CSS-->
    <link href="{{asset("assets/backend/vendor")}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{asset("assets/backend/css")}}/admin.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{asset("assets/backend/vendor")}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="{{asset("assets/backend/vendor")}}/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="{{asset("assets/backend/css")}}/custom.css" rel="stylesheet">

    @yield("addheaderscript")
</head>

<body class="fixed-nav sticky-footer" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('coach-admin') }}">
        <!--      <img src="img/logo.png" data-retina="true" alt="" width="163" height="36">-->
        <h2 style="color: #fff !important;width:163px;height:28px">Centre Mikdad</h2>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url( 'home' ) }}">
                    <i class="fa fa-fw fa-user-circle"></i>
                    <span class="nav-link-text">Visit Coach profil</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('coach-admin') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Formations">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseFormations" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-television"></i>
                    <span class="nav-link-text">Gérer Les Formations</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseFormations">
                    <li>
                        <a href="{{ url('coach-admin/formations') }}">Formations</a>
                    </li>
                    <li>
                        <a href="{{ url('coach-admin/formations-chapitres') }}">Chapitres</a>
                    </li>
                    <li>
                        <a href="{{ url('coach-admin/formations-courses') }}">Cours</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Formations">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseConsultations" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-television"></i>
                    <span class="nav-link-text">Gérer Les Consultations</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseConsultations">
                    <li>
                        <a href="{{ url('coach-admin/consultations') }}"> Consultations</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Articles">
                <a class="nav-link" href="{{ url('coach-admin/articles') }}">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Articles</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Galerie">
                <a class="nav-link" href="{{ url('coach-admin/galeries') }}">
                    <i class="fa fa-fw fa-picture-o"></i>
                    <span class="nav-link-text">Galerie</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                <a class="nav-link" href="{{ url('coach-admin/students') }}">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Bénéficiers</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                <a class="nav-link" href="{{ url('coach-admin/demandes') }}">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="nav-link-text">Demandes</span>
                </a>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                <a class="nav-link" href="{{ url('coach-admin/commentaires') }}">
                    <i class="fa fa-fw fa-comment"></i>
                    <span class="nav-link-text">Commentaires</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="{{ url('coach-admin/messages') }}">
                    <i class="fa fa-fw fa-envelope-open"></i>
                    <span class="nav-link-text">Messages</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Mon profil</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseProfile">

                    <li>
                        <a href="{{ url('coach-admin/teacher-profile') }}">Coach profil</a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#exampleModal" >
                            Déconnecter
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown"--}}
{{--                   aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="fa fa-fw fa-envelope"></i>--}}
{{--                    <span class="d-lg-none">Messages--}}
{{--                            <span class="badge badge-pill badge-primary">12 New</span>--}}
{{--                          </span>--}}
{{--                    <span class="indicator text-primary d-none d-lg-block">--}}
{{--                            <i class="fa fa-fw fa-circle"></i>--}}
{{--                          </span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="messagesDropdown">--}}
{{--                    <h6 class="dropdown-header">New Messages:</h6>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">--}}
{{--                        <strong>David Miller</strong>--}}
{{--                        <span class="small float-right text-muted">11:21 AM</span>--}}
{{--                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome!--}}
{{--                            These messages clip off when they reach the end of the box so they don't overflow over to--}}
{{--                            the sides!--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">--}}
{{--                        <strong>Jane Smith</strong>--}}
{{--                        <span class="small float-right text-muted">11:21 AM</span>--}}
{{--                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00--}}
{{--                            instead of 4:00. Thanks!--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">--}}
{{--                        <strong>John Doe</strong>--}}
{{--                        <span class="small float-right text-muted">11:21 AM</span>--}}
{{--                        <div class="dropdown-message small">I've sent the final files over to you for review. When--}}
{{--                            you're able to sign off of them let me know and we can discuss distribution.--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item small" href="#">View all messages</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"--}}
{{--                   aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="fa fa-fw fa-bell"></i>--}}
{{--                    <span class="d-lg-none">Alerts--}}
{{--                            <span class="badge badge-pill badge-warning">6 New</span>--}}
{{--                          </span>--}}
{{--                    <span class="indicator text-warning d-none d-lg-block">--}}
{{--                            <i class="fa fa-fw fa-circle"></i>--}}
{{--                          </span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="alertsDropdown">--}}
{{--                    <h6 class="dropdown-header">New Alerts:</h6>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">--}}
{{--                            <span class="text-success">--}}
{{--                              <strong>--}}
{{--                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
{{--                            </span>--}}
{{--                        <span class="small float-right text-muted">11:21 AM</span>--}}
{{--                        <div class="dropdown-message small">This is an automated server response message. All systems--}}
{{--                            are online.--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">--}}
{{--                            <span class="text-danger">--}}
{{--                              <strong>--}}
{{--                                <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>--}}
{{--                            </span>--}}
{{--                        <span class="small float-right text-muted">11:21 AM</span>--}}
{{--                        <div class="dropdown-message small">This is an automated server response message. All systems--}}
{{--                            are online.--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">--}}
{{--                            <span class="text-success">--}}
{{--                              <strong>--}}
{{--                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
{{--                            </span>--}}
{{--                        <span class="small float-right text-muted">11:21 AM</span>--}}
{{--                        <div class="dropdown-message small">This is an automated server response message. All systems--}}
{{--                            are online.--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item small" href="#">View all alerts</a>--}}
{{--                </div>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Déconnecter</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /Navigation-->

@yield("content")

<!-- /.container-wrapper-->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Centre Mikdad 2021</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sélectionnez «Déconnexion» ci-dessous si vous êtes prêt à mettre fin à votre session
                en cours.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"  data-toggle="modal" data-target="#exampleModal"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
{{--                    {{ csrf_field() }}--}}
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset("assets/backend/vendor")}}/jquery/jquery.min.js"></script>
<script src="{{asset("assets/backend/vendor")}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset("assets/backend/vendor")}}/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="{{asset("assets/backend/vendor")}}/chart.js/Chart.js"></script>
<script src="{{asset("assets/backend/vendor")}}/datatables/jquery.dataTables.js"></script>
<script src="{{asset("assets/backend/vendor")}}/datatables/dataTables.bootstrap4.js"></script>
<script src="{{asset("assets/backend/vendor")}}/jquery.selectbox-0.2.js"></script>
<script src="{{asset("assets/backend/vendor")}}/retina-replace.min.js"></script>
<script src="{{asset("assets/backend/vendor")}}/jquery.magnific-popup.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset("assets/backend/js")}}/admin.js"></script>
<!-- Custom scripts for this page-->
<script src="{{asset("assets/backend/js")}}/admin-charts.js"></script>
<script src="{{asset("assets/backend/js")}}/admin-datatables.js"></script>
@yield("addfooterscript")
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
</script>
</body>
</html>
