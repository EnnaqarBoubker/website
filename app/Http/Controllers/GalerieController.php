<?php

namespace App\Http\Controllers;

use App\Coach;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Galerie;
use Illuminate\Support\Facades\Auth;

class GalerieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //$id_coach = Auth::user()->id;
       // dd($id_coach);
//      var_dump("ok");die;
//        if (Auth::user()->role == 2){
//            $listGaleries = Galerie::all();
//        }else{
//            $listGaleries = Auth::user()->galeries;
//        }
        $coach = Coach::where('user_id', Auth::user()->id)->first();
        $listGaleries = Galerie::where('coach_id', $coach->id)->get();

        // dd($listGaleries);
        return view("backend.coach.galeries.list-galeries",array("galeries"=> $listGaleries));
    }

//    public function show($id){
//
//        return view("backend.coach.galeries.create");
//
//    }

    public function create(){
        return view("backend.coach.galeries.create");
    }


    public function store(Request $request){


            $source_galerie = new Galerie();
            if ( $request->input("titre") !=null){
                $source_galerie->titre = $request->input("titre");
            }else{
                $source_galerie->titre ="";
            }

            $source_galerie->lien = $request->input("lien");
            $source_galerie->type = $request->input("type");

            $source_galerie->status = $request->input("status");

            $coach = Coach::where('user_id', Auth::user()->id)->first();
            $source_galerie->coach_id  =$coach->id;


        if($source_galerie->save()){
            // echo message bien ajouter
//            return redirect('/admin/galeries/')->with('success_register','L'aeticle a été bien ajouter !');
            session()->flash("success","L'aeticle a été bien ajouter !");
            return redirect('/coach-admin/galeries');
        }else {
            // echo message error
//            return redirect('/coach-admin/galeries/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur d\'ajouer le coach !");
            return redirect('/coach-admin/galeries');
        }

    }

    public function edit($id){
        $source_galerie = Galerie::find($id);
//        $this->authorize('update',$coach);
        return view("backend.coach.galeries.edit",["galerie" => $source_galerie]);
    }

    public function update(Request $request,$id){

        $source_galerie = Galerie::find($id);

        if ( $request->input("titre") !=null){
            $source_galerie->titre = $request->input("titre");
        }else{
            $source_galerie->titre = $source_galerie->titre;
        }

        $source_galerie->lien = $request->input("lien");
        $source_galerie->type = $request->input("type");

        $source_galerie->status = $request->input("status");

        $coach = Coach::where('user_id', Auth::user()->id)->first();
        $source_galerie->coach_id  =$coach->id;

        if($source_galerie->save()){
            // echo message bien ajouter
//            return redirect('/admin/galeries/')->with('success_register','L'aeticle a été bien ajouter !');
            session()->flash("success","La source a été bien modifier !");
            return redirect('/coach-admin/galeries');
        }else {
            // echo message error
//            return redirect('/coach-admin/galeries/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur de modofier la source !");
            return redirect('/coach-admin/galeries');
        }
    }

    public function destroy(Request $request,$id){
        $source_galerie = Galerie::find($id);
        if($source_galerie->delete()){
            // echo message bien supprimer
            session()->flash("success","La source a été bien supprimer !");
            return redirect('/coach-admin/galeries');

        }else {
            // echo message error
            session()->flash("success","Erreur de supprimer la source !");
            return redirect('/coach-admin/galeries');
        }
    }
}
