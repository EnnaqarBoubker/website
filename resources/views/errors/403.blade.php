@extends("layouts.admin-master")


@section("content")

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2>Cette page est non autorisée </h2>
                <a href="{{ url("admin/coachs") }}"> Retour</a>
            </div>
        </div>
    </div>

@endsection
