<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Pack;
use App\Coach;
use App\Abonnement;


class AbonnementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      //var_dump("ok");
        $listAbonnements = Abonnement::all();
//        dd($listAbonnements);
        return view("backend.admin.abonnements.list-abonnements",array("abonnements"=> $listAbonnements));
    }

    public function create(){
        $packs = Pack::all();
        $coachs = Coach::all();
        return view("backend.admin.abonnements.create",array("packs" => $packs, "coachs" => $coachs));
    }

    public function show(){
//        return view("backend.admin.abonnements.create");
    }

    public function store(Request $request){
        $abonnement = new Abonnement();

        $abonnement->coach_id = $request->input("coach_id");
        $abonnement->pack_id = $request->input("pack_id");
        $abonnement->date_debut = $request->input("date_debut");
        $abonnement->date_fin = $request->input("date_fin");
        $abonnement->status  = 1;

        if($abonnement->save()){
            // echo message bien ajouter
            session()->flash("success","L'abonnement a été bien ajouter !");
            return redirect('/admin/abonnements');
        }else {
            // echo message error
            session()->flash("error","Erreur d'ajouter l'abonnement !");
            return redirect('/admin/abonnements');
        }
    }

    public function edit($id){
        $abonnement = Abonnement::find($id);
        $packs = Pack::all();
        $coachs = Coach::all();
        return view("backend.admin.abonnements.edit",["abonnement" => $abonnement, "packs"=> $packs, "coachs"=>$coachs]);
    }

    public function update(Request $request,$id){
        $abonnement = Abonnement::find($id);

        $abonnement->coach_id = $request->input("coach_id");
        $abonnement->pack_id = $request->input("pack_id");
        $abonnement->date_debut = $request->input("date_debut");
        $abonnement->date_fin = $request->input("date_fin");
        $abonnement->status  = $request->input("status");

        if($abonnement->save()){
            // echo message bien modifier
            session()->flash("success","L 'abonnement a été bien modifier !");
            return redirect('/admin/abonnements');
        }else {
            // echo message error
            session()->flash("error","Erreur de modifier l'abonnement !");
            return redirect('/admin/abonnements');
        }

    }

    public function destroy(Request $request,$id){
        $abonnement = Abonnement::find($id);

        if($abonnement->delete()){
            // echo message bien supprimer
            session()->flash("success","L 'abonnement a été bien supprimer !\"");
            return redirect('/admin/abonnements');

        }else {
            // echo message error
            session()->flash("error","Erreur de supprimer l 'abonnement !");
            return redirect('/admin/abonnements');
        }
    }

}
