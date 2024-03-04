<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Categorie;

use App\Http\Requests\catRequest;
use Illuminate\Support\Facades\Auth;
use Validator;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
//        $this->authorize("view",true);
      //var_dump("ok");
        $listCategories = Categorie::all();
//        dd($listCategories);
        return view("backend.admin.categories.list-categories",array("categories"=> $listCategories));
    }

    public function create(){
        return view("backend.admin.categories.create");
    }

    public function store(catRequest $request){

        $categorie = new Categorie();

        $categorie->nom = $request->input("nom");
        $categorie->status = $request->input("status");

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $categorie->nom. "-coach-maroc" . "." . $file->getClientOriginalExtension();
            $file->move('./assets/categories/', $fileName);
        }
       // dd($fileName);
        $categorie->image = $fileName;

        if($categorie->save()){
            // echo message bien ajouter
            session()->flash("success","La catégorie a été bien ajouter !");
            return redirect('/admin/categories');
        }else {
            // echo message error
            session()->flash("error","Erreur d\'ajouer la catégorie !");
            return redirect('/admin/categories');
        }
    }

    public function edit($id){
        $categorie = Categorie::find($id);
        return view("backend.admin.categories.edit",["categorie" => $categorie]);
    }

    public function update(Request $request, $id){
        $categorie = Categorie::find($id);

        $categorie->nom = $request->input("nom");
        $categorie->status = $request->input("status");
//        dd($categorie);
        $fileName = $categorie->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $categorie->nom. "-coach-maroc" . "." . $file->getClientOriginalExtension();
            $file->move('./assets/categories/', $fileName);
        }
        //dd($fileName);
        $categorie->image = $fileName;

        if($categorie->save()){
            // echo message bien modifier
            session()->flash("success","La catégorie a été bien modifier !!");
            return redirect('/admin/categories');
        }else {
            // echo message error

            session()->flash("error",'Erreur de modifier la catégorie !');
            return redirect('/admin/categories');

        }

    }

    public function destroy(Request $request,$id){
        $categorie = Categorie::find($id);

        if($categorie->delete()){
            // echo message bien supprimer
            return redirect('/admin/categories/')->with('success','La catégorie a été bien supprimer !');

        }else {
            // echo message error
            return redirect('/admin/categories/')->with('error','Erreur de supprimer la catégorie !');

        }
    }

}
