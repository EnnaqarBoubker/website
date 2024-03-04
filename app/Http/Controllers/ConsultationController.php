<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Coach;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Consultation;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
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
            $listConsultation = Consultation::all();
        }else{
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
            $listConsultation = $coach->consultations;
        }

//        $listConsultation = Consultation::all();

//         dd($listConsultation);
        return view("backend.coach.consultations.list-consultations",array("consultations"=> $listConsultation));
    }

    public function show(){
        //return view("backend.coach.consultations.create");

    }

    public function create(){
        $categories = Categorie::all();
        return view("backend.coach.consultations.create",array("categories"=> $categories));
    }

    public function store(Request $request){


            $consultation = new Consultation();

            $consultation->date = date("Y-m-d H:i:s");
            $consultation->lieu = "";
            $consultation->new_prix = 0;

            $consultation->type = $request->input("type");
            $consultation->categorie_id = $request->input("categorie_id");
            $consultation->titre = $request->input("titre");
            $consultation->prix = $request->input("prix");
            $consultation->description = $request->input("description");
            $consultation->status = $request->input("status");

            if ($request->input("date") !=null){
                $consultation->date = $request->input("date");
            }

            if ($request->input("new_prix") !=null){
                $consultation->new_prix = $request->input("new_prix");
            }

            if ($request->input("lieu") !=null){
                $consultation->lieu = $request->input("lieu");
            }

            if ($request->input("coach_id") !=null){
                $consultation->coach_id = $request->input("coach_id");
            }else {
                $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
                $consultation->coach_id = $coach->id;
            }

            $fileName = "";
            if ($request->hasFile('image')) {

                $file = $request->file('image');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$consultation->titre. "." . $file->getClientOriginalExtension();
                $file->move('./assets/consultations/', $fileName);

            }
            $consultation->image = $fileName;

            $fileNameVideo = "";
            if ($request->hasFile('video')) {

                $file = $request->file('video');
    //                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileNameVideo = "coach-maroc-".$consultation->titre. "." . $file->getClientOriginalExtension();
                $file->move('./assets/consultations/', $fileNameVideo);

            }
            $consultation->video = $fileNameVideo;


        if($consultation->save()){
            // echo message bien ajouter
//            return redirect('/admin/consultations/')->with('success_register','La consultation a été bien ajouter !');
            session()->flash("success","La consultation a été bien ajouter !");
            return redirect('/coach-admin/consultations');
        }else {
            // echo message error
//            return redirect('/coach-admin/consultations/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur d\'ajouer le coach !");
            return redirect('/coach-admin/consultations');
        }

    }

    public function edit($id){
        $consultation = Consultation::find($id);
        $categories = Categorie::all();
//        $this->authorize('update',$coach);
        return view("backend.coach.consultations.edit",["consultation" => $consultation,"categories"=> $categories]);
    }

    public function update(Request $request,$id){

        $consultation = Consultation::find($id);

        $consultation->date = date("Y-m-d H:i:s");
        $consultation->lieu = "";
        $consultation->new_prix = 0;

        $consultation->type = $request->input("type");
        $consultation->categorie_id = $request->input("categorie_id");
        $consultation->titre = $request->input("titre");
        $consultation->prix = $request->input("prix");
        $consultation->description = $request->input("description");
        $consultation->status = $request->input("status");

        if ($request->input("date") !=null){
            $consultation->date = $request->input("date");
        }

        if ($request->input("new_prix") !=null){
            $consultation->new_prix = $request->input("new_prix");
        }

        if ($request->input("lieu") !=null){
            $consultation->lieu = $request->input("lieu");
        }

        if ($request->input("coach_id") !=null){
            $consultation->id_coach = $request->input("coach_id");
        }else {
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
            $consultation->coach_id = $coach->id;
        }

        $fileName = $consultation->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileName = "coach-maroc-".$consultation->titre. "." . $file->getClientOriginalExtension();
            $file->move('./assets/consultations/', $fileName);
        }
        $consultation->image = $fileName;

        $fileNameVideo = $consultation->video;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            //                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileNameVideo = "coach-maroc-".$consultation->titre. "." . $file->getClientOriginalExtension();
            $file->move('./assets/consultations/', $fileNameVideo);
        }
        $consultation->video = $fileNameVideo;


        if($consultation->save()){
            // echo message bien ajouter
//            return redirect('/admin/consultations/')->with('success_register','La consultation a été bien ajouter !');
            session()->flash("success","La consultation a été bien modifier !");
            return redirect('/coach-admin/consultations');
        }else {
            // echo message error
//            return redirect('/coach-admin/consultations/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur de modofier la consultation !");
            return redirect('/coach-admin/consultations');
        }
    }

    public function destroy(Request $request,$id){
        $consultation = Consultation::find($id);

        if($consultation->delete()){
            // echo message bien supprimer
            session()->flash("success",'La consultation a été bien supprimer !');
            return redirect('/coach-admin/consultations');

        }else {
            // echo message error
            session()->flash("success",'Erreur de supprimer la consultation !');
            return redirect('/coach-admin/consultations');
        }
    }
}
