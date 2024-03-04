@extends('layouts.front-master')

@section('content-main')
<style>

.text-yt {
    text-align: center; 
    font-size:25px;
    margin:0;
}
  @media only screen and (max-width: 768px) {
        .btn_mobile {
            position: relative;
            right: 201px;
        }
        ul#top_menu li:last-child {
            left: 145px;
        }
         .text-yt {
    font-size: 16px;
    width: 85%;
}
}   

    }
    
</style>
    <main>

        <!-- Slider -->
        <div id="full-slider-wrapper">
            <div id="layerslider" style="width:100%;height:800px;">
                <!-- first slide -->
                <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
                    <img src="{{ asset('assets/frontend') }}/img/tinif/1a.png" class="ls-bg" alt="Slide background">
                    <h3 class="ls-l slide_typo"
                        style="top: 47%; left: 70%;font-size: 43px;text-align: center;line-height: 1;font-weight:bold;"
                        data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                        مركز مقداد، مركز للتدريب والتوجيه <br>
                        في مراكش</h3>
                    <p class="ls-l slide_typo_2" style="top:55%; left:70%; font-weight:bold;"
                        data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                        للتدريــــــب والاســـــتشارات
                    </p>
                    <a class="ls-l btn_1 rounded"
                        style="top:65%; left:70%;font-size: 17px; text-align: center; white-space: nowrap;"
                        data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{ url('login') }}'> تسجيل
                        الدخول</a>
                </div>
                <!-- second slide -->
                <div class="ls-slide" data-ls="slidedelay:5000; transition2d:103;">
                    <img src="{{ asset('assets/frontend') }}/img/tinif/4a.png" class="ls-bg" alt="Slide background">
                    <h3 class="ls-l slide_typo"
                        style="top: 47%; left: 70%;font-size: 43px;text-align: center;line-height: 1;font-weight:bold;"
                        data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                        استثمر في نفسك <br>
                        واكتشف إمكانياتك الكامنة</h3>
                    <p class="ls-l slide_typo_2" style="top:55%; left:70%;font-weight:bold;color:black"
                        data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                        مع أكثر من 13 سنة من الخبرة, أكثر من ١٣٠٠ خريج
                    </p>
                    <a class="ls-l btn_1 rounded"
                        style="top:65%; left:70%;font-size: 17px; text-align: center; white-space: nowrap;"
                        data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{ url('login') }}'> تسجيل
                        الدخول</a>
                </div>
                <!-- first slide -->
                <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
                    <img src="{{ asset('assets/frontend') }}/img/tinif/3a.png" class="ls-bg" alt="Slide background">
                    <h3 class="ls-l slide_typo"
                        style="top: 47%; left: 70%;font-size: 43px;text-align: center;line-height: 1;font-weight:bold;"
                        data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                        اول مركز للكوتش <br>
                        في مراكش</h3>
                    <p class="ls-l slide_typo_2" style="top:55%; left:70%;font-weight:bold;"
                        data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                        برامج تدريبية عن بعد
                    </p>
                    <a class="ls-l btn_1 rounded"
                        style="top:65%; left:70%;font-size: 17px; text-align: center; white-space: nowrap;"
                        data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='{{ url('login') }}'> تسجيل
                        الدخول</a>
                </div>
            </div>
        </div>
        <!-- End layerslider -->

        <div class="features clearfix">
            <div class="container">
                <ul>
                    <li><i class="fa fa-life-ring" aria-hidden="true"></i>
                        <h3 style="color:white"> تدريب احترافي </h3><span>هل ترغب في إعادة التدريب أو اكتساب المهارات
                            المهنية؟</span>
                    </li>
                    <li><i class="pe-7s-user"></i>
                        <h3 style="color:white">المدربين الخبراء</h3><span>ندعمك لتحقيق النجاح.</span>
                    </li>
                    <li><i class="pe-7s-target"></i>
                        <h3 style="color:white">دعم فني</h3><span>مرافقتك ومساعدتك 24 ساعة في اليوم.</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /features -->
        <div class="container margin_30_95" style="padding-bottom: 10px;">
            <div class="main_title_2">
                <span><em></em></span>
                <h2> منهجيتنا في التكوين</h2>
                {{-- <p>اكتشف الفئات وابحث عن التدريب الذي تريده</p> --}}
            </div>
            <div class="row" style="justify-content: center;">
                <p class="text-yt">

                    إن منهجية التكوين الخاصة بنا تختلف كثيرا عن مجمل المنهجيات التي يتم

                    تدريس الكوتشينغ باالعتماد عليها.
                    <br><br>
                    حيث أننا لا نلقن المعلومات والمعارف مستقلة ولكننا نلقن أيضا العالقة بين
                    كل هذه المعلومات كما أننا نلقن دوما الصيغة التحليلية التي توصلونا إلى
                    المعارف ونلقن المبادئ والمهارات بالرجوع إلى البراهين والدالئل الخاصة

                    بكل معلومة ونجمع كل ذلك في قالب تدريبي.
                    <br><br>

                    حيث أن جل المنهجيات التي تلقن الكوتشينغ تلقن معلومات خاصة بمجال
                    معين عكس ما نقدمه نحن حيث نقدم ما يمكن توظيفه في كل المجاالت وليس
                    هذا فقط فنحن أيضا نلقن أصول المعلومات حيث أن كل ما نطرحه يمكن
                    لك أن تستخرج منه مجموعة من المعلومات األخرى على خالف ما هو
                    معمول به في جل المراكز حيث تقدم معلومات محدودة ليمكن توظيفها إلى

                    في حالة واحدة .
                    <br><br>

                    وفي نهجنا نسعى إلى تحويل المعارف الصعبة والمعقدة إلى معلومات بسيطة
                    ورطبها بالواقع حيث أنا كل المعلومات التي نطرحها مبنية على المنهج
                    التجريبي العلمي. والن العلم تعلو قيمته ومكانته بماذا إمكانية توظيفه

                    فنشرف بأن يكون حال هذا الدليل
                </p>
            </div>
            <!-- /row -->
        </div>

        <div class="container margin_30_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>فئات التسجـــيل</h2>
                <p>اكتشف الفئات وابحث عن التدريب الذي تريده</p>
            </div>
            <div class="row" style="justify-content: center;">

                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="" class="grid_item" style="cursor:default;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('assets/categories/FormationenLive.jpg') }}" class="img-fluid"
                                alt="Centre-Mikdad-">
                            <div class="info">

                                <h3>برامج تدريبية عن بعد </h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="" class="grid_item" style="cursor:default;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('assets/categories/FormationenLigne.jpg') }}" class="img-fluid"
                                alt="Centre-Mikdad-">
                            <div class="info">

                                <h3>برامج تدريبية اون لاين </h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="" class="grid_item" style="cursor:default;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('assets/categories/FormationSurPlace.jpg') }}" class="img-fluid"
                                alt="Centre-Mikdad-">
                            <div class="info">

                                <h3>برامج تدريبية حضورية </h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /row -->
        </div>

        <!-- /container -->

        <div class="container-fluid ">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>الدورات التدريبية </h2>
                <p>يقدم لكم مركز المقداد أفضل دوراته التدريبية</p>
            </div>
            <div id="reccomended_1" class="owl-carousel owl-theme">

                @if (count($formations) > 0)
                    @foreach ($formations as $obj)
                        <div class="item">
                            <div class="box_grid">
                                <figure>
                                    <a href="{{ url('details-formation/' . $obj->id . '-' . $obj->titre) }}">
                                        <div class="preview"><span>Afficher les détails</span></div><img
                                            src="@if ($obj->image != '') {{ asset('assets/formations/' . $obj->image) }} @else {{ asset('assets/frontend/img/centre-mikdad.jpg') }} @endif"
                                            class="img-fluid" alt="Centre Mikdad {{ $obj->titre }}">
                                    </a>
                                    <div class="price">
                                        @if ($obj->new_prix > 0)
                                            <del> {{ $obj->prix }} Dhs</del> {{ $obj->new_prix }} Dhs
                                        @else
                                            {{ $obj->prix }} Dhs
                                        @endif
                                    </div>
                                </figure>
                                <div class="wrapper">

                                    <small>Catégorie:@if (existe_categorie($obj->categorie_id))
                                            {{ $obj->categorie->nom }}
                                        @else
                                            Aucune catégorie
                                        @endif </small>

                                    <h3>{{ $obj->titre }}</h3>
                                    <p>
                                        @php
                                            $desc = str_replace('&nbsp;', ' ', strip_tags($obj->description));
                                            if (strlen($desc) > 90) {
                                                // truncate string
                                                $descCut = substr($desc, 0, 90);
                                                $endPoint = strrpos($descCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
    $desc = $endPoint ? substr($descCut, 0, $endPoint) : substr($descCut, 0);
    $desc .= '...';
                                            }
                                        @endphp
                                        {{ $desc }}
                                    </p>
                                </div>
                                <ul>
                                    <li><i class="icon_easel"></i></li>
                                    <li><a href="{{ url('details-formation/' . $obj->id . '-' . $obj->titre) }} ">المزيــد من المعلومــات</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /item -->
                    @endforeach
                @else
                    <h4>Aucune Formation</h4>
                @endif
            </div>
            <!-- /carousel -->
            <div class="container">
                <p class="btn_home_align"><a href="{{ url('liste-formations') }}" class="btn_1 rounded"
                        style="font-size:20px">عرض كل التداريب</a></p>
            </div>
            <!-- /container -->
            <hr>
        </div>
        <!-- /container -->
        
  <div style="height: 100%; overflow-x: hidden; text-align: center">
			<div class="csslider infinity" id="slider1">
        			<input type="radio" name="slides" checked="checked" id="slides_1"/>
        			<input type="radio" name="slides" id="slides_2"/>
        			<input type="radio" name="slides" id="slides_3"/>
        			<input type="radio" name="slides" id="slides_4"/>
        			<input type="radio" name="slides" id="slides_5"/>
        			<input type="radio" name="slides" id="slides_6"/>
                    <input type="radio" name="slides" id="slides_7"/>
                    <input type="radio" name="slides" id="slides_8"/>
                    <input type="radio" name="slides" id="slides_9"/>
                    <input type="radio" name="slides" id="slides_10"/>
				<ul>
          <li>
              
				<iframe width="100%" height="400px" src="https://www.youtube.com/embed/JESMs0dYnuw?si=499uVx0ldbIZJcks" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						
					</li>
					<li>
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/gLZQdpREDv4?si=QNCJIr1dbUmdCF1U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
					<li>
						<iframe width="100%" height="400px" src="https://www.youtube.com/embed/J6GHVilxtPY?si=y9fkRyzakX-BcSdO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
          <li>
						<iframe width="100%" height="400px" src="https://www.youtube.com/embed/Z0nMdwZ6x94?si=duLtjDGsxwZvf62a" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
					<li>
						<iframe width="100%" height="400px" src="https://www.youtube.com/embed/l3vav0IccGk?si=kbQd6ohqotvqhHdz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
					<li>
						
						<iframe width="100%" height="400px" src="https://www.youtube.com/embed/ZO5clHM7fEs?si=nV8mIASY984a-sp0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
					<li>
                          			
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/-y79I8pAMUI?si=f-5zbaZXXuz-E_LI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
					<li>
                          			
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/MwEnxxPbEQg?si=J9A3cIa11zXX4VpZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
					<li>
                          			
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/wrexiSYiGz4?si=XJxhMR9k29hTiQzX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

					</li>
					
					<li>
						<p>
						<video controls preload>
						<source src="" />
						</video> 
						</p>
					</li>
          <li>
						<p>
						<video controls preload>
						<source src="" />
						</video> 
						</p>
					</li>
				</ul>
					<div class="arrows">
						<label for="slides_1"></label>
						<label for="slides_2"></label>
						<label for="slides_3"></label>
						<label for="slides_4"></label>
						<label for="slides_5"></label>
						<label for="slides_6"></label>
            <label for="slides_7"></label>
            <label for="slides_8"></label>
            <label for="slides_9"></label>
            
						<label class="goto-first" for="slides_1"></label>
						<label class="goto-last" for="slides_9"></label>
					</div>
					<div class="navigation"> 
						<div>
							<label for="slides_1"></label>
							<label for="slides_2"></label>
							<label for="slides_3"></label>
							<label for="slides_4"></label>
							<label for="slides_5"></label>
							<label for="slides_6"></label>
                              <label for="slides_7"></label>
                              <label for="slides_8"></label>
                              <label for="slides_9"></label>
						</div>
					</div>
			</div>
		</div>
        
        
        

        <div class="bg_color_1">
            <div class="container margin_120_95">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>المقالات والأحداث</h2>
                    <p>اكتشف أحدث المقالات</p>
                </div>
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-lg-6">
                            <a class="box_news"
                                href="{{ url('details-article/' . $article->id . '-' . $article->titre) }}">
                                <figure><img src="{{ asset('assets/articles/' . $article->image) }}"
                                        alt="Centre Mikdad {{ $article->titre }}">
                                    @php
                                        setlocale(LC_TIME, 'French');
                                    @endphp
                                    <figcaption>
                                        <strong>{{ \Carbon\Carbon::parse($article->date)->format('d') }}</strong>{{ \Carbon\Carbon::parse($article->date)->formatLocalized('%B') }}
                                    </figcaption>
                                </figure>
                                <ul>
                                    <li>Coach: {{ $article->coach->prenom }} {{ $article->coach->nom }}</li>
                                    <li>
                                        {{ date('d.m.Y', strtotime($article->date)) }}
                                    </li>
                                </ul>
                                <h4>{{ $article->titre }}</h4>
                                <p>
                                    @php
                                        $d = str_replace('&nbsp;', ' ', strip_tags($article->description));
                                        if (strlen($d) > 101) {
                                            // truncate string
                                            $descCut = substr($d, 0, 101);
                                            $endPoint = strrpos($descCut, ' ');

                                            //if the string doesn't contain any space then it will cut without word basis.
    $d = $endPoint ? substr($descCut, 0, $endPoint) : substr($descCut, 0);
    $d .= '...';
                                        }
                                    @endphp
                                    {{ $d }}
                                </p>

                            </a>
                        </div>

                        <!-- /box_news -->
                    @endforeach

                </div>
                <!-- /row -->
                <p class="btn_home_align"><a href="{{ url('liste-articles') }}" class="btn_1 rounded">Plus
                        d'articles</a></p>
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    
            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-e14c1008-acf5-4dd3-b01a-257251595350" data-elfsight-app-lazy></div>


        <div class="call_section" style="display: none">
            <div class="container clearfix">
                <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                    <div class="block-reveal">
                        <div class="block-vertical"></div>
                        <div class="box_1">
                            <h3>Enjoy a great students community</h3>
                            <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei
                                mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
                            <a href="#0" class="btn_1 rounded">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->
    </main>
@endsection
<!-- /main -->

@section('javascript')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('assets/frontend') }}/layerslider/js/greensock.js"></script>
    <script src="{{ asset('assets/frontend') }}/layerslider/js/layerslider.transitions.js"></script>
    <script src="{{ asset('assets/frontend') }}/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
    <script type="text/javascript">
        'use strict';
        $('#layerslider').layerSlider({
            autoStart: true,
            navButtons: false,
            navStartStop: false,
            showCircleTimer: false,
            responsive: true,
            responsiveUnder: 1280,
            layersContainer: 1200,
            skinsPath: 'layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    </script>
@endsection
