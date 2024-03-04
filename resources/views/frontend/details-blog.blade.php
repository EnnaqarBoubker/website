@extends("layouts.front-master")

@section("laststyles")
	<link href="{{ asset("assets/frontend") }}/css/blog.css" rel="stylesheet">
@endsection

@section("content-main")
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>{{ $article->titre }}</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					<div class="bloglist singlepost" dir="rtl">
						<p><img alt="{{ $article->titre }} Centre Mikdad" class="img-fluid" src="{{ asset('assets/articles/'.$article->image) }}" width="100%"></p>
						<h1>{{ $article->titre }}</h1>
						<div class="postmeta">
							<ul>
								<li><a href="#"><i class="icon_clock_alt"></i> {{  date('d.m.Y', strtotime($article->date)) }}</a></li>
								<li><a href="#"><i class="icon_pencil-edit"></i> Coach: {{ $article->coach->prenom }} {{ $article->coach->nom }}</a></li>

							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
{{--							<div class="dropcaps">--}}
							<div class="">
								<p>{{  str_replace("&nbsp;", " ", strip_tags($article->description)) }} </p>
							</div>
						</div>
						<!-- /post -->
					</div>
					<!-- /single-post -->

					<div id="comments">
						<h5>Comments</h5>
						<h6>chargement....</h6>
					</div>

					<hr>

{{--					<h5>Leave a Comment</h5>--}}
{{--					<form>--}}
{{--						<div class="form-group">--}}
{{--							<input type="text" name="name" id="name2" class="form-control" placeholder="Name">--}}
{{--						</div>--}}
{{--						<div class="form-group">--}}
{{--							<input type="text" name="email" id="email2" class="form-control" placeholder="Email">--}}
{{--						</div>--}}
{{--						<div class="form-group">--}}
{{--							<input type="text" name="email" id="website3" class="form-control" placeholder="Website">--}}
{{--						</div>--}}
{{--						<div class="form-group">--}}
{{--							<textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Message Below"></textarea>--}}
{{--						</div>--}}
{{--						<div class="form-group">--}}
{{--							<button type="submit" id="submit2" class="btn_1 rounded add_bottom_30"> Submit</button>--}}
{{--						</div>--}}
{{--					</form>--}}
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
	<!--/main-->
@endsection
	
