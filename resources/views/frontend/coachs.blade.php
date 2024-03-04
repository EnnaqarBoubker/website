@extends("layouts.front-master")

@section("content-main")

	<main>
		<section id="hero_in" class="coachs">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Liste des COACHS</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="filters_listing sticky_horizontal">
			<div class="container">
				<ul class="clearfix">
					<li>
						<div class="switch-field">
							<input type="radio" id="all" name="listing_filter" value="all" checked>
							<label for="all">Tout</label>
							<input type="radio" id="popular" name="listing_filter" value="popular">
							<label for="popular">Anciens</label>
							<input type="radio" id="latest" name="listing_filter" value="latest">
							<label for="latest">Récents</label>
						</div>
					</li>

					<li>
						<select name="orderby" class="selectbox">
							<option value="">--Tout--</option>
							<option value="">Promotion 2017</option>
							<option value="">Promotion 2018</option>
							<option value="">Promotion 2019</option>
							<option value="">Promotion 2020</option>
							<option value="">Promotion 2021</option>
						</select>
					</li>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->

		<div class="container margin_60_35">
			<div class="row">
				@foreach($coachs as $coach)
				<div class="col-xl-3 col-lg-4 col-md-6">
					<div class="box_grid wow">
						<figure class="figure-img-coach">
							<a href=""><img src="@if($coach->photo !="") {{ asset('assets/coachs/'.$coach->photo) }} @else {{ asset('assets/frontend/img/logoo.png') }} @endif " class="img-fluid style-img-coach" alt="{{ $coach->nom.' '.$coach->prenom }} coach maroc"></a>

						</figure>
						<div class="wrapper text-center">
							<h3>{{ strtoupper($coach->nom) }} {{ strtoupper($coach->prenom) }}</h3>
							<p>
								@php
									$string = strip_tags(stripslashes( $coach->info_pers));
                                       if (strlen($string) > 200) {

                                           // truncate string
                                           $stringCut = substr($string, 0, 200);
                                           $endPoint = strrpos($stringCut, ' ');

                                           //if the string doesn't contain any space then it will cut without word basis.
                                           $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                           $string .= '...';
                                       }
								@endphp
								{{ $string }}

							</p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i> <small> </small></div>
						</div>
{{--						<ul>--}}
{{--							<li><i class="icon_like"></i> 89</li>--}}
{{--							<li><a href="{{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}">Visite Son Profil</a></li>--}}
{{--						</ul>--}}
					</div>
				</div>
				<!-- /box_grid -->
				@endforeach
			</div>
			<!-- /row -->

		</div>
		<!-- /container -->
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Besoin d'aide? Nous contacter</h4>
							<p>contacez nous pour plus d'informations. enovyer un email ou contacter nous par whatsapp 212629485433
							</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-cash"></i>
							<h4>Paiement</h4>
							<p>Vous pouvez passer votre paiement par virement bancaire ou par verssement WafaCash ou Paypal.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Qualité de formations</h4>
							<p>Nous proposant les plus excellent formations, présenté par les professionnels coachs au maroc</p>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->
@endsection