@extends("layouts.front-master")

@section("laststyles")
	<link href="{{ asset("assets/frontend") }}/css/blog.css" rel="stylesheet">
@endsection

@section("content-main")
	
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Articles du coach : {{ $coach->nom.' '.$coach->prenom }}</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					@foreach($articles as $obj)
					<article class="blog wow fadeIn">
						<div class="row no-gutters">
							<div class="col-lg-7">
								<figure>
									<a href="{{ url("details-article/".$obj->id.'-'.$obj->titre) }}"><img src="{{ asset("assets/articles/". $obj->image)}}" alt="Centre Mikdad {{ $obj->titre }}">
										<div class="preview"><span>Lire plus</span></div>
									</a>
								</figure>
							</div>
							<div class="col-lg-5">
								<div class="post_info">
									<small> @php setlocale( LC_TIME, 'French'); @endphp
										{{ \Carbon\Carbon::parse( $obj->date )->formatLocalized ('%d %B %Y') }}
									</small>
									<h3><a href="#blog-post">{{ $obj->titre }}</a></h3>
									<p>
										@php
											$d =  str_replace("&nbsp;", " ", strip_tags($obj->description));
                                               if (strlen($d) > 300) {
                                                   // truncate string

                                                   $descCut = substr($d, 0, 300);
                                                   $endPoint = strrpos($descCut, ' ');

                                                   //if the string doesn't contain any space then it will cut without word basis.
                                                   $d = $endPoint? substr($descCut, 0, $endPoint) : substr($descCut, 0);
                                                   $d .= '...';
                                               }
										@endphp
										{{ $d }}
									</p>
									<ul>
										<li>
											<div class="thumb"><img src="{{ asset('assets/coachs/'. $coach->photo) }}" alt="Centre Mikdad {{ $coach->prenom }} {{ $coach->nom }}"></div>
											<a href="{{ url("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom) }}">{{ $coach->prenom }} {{ $coach->nom }}</a>
										</li>
										<li> </li>
									</ul>
								</div>
							</div>
						</div>
					</article>
					<!-- /article -->
					@endforeach
					<nav aria-label="...">
						<ul class="pagination pagination-sm">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Précedent</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Suivant</a>
							</li>
						</ul>
					</nav>
					<!-- /pagination -->
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget">
						<form>
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="rechercher...">
							</div>
							<button type="submit" id="submit" class="btn_1 rounded"> Eecherche</button>
						</form>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Articles récents</h4>
						</div>
						<ul class="comments-list">
							@foreach($lastarticles as $art)
							<li>
								<div class="alignleft">
									<a href="{{ url("details-article/".$art->id.'-'.$art->titre) }}"><img src="{{ asset("assets/articles/". $art->image)}}" alt="Centre Mikdad {{ $art->titre }}"></a>
								</div>
								<small>{{  date('d.m.Y', strtotime($art->date)) }}</small>
								<h3><a href="{{ url("details-article/".$art->id.'-'.$art->titre) }}" title="{{ $art->titre }}">{{ $art->titre }}</a></h3>
							</li>
							@endforeach
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
{{--							<h4>Publicité</h4>--}}
						</div>
						<ul class="cats">
{{--							<li><a href="#">Admissions <span>(12)</span></a></li>--}}
{{--							<li><a href="#">News <span>(21)</span></a></li>--}}
{{--							<li><a href="#">Events <span>(44)</span></a></li>--}}
{{--							<li><a href="#">Focus in the lab <span>(31)</span></a></li>--}}
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
{{--							<h4>Publicité</h4>--}}
						</div>
						<div class="tags">
{{--							<a href="#">Information tecnology</a>--}}
{{--							<a href="#">Students</a>--}}
{{--							<a href="#">Community</a>--}}
{{--							<a href="#">Carreers</a>--}}
{{--							<a href="#">Literature</a>--}}
{{--							<a href="#">Seminars</a>--}}
						</div>
					</div>
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
<!-- /main -->
