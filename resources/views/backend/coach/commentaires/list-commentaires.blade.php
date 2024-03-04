@extends("layouts.coach-master")

@section("content")
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Commentaires</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Liste des commentaires</h2>
				<div class="filter">
					<select name="orderby" class="selectbox">
						<option value="Any time">--Tout--</option>
						<option value="Latest">Dèrniers</option>
						<option value="Oldest">Premiers</option>
					</select>
				</div>
			</div>
			<div class="list_general reviews">
				<ul>
					<li>
						<span>June 15 2017</span>
						<span class="rating"><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star"></i></span>
						<figure><img src="{{ asset('assets/backend') }}/img/course_1.jpg" alt=""></figure>
						<h4>Cours : Développemnt des applications Mobile</h4>
						<p>Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis ad. In vim mucius menandri convenire, an brute zril vis. Ancillae delectus necessitatibus no eam, at porro solet veniam mel, ad everti nostrud vim. Eam no menandri pertinacia deterruisset.</p>
						<p class="inline-popups"><a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-reply"></i> Répondre au commentaire</a></p>
					</li>
					<li>
						<span>June 15 2017</span>
						<span class="rating"><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i></span>
						<figure><img src="{{ asset('assets/backend') }}/img/course_2.jpg" alt=""></figure>
						<h4>Cours : Photoshop</h4>
						<p>Ex omnis error aliquam quo, eu eos atqui accusam, ex nec sensibus erroribus principes. No pro albucius eloquentiam accommodare. Mei id illud posse persius. Nec eu dico lucilius delicata, qui propriae voluptaria eu.</p>
						<p class="inline-popups"><a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-reply"></i> Répondre au commentaire</a></p>
					</li>
					<li>
						<span>June 15 2017</span>
						<span class="rating"><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star"></i></span>
						<figure><img src="{{ asset('assets/backend') }}/img/course_3.jpg" alt=""></figure>
						<h4>Cours : WordPress</h4>
						<p>Cum id mundi admodum menandri, eum errem aperiri at. Ut quas facilis qui, euismod admodum persequeris cum at. Summo aliquid eos ut, eum facilisi salutatus ne. Mazim option abhorreant ne his. Mel simul iisque albucius at, probatus indoctum efficiendi mei ei. Veniam percipit ei sea.</p>
						<p class="inline-popups"><a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-reply"></i> Répondre au commentaire</a></p>
					</li>
					<li>
						<span>June 15 2017</span>
						<span class="rating"><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star yellow"></i><i class="fa fa-fw fa-star"></i></span>
						<figure><img src="{{ asset('assets/backend') }}/img/avatar4.jpg" alt=""></figure>
						<h4>Cours : E-commerce</h4>
						<p>Qui no elit patrioque, nec eu aperiri nominati. Ei prima erant antiopam eum. Quem assum albucius pri at, his in explicari molestiae. Ad deseruisse mediocritatem vim, dictas consulatu eam no. Veniam mediocrem interpretaris pro id, iriure alterum in vis.</p>
						<p class="inline-popups"><a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-reply"></i> Répondre au commentaire</a></p>
					</li>
				</ul>
			</div>
		</div>
		<!-- /box_general-->
		<nav aria-label="...">
			<ul class="pagination pagination-sm add_bottom_30">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
@endsection