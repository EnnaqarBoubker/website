<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Coach;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests\catRequest;

class StudentController extends Controller
{

    public function index(){

//      var_dump("ok");die;
//        if (Auth::user()->role == 2){
//            $listCoachs = Student::all();
//        }else{
//            $listCoachs = Auth::user()->students;
//        }
        $listStudents = Student::all();

       // dd($listCoachs);
        return view("backend.admin.students.list-students",array("students"=> $listStudents));
    }

    public function show(){
        //return view("backend.admin.students.create");

    }

    public function create(){
        return view("backend.admin.students.create");
    }

    public function store(Request $request){

        $user = new User();
        $user->name = "";
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if($user->save()){

            $student = new Coach();

            $student->user_id = $user->id;
            $student->nom = $request->input("nom");
            $student->prenom = $request->input("prenom");
            $student->tel = $request->input("tel");
            $student->ville = $request->input("ville");
            $student->status = 1;

            $fileName = null;
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$student->nom.'-'.$student->prenom. "." . $file->getClientOriginalExtension();
                $file->move('./assets/students/', $fileName);
            }
            $student->photo = $fileName;

            if($student->save()){
                // echo message bien ajouter
//            return redirect('/admin/students/')->with('success_register','Le Coach a été bien ajouter !');
                session()->flash("success","Le Coach a été bien ajouter !");
                return redirect('/admin/students');
            }else {
                // echo message error
//            return redirect('/admin/students/')->with('error_register','Erreur d\'ajouer le coach !');
                session()->flash("error","Erreur d\'ajouer le coach !");
                return redirect('/admin/students');
            }
        }


    }

    public function edit($id){
        $student = Student::find($id);

//        $this->authorize('update',$student);

        return view("backend.admin.students.edit",["coach" => $student]);
    }

    public function update(Request $request,$id){
        $student = Student::find($id);

        $user =  User::find($student->user_id);

        if ( trim($request->input('password')) !=""){
            $user->email =  $request->input('email');
            $user->password =  bcrypt($request->input('password'));
        }

        if ($user->save()){

            $student->nom = $request->input("nom");
            $student->prenom = $request->input("prenom");
            $student->tel = $request->input("tel");
            $student->ville = $request->input("ville");
            $student->status = $request->input("status");


//            if ($request->hasFile('photo')){
//                $student->photo =  $request->photo->store('students');
//            }

            $fileName = null;
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$student->nom.'-'.$student->prenom. "." . $file->getClientOriginalExtension();
                $file->move('./assets/students/', $fileName);
            }

            $student->photo = $fileName;

            if($student->save()){
                // echo message bien ajouter
//            return redirect('/admin/students/')->with('success_register','Le Coach a été bien ajouter !');
                session()->flash("success","Le Coach a été bien modifier !");
                return redirect('/admin/students');
            }else {
                // echo message error
//            return redirect('/admin/students/')->with('error_register','Erreur d\'ajouer le coach !');
                session()->flash("error","Erreur de modifier le coach !");
                return redirect('/admin/students');
            }

        }

    }

    public function destroy(Request $request,$id){
        $student = Student::find($id);

        if($student->delete()){
            // echo message bien supprimer
            session()->flash("success",'Le Bénéficiaire a été bien supprimer !');
            return redirect('/admin/students');

        }else {
            // echo message error
            session()->flash("success",'Erreur de supprimer le Bénéficiaire !');
            return redirect('/admin/students');
        }
    }

}
