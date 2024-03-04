@extends("layouts.front-master")

@section("laststyles")
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/form-upload.css') }}">
@endsection

@section("content-main")
    <main>
        <section id="hero_in" class="contacts">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Paiement Formation : {{ $formation->titre }}</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="bg_color_1">
            <div class="container margin_60_35">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="box_cart">
                            <h3 class="text-center">Choisissez votre mode de paiement</h3>
                        </div>
                        <div class="box_cart">
                            <div class="form-check ml-2">
                                <input class="form-check-input" checked type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Paiement direct (en espèce)
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Paiement par virement bancaire (RIB)
                                </label>
                            </div>
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Paiement par transfert d'argent (WafaCash,CashPlus...)
                                </label>
                            </div>
{{--                            <div class="form-check ml-2">--}}
{{--                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" checked>--}}
{{--                                <label class="form-check-label" for="flexRadioDefault4">--}}
{{--                                    Paiement par Paypal/Carte Bancaire (Visa, Master Card)--}}
{{--                                </label>--}}
{{--                            </div>--}}
                        </div>
                        <div class="box_cart">
                            <div class="message" id="methode1">
                                <h3>Méthode de paiement : en espèce</h3>

                                <p> Vous devez payer au centre(sur place) ou contactez le support.
                                    <br>
                                    Pour plus d'informations :   <span
                                            class="alert-success font-weight-bold px-2"> 06 39 36 54 70 </span>
                                </p>
                            </div>
                            <div class="message" id="methode2">

                                <div class="form_title">

                                    <h3>Méthode de paiement : Transfert Bancaire(RIB)</h3>

                                    <h6 class="mt-3"> Notre RIB : <span
                                                class="alert-success font-weight-bold py-2 px-3"> {{ $formation->coach->rib }} </span>
                                    </h6>

                                    <h6 class="mt-3">
                                        Envoyer le reçu comme pièce jointe sur cette formulaire.
                                    </h6>
                                </div>
                                <div class="step">
                                    <form method="post" action="{{ url("validation-paiment") }}"
                                          enctype="multipart/form-data" id="imageupload">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group text-center">
                                                    <label class="col-12">Image <span class="required"> * </span>
                                                        <br>
                                                        Les formats valide(jpeg,jpg,png), La taille max : 1M
                                                    </label>
                                                    <input type="hidden" name="id_formation" value="{{ $formation->id }}">
                                                    <img src="{{asset('assets/backend/img/recu.jpg')}}"
                                                         alt="paiement formation Centre Mikdad" id="image1" width="500px"
                                                         height="350">
                                                    <input type="file" class="form-control mt-3" id="image" name="image"
                                                           onchange="readURL1(this);" required="required"
                                                           accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="progressbr-container" style="display:none;">
                                                    <div id="progress-bar-status-show"></div>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="text-center">
                                                    <div id="loader" style="display:none;">
                                                        <img src="{{ asset ('assets/backend/img/LoaderIcon.gif') }}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="col-md-12 text-center"><input id="senddata" type="submit"
                                                                                    class="btn_1 medium" value="Envoyer">
                                            </p>

                                            <div class="form-group">
                                                <div id="toshow" style="visibility:hidden;"></div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <hr>

                            </div>
                            <div id="methode3">
                                <div class="form_title">

                                    <h3>Méthode de paiement : transfert (WafaCash,CashPlus...)</h3>

                                    <h6 class="mt-3"> transférer le montant à : <span
                                                class="alert-success font-weight-bold py-2 px-3"> {{ strtoupper($formation->coach->nom) }} {{ $formation->coach->prenom }} | CIN : EC40201</span>
                                    </h6>

                                    <h6 class="mt-3">
                                        Envoyer le reçu comme pièce jointe sur cette formulaire.
                                    </h6>
                                </div>
                                <div class="step">
                                    <form method="post" action="{{ url("validation-paiment") }}"
                                          enctype="multipart/form-data" id="imageupload">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group text-center">
                                                    <label class="col-12">Image <span class="required"> * </span>
                                                        <br>
                                                        Les formats valide(jpeg,jpg,png), La taille max : 1M
                                                    </label>
                                                    <input type="hidden" name="id_formation" value="{{ $formation->id }}">
                                                    <img src="{{asset('assets/backend/img/recu.jpg')}}"
                                                         alt="paiement formation Centre Mikdad" id="image1" width="500px"
                                                         height="350">
                                                    <input type="file" class="form-control mt-3" id="image" name="image"
                                                           onchange="readURL1(this);" required="required"
                                                           accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="progressbr-container" style="display:none;">
                                                    <div id="progress-bar-status-show"></div>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="text-center">
                                                    <div id="loader" style="display:none;">
                                                        <img src="{{ asset ('assets/backend/img/LoaderIcon.gif') }}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="col-md-12 text-center"><input id="senddata" type="submit"
                                                                                    class="btn_1 medium" value="Envoyer">
                                            </p>

                                            <div class="form-group">
                                                <div id="toshow" style="visibility:hidden;"></div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <hr>
                            </div>

                            <!--End step -->
{{--                            <div id="methode4">--}}
{{--                                <div class="form_title">--}}
{{--                                    <h3><strong>2 <sup>èm</sup> </strong>Méthode de paiement : en ligne</h3>--}}
{{--                                    <p>--}}
{{--                                        Bientôt disponible--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="step">--}}

{{--                                    <h5>Paiement sécurisé par Paypal</h5>--}}
{{--                                    <p>--}}
{{--                                        si vous avez un compte paypal ou carte bancaire vous puvez passer votre paiment en--}}
{{--                                        ligne.--}}
{{--                                        <br>--}}
{{--                                        (cette méthode non disponible pour le moment.)--}}
{{--                                    </p>--}}
{{--                                    <p>--}}
{{--                                        <img src="{{ asset("assets/frontend") }}/img/paypal_bt.png" alt="paypal">--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                            </div>--}}
                            <!--End step -->
                            <div id="policy">
                                <h5>Support téchnique</h5>
                                <p class="nomargin">Si vous avez trouvé une difficulté de passer votre paiement ou vous
                                    êtes besoin d'aide, Nous somme la pour vous aidé. Démarer un conversation <a
                                            href="https://wa.me/212639365470?text=Bonjour, s'il vous plaît j'ai besoin d'aide au niveau de paiement."
                                            class="btn btn-success"><i class="fa fa-whatsapp"></i> Whatsapp</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /col -->

                    <aside class="col-lg-4" id="sidebar">
                        <div class="box_detail">
                            <div id="total_cart" class="text-center">
                                Prix Total <br>
                                <h5>
                                    @if($formation->new_prix ==0) {{ $formation->prix }}
                                    Dhs @elseif($formation->new_prix >0)
                                        <del> {{ $formation->prix }} Dhs</del> {{ $formation->new_prix }} Dhs @endif
                                </h5>
                            </div>
                            <div class="add_bottom_30 text-center">
                                @php
                                    $desc =  str_replace("&nbsp;", " ", strip_tags($formation->description));
                                       if (strlen($desc) > 120) {

                                           // truncate string
                                           $descCut = substr($desc, 0, 120);
                                           $endPoint = strrpos($descCut, ' ');

                                           //if the string doesn't contain any space then it will cut without word basis.
                                           $desc = $endPoint? substr($descCut, 0, $endPoint) : substr($descCut, 0);
                                           $desc .= '...';
                                       }
                                @endphp
                                {{ $desc }}
                            </div>
                            <a href="{{ url("details-formation/".$formation->id) }}" class="btn_1 full-width">Détails du
                                formation</a>
                            <a href="{{ url("liste-formations") }}" class="btn_1 full-width outline"><i
                                        class="icon-right"></i> Retour au liste formations</a>
                        </div>
                    </aside>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    </main>
@endsection

@section("javascript")
    <script src="{{  asset('assets/backend/js/file_upload.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#methode1").css("display","block");
            $("#methode2").css("display","none");
            $("#methode3").css("display","none");

            $('#imageupload').submit(function (e) {
                if ($('#image').val()) {
                    e.preventDefault();

                    $("#progress-bar-status-show").width('0%');

                    var file_details = document.getElementById("image").files[0];
                    var extension = file_details['name'].split(".");

                    var allowed_extension = ["jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF"];
                    var check_for_valid_ext = allowed_extension.indexOf(extension[1]);

                    if (file_details['size'] > 2097152) {
                        alert('Veuillez télécharger un fichier inférieur à 1 MB');
                        return false;
                    } else if (check_for_valid_ext == -1) {
                        alert('Télécharger un fichier image valide !');
                        return false;

                    } else {
                        if (file_details['size'] <= 419430400 && check_for_valid_ext != -1) {
                            $('#loader').show();
                            $('#progressbr-container').show();
                            $(this).ajaxSubmit({
                                target: '#toshow',
                                beforeSubmit: function () {
                                    $("#progress-bar-status-show").width('0%');
                                },
                                uploadProgress: function (event, position, total, percentComplete) {
                                    $("#progress-bar-status-show").width(percentComplete + '%');
                                    $("#progress-bar-status-show").html('<div id="progress-percent">' + percentComplete + ' %</div>');
                                },
                                success: function () {
                                    $('#loader').hide();
                                    $('#progressbr-container').hide();
                                    window.location.href = "{{ url('remerciement') }}";
                                },
                                resetForm: true

                            });
                            return false;
                        }

                    }
                }
            });
        });

    </script>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#image1').attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);

            }

        }
    </script>

    <script>

        $('#flexRadioDefault1').click(function() {
            $("#methode1").css("display","block");
            $("#methode2").css("display","none");
            $("#methode3").css("display","none");
        });

        $('#flexRadioDefault2').click(function() {
            $("#methode1").css("display","none");
            $("#methode2").css("display","block");
            $("#methode3").css("display","none");
        });

        $('#flexRadioDefault3').click(function() {
            $("#methode1").css("display","none");
            $("#methode2").css("display","none");
            $("#methode3").css("display","block");
        });

    </script>
@endsection