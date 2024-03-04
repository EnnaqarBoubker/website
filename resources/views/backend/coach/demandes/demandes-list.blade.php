@extends("layouts.coach-master")

@section("content")

    <div class="content-wrapper">
    <div class="container-fluid">
		@if( session()->has('success') )
			<div class="alert alert-success">
				{{ session()->get('success') }}
			</div>
		@endif
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Demandes de formations</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Les demandes</h2>
				<div class="filter">
					<select name="orderby" class="selectbox">
						<option value="Any status">--Tout--</option>
						<option value="Approved">Validé</option>
						<option value="Pending">En attente</option>
						<option value="Cancelled">Annulé</option>
					</select>
				</div>
			</div>
			<div class="list_general">
				<ul>
					@foreach($demandes as $obj )
                        @php
							$user = getUserById( $obj->user_id);
							//dd($user);
							if ( $user->role == 1) $benificier = geStudentByUSER_Id($obj->user_id);
							elseif ( $user->role == 2) $benificier = getCoachByUSER_Id($obj->user_id);

						@endphp

					<li>
						<figure><img src=@if($benificier->photo !="" && $benificier->photo !=null) @if($user->role == 2) {{ asset('assets/coachs/'.$benificier->photo) }} @elseif($user->role == 1) {{ asset('assets/students/'.$benificier->photo) }}	@endif @else {{ asset('assets/frontend/img/logo_found.JPG') }} @endif alt=""></figure>
						<h4>La formation demandé: {{ getNameFormationById($obj->formation_id) }} <i class="@if($obj->validation == 0 || $obj->validation == 1) {{ "pending" }} @elseif($obj->validation == 2) {{ "approved" }} @elseif($obj->validation == -1) {{ "cancel" }}  @endif ">@if($obj->validation == 0 || $obj->validation == 1) {{ "En attente" }} @elseif($obj->validation == 2) {{ "Validé" }} @elseif($obj->validation == -1) {{ "Annulé" }}  @endif </i></h4>
						<ul class="course_list">
							<li><strong>Nom Complet : </strong> {{ $benificier->nom }} {{ $benificier->prenom }}</li>
							<li><strong>Téléphone : </strong>  {{ $benificier->tel }} </li>
							<li><strong>Date de demande : </strong>  {{ $obj->created_at }} </li>
							<li><strong>Date de paiement : </strong> @if($obj->validation == 0  ||  $obj->validation == -1)  {{ "--/--/--" }} @elseif($obj->validation >= 1) {{ $obj->date_validation }} @endif</li>
							<li><strong>La formation demander : </strong> {{ getNameFormationById( $obj->formation_id) }}</li>
							<li><strong>Paiement : </strong> @if( $obj->validation == 0 ||  $obj->validation == -1)  {{ "Impayé" }} @elseif($obj->validation == 1 || $obj->validation == 2) {{ "Payé" }}
								<a class="mr-2 btn btn-success btn-sm" href="{{ asset("assets/recus/".$obj->recu ) }}" download="download"><i class="fa fa-download"></i> Télécharger le reçu</a> @endif
							</li>
							<li> @if($obj->validation == -1)<strong>Remarque : </strong> {{ $obj->remarque }}  @endif</li>
                            <ul class="buttons">
								<li><button data-id="{{ $obj->id }}" type="submit" data-toggle="modal"
											data-target="#validerModal" class=" btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Valider</button></li>
{{--                                <li><button class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Contacter</button></li>--}}
                                <li><button data-id="{{ $obj->id }}" type="submit" data-toggle="modal"
											data-target="#refuserModal" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Refuser</button></li>
                            </ul>
						</ul>
					</li>

					@endforeach
					
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
	<!-- valider Warning Modal -->
	<div class="modal modal-danger fade" id="validerModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Valider La demande</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="confirmed" action="" method="post">

						{{ csrf_field() }}

						<input type="hidden" id="iddemande" name="iddemande">
						<h5 class="text-center">Êtes-vous sûr de vouloir valider cette demande ?</h5>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Annuler</button>
							<button type="submit" class="btn btn-sm btn-success">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End valider Modal -->

	<!-- refuser Warning Modal -->
	<div class="modal modal-danger fade" id="refuserModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Valider La demande</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="confirmed_r" action="" method="post">

						{{ csrf_field() }}

						<input type="hidden" id="iddemande_r" name="iddemande_r">
						<h5 class="text-center">Êtes-vous sûr de vouloir refuser cette demande ?</h5>
						<hr>
						<div class="form-group">
							<label for="remarque" class="form-control text-center"> Donner une justification</label>
							<textarea placeholder="Tappez ici votre remarque..." name="remarque" class="form-control" id="remarque" cols="30" rows="3"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Annuler</button>
							<button type="submit" class="btn btn-sm btn-danger">Refuser</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End refuser Modal -->

@endsection
<script src="{{ asset("assets/frontend") }}/js/jquery-2.2.4.min.js"></script>

<script>

	$(document).on('click','.approve',function(){

		let id = $(this).attr('data-id');

		$('#iddemande').val(id);

		$('#confirmed').attr('action' , "{{ url('coach-admin/valider-demande') }}" +"/"+id );

	});
</script>

<script>

	$(document).on('click','.delete',function(){

		let id = $(this).attr('data-id');

		$('#iddemande_r').val(id);

		$('#confirmed_r').attr('action' , "{{ url('coach-admin/refuser-demande') }}" +"/"+id );

	});
</script>
<!-- /container-wrapper-->