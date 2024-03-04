@extends("layouts.admin-master")

@section("content")

    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Détails du profil</li>
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-user"></i>Mes informations</h2>
			</div>
		</div>
		<!-- /box_general-->
		<div class="row">
			<div class="col-md-6">
                <form  method="post" action="{{ url('admin/changepassword') }}">
                    {{ csrf_field() }}
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h2><i class="fa fa-lock"></i>Changer le mot de passe</h2>
                        </div>
                        <div class="form-group">
                            <label>Nouveau mot de passe</label>
                            <input class="form-control" name="password" required type="password">
                        </div>
                        <div class="form-group">
                            <label>Confirmer le nouveau mot de pass</label>
                            <input class="form-control" type="password" required>
                        </div>

                        <p class="text-center"><input type="submit" class="btn_1 medium" value="Metre à jour"></p>
                    </div>
                </form>
			</div>
			<div class="col-md-6">
                <form  method="post" action="{{ url('admin/changeemail') }}">
                    {{ csrf_field() }}
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-envelope"></i>Changer l'email</h2>
					</div>
					<div class="form-group">
						<label>Ancien email</label>
						<input class="form-control" readonly value="{{ $oldemail }}">
					</div>
					<div class="form-group">
						<label>Nouveau email</label>
						<input class="form-control" required name="new_email" id="new_email" type="email">
					</div>
					<div class="form-group">
						<label>Confirmer le nouveau email</label>
						<input class="form-control" required name="confirm_new_email" id="confirm_new_email" type="email">
					</div>
                    <p class="text-center"><input type="submit" class="btn_1 medium" value="Metre à jour"></p>
				</div>
                </form>
			</div>
		</div>
		<!-- /row-->

	  </div>
	  <!-- /.container-fluid-->
   	</div>
@endsection