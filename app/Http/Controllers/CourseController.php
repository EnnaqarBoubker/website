<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Coach;
use App\Formation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

       // echo phpinfo();
        //die;
//        $id_coach = Auth::user()->id;
       // dd($id_coach);
//      var_dump("ok");die;

        if (Auth::user()->role == 3){
            $listCourse = Course::all();
        }else{
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
            $listCourse = $coach->courses;
        }

        $listCourse = Course::all();

//         dd($listCourse);
        return view("backend.coach.formations.cours.list-courses",array("courses" => $listCourse));
    }

    public function show(){
        //return view("backend.coach.formations.cours.create");

    }

    public function create(){
        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
        $formations = $coach->formations;
        return view("backend.coach.formations.cours.create",array("formations"=> $formations));
    }

    public function store(Request $request){

            $cour = new Course();

            $cour->titre = $request->input("titre");
            $cour->type_cours = $request->input("type_cours");
            $cour->status = $request->input("status");

            $fileName = "";
            if ($request->hasFile('pdf_url')) {

                $file = $request->file('pdf_url');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-file-".$cour->titre. "." . $file->getClientOriginalExtension();
                $file->move('./assets/courses/', $fileName);

            }
            $cour->pdf_url = $fileName;

            $fileNameVideo = "";
            if ($request->hasFile('video_url')) {

                $file = $request->file('video_url');
    //                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileNameVideo = "coach-maroc-video-".$cour->titre. "." . $file->getClientOriginalExtension();
                $file->move('./assets/courses/', $fileNameVideo);

            }
            $cour->video_url = $fileNameVideo;

            if ($request->input("video_name") !=null && $request->input("video_name") !=""){
                $cour->video_url = trim($request->input("video_name"));
            }


        $chapitres = $request->input("chapitres");

        foreach ($chapitres as $ch){
            $data[] = $ch;
        }

        if($cour->save()){
            // echo message bien ajouter
            $cour->chapitres()->attach($data);

            session()->flash("success","Le Cours a été bien ajouter !");
            return redirect('/coach-admin/formations-courses');
        }else {
            // echo message error
//            return redirect('/coach-admin/formations-courses/')->with('error_register','Erreur d\'ajouer le cours !');
            session()->flash("error","Erreur d\'ajouer le cours !");
            return redirect('/coach-admin/formations-courses');
        }

    }

    public function edit($id){
        $cours = Course::find($id);
        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();

        $formations = $coach->formations;
//        $this->authorize('update',$coach);
        return view("backend.coach.formations.cours.edit",["cours" => $cours,"formations"=> $formations]);
    }

    public function update(Request $request,$id){

        $cour = Course::find($id);

        $cour->titre = $request->input("titre");
        $cour->type_cours = $request->input("type_cours");
        $cour->status = $request->input("status");

        $fileName = $cour->pdf_url;
        if ($request->hasFile('pdf_url')) {

            $file = $request->file('pdf_url');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileName = "coach-maroc-file-".$cour->titre. "." . $file->getClientOriginalExtension();
            $file->move('./assets/courses/', $fileName);

        }
        $cour->pdf_url = $fileName;

        $fileNameVideo = $cour->video_url;
        if ($request->hasFile('video_url')) {

            $file = $request->file('video_url');
            //                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileNameVideo = "coach-maroc-video-".$cour->titre. "." . $file->getClientOriginalExtension();
            $file->move('./assets/courses/', $fileNameVideo);

        }
        $cour->video_url = $fileNameVideo;

        if ($request->input("video_name") !=null && $request->input("video_name") !=""){
            $cour->video_url = trim($request->input("video_name"));
        }

        $chapitres = $request->input("chapitres");

        foreach ($chapitres as $ch){
            $data[] = $ch;
        }

        if($cour->save()){
            $cour->chapitres()->sync($data);
//            return redirect('/admin/courses/')->with('success_register','Le Cours a été bien ajouter !');
            session()->flash("success","Le Cours a été bien modifier !");
            return redirect('/coach-admin/formations-courses');
        }else {
            // echo message error
//            return redirect('/coach-admin/formations-courses/')->with('error_register','Erreur d\'ajouer le cours !');
            session()->flash("error","Erreur de modofier la formation !");
            return redirect('/coach-admin/formations-courses');
        }
    }

    public function destroy(Request $request,$id){
        $cour = Course::find($id);

        if($cour->delete()){
            // echo message bien supprimer
            session()->flash("success",'Le Cours a été bien supprimer !');
            return redirect('/coach-admin/formations-courses');

        }else {
            // echo message error
            session()->flash("success",'Erreur de supprimer la formation !');
            return redirect('/coach-admin/formations-courses');
        }
    }
}
