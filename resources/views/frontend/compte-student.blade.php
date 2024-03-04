@extends("layouts.front-master")

@section("content-main")
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Mon Profil</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="container margin_60_35">
			<div class="row">
				<aside class="col-lg-3" id="sidebar">
					<div class="profile">
						<figure><img src="{{ asset( 'assets/frontend/img/logoo.png') }}" width="150" height="150" alt="Centre Mikdad" class="rounded-circle"></figure>
						<ul>
							<li>Nom <span class="float-right">{{ $student->nom }} {{ $student->prenom }}</span> </li>
							@if( $student->ville !="")<li>Ville <span class="float-right">{{ $student->ville }}</span></li>@endif
							<li>Notifications <span class="float-right">(0)</span></li>
							<li>Messages<span class="float-right">(0)</span></li>
							<li>Nbr Formations<span class="float-right">({{ count($formations) }})</span></li>
							<li>Nbr Consultations<span class="float-right">(0)</span></li>
							<li>
							<li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success search-overlay-menu-btn"><i class="fa fa-sign-out"></i>Déconnexion</button>
                                </form>
                                <span class="float-right"> </span></li>
						</ul>
					</div>
				</aside>
				<!--/aside -->

				<div class="col-lg-9">
					<div class="box_teacher">
						<div class="indent_title_in">
							<i class="pe-7s-user"></i>
							<h3>Profil : {{ $student->prenom }} {{ $student->nom }}</h3>
							<p>

							</p>
						</div>
						<div class="wrapper_indent">

						</div>
						<!--wrapper_indent -->
						<hr class="styled_2">
						<div class="indent_title_in">
							<i class="pe-7s-display1"></i>
							<h3>Formations</h3>
							<p>Votre formations en ligne.</p>
						</div>
						<div class="wrapper_indent">
							<div class="container margin_35">
								<div class="row">
									@foreach($formations as $obj)
{{--										@if($obj->validation == 2)--}}
										<div class="col-xl-6 col-lg-6 col-md-6 col-12">
											<div class="box_grid wow">
												<figure>
													<a href="{{ url('details-formation/'.$obj->id.'-'.$obj->titre) }}"><img src="@if ($obj->image !="") {{ asset('assets/formations/'.$obj->image) }} @else {{ asset('assets/frontend/img/centre-mikdad.jpg') }} @endif " class="img-fluid" alt="Centre Mikdad {{ $obj->titre }}"></a>
													<div class="price">
														@if($obj->new_prix > 0)
															<del> {{ $obj->prix }} Dhs</del>  {{ $obj->new_prix }} Dhs
														@else
															{{ $obj->prix }} Dhs
														@endif
													</div>
													<div class="preview"><a href="{{ url('details-formation/'.$obj->id.'-'.$obj->titre) }}"><span>Afficher les détails</span></a></div>
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
													<li><i class="fa fa-download"></i></li>
													<li><a href="{{ url( 'details-formation/'.$obj->id.'-'.$obj->titre ) }}">Afficher les détails</a></li>
												</ul>
											</div>
										</div>
										<!-- /box_grid -->
{{--										@else--}}
{{--											<p class="text-center"> Aucune Formation <br> <a href="{{ url("liste-formations") }}"> Choissez une formation</a></p>--}}
{{--										@endif--}}
									@endforeach
								</div>
								<!-- /row -->
							</div>
						</div>
						<!--wrapper_indent -->

					</div>
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
<!-- /main -->

