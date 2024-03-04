@extends('layouts.front-master')

<style>
    p {
        margin-left: 0 !important;
    }

    .courte {
        height: 935px !important;
    }

    .cirtif {
        width: 30%;
    }

    .prog {
        text-align: center;
        width: 50%;
        margin: 0 auto;
        position: relative;
        top: ;
    }

    .titley {
        padding: 25px;
    }

    @media only screen and (max-width: 767px) {
        .courte {
            height: 258px !important;
        }

        .cirtif {
            width: 100%;
        }

        .prog {
            width: 100%;
            top: 64px;
        }

        .titley {
            padding: 30px;
        }

        .carousel-item {
            height: 238px !important;
            /* Adjust this value as needed */
        }

        #carouselExampleControls {
            margin: 0 auto;
            width: 100% !important;
        }

        .itmes {

            padding: 10px !important;
            margin: 20px 0 !important;
        }
        .iito {
            padding: 0 !important;
        }
         .buttona {
            font-size: 19px !important;
            padding: 28px !important;
            border-radius: 10px !important;
        }
          .imgCoach{
            
            position: static  !important;
        
        }
        .aria {
            padding: 0px !important;
            background: #e5e4bf63;
            align-items: center;
            box-shadow: 19px 16px 19px #514e4f;
        }
        .irean {
            padding: 0px !important;
            align-items: center;
            box-shadow: 19px 16px 19px #514e4f;
            background: url("{{ asset('assets/frontend/img/bg_bggenerator_com.png') }}");
            background-size: 222%;
            background-repeat: no-repeat;
        }
        .casExc {
            height: 100px !important;
        }
    }

    .itemg {
        border: 2px solid #a29178;
        padding: 46px;
        box-shadow: 16px 12px 5px #dccdad;
    }

    #carouselExampleControls {
        margin: 0 auto;
        width: 60%;
    }

    .carousel-item {
        height: 895px;
        /* Adjust this value as needed */
    }

    .itemLI {
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: 80%;
    }

    .iito {
       padding: 60px;
    background: #08bcca59;
    align-items: center;
    box-shadow: 19px 16px 19px #514e4f;
        row-gap: 30px;
    }
    .buttona {
        background-color: #91d0cc;
    border: none;
    color: rgb(12, 12, 12);
    font-size: 27px;
    font-weight: bold;
    padding: 31px 31px;
    border-radius: 16px;
    }
    
    /**/
    
    .imgCoach{
       width:700px;
    }
    .discriptio {
        background: #91d0cc;
        padding: 20px;
        box-shadow: 0 0 55px #15817a;
        border-radius: 20px;
    }
    .btnOne {
        background-color: #c2bebf;
    }
    .aria {
        padding: 60px;
    background: #e5e4bf63;
    align-items: center;
    box-shadow: 19px 16px 19px #514e4f;
    }
    .irean {
        padding: 60px;
   
    }
      .casExc {
            height: 0px;
        }
   
</style>

@section('content-main')


    <main>
        @if (Auth::check())
            @php
                $user = Auth::user();
            @endphp
            @if ($user->role == 1)
                <!--<section id="hero_in" class="courses courte" style="display:none">-->
                <!--    <div class="wrapper">-->
                <!--        <div class="container-fluid">-->
                <!--            <img src="@if ($formation->image != '') {{ asset('assets/formations/' . $formation->image) }} @else {{ asset('assets/frontend/img/centre-mikdad.jpg') }} @endif "-->
                <!--                alt="Centre Mikdad {{ $formation->titre }} " width="100%">-->

                <!--        </div>-->
                <!--    </div>-->
                <!--</section>-->
            @endif
        @else
            <!--<section id="hero_in" class="courses courte" style="display:block">-->
            <!--    <div class="wrapper">-->
            <!--        <div class="container-fluid">-->
            <!--            <img src="@if ($formation->image != '') {{ asset('assets/formations/' . $formation->image) }} @else {{ asset('assets/frontend/img/centre-mikdad.jpg') }} @endif "-->
            <!--                alt="Centre Mikdad {{ $formation->titre }} " width="100%">-->

            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
        @endif
        <!--/hero_in-->

        <div class="bg_color_1">
            <nav class="secondary_nav sticky_horizontal" style="margin-top:33px; opacity: 0.8;">
                <div class="container">
                    <h2 class="fadeInUp" style="text-align: center; position: relative;top: 19px;"> {{ $formation->titre }}
                    </h2>
                </div>
            </nav>
            <section>

                @if (Auth::check())
                    @php
                        $user = Auth::user();
                    @endphp
                    @if ($user->role == 1)
                        <section id="lessons" class="prog">
                            <div class="intro_title titley">
                                <h2>Le programme</h2>

                            </div>
                            <div id="accordion_lessons" role="tablist" class="add_bottom_45">
                                @php $count=1; @endphp

                                @foreach ($formation->chapitres as $ch)
                                    <!-- /card -->
                                    <div class="card">
                                        <div class="card-header" role="tab" id="heading{{ $ch->id }}Two">
                                            <h4 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse"
                                                    href="#collapse{{ $ch->id }}Two"
                                                    aria-expanded="@if ($count == 1) true @else false @endif"
                                                    aria-controls="collapse{{ $ch->id }}Two">
                                                    <i
                                                        class="indicator @if ($count === 1) ti-minus @else ti-plus @endif"></i>{{ $ch->titre }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{ $ch->id }}Two"
                                            class="collapse @if ($count == 1) show @endif" role="tabpanel"
                                            aria-labelledby="heading{{ $ch->id }}Two"
                                            data-parent="#accordion_lessons">
                                            <div class="card-body">
                                                <div class="list_lessons">
                                                    <ul>
                                                        @foreach ($ch->courses as $cour)
                                                            @if ($cour->type_cours == 1)
                                                                <li><a @if ($demande != null && $demande->validation == 2) href="{{ url('/whatch-video/' . $cour->id) }}" class="video" @endif
                                                                        style="font-size:20px">{{ $cour->titre }}</a><span>
                                                                        @if ($demande != null && $demande->validation == 2)
                                                                            <i class="fa fa-unlock"
                                                                                title="vous êtes participer a cette formation"></i>
                                                                        @else
                                                                            <i class="fa fa-lock"
                                                                                title="Il faut cliquer sur participer a cette formation"></i>
                                                                        @endif
                                                                    </span></li>
                                                            @else
                                                                <li><a style="font-size:20px"
                                                                        @if ($demande != null && $demande->validation == 2) href="{{ asset('assets/courses/' . $cour->pdf_url) }}" @endif
                                                                        download=""
                                                                        class="txt_doc">{{ $cour->titre }}</a>
                                                                    <span><i class="icon_download"></i> PDF
                                                                        @if ($demande != null && $demande->validation == 2)
                                                                            <i class="fa fa-unlock"
                                                                                title="vous êtes participer a cette formation"></i>
                                                                        @else
                                                                            <i class="fa fa-lock"
                                                                                title="Il faut cliquer sur participer a cette formation"></i>
                                                                        @endif
                                                                    </span>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $count++; @endphp
                                @endforeach
                                <!-- /card -->
                            </div>
                            <!-- /accordion -->
                        </section>
                    @endif
                @else
                    @if ($formation->image_8 != '')
                        <section id="hero_in" class="courses courte">
                            <div class="wrapper">
                                <div class="container-fluid">
                                    <img src="{{ asset('assets/formations/' . $formation->image_8) }}"
                                        alt="Centre Mikdad {{ $formation->titre }}" width="100%">
                                </div>
                            </div>
                        </section>
                        <br><br>
                    @else
                        <img style="display:none;" alt="Centre Mikdad {{ $formation->titre }}" width="100%">
                    @endif

                    

                    <div class="container-fluid margin_60_35" style="width:95%">
                    <br><br>
                        <div class="row">
                            <div class="col-lg-12">
                                @if (!$formation->btn_1 == null)
                                    <div class="row aria">
                                         
                                        <div class="col-md-6">
                                            
                                            @if ($formation->image_1 != '')
                                                <img class="imgCoach" src="{{ asset('assets/formations/' . $formation->image_1) }}"
                                                    alt="Centre Mikdad {{ $formation->titre }}" width="100%">
                                            @else
                                                <img style="display:none;" alt="Centre Mikdad {{ $formation->titre }}"
                                                    width="100%">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="fadeInUp" style="text-align: center; position: relative;top: 19px; font-weight:bold">
                                                {{ $formation->titre6 }}</h2>
                                                <br><br><br>
                                            <div class="">
                                                <div>{!! $formation->description !!}</div>
                                                
                                            </div>
                                            <br><br>
                                            <div style="  text-align: center;">
                                                    <a class="buttona"
                                                        href="https://www.coachdeviemikdad.com/"
                                                        target="_blank">
                                                        {!! $formation->btn_1 !!}
                                                    </a>
                                                </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <br><br><br><br>
                                @else
                                    <div style="display: none;"></div>
                                @endif

                                
                               @if (
    $formation->video_3 != null ||
    $formation->video_4 != null ||
    $formation->video_5 != null ||
    $formation->video_6 != null
)
    <div class="row">
        <div class="col-md-12">
            <h2 class="fadeInUp" style="    text-align: center;
    position: relative;
    top: 22px;
    font-weight: bold;
    font-size: 48px;">
                {{ $formation->titre3 }}</h2>
            <div style="height: 100px"></div>
            <div id="myCarousel" class="carousel slide" style="width: 80%; margin:0 auto;">
                <div class="carousel-inner">
                    @if ($formation->video_3 != null)
                        <div class="carousel-item active">
                            {!! $formation->video_3 !!}
                        </div>
                    @endif

                    @if ($formation->video_4 != null)
                        <div class="carousel-item">
                            {!! $formation->video_4 !!}
                        </div>
                    @endif

                    @if ($formation->video_5 != null)
                        <div class="carousel-item">
                            {!! $formation->video_5 !!}
                        </div>
                    @endif

                    @if ($formation->video_6 != null)
                        <div class="carousel-item">
                            {!! $formation->video_6 !!}
                        </div>
                    @endif
                </div>

               <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
    data-bs-slide="prev" style="height: 200px; margin: auto 0">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
    data-bs-slide="next" style="height: 200px; margin: auto 0">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>

            </div>
            <div style="height: 70px"></div>
            <div class="col-md-12 discriptio">
                {!! $formation->description7 !!}
            </div>
            <div style="height: 100px"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <div style="  text-align: center;">
                        <a class="buttona btnOne"
                            href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0) {{ $formation->prix }} Dhs @elseif ($formation->new_prix > 0) . Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs @endif . Link: {{ URL::current() }}"
                            target="_blank">
                            {!! $formation->btn_5 !!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>

    <script>
        // Initialize the carousel manually and prevent auto-advancing
        document.addEventListener('DOMContentLoaded', function () {
            var myCarousel = new bootstrap.Carousel(document.getElementById('myCarousel'), {
                interval: false
            });
        });
    </script>
@endif

<!--section 3-->
                                
                                @if (!$formation->btn_2 == null)
                                    <div class="row irean">
                                       
                                        <div class="col-md-6">
                                            <h2 class="fadeInUp" style="text-align: center; position: relative;top: 19px; font-weight:bold">
                                                {{ $formation->titre7 }}</h2>
                                                <br><br><br>
                                            <div class="">
                                                <div>{!! $formation->description1 !!}</div>
                                                
                                            </div>
                                            <br><br>
                                            <div style="  text-align: center;">
                                                    <a class="buttona"
                                                        href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0) {{ $formation->prix }} Dhs @elseif ($formation->new_prix > 0) . Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs @endif . Link: {{ URL::current() }}"
                                                        target="_blank">
                                                        {!! $formation->btn_2 !!}
                                                    </a>
                                                </div>
                                        </div>
                                        
                                        <div class="col-md-6"><div class="casExc"></div>
                                            @if ($formation->image_2 != '')
                                                <img src="{{ asset('assets/formations/' . $formation->image_2) }}"
                                                    alt="Centre Mikdad {{ $formation->titre }}" width="100%">
                                            @else
                                                <img style="display:none;" alt="Centre Mikdad {{ $formation->titre }}"
                                                    width="100%">
                                            @endif
                                        </div>
                                        

                                    </div><br><br><br><br>
                                @else
                                    <div style="display: none;"></div>
                                @endif
<!--section 4-->
                                
                                
   @if ($formation->btn_2 != null || $formation->titre1 != null)
<div class="row iito" >
    <div class="col-md-12">
        <h3 class="fadeInUp" style="text-align: center; position: relative;top: 19px; font-weight:bold">
            {{ $formation->titre1 }}</h3>
    </div>
    <div style="height: 100px;"></div>
    @php
    $descriptions = [$formation->description2, $formation->description3, $formation->description4, $formation->description5];
    $descriptions = array_filter($descriptions); // Remove null values
    $numDescriptions = count($descriptions);

    if ($numDescriptions == 3) {
        $columnClass = 'col-md-4';
    } elseif ($numDescriptions == 2) {
        $columnClass = 'col-md-6';
    } else {
        $columnClass = 'col-md-3';
    }
    @endphp

    @foreach ($descriptions as $description)
    <div class="{{ $columnClass }}">
        <div class="itemg">
            {!! $description !!}
        </div>
    </div>
    @endforeach
<div style="height: 100px;"></div>
    <div class="col-md-12">
        {!! $formation->description8 !!}
    </div>
    <div style="height: 100px"></div>
    <div class="col-md-12">
        <div class="form-group">
            <div style="text-align: center;">
                @if($formation->btn_3 !== null)
                <a class="buttona btnOne" href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0) {{ $formation->prix }} Dhs @elseif ($formation->new_prix > 0) . Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs @endif . Link: {{ URL::current() }}" target="_blank">
                    {!! $formation->btn_3 !!} <!-- Affiche le bouton personnalisé de la formation -->
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
@else
<div style="display: none;"></div>
@endif


                
<!--section 5-->
               @if ( $formation->titre2 != null ||  $formation->description9 != null) 
<div class="row" >
    <div class="col-md-12">
        <h3 class="fadeInUp" style="text-align: center; position: relative;top: 19px; color:#fff; font-weight: bold;">
            {{ $formation->titre2 }}</h3><br><br> <!-- Affiche le titre 2 de la formation -->
    </div>
    <div class="col-md-12">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @if ($formation->image_3 != '')
            <div class="carousel-item active">
                <img src="{{ asset('assets/formations/' . $formation->image_3) }}"
                    alt="Centre Mikdad {{ $formation->titre }}" width="100%"> 
            </div>
        @endif
        @if ($formation->image_4 != '')
            <div class="carousel-item">
                <img src="{{ asset('assets/formations/' . $formation->image_4) }}"
                    alt="Centre Mikdad {{ $formation->titre }}" width="100%"> 
            </div>
        @endif
        @if ($formation->image_5 != '')
            <div class="carousel-item">
                <img src="{{ asset('assets/formations/' . $formation->image_5) }}"
                    alt="Centre Mikdad {{ $formation->titre }}" width="100%"> 
            </div>
        @endif
        @if ($formation->image_6 != '')
            <div class="carousel-item">
                <img src="{{ asset('assets/formations/' . $formation->image_6) }}"
                    alt="Centre Mikdad {{ $formation->titre }}" width="100%"> 
            </div>
        @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev" style="height: 200px; margin: auto 0">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next" style="height: 200px; margin: auto 0">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    </div>
    <div style="padding: 60px;
    background: #e5e4bf63;
    align-items: center;
    box-shadow: 19px 16px 19px #514e4f;">
        <div class="col-md-12">
            {!! $formation->description9 !!} <!-- Affiche la description 9 de la formation -->
        </div>
        <div class="col-md-12"><br><br>
            <div class="form-group">
                <div style="text-align: center;">
                     @if($formation->btn_4 !== null)
                <a class="buttona"  href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0) {{ $formation->prix }} Dhs @elseif ($formation->new_prix > 0) . Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs @endif . Link: {{ URL::current() }}" target="_blank">
                    {!! $formation->btn_4 !!} <!-- Affiche le bouton personnalisé de la formation -->
                </a>
                @endif
                </div>
            </div>
        </div>
   </div>
</div>
<br><br><br><br>
@else
    <div style="display: none;"></div> <!-- Cache le contenu si aucune condition n'est remplie -->
@endif

               
<!--section 5-->
                @if (!$formation->btn_6 == null)
                    <div class="row" style="padding: 60px;
    background: #a9e8ed;
    align-items: center;
    box-shadow: 19px 16px 19px #514e4f; ">
                        
                        <div class="col-md-6">
                           <h2 class="fadeInUp" style="text-align: center; position: relative;top: 19px; font-weight:bold">
                                                {{ $formation->titre8 }}</h2>
                                                <br><br><br>
                                            <div class="">
                                                <div>{!! $formation->description6 !!}</div>
                                                
                                            </div>
                                            <br><br>
                                            <div style="  text-align: center;">
                                                    <a class="buttona btnOne"
                                                        href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0) {{ $formation->prix }} Dhs @elseif ($formation->new_prix > 0) . Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs @endif . Link: {{ URL::current() }}"
                                                        target="_blank">
                                                        {!! $formation->btn_6 !!}
                                                    </a>
                                                </div>
                        </div>
                        <div class="col-md-6">
                            @if ($formation->image_7 != '')
                                <img src="{{ asset('assets/formations/' . $formation->image_7) }}"
                                    alt="Centre Mikdad {{ $formation->titre }}" width="100%">
                            @else
                                <img style="display:none;" alt="Centre Mikdad {{ $formation->titre }}" width="100%">
                            @endif
                        </div>

                    </div>
                    <br><br><br><br>
                @else
                    <div style="display: none;"></div>
                @endif
                
                
                
                <style>
                    .pricing {
                        text-align: center;
                        font-size: 40px;
                        font-style: italic;
                        font-weight: bold;
                        word-spacing: 19px;
                    }

                    .newPrice {
                        font-weight: bold;
                        font-size: 86px;
                        color: #212529;

                    }

                    .priceOld {
                        font-size: 86px;
                    }

                    #countdown {
                        font-size: 130px;
                        text-align: center;
                    }

                    .countdown-part {
                        font-size: 18px;
                    }
                </style>
                <script>
                    // Set the target date and time from the PHP variable
                    var targetDate = new Date("{!! $formation->date !!}").getTime();

                    // Update the countdown every second
                    var timer = setInterval(function() {
                        // Get the current date and time
                        var now = new Date().getTime();

                        // Calculate the remaining time
                        var distance = targetDate - now;

                        // Calculate days, hours, minutes, and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Display the countdown
                        $("#countdown").html(
                            days + '<span class="countdown-part"> Days </span>' +
                            hours + '<span class="countdown-part"> Hours </span>' +
                            minutes + '<span class="countdown-part"> Minutes </span>' +
                            seconds + '<span class="countdown-part"> Seconds </span>'
                        );

                        // If the countdown is over, clear the interval
                        if (distance < 0) {
                            clearInterval(timer);
                            $("#countdown").html("انتهى العد التنازلي!");
                        }
                    }, 1000); // Update every second
                </script>
                
                
                <!--section 6-->
                <div class="pricetwo" style="padding: 60px;
    background: #e5e4bf63;
    align-items: center;
    box-shadow: 19px 16px 19px #514e4f;">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="pricing">فقط ب<span class="newPrice"> {!! $formation->new_prix !!} </span>درهــــم بدل
                                <span class="priceOld"><del>{!! $formation->prix !!}</del></span>درهــــم </p>


                            <h1 id="countdown"></h1>
                        </div>
                        <div class="col-md-12">
                            <div>{!! $formation->description10 !!}</div>
                            <div class="col-md-12"><br><br>
                                <div class="form-group">
                                    <div style="text-align: center;">
                                         @if($formation->btn_7 !== null)
                                            <a class="buttona"  href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0) {{ $formation->prix }} Dhs @elseif ($formation->new_prix > 0) . Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs @endif . Link: {{ URL::current() }}" target="_blank">
                                                {!! $formation->btn_7 !!} <!-- Affiche le bouton personnalisé de la formation -->
                                            </a>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br><br>








                <!--<section id="description">-->
                <!--    <div>-->
                <!--        {!! $formation->description !!}-->
                <!--    </div>-->
                <!--    <hr style="width:50%; border:2px solid; margin:0 auto">-->
                <!--    <div style="margin-top:25px">-->
                <!--        {!! $formation->description1 !!}-->
                <!--    </div>-->

                <!--    <div class="mt-4 d-flex justify-content-center">-->
                <!--        <a class="buttona"-->
                <!--            style="background-color:#91d0cc;border:none;color:rgb(12, 12, 12); font-size:35px; font-weight:bold; padding: 16px 31px; border-radius:30px"-->
                <!--            href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0)
{{ $formation->prix }} Dhs
@elseif ($formation->new_prix > 0)
. Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs
@endif . Link: {{ URL::current() }}"-->
                <!--            target="_blank">-->
                <!--            احجـــــز مقعدك الان-->
                <!--        </a>-->
                <!--    </div>-->
                <!--    <h4 style="font-weight: bold;margin-top:20px;text-align:center">-->
                <!--        {{ $formation->titre }}و كن من الأوائل الذين سيأخذون القيادة لحياتهم ب </h4>-->
                <!--    <style>-->
                <!--        img.imgLogo {-->
                <!--            width: 100px;-->
                <!--            transition: filter 0.3s ease;-->
                <!--            border-radius: 50%;-->

                <!--        }-->

                <!--        img.imgLogo:hover {-->
                <!--            filter: grayscale(100%);-->
                <!--        }-->

                <!--        .slider {-->
                <!--            display: flex;-->
                <!--            justify-content: space-between;-->
                <!--            align-items: center;-->
                <!--            flex-wrap: wrap;-->
                <!--            gap: 15px;-->
                <!--        }-->
                <!--    </style>-->

                <!--    <div class="container mt-5">-->
                <!--        <section class="customer-logos slider">-->
                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/2mradio.jpeg">-->
                <!--            </div>-->
                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/mfmradio.jpg">-->
                <!--            </div>-->
                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/telemaroc.png">-->
                <!--            </div>-->

                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/medi1tv.png"></div>-->
                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/lalafatima.jpeg">-->
                <!--            </div>-->
                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/lalamoulati.jpg">-->
                <!--            </div>-->
                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/saout.jpeg"></div>-->
                <!--            <div class="slide"><img class="imgLogo"-->
                <!--                    src="https://coachdeviemikdad.com/assets/img/partner/aloula.png"></div>-->
                <!--        </section>-->
                <!--    </div>-->
                <!--    <div style="margin-top:25px">-->
                <!--        {!! $formation->description2 !!}-->
                <!--    </div>-->
                <!-- /row -->
                <!--</section>-->
                <!-- /section -->


                <!-- /section -->

                <!--<section id="reviews" style="text-align:center; background:#493d3f; width:100%;padding:12px">-->
                <!--    <h4-->
                <!--        style="font-weight: bold;margin-bottom:20px;color:#fff;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif !important;">-->
                <!--        شهادة المركز التدريبي بمراكـــــــش</h4>-->
                <!--    <img class="cirtif" src="{{ asset('assets/frontend/img/cirt.png') }}" alt="cirtificat">-->
                <!--    <h4 style="font-weight: bold;margin-top:20px;color:#fff"> {{ $formation->titre }} عند-->
                <!--        الانتهاء-->
                <!--        من الدورة التدريبية الكاملة، ستحصل على شهادة من المركز التدريبي، تبين اكتمالك لدورة-->
                <!--    </h4>-->
                <!--</section>-->
                <!--<section>-->
                <!--    <div style="margin-top:25px">-->
                <!--        {!! $formation->description3 !!}-->
                <!--    </div>-->

                <!--</section>-->
                <!--<section style="background:#aa987d;padding:25px 0">-->
                <!--    <div class="container">-->
                <!--        <h2 style="text-align: center;margin:30px 0;font-weight: bold">تعرف على الكـــوتش-->
                <!--        </h2>-->
                <!--        <div class="row">-->

                <!--<div class="col-md-7">-->
                <!--    <img src=" {{ asset('assets/frontend/img/DSCF1022.jpg') }}" alt="coach mohamed mikdad" style="width:600px; transform: scaleX(-1);" >-->
                <!--</div> -->
                <!--            <div class="col-md-5">-->
                <!--                <p style="font-size:25px; text-align:justify">وقد دعم خبير الاستشارة-->
                <!--                    والتدريب والمشورة محمد مقداد أزيد من 1100 شخص وشركة في المغرب وخارجه،-->
                <!--                    وقد أعربت الغالبية العظمى منهم عن نجاح ملحوظ بفضل انضباطهم وتعليمات-->
                <!--                    المدرب. محمد مقداد معروف بطاقته الإيجابية وشغفه بالتواصل وعروضه المؤثرة-->
                <!--                    التي تفيد العديد من المشاركين. بصفته مدربًا ومتحدثًا ومستشارًا ظهر في-->
                <!--                    العديد من البرامج الإذاعية والتلفزيونية، فإن محمد مقداد يحفزه قبل كل شيء-->
                <!--                    ربط الأفراد والشركات بدوافعهم وقيادتهم وتطوير استراتيجيات الأداء.</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</section>-->
                <!--<div style="margin-top: 45px;">-->
                <!--    <h2 style="color:#d3c098;text-align:center"> هل ستفوت كل هذا؟</h2>-->
                <!--    <p style="text-align:center; font-size:25px; width: 69%; margin: 0 auto">إذا فاتك هذا-->
                <!--        الحدث،-->
                <!--        فيجب أن تنتظر شهرأخر، لأن الحدث شهري اتخذ القرار الصحيح، وكن متأكدا أن الشخص الذي-->
                <!--        سيشارك في-->
                <!--        هذه الدورة، لن يكون نفس الشخص بعدها</p>-->
                <!--    <div class="mt-4 d-flex justify-content-center">-->
                <!--        <a class="buttona"-->
                <!--            style="background-color: #493d3f;border: none; color: rgb(255 255 255); font-size:35px; font-weight:bold; padding: 16px 31px; border-radius:30px"-->
                <!--            href="https://wa.me/+212684505442/?text=Bonjour Centre MIKDAD, Je confirme mon inscription à ce cours: {{ $formation->titre }} @if ($formation->new_prix == 0)
{{ $formation->prix }} Dhs
@elseif ($formation->new_prix > 0)
. Prix : {{ $formation->prix }} Dhs . Nouveau prix: {{ $formation->new_prix }} Dhs
@endif . Link: {{ URL::current() }}"-->
                <!--            target="_blank">-->
                <!--            احجـــــز مقعدك الان-->
                <!--        </a>-->
                <!--    </div>-->
                <!--</div>-->
                <br><br>
                <div class="row" style="justify-content: center;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13586.882592556127!2d-8.009174!3d31.6414982!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7bef09ac6418606b!2scentre%20mikdad%20de%20formation%20coaching!5e0!3m2!1sfr!2sma!4v1622586947042!5m2!1sfr!2sma"
                        width="100%" style="border:2px solid #a29178; height: 350px" allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
                <section>

                </section>


                <!-- /section -->
        </div>

        </div>
        <!-- /row -->
        </div>

        @endif
        </section>

        <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    </main>

    <script>
    

    
    
        $(document).ready(function() {
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
    <!--/main-->

@endsection
