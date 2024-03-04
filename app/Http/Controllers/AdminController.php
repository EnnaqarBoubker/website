<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Coach;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests\catRequest;

class AdminController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
//        $this->authorize("view",true);
//        dd("okk");

        return view('backend.admin.index');
    }


    public function changepassword(Request $request){
//      var_dump("ok");die;
       // dd(Auth::user()->id);

        $user = Auth::user();
        $user->password = bcrypt($request->input('new_email'));
        if($user->save()){
            session()->flash("success","Le Mot de passe a été bien modifer !");
            return redirect('/admin');
        }else {
            // echo message error
//            return redirect('/admin/coachs/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur de modification du mot de passe !");
            return redirect('/admin');
        }

    }

    public function changeemail(Request $request){
        $user = Auth::user();
        $user->email = $request->input('new_email');
//        dd()
        if($user->save()){
            session()->flash("success","Votre email a été bien modifer !");
            return redirect('/admin');
        }else {
            session()->flash("error","Erreur de modification email!");
            return redirect('/admin');
        }
    }


    public function profile(){
        $user = Auth::user();
//        dd($user->email);
        return view('backend/admin/profile',array("oldemail" => $user->email));
    }

    public function create(){
    }

    public function store(Request $request){
    }

    public function edit($id){
    }

    public function update(Request $request,$id){


    }

    public function destroy(Request $request,$id){

    }


}
