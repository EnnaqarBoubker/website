@extends("layouts.admin-master")

@section("content")

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Ajouter un pack</li>
            </ol>
            <form method="post" action="{{url("admin/packs")}}">
            {{ csrf_field() }}
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                </div>
                <!-- /row-->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if($errors->get('nom')) has-error @endif ">
                            <label>Nom du Pack <span class="required">*</span></label>
                            <input type="text" value="{{ old('nom') }}" placeholder="Tappez le nom du pack ici..." class="form-control"  required name="nom">
                            @if($errors->get('nom'))
                                @foreach($errors->get('nom') as $message)
                                    <li class="required">
                                        {{ $message }}
                                    </li>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @if($errors->get('duree')) has-error @endif ">
                            <label>La durée du pack <span class="required">*</span></label>
                            <input type="number" value="{{ old('duree') }}" placeholder="1" min="1" max="12" class="form-control"  required name="duree">
                            @if($errors->get('duree'))
                                @foreach($errors->get('duree') as $message)
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
                       <div class="form-group @if($errors->get('types')) has-error @endif ">
                           <label>Les types de formations <span class="required">*</span></label>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox1" name="types[]" value="Formation sur place">
                                        <label for="customCheckbox1" class="checkbox-inline"> Formation sur place</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox2" name="types[]" value="Formation en ligne">
                                        <label for="customCheckbox2" class="checkbox-inline"> Formation en ligne</label>
                                    </div>
                                </div>
                            </div>
                           <div class="row form-group">
                               <div class="col-6">
                                   <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox3" name="types[]" value="Formation live">
                                       <label for="customCheckbox3" class="checkbox-inline"> Formation live</label>
                                   </div>
                               </div>
                               <div class="col-6">
                                   <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox4" name="types[]" value="Consultation sur place">
                                       <label for="customCheckbox4" class="checkbox-inline">Consultation sur place</label>
                                   </div>
                               </div>
                           </div>
                           <div class="row form-group">
                               <div class="col-6">
                                   <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox5" name="types[]" value="Consultation en ligne">
                                       <label for="customCheckbox5" class="checkbox-inline">Consultation en ligne</label>
                                   </div>
                               </div>
                               <div class="col-6">
                                   <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox6" name="types[]" value="Consultation live">
                                       <label for="customCheckbox6" class="checkbox-inline">Consultation live</label>
                                   </div>
                               </div>
                           </div>

                           @if($errors->get('types'))
                               @foreach($errors->get('types') as $message)
                                   <li class="required">
                                       {{ $message }}
                                   </li>
                               @endforeach
                           @endif
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group @if($errors->get('nbr_videos')) has-error @endif ">
                           <label>Nombre de vidéos <span class="required">*</span></label>
                           <input type="number" value="{{ old('nbr_videos') }}" placeholder="50" min="1" max="2000" class="form-control"  required name="nbr_videos">
                           @if($errors->get('nbr_videos'))
                               @foreach($errors->get('nbr_videos') as $message)
                                   <li class="required">
                                       {{ $message }}
                                   </li>
                               @endforeach
                           @endif
                       </div>
                   </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Statut <span class="required">*</span></label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="1">Afficher</option>
                                <option value="0">Non Aficher</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Enregistrer"></p>
                </div>
            </div>
            <!-- /box_general-->


        </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection