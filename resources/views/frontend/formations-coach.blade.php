@extends("layouts.front-master")
@section("content-main")
	<main>
		<section id="hero_in" class="courses">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Liste des formations</h1>
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
							<label for="popular">Populaires</label>
							<input type="radio" id="latest" name="listing_filter" value="latest">
							<label for="latest">Dérniers</label>
						</div>
					</li>

					<li>
						<select name="orderby" class="selectbox">
							<option value=""> Filtrer par </option>
							@foreach( $categories as $cat )
								<option value="{{ $cat->id }}">{{ $cat->nom }}</option>
							@endforeach
						</select>
					</li>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->

		<div class="container margin_60_35">
			<div class="row">
				@foreach($formations as $obj)
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="box_grid wow">
							<figure>
								<a href="{{ url('coach/'.$coach->id.'-'.$coach->prenom.'-'.$coach->nom.'/formations/'.$obj->id.'-'.$obj->titre) }}"><img src="{{ asset('assets/formations/'.$obj->image_8) }}" class="img-fluid" alt="Centre Mikdad {{ $obj->titre }}"></a>
								<div class="price">
									@if($obj->new_prix > 0)
										<del> {{ $obj->prix }} Dhs</del>  {{ $obj->new_prix }} Dhs
									@else
										{{ $obj->prix }} Dhs
									@endif
								</div>
								<div class="preview"><a href="{{ url('coach/'.$coach->id.'-'.$coach->prenom.'-'.$coach->nom.'/formations/'.$obj->id.'-'.$obj->titre) }}"><span>Afficher les détails</span></a></div>
							</figure>
							<div class="wrapper">
								<small>Catégorie: {{ getNameCategorieById( $obj->categorie_id ) }} </small>
								<h3>{{ $obj->titre }}</h3>
								<p>
									@php
										$desc =  str_replace("&nbsp;", " ", strip_tags($obj->description));
                                           if (strlen($desc) > 90) {

                                               // truncate string
                                               $descCut = substr($desc, 0, 90);
                                               $endPoint = strrpos($descCut, ' ');

                                               //if the string doesn't contain any space then it will cut without word basis.
                                               $desc = $endPoint? substr($descCut, 0, $endPoint) : substr($descCut, 0);
                                               $desc .= '...';
                                           }
									@endphp
									{{ $desc }}
								</p>
							</div>
							<ul>
								<li><i class="icon_easel"></i></li>
								<li><a href="{{ url('coach/'.$coach->id.'-'.$coach->prenom.'-'.$coach->nom.'/formations/'.$obj->id.'-'.$obj->titre) }}">Afficher les détails</a></li>
							</ul>
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
@endsection