@extends("layouts.coach-master")

@section("addheaderscript")
    <script src="{{asset("assets/backend/js")}}/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            // plugins: 'lists, link, image, media',
            plugins: 'lists, link',
            toolbar: 'h1 h2 h3 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false
        });
    </script>
@endsection

@section("content")

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=" {{ url('coach-admin') }} ">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Modifier l'article</li>
            </ol>
            <form method="post" action=" {{ url('coach-admin/articles/'. $article->id) }} " enctype="multipart/form-data" >
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <label class="col-12">Image de formation <span class="required">*</span></label>
                                @if($article->image !="")
                                    <img src=" {{ asset('assets/articles/'. $article->image) }}" id="image1" height="325px" alt="Centre Mikdad" >
                                @else
                                    <img src=" {{ asset('assets/backend/img/cat.jpg') }}" id="img" height="325px" alt="Centre Mikdad">
                                 @endif
                                <input type="file" class="form-control mt-3" name="image" onchange="readURL1(this);">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @if($errors->get('titre')) has-error @endif ">
                                <label>Le titre d'article <span class="required">*</span></label>
                                <input type="text" value="{{ $article->titre }}" placeholder="Tappez le titre d'article ici..." class="form-control"  required name="titre">
                                @if($errors->get('titre'))
                                    @foreach($errors->get('titre') as $message)
                                        <li class="required">
                                            {{ $message }}
                                        </li>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <div class="form-group @if($errors->get('date')) has-error @endif ">
                                    <label>Le date d'article <span class="required">*</span></label>
                                    <input type="date" value="{{ $article->date }}"  class="form-control"  required name="date">
                                    @if($errors->get('date'))
                                        @foreach($errors->get('date') as $message)
                                            <li class="required">
                                                {{ $message }}
                                            </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description <span class="required">*</span>   </label>
                                <textarea id="editor" name="description" placeholder="tappez ici une description concerne la formation..." class="form-control" rows="3">{{ $article->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Disponibilité sur le Site <span class="required">*</span></label>
                                <select name="status" class="form-control" id="status" required>
                                    <option @if($article->status ==  1 ) selected @endif value="1"> Afficher</option>
                                    <option @if($article->status ==  0 ) selected @endif value="0"> Non Afficher</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Mise à jour"></p>
                    </div>
                </div>
                <!-- /box_general-->
            </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection

@section("addfooterscript")
    <script src="{{asset("assets/backend/js")}}/jquery-3.4.1.slim.min.js" ></script>
    <script src="{{asset("assets/backend/js")}}/popper.min.js"></script>
    <script src="{{asset("assets/backend/js")}}/bootstrap.min.js"></script>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#image1').attr('src', e.target.result).width("500px").height("325px");
                    $('#img').attr('src', e.target.result).width("500px").height("325px");

                };

                reader.readAsDataURL(input.files[0]);

            }

        }
    </script>
@endsection