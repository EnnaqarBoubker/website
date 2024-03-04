<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Coach;
use App\Formation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Chapitre;
use Illuminate\Support\Facades\Auth;

class ChapitreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
//        $id_coach = Auth::user()->id;
       // dd($id_coach);
//      var_dump("ok");die;

        if (Auth::user()->role == 3){
            $listChapitre = Chapitre::all();
        }else{
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();

//            $listChapitre = Chapitre::select('*')->where();
        }

        $listChapitre = Chapitre::all();

//         dd($listChapitre);
        return view("backend.coach.formations.chapitres.list-chapitres",array("chapitres"=> $listChapitre));
    }

    public function show(){
        //return view("backend.coach.formations.chapitres.create");

    }

    public function create(){

        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
        $listFormation = $coach->formations;

        return view("backend.coach.formations.chapitres.create",array("formations"=> $listFormation));
    }

    public function store(Request $request){


            $chapitre = new Chapitre();
            $chapitre->titre = $request->input("titre");
            $chapitre->status = $request->input("status");

            $formations = $request->input("formations");

            foreach ($formations as $f){
                $data[] = $f;
            }
//            dd($data);
//            die;

            if($chapitre->save()){

                $chapitre->formations()->attach($data);

                //$chapitre->formations()->sync($formations); //pour ecraser si existe.
            /* ajouter enrrollemnt*/


                // echo message bien ajouter
    //            return redirect('/admin/chapitres/')->with('success_register','La Chapitre a été bien ajouter !');
                session()->flash("success","Le Chapitre a été bien ajouter !");
                return redirect('/coach-admin/formations-chapitres');
            }else {
                // echo message error
    //            return redirect('/coach-admin/formations-chapitres/')->with('error_register','Erreur d\'ajouer le coach !');
                session()->flash("error","Erreur d\'ajouer le coach !");
                return redirect('/coach-admin/formations-chapitres');
            }

    }

    public function edit($id){
        $chapitre = Chapitre::find($id);
        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
        $formations = $coach->formations;

//      $this->authorize('update',$coach);
        return view("backend.coach.formations.chapitres.edit",["chapitre" => $chapitre,"formations"=> $formations]);
    }

    public function update(Request $request,$id){

        $chapitre = Chapitre::find($id);

        $chapitre->titre = $request->input("titre");
        $chapitre->status = $request->input("status");

        $formations = $request->input("formations");

        foreach ($formations as $f){
            $data[] = $f;
        }

        if($chapitre->save()){
            $chapitre->formations()->sync($data);
            // echo message bien ajouter
//            return redirect('/admin/chapitres/')->with('success_register','La Chapitre a été bien ajouter !');
            session()->flash("success","Le Chapitre a été bien modifier !");
            return redirect('/coach-admin/formations-chapitres');
        }else {
            // echo message error
//            return redirect('/coach-admin/formations-chapitres/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur de modifier le chapitre !");
            return redirect('/coach-admin/formations-chapitres');
        }
    }

    public function destroy(Request $request,$id){
        $chapitre = Chapitre::find($id);

        if($chapitre->delete()){
            // echo message bien supprimer
            session()->flash("success",'Le Chapitre a été bien supprimer !');
            return redirect('/coach-admin/formations-chapitres');

        }else {
            // echo message error
            session()->flash("success",'Erreur de supprimer le hcapitre !');
            return redirect('/coach-admin/formations-chapitres');
        }
    }
}
