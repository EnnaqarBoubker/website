<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Pack;

use App\Http\Requests\packRequest;


class PackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      //var_dump("ok");
        $listPacks = Pack::all();
//        dd($listPacks);
        return view("backend.admin.packs.listpacks",array("packs"=> $listPacks));
    }

    public function create(){
        return view("backend.admin.packs.create");
    }

    public function show(){
//        return view("backend.admin.packs.create");
    }

    public function store(packRequest $request){
        $pack = new Pack();

        $pack->nom = $request->input("nom");
        $pack->duree = $request->input("duree");
        $listtypes  = $request->input("types");
        $pack->types = "";
        if ($listtypes !=null){
            foreach ($listtypes as $type){
                $pack->types .= $type."; ";
            }
        }
        $pack->nbr_videos = $request->input("nbr_videos");
        $pack->status = $request->input("status");


        if($pack->save()){
            // echo message bien ajouter
            session()->flash("success","Le pack a été bien ajouter !");
            return redirect('/admin/packs');
        }else {
            // echo message error
            session()->flash("error","Erreur d\'ajouer le pack !");
            return redirect('/admin/packs');
        }
    }

    public function edit($id){
        $pack = Pack::find($id);
        return view("backend.admin.packs.edit",["pack" => $pack]);
    }

    public function update(packRequest $request,$id){
        $pack = Pack::find($id);

        $pack->nom = $request->input("nom");
        $pack->duree = $request->input("duree");
        $listtypes  = $request->input("types");
        $pack->types = "";
        if ($listtypes !=null){
            foreach ($listtypes as $type){
                $pack->types .= $type."; ";
            }
        }
        $pack->nbr_videos = $request->input("nbr_videos");
        $pack->status = $request->input("status");

        if($pack->save()){
            // echo message bien modifier
            return redirect('/admin/packs/')->with('success_register','Le pack a été bien modifier !');

        }else {
            // echo message error
            return redirect('/admin/packs/')->with('error_register','Erreur de modifier le pack !');

        }

    }

    public function destroy(Request $request,$id){
        $pack = Pack::find($id);

        if($pack->delete()){
            // echo message bien supprimer
            return redirect('/admin/packs/')->with('success_register','Le pack a été bien supprimer !');

        }else {
            // echo message error
            return redirect('/admin/packs/')->with('error_register','Erreur de supprimer le pack !');

        }
    }

}
