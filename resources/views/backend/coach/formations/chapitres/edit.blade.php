@extends("layouts.coach-master")

@section("content")

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=" {{ url('coach-admin') }} ">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Modifier un chapitre</li>
            </ol>
            <form method="post" id="imageupload" action=" {{ url('coach-admin/formations-chapitres/'. $chapitre->id) }} " enctype="multipart/form-data" >
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                    </div>
                    <!-- /row-->

                    <div class="row">
                        <div class="col-md-3"> </div>
                        <div class="col-md-6">
                            <div class="form-group @if($errors->get('titre')) has-error @endif ">
                                <label>Nom du chapitre <span class="required">*</span></label>
                                <input type="text" value="{{ $chapitre->titre }}" placeholder="Tappez le titre du chapitre ici..." class="form-control"  required name="titre">
                                @if($errors->get('titre'))
                                    @foreach($errors->get('titre') as $message)
                                        <li class="required">
                                            {{ $message }}
                                        </li>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3"> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Choissez une ou plusieurs formations <span class="required">*</span></label>
                                <div class="form-group ">
                                    @foreach($chapitre->formations as $f)
                                        @php $formations_ids[] = $f->id; @endphp
                                    @endforeach
                                    @foreach($formations as $obj)

                                        <div class="custom-control custom-checkbox">
                                            <input style="width: 22px; height: 25px;" @php if(in_array($obj->id,$formations_ids)) echo "checked"; @endphp  type="checkbox" id="customCheckbox{{ $obj->id }}" name="formations[]" value="{{ $obj->id }}">
                                            <label for="customCheckbox{{ $obj->id }}" class="custom-control-label ml-2"> {{ $obj->titre }} </label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Disponibilité sur le Site <span class="required">*</span></label>
                                <select name="status" class="form-control" id="status" required>
                                    <option @if($chapitre->status ==  1 ) selected @endif value="1"> Afficher</option>
                                    <option @if($chapitre->status ==  0 ) selected @endif value="0"> Non Afficher</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <!-- /row-->
                    <div class="row">

                        <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Ajouter La Formation"></p>

                    </div>
                </div>
                <!-- /box_general-->
            </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection
