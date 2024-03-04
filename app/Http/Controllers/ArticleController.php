<?php

namespace App\Http\Controllers;

use App\Coach;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
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
//            $listArticles = Article::all();
//        }else{
//            $listArticles = Auth::user()->articles;
//        }
        $listArticles = Article::all();

        // dd($listArticles);
        return view("backend.coach.articles.list-articles",array("articles"=> $listArticles));
    }

//    public function show($id){
//
//        return view("backend.coach.articles.create");
//
//    }

    public function create(){
        return view("backend.coach.articles.create");
    }

    public function store(Request $request){


            $article = new Article();

            $article->titre = $request->input("titre");
            $article->date = $request->input("date");
            $article->description = $request->input("description");
            $article->status = $request->input("status");
            $article->nbr_views = 0;
            $coach = Coach::where('user_id', Auth::user()->id)->first();
            $article->coach_id  =$coach->id;

            $fileName = "";
            if ($request->hasFile('image')) {

                $file = $request->file('image');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$article->titre. "." . $file->getClientOriginalExtension();
                $file->move('./assets/articles/', $fileName);

            }
            $article->image = $fileName;


        if($article->save()){
            // echo message bien ajouter
//            return redirect('/admin/articles/')->with('success_register','L'aeticle a été bien ajouter !');
            session()->flash("success","L'aeticle a été bien ajouter !");
            return redirect('/coach-admin/articles');
        }else {
            // echo message error
//            return redirect('/coach-admin/articles/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur d\'ajouer le coach !");
            return redirect('/coach-admin/articles');
        }

    }

    public function edit($id){
        $article = Article::find($id);
//        $this->authorize('update',$coach);
        return view("backend.coach.articles.edit",["article" => $article]);
    }

    public function update(Request $request,$id){

        $article = Article::find($id);

        $article->titre = $request->input("titre");
        $article->date = $request->input("date");
        $article->description = $request->input("description");
        $article->status = $request->input("status");

        $article->nbr_views = $article->nbr_views;
//        $current_user  =  Auth::user()->id;
        $coach = Coach::where('user_id', Auth::user()->id)->first();
//        dd($coach);

        $article->coach_id  = $coach->id;

        $fileName = $article->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileName = "coach-maroc-".$article->titre. "." . $file->getClientOriginalExtension();
            $file->move('./assets/articles/', $fileName);
        }
        $article->image = $fileName;


        if($article->save()){
            // echo message bien ajouter
//            return redirect('/admin/articles/')->with('success_register','L'aeticle a été bien ajouter !');
            session()->flash("success","L'article a été bien modifier !");
            return redirect('/coach-admin/articles');
        }else {
            // echo message error
//            return redirect('/coach-admin/articles/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error","Erreur de modofier l'article !");
            return redirect('/coach-admin/articles');
        }
    }

    public function destroy(Request $request,$id){
        $article = Article::find($id);
        if($article->delete()){
            // echo message bien supprimer
            session()->flash("success","L'article a été bien supprimer !");
            return redirect('/coach-admin/articles');

        }else {
            // echo message error
            session()->flash("error","Erreur de supprimer l'article !");
            return redirect('/coach-admin/articles');
        }
    }
}
