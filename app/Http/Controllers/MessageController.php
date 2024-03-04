<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Coach;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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
            $listMessage = Message::all();
        }else{
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
            $listMessage = $coach->messages;
        }

//        $listMessage = Message::all();

//         dd($listMessage);
        return view("backend.coach.messages.list-messages",array("messages"=> $listMessage));
    }

    public function show(){
        //return view("backend.coach.messages.create");

    }

    public function create(){
        $categories = Categorie::all();
        return view("backend.coach.messages.create",array("categories"=> $categories));
    }

    public function store(Request $request){


            $message = new Message();

            $message->date = date("Y-m-d H:i:s");
            $message->lieu = "";
            $message->new_prix = 0;

            $message->type = $request->input("type");
            $message->categorie_id = $request->input("categorie_id");
            $message->titre = $request->input("titre");
            $message->prix = $request->input("prix");
            $message->description = $request->input("description");
            $message->status = $request->input("status");

            if ($request->input("date") !=null){
                $message->date = $request->input("date");
            }

            if ($request->input("new_prix") !=null){
                $message->new_prix = $request->input("new_prix");
            }

            if ($request->input("lieu") !=null){
                $message->lieu = $request->input("lieu");
            }

            if ($request->input("coach_id") !=null){
                $message->coach_id = $request->input("coach_id");
            }else {
                $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
                $message->coach_id = $coach->id;
            }

            $fileName = "";
            if ($request->hasFile('image')) {

                $file = $request->file('image');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$message->titre. "." . $file->getClientOriginalExtension();
                $file->move('./assets/messages/', $fileName);

            }
            $message->image = $fileName;

            $fileNameVideo = "";
            if ($request->hasFile('video')) {

                $file = $request->file('video');
    //                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileNameVideo = "coach-maroc-".$message->titre. "." . $file->getClientOriginalExtension();
                $file->move('./assets/messages/', $fileNameVideo);

            }
            $message->video = $fileNameVideo;


        if($message->save()){
            // echo message bien ajouter
//            return redirect('/admin/messages/')->with('success_register','La Message a été bien ajouter !');
            session()->flash("success","La Message a été bien ajouter !");
            return redirect('/coach-admin/messages');
        }else {
            // echo message error
//            return redirect('/coach-admin/messages/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur d\'ajouer le coach !");
            return redirect('/coach-admin/messages');
        }

    }

    public function edit($id){
        $message = Message::find($id);
        $categories = Categorie::all();
//        $this->authorize('update',$coach);
        return view("backend.coach.messages.edit",["message" => $message,"categories"=> $categories]);
    }

    public function update(Request $request,$id){

        $message = Message::find($id);

        $message->date = date("Y-m-d H:i:s");
        $message->lieu = "";
        $message->new_prix = 0;

        $message->type = $request->input("type");
        $message->categorie_id = $request->input("categorie_id");
        $message->titre = $request->input("titre");
        $message->prix = $request->input("prix");
        $message->description = $request->input("description");
        $message->status = $request->input("status");

        if ($request->input("date") !=null){
            $message->date = $request->input("date");
        }

        if ($request->input("new_prix") !=null){
            $message->new_prix = $request->input("new_prix");
        }

        if ($request->input("lieu") !=null){
            $message->lieu = $request->input("lieu");
        }

        if ($request->input("coach_id") !=null){
            $message->id_coach = $request->input("coach_id");
        }else {
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
            $message->coach_id = $coach->id;
        }

        $fileName = $message->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileName = "coach-maroc-".$message->titre. "." . $file->getClientOriginalExtension();
            $file->move('./assets/messages/', $fileName);
        }
        $message->image = $fileName;

        $fileNameVideo = $message->video;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            //                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileNameVideo = "coach-maroc-".$message->titre. "." . $file->getClientOriginalExtension();
            $file->move('./assets/messages/', $fileNameVideo);
        }
        $message->video = $fileNameVideo;


        if($message->save()){
            // echo message bien ajouter
//            return redirect('/admin/messages/')->with('success_register','La Message a été bien ajouter !');
            session()->flash("success","La Message a été bien modifier !");
            return redirect('/coach-admin/messages');
        }else {
            // echo message error
//            return redirect('/coach-admin/messages/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur de modofier le message !");
            return redirect('/coach-admin/messages');
        }
    }

    public function destroy(Request $request,$id){
        $message = Message::find($id);

        if($message->delete()){
            // echo message bien supprimer
            session()->flash("success",'La Message a été bien supprimer !');
            return redirect('/coach-admin/messages');

        }else {
            // echo message error
            session()->flash("success",'Erreur de supprimer le message !');
            return redirect('/coach-admin/messages');
        }
    }
}
