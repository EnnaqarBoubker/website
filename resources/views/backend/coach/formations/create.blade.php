@extends('layouts.coach-master')

@section('addheaderscript')
    <script src="{{ asset('assets/backend/js') }}/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize', // Include the fontsize plugin
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect |  blocks fontfamily fontsize | strikethrough blockquote bullist numlist backcolor forecolor | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt', // Define font sizes
        });

        tinymce.init({
            selector: 'textarea#editor1',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor2',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify fontsize | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor3',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor4',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor5',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor6',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor7',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor8',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor9',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
        tinymce.init({
            selector: 'textarea#editor10',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media, fontsize',
            plugins: 'lists, link',
            toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | styleselect | strikethrough blockquote bullist numlist backcolor forecolor  | link image media | removeformat help',
            menubar: true,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'clean',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
        });
    </script>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/form-upload.css') }}">
@endsection

@section('content')

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=" {{ url('coach-admin') }} ">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Ajouter une formation</li>
            </ol>
            <form method="post" id="imageupload" action=" {{ url('coach-admin/formations') }} "
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                    </div>
                    <!-- /row-->
                    <h6>Section Heading</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label class="col-12">Image de formation</label>
                                    {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image1"> --}}
                                    <input type="file" class="form-control mt-3" name="image_8" id="image"
                                        onchange="readURL1(this);">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label class="col-12">Une Video presentation </label>
                                  
                                    <input type="text" class="form-control mt-3" name="video" id="video" placeholder="Ajouter lien de video">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Catégorie de le formation <span class="required">*</span></label>
                                    <select name="categorie_id" required class="form-control" id="categorie_id">
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if ($errors->get('titre')) has-error @endif ">
                                    <label>Nom du formation </label>
                                    <input type="text" value="{{ old('titre') }}"
                                        placeholder="Tappez le titre du formation ici..." class="form-control"
                                        name="titre">
                                    @if ($errors->get('titre'))
                                        @foreach ($errors->get('titre') as $message)
                                            <li class="required">
                                                {{ $message }}
                                            </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type de Formation <span class="required">*</span></label>
                                    <select name="type" required class="form-control" id="type">
                                        <option value="">--séléctionnez--</option>
                                        <option value="1">Formation Sur Place</option>
                                        <option value="2">Formation en Ligne</option>
                                        <option value="3">Formation en Live</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <br>
                    {{-- section 1 --}}
                    <h6>Section N° 1</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titre de section 1</label>
                                    <input type="text" placeholder="exemple : الهدف العام للبرنامج"
                                        class="form-control" name="titre6">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <label>Image de formation</label>
                                    {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image2"> --}}
                                    <input type="file" class="form-control mt-3" name="image_1" id="image"
                                        onchange="readURL1(this);">
                                </div>

                                <div class="form-group text-center">
                                    <label>Une Video presentation </label>
                                    <input type="text" class="form-control mt-3" name="video_1" id="video" placeholder="Ajouter lien de video">
                                </div>
                                <p><b>Note :</b> entre Image Ou Video</p>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Description 1 </label>
                                    <textarea name="description" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                        id="editor" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Button N° 1</label>
                                    <input type="text" placeholder="exemple : احجـــــز مقعدك الان" class="form-control"
                                        name="btn_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end section 1 --}}
                    <br>
                     {{-- section 2 --}}

                    <h6>Section N° 2 Ajouter Des Video</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titre de section 2</label>
                                    <input type="text" placeholder="exemple : الهدف العام للبرنامج"
                                        class="form-control" name="titre3">
                                </div>
                            </div>
                            <div class="col-md-12" style="display: flex;flex-wrap: wrap;">
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Video de formation</label>
                                        <input type="text" class="form-control mt-3" name="video_3" id="image" placeholder="Ajouter lien de video">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Video de formation</label>
                                        <input type="text" class="form-control mt-3" name="video_4" id="image" placeholder="Ajouter lien de video">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Video de formation</label>
                                        <input type="text" class="form-control mt-3" name="video_5" id="image" placeholder="Ajouter lien de video">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Video de formation</label>
                                        <input type="text" class="form-control mt-3" name="video_6" id="image" placeholder="Ajouter lien de video">
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-12">
                                   <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description7" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                            id="editor7" rows="3"></textarea>
                                    </div>
                                </div>
                             <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Button N° 5</label>
                                        <input type="text" placeholder="exemple : احجـــــز مقعدك الان"
                                            class="form-control" name="btn_5">
                                    </div>
                                </div>
                        </div>
                    </div>
                    {{-- end section 2 --}}
                    <br>
                    {{-- section 3 --}}
                    <h6>Section N° 3</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titre de section 3</label>
                                    <input type="text" placeholder="exemple : الهدف العام للبرنامج"
                                        class="form-control" name="titre7">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea name="description1" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                        id="editor1" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Button N° 2</label>
                                    <input type="text" placeholder="exemple : احجـــــز مقعدك الان"
                                        class="form-control" name="btn_2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label>Image de formation</label>
                                    {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image2"> --}}
                                    <input type="file" class="form-control mt-3" name="image_2" id="image"
                                        onchange="readURL1(this);">
                                </div>

                                <div class="form-group text-center">
                                    <label>Une Video presentation </label>
                                    <input type="text" class="form-control mt-3" name="video_2" id="video" placeholder="Ajouter lien de video">
                                </div>
                                <p><b>Note :</b> entre Image Ou Video</p>
                            </div>


                        </div>
                    </div>
                    {{-- end section 3 --}}
                    <br>
                    {{-- section 4 --}}
                    <h6>Section N° 4</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titre de section 1</label>
                                    <input type="text" placeholder="exemple : الهدف العام للبرنامج"
                                        class="form-control" name="titre1">
                                </div>
                            </div>
                            <div class="col-md-12" style="display: flex;flex-wrap: wrap;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description2" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                            id="editor2" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description3" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                            id="editor3" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description4" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                            id="editor4" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description5" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                            id="editor5" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description8" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                            id="editor8" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Button N° 3 </label>
                                        <input type="text" placeholder="exemple : احجـــــز مقعدك الان"
                                            class="form-control" name="btn_3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end section 4 --}}
                    <br>
                    {{-- section 5 --}}
                    <h6>Section N° 5 Ajouter des images</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titre de section 2</label>
                                    <input type="text" placeholder="exemple : الهدف العام للبرنامج"
                                        class="form-control" name="titre2">
                                </div>
                            </div>
                            <div class="col-md-12" style="display: flex;flex-wrap: wrap;">
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Image de formation</label>
                                        {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image2"> --}}
                                        <input type="file" class="form-control mt-3" name="image_3" id="image"
                                            onchange="readURL1(this);">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Image de formation</label>
                                        {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image2"> --}}
                                        <input type="file" class="form-control mt-3" name="image_4" id="image"
                                            onchange="readURL1(this);">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Image de formation</label>
                                        {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image2"> --}}
                                        <input type="file" class="form-control mt-3" name="image_5" id="image"
                                            onchange="readURL1(this);">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <label class="col-12">Image de formation</label>
                                        {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image2"> --}}
                                        <input type="file" class="form-control mt-3" name="image_6" id="image"
                                            onchange="readURL1(this);">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="description9" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                            id="editor9" rows="3"></textarea>
                                    </div>
                                </div>
                             <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Button N° 5</label>
                                        <input type="text" placeholder="exemple : احجـــــز مقعدك الان"
                                            class="form-control" name="btn_4">
                                    </div>
                                </div>
                        </div>
                    </div>
                    {{-- end section 5 --}}
                    <br>
                    
                    {{-- section 6 --}}
                    <h6>Section N° 6</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titre de section 6</label>
                                    <input type="text" placeholder="exemple : الهدف العام للبرنامج"
                                        class="form-control" name="titre8">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea name="description6" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                        id="editor6" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Button N° 6</label>
                                    <input type="text" placeholder="exemple : احجـــــز مقعدك الان"
                                        class="form-control" name="btn_6">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label>Image de formation</label>
                                    {{-- <img src=" {{ asset('assets/backend/img/cat.jpg') }} " alt="" id="image2"> --}}
                                    <input type="file" class="form-control mt-3" name="image_7" id="image"
                                        onchange="readURL1(this);">
                                </div>

                                <div class="form-group text-center">
                                    <label>Une Video presentation </label>
                                    <input type="text" class="form-control mt-3" name="video_7" id="video" placeholder="Ajouter lien de video">
                                </div>
                                <p><b>Note :</b> entre Image Ou Video</p>
                            </div>


                        </div>
                    </div>
                    {{-- end section 6 --}}
                    <br><br>
                    {{--  section 7 --}}
                    <h6>Section N° 7</h6>
                    <div style="border: 2px solid; padding: 20px">
                        <div class="row">
                            
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prix /Dhs<span class="required">*</span> </label>
                                    <input type="text" placeholder="exemple : 350 " class="form-control" name="prix"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nouveau Prix /Dhs</label>
                                    <input type="text" placeholder="exemple : 250" class="form-control" name="new_prix">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea name="description10" placeholder="Tappez ici une description concerne la formation..." class="form-control"
                                        id="editor10" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Button N° 6</label>
                                    <input type="text" placeholder="exemple : احجـــــز مقعدك الان"
                                        class="form-control" name="btn_7">
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- end section 7 --}}
                    
                   <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>La date(pour formation sur place/Live)</label>
                                <input type="datetime-local" class="form-control" name="date">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lieu(pour formation sur place)</label>
                                <input type="text" placeholder="Tappez ici l'adresse exact de formation"
                                    name="lieu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Disponibilité sur le Site <span class="required">*</span></label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="1"> Afficher</option>
                                    <option value="0"> Non Afficher</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="progressbr-container" style="display:none;">
                                <div id="progress-bar-status-show"> </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <div id="loader" style="display:none;">
                                    <img src="{{ asset('assets/backend/img/LoaderIcon.gif') }}" />
                                </div>
                            </div>
                        </div>

                        <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium"
                                value="Ajouter La Formation"></p>

                        <div class="form-group">
                            <div id="toshow" style="visibility:hidden;"></div>
                        </div>
                    </div>
                </div>
                <!-- /box_general-->
            </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection

@section('addfooterscript')
    <script src="{{ asset('assets/backend/js') }}/jquery-3.4.1.slim.min.js"></script>
    <script src="{{ asset('assets/backend/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/backend/js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('assets/backend/js/file_upload.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageupload').submit(function(e) {
                    if ($('#image').val()) {
                        e.preventDefault();

                        $("#progress-bar-status-show").width('0%');

                        /* image traitement */
                        var file_details2 = document.getElementById("image").files[0];
                        var extension2 = file_details2['name'].split(".");

                        var allowed_extension2 = ["jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF"];
                        var check_for_valid_ext2 = allowed_extension2.indexOf(extension2[1]);

                        if (file_details2['size'] > 2097152) {
                            alert('Veuillez télécharger un fichier inférieur à 1 MB');
                            return false;
                        } else if (check_for_valid_ext2 == -1) {
                            alert('Télécharger un fichier valide !');
                            return false;
                        }

                    } else {
                        /* video traitement */
                        if ($('#video').val()) {
                            var file_details2 = document.getElementById("video").files[0];
                            var extension2 = file_details2['name'].split(".");

                            var allowed_extension2 = ["webm", "mp4", "video/mp4", "'video/x-f4v", "video/webm",
                                "video/x-flv"
                            ];
                            var check_for_valid_ext2 = allowed_extension2.indexOf(extension2[1]);

                            if (file_details2['size'] > 41943040) {
                                alert('Veuillez télécharger une video inférieur à 20 MB');
                                return false;
                            } else if (check_for_valid_ext2 == -1) {
                                alert('Télécharger une video image valide !');
                                return false;
                            }
                        }

                        $('#loader').show();
                        $('#progressbr-container').show();
                        $(this).ajaxSubmit({
                            target: '#toshow',
                            beforeSubmit: function() {
                                $("#progress-bar-status-show").width('0%');
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                $("#progress-bar-status-show").width(percentComplete + '%');
                                $("#progress-bar-status-show").html('<div id="progress-percent">' +
                                    percentComplete + ' %</div>');
                            },
                            success: function() {
                                $('#loader').hide();
                                $('#progressbr-container').hide();
                                window.location.href = "{{ url('coach-admin/formations') }}";
                            },
                            resetForm: true

                        });
                        return false;

                    }
                }
            });



        });

        function readURL1(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {

                    $('#image1').attr('src', e.target.result).width("100%").height("325px");
                    $('#image2').attr('src', e.target.result).width("100%").height("325px");

                };

                reader.readAsDataURL(input.files[0]);

            }

        }

        function readURL2(input) {

            $('#image2').attr('src', '{{ asset('assets/backend/img/video.jpg') }}').width("100%").height("325px");

        }
    </script>
@endsection
