@extends("layouts.admin-master")

@section("content")
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Statistiques</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-envelope"></i>
                            </div>
                            <div class="mr-5"><h5>0 Nouveaux demandes!</h5></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Plus de Détails</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-star"></i>
                            </div>
                            <div class="mr-5"><h5>0 Nouveaux commentaires!</h5></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Plus de Détails</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-envelope-open"></i>
                            </div>
                            <div class="mr-5"><h5>0 Nouveaux Messages!</h5></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Plus de Détails</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card dashboard text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-television"></i>
                            </div>
                            <div class="mr-5"><h5>0 Formations!</h5></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Plus de Détails</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /cards -->
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-bar-chart"></i>Statistiques</h2>
                </div>
                <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
            </div>
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection