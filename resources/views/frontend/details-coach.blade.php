@extends("layouts.front-master")

@section("content-main")
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>COACH Profil</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="container margin_60_35">
			<div class="row">
				@if( session()->has('success') )
					<div class="col-lg-12 col-md-12 col-12 alert alert-success">
						{{ session()->get('success') }}
					</div>
				@endif
			</div>

			<div class="row">
				<aside class="col-lg-3" id="sidebar">
					<div class="profile">
						<figure>
							<img src="@if($coach->image !="") {{ asset('assets/coachs/'.$coach->photo) }} @else {{ asset('assets/frontend/img/centre-mikdad.jpg') }} @endif" width="150" height="150" alt="Teacher" class="rounded-circle"></figure>
						<ul class="social_teacher">
							<li><a target="_blank" href="{{ $coach->url_fb }}"><i class="icon-facebook"></i></a></li>
							<li><a target="_blank" href="{{ $coach->url_inst }}"><i class="icon-instagram"></i></a></li>
							<li><a target="_blank" href="{{ $coach->url_link }}"><i class="icon-linkedin"></i></a></li>
							<li><a target="_blank" href="{{ $coach->url_tw }}"><i class="icon-twitter"></i></a></li>
<!--							<li><a href="#"><i class="icon-youtube"></i></a></li>-->
						</ul>
						<ul>
							<li>COACH <span class="float-right">{{ $coach->nom }} {{ $coach->prenom }}</span> </li>
							@if( $coach->ville !="" )<li>Ville  <span class="float-right">{{ $coach->ville }}</span></li>@endif
							<li>Etudiants <span class="float-right">0</span></li>
							<li>Formations sur place<span class="float-right">0</span></li>
							<li>Formations en ligne<span class="float-right">0</span></li>
							<li>Formations en live<span class="float-right">0</span></li>
							<li>
								<button class="btn btn-success search-overlay-menu-btn col-md-12"> <i class="icon-direction-outline"></i> Envoyer message </button>
							</li>

							@if(Auth::check())

								@php
									$user = Auth::user();
								@endphp

								@if($user->role == 2)
									<li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" >
											{{ csrf_field() }}
											<button type="submit" class="btn btn-success col-md-12"><i class="fa fa-sign-out"></i>Déconnexion</button>
										</form>
									</li>
								@endif

							@endif

							<div class="search-overlay-menu">
								<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>


								<form action="{{ url("envoyer-un-message") }}" role="search" id="searchform" method="post">

									{{ csrf_field() }}

									<div class="form-control">
										<label for="message"> Envoyer un message au Coach</label>
										<textarea class="form-control" required name="message" placeholder="Tappez votre message ici..." id="" cols="30" rows="3"></textarea>
										<input type="hidden" name="id" value="{{ $coach->id }}">
										<input  class="btn btn-success mt-2" type="submit" value="Envoyer">
									</div>


								</form>
							</div>
						</ul>
					</div>
				</aside>
				<!--/aside -->

				<div class="col-lg-9">
					<div class="boc_teacher">
						<div class="alert alert-info">
							<p class="text-center"><b>Partager via</b></p>
							<ul class="social_teacher">
								<li class="bg-light"><a href="https://www.facebook.com/sharer/sharer.php?u={{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}&t=je veux partager avec vous ce profil: {{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Partager via Facebook"><i class="icon-facebook"></i></a></li>
								<li class="bg-light"><a href="https://wa.me/send?text=je veux partager avec vous ce contenu:  {{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Partager via whatsapp"><i class="fa fa-whatsapp"></i></a></li>
								<li class="bg-light"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}&t=je veux partager avec vous ce contenu: {{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Partager via Linkedin"><i class="icon-linkedin"></i></a></li>
								<li class="bg-light"><a href="https://twitter.com/share?url={{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}&text=je veux partager avec vous ce contenu: {{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}"onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Partager via Twitter"><i class="icon-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="box_teacher">
						<div class="indent_title_in">

							<i class="pe-7s-user"></i>
							<h3>Profil : COACH {{ $coach->prenom }} {{ $coach->nom }}</h3>
							<p>{{ $coach->specialities }}</p>
						</div>
						<div class="wrapper_indent">
							<p>{{ $coach->info_pers }}</p>

							@if( $coach->bio !="")
								<h5>Biographie</h5>
								<p>{{  str_replace("&nbsp;", " ", strip_tags($coach->bio))  }}</p>
							@endif

							@if($coach->diplomes !="")
							<h5>Diplômes</h5>
							<p>{{  str_replace("&nbsp;", " ", strip_tags($coach->diplomes)) }}</p>
							@endif
						</div>
						<!--wrapper_indent -->
						<hr class="styled_2">
						<div class="indent_title_in">
							<i class="pe-7s-display1"></i>
							<h3>Formations & Consultations</h3>
							<p>mes formations et mes consultations peut êtres sur place, en ligne ou live.</p>
						</div>
						<div class="wrapper_indent">
							<div class="container margin_60_35">
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-12">
										<div class="box_grid wow">
											<figure>
												<a href="{{ url('coach/'.$coach->id.'-'.$coach->prenom.'-'.$coach->nom.'/formations') }}"><img src="{{ asset('assets/frontend') }}/img/formation.jpg" class="img-fluid" alt="coach mikdad centre formation image">

													<div class="preview2"><span>Formations</span></div>
												</a>
											</figure>

										</div>
									</div>
									<!-- /box_grid -->
									<div class="col-xl-4 col-lg-4 col-md-12">
										<div class="box_grid wow">
											<figure>
												<a href="#"><img src="{{ asset('assets/frontend') }}/img/consultation.jpg" class="img-fluid" alt="coach mikdad centre formation image">
												<div class="preview2"><span>Consultations</span></div>
												</a>
											</figure>

										</div>
									</div>
									<!-- /box_grid -->
									<div class="col-xl-4 col-lg-4 col-md-12">
										<div class="box_grid wow">
											<figure>
												<a href="{{ url('coach/'. $coach->id.'-'. $coach->prenom.'-'.$coach->nom.'/articles') }}"><img src="{{ asset('assets/frontend') }}/img/read-article.jpg" class="img-fluid" alt="coach mikdad centre formation image">
													<div class="preview2"><span>Articles</span></div>
												</a>
											</figure>

										</div>
									</div>
								</div>
								<!-- /row -->
							</div>
						</div>
						<!--wrapper_indent -->
						@if(count($galeries_images)> 0 || count($galeries_videos)> 0)
						<hr class="styled_2">
						<div class="indent_title_in">
							<i class="pe-7s-display2"></i>
							<h3>Galerie</h3>
							<p>Bienvenu sur ma galerie de photos & vidéos </p>
						</div>
						@endif
						<div class="wrapper_indent">
							@if(count($galeries_images)> 0)
								<div class="container margin_60_35">
								<div class="main_title_2">
									<span><em></em></span>
									<h2>Voiçi quelques photos de ma carrière</h2>
									<p>j'aimerais bien partager avec vous ces moments.</p>
								</div>
								<div class="grid">
									<ul class="magnific-gallery">
										@foreach($galeries_images as $obj)
										<li>
											<figure>
												<img src="{{ $obj->lien }}" alt="@if($obj->titre !="") {{ $obj->titre }} Centre Mikdad @else Centre Mikdad galerie de photos @endif ">
												<figcaption>
													<div class="caption-content">
														<a href="{{ $obj->lien }}" title="@if($obj->titre !="") {{ $obj->titre }} Centre Mikdad @else Centre Mikdad galerie de photos @endif " data-effect="mfp-zoom-in">
															<i class="pe-7s-albums"></i>
															<p>Aperçu</p>
														</a>
													</div>
												</figcaption>
											</figure>
										</li>
										@endforeach
									</ul>
								</div>
								<!-- /grid gallery -->
							</div>
							@endif
							<!-- /container -->
							@if(count($galeries_videos)> 0)
								<div class="bg_color_1">
									<div class="container margin_60_35">
										<div class="main_title_2">
											<span><em></em></span>
											<h2>Voiçi quelques vidéos de ma carrière</h2>
											<p>j'aimerais bien partager avec vous ces moments.</p>
										</div>
										<div class="grid">
											<ul class="magnific-gallery">

												@foreach( $galeries_videos as $video)
													<li>
														<figure>
															<img src="{{ asset("assets/frontend/img/apercu-video.jpg") }}" alt="@if($video->titre !="") {{ $video->titre }} Centre Mikdad @else Centre Mikdad galerie de vidéos @endif ">
															<figcaption>
																<div class="caption-content">
																	<a href="{{ $video->lien }}" class="video" title="@if($video->titre !="") {{ $video->titre }} Centre Mikdad @else Centre Mikdad galerie de vidéos @endif ">
																		<i class="pe-7s-film"></i>
																		<p>Aperçu</p>
																	</a>
																</div>
															</figcaption>
														</figure>
													</li>
												@endforeach
											</ul>
										</div>
										<!-- /grid -->
									</div>
									<!-- /container -->
								</div>
								<!-- /bg_color_1 -->
							@endif
						</div>
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

