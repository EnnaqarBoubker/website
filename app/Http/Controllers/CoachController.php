<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use File;
use App\Coach;
use DB;
use App\Helpers;
use Illuminate\Support\Facades\Auth;
use Session;

class CoachController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

//      var_dump("ok");die;
//        if (Auth::user()->role == 2){
//            $listCoachs = Coach::all();
//        }else{
//            $listCoachs = Auth::user()->coachs;
//        }
        $listCoachs = Coach::all();

       // dd($listCoachs);
        return view("backend.admin.coachs.list-coachs",array("coachs"=> $listCoachs));
    }

    public function students(){

//        $listUsers = User::whereBetween('role', [1, 2])->get();
        $listUsers = DB::table("students")
            ->where("deleted_at" , null)
            ->orderBy('id', 'desc')
            ->get();
//        dd($listUsers);

        return view("backend.coach.students.list-users", array("userslist"=> $listUsers));
    }


    public function studentdelete(Request $request,$id){

//        dd($id);

        $student = Student::find($id);
//        $user = User::find($student->user_id);
        if($student->delete()){

//            $user->delete();
            // echo message bien supprimer
            session()->flash("success",'Le bénéficiere a été bien supprimer !');
            return redirect('/coach-admin/students');

        }else {
            // echo message error
            session()->flash("success",'Erreur de supprimer le bénéficiere !');
            return redirect('/coach-admin/students');
        }


    }

    public function studentspermessions($id_user){

        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
        $formations = $coach->formations;

        $user  = DB::table("users")
            ->where("id" , $id_user)
            ->first();

//        $formations_user  = DB::table("formation_user")
//            ->select("formation_id")
//            ->where("user_id" , $id_user)
//            ->where("validation" , 2)
//            ->get();
//        dd($formations_user);
        return view("backend.coach.students.permissions",array("user"=> $user, "formations"=>$formations));
    }

    public function givepermissions(Request $request){

        $formations_ids = $request->input('formations_ids');
        $user =  User::find($request->input('user_id'));

        if ($formations_ids == null || $formations_ids==""){
            DB::table('formation_user')->where('user_id', $user->id)->delete();
        }else{

//        dd($user);
            $user->formations()->sync($formations_ids);

            $date_current = date("Y-m-d H:i:s");

            foreach ($formations_ids as $id){
                DB::table('formation_user')->where(['formation_id' => $id, 'user_id'=> $user->id])->update([ "validation"=> 2, "date_validation"=> $date_current]);
            }

        }

        session()->flash("success","Bien effectuer !!!");
        return redirect('/coach-admin/students');
    }


    public function show(){
        //return view("backend.admin.coachs.create");

    }

    public function create(){
        return view("backend.admin.coachs.create");
    }

    public function store(Request $request){

        $user = new User();

        $user->name = "";
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 2;

        if($user->save()){

            $coach = new Coach();

            $coach->user_id = $user->id;
            $coach->nom = $request->input("nom");
            $coach->prenom = $request->input("prenom");
            $coach->tel = $request->input("tel");
            $coach->info_pers = $request->input("info_pers");
            $coach->specialities = $request->input("specialities");
            $coach->url_fb = $request->input("url_fb");
            $coach->url_inst = $request->input("url_inst");
            $coach->url_you = $request->input("url_you");
            $coach->url_link = $request->input("url_link");
            $coach->url_tw = $request->input("url_tw");
            $coach->diplomes = $request->input("diplomes");
            $coach->adresse = $request->input("adresse");
            $coach->whatsapp = $request->input("whatsapp");
            $coach->fixe = $request->input("fixe");
            $coach->fax = $request->input("fax");
            $coach->ville = $request->input("ville");
            $coach->bio = $request->input("bio");
            $coach->status = 1;
            $coach->paypal = $request->input("paypal");
            $coach->rib = $request->input("rib");

            $fileName = null;
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$coach->nom.'-'.$coach->prenom. "." . $file->getClientOriginalExtension();
                $file->move('./assets/coachs/', $fileName);
            }
            $coach->photo = $fileName;

            if($coach->save()){
                // echo message bien ajouter
//            return redirect('/admin/coachs/')->with('success_register','Le Coach a été bien ajouter !');
                session()->flash("success","Le Coach a été bien ajouter !");
                return redirect('/admin/coachs');
            }else {
                // echo message error
//            return redirect('/admin/coachs/')->with('error_register','Erreur d\'ajouer le coach !');
                session()->flash("error","Erreur d\'ajouer le coach !");
                return redirect('/admin/coachs');
            }
        }


    }

    public function edit($id){
        $coach = Coach::find($id);

//        $this->authorize('update',$coach);

        return view("backend.admin.coachs.edit",["coach" => $coach]);
    }

    public function update(Request $request,$id){
        $coach = Coach::find($id);

        $user =  User::find($coach->user_id);

        if ( trim($request->input('password')) !=""){
            $user->email =  $request->input('email');
            $user->password =  bcrypt($request->input('password'));
        }

        if ($user->save()){

            $coach->nom = $request->input("nom");
            $coach->prenom = $request->input("prenom");
            $coach->tel = $request->input("tel");
            $coach->info_pers = $request->input("info_pers");
            $coach->specialities = $request->input("specialities");
            $coach->url_fb = $request->input("url_fb");
            $coach->url_inst = $request->input("url_inst");
            $coach->url_you = $request->input("url_you");
            $coach->url_link = $request->input("url_link");
            $coach->url_tw = $request->input("url_tw");
            $coach->diplomes = $request->input("diplomes");
            $coach->adresse = $request->input("adresse");
            $coach->whatsapp = $request->input("whatsapp");
            $coach->fixe = $request->input("fixe");
            $coach->fax = $request->input("fax");
            $coach->ville = $request->input("ville");
            $coach->bio = $request->input("bio");
            $coach->status = $request->input("status");

            $coach->paypal = $request->input("paypal");
            $coach->rib = $request->input("rib");

//            if ($request->hasFile('photo')){
//                $coach->photo =  $request->photo->store('coachs');
//            }

            $fileName = null;
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$coach->nom.'-'.$coach->prenom. "." . $file->getClientOriginalExtension();
                $file->move('./assets/coachs/', $fileName);
            }

            $coach->photo = $fileName;

            if($coach->save()){
                // echo message bien ajouter
//            return redirect('/admin/coachs/')->with('success_register','Le Coach a été bien ajouter !');
                session()->flash("success","Le Coach a été bien modifier !");
                return redirect('/admin/coachs');
            }else {
                // echo message error
//            return redirect('/admin/coachs/')->with('error_register','Erreur d\'ajouer le coach !');
                session()->flash("error","Erreur de modifier le coach !");
                return redirect('/admin/coachs');
            }

        }

    }

    public function destroy(Request $request,$id){
        $coach = Coach::find($id);

        if($coach->delete()){
            // echo message bien supprimer
            session()->flash("success",'Le Coach a été bien supprimer !');
            return redirect('/admin/coachs');

        }else {
            // echo message error
            session()->flash("success",'Erreur de supprimer le coach !');
            return redirect('/admin/coachs');
        }
    }

    // statistique pour chaque coach
    public function coach_admin(){

        return view("backend.coach.index");
    }

    public function demandes(){

//        $demandes = DB::table("formation_user")
//            ->where("deleted_at", null)
//            ->orderBy('id', 'desc')->get();

        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();

//        $coachFormations = DB::table("formations")
//            ->where("coache_id", $coach->id)
//            ->where("deleted_at", null)
//            ->orderBy('id', 'desc')->get();


        $demandes = DB::table('formation_user')
            ->select('formation_user.*')
            ->join('formations','formations.id','=','formation_user.formation_id')
            ->where(['formations.coach_id' => $coach->id, 'formations.deleted_at' => null])
            ->orderBy('id', 'desc')
            ->get();
//        dd($demandes);
        return view("backend.coach.demandes.demandes-list", ["demandes"=> $demandes]);
    }

    public function validerdemande(Request $request){

        $date_current = date("Y-m-d H:i:s");
       // dd($request->iddemande);

        DB::table('formation_user')->where(['id' => $request->iddemande])->update([ "validation"=> 2, "date_validation"=> $date_current]);

        session()->flash("success","La demande a été valider !");
        return redirect('coach-admin/demandes');
    }

    public function refuserdemande(Request $request){

        $date_current = date("Y-m-d H:i:s");
        // dd($request->iddemande);

        DB::table('formation_user')->where(['id' => $request->iddemande_r])->update([ "validation"=> -1, "remarque"=> $request->remarque,"date_validation"=> $date_current]);

        session()->flash("success","La demande a été marquer comme une demande refusé !");
        return redirect('coach-admin/demandes');
    }

    public function commentaires(){

        return view("backend.coach.commentaires.list-commentaires");
    }
    public function messages(){

        $messages = DB::table("messages")
            ->where("deleted_at", null)
            ->orderBy('id', 'desc')->get();

        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();

//        $coachFormations = DB::table("formations")
//            ->where("coache_id", $coach->id)
//            ->where("deleted_at", null)
//            ->orderBy('id', 'desc')->get();

        return view("backend.coach.messages.list-messages");
    }

    public function coach_profile(){


//        $this->authorize('update',$coach);++

     //   Tyres::select('kilometer')->where('usage', 1)->order_by('id', 'DESC')->limit('1')->get()

        $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
//        dd($coach);
        return view("backend.coach.coach-profile",["coach" => $coach]);
    }

    public function updateprofile(Request $request,$id){
        $coach = Coach::find($id);

        $user =  User::find($coach->user_id);

        if ( trim($request->input('password')) !=""){
            $user->email =  $request->input('email');
            $user->password =  bcrypt($request->input('password'));
        }

        if ($user->save()){


            $coach->nom = $request->input("nom");
            $coach->prenom = $request->input("prenom");
            $coach->tel = $request->input("tel");
            $coach->info_pers = $request->input("info_pers");
            $coach->specialities = $request->input("specialities");
            $coach->url_fb = $request->input("url_fb");
            $coach->url_inst = $request->input("url_inst");
            $coach->url_you = $request->input("url_you");
            $coach->url_link = $request->input("url_link");
            $coach->url_tw = $request->input("url_tw");
            $coach->diplomes = $request->input("diplomes");
            $coach->adresse = $request->input("adresse");
            $coach->whatsapp = $request->input("whatsapp");
            $coach->fixe = $request->input("fixe");
            $coach->fax = $request->input("fax");
            $coach->ville = $request->input("ville");
            $coach->bio = $request->input("bio");

            $coach->paypal = $request->input("paypal");
            $coach->rib = $request->input("rib");

//            if ($request->hasFile('photo')){
//                $coach->photo =  $request->photo->store('coachs');
//            }


            if ($request->hasFile('photo')) {
                $fileName = null;
                $file = $request->file('photo');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $fileName = "coach-maroc-".$coach->nom.'-'.$coach->prenom. "." . $file->getClientOriginalExtension();
                $file->move('./assets/coachs/', $fileName);

                $coach->photo = $fileName;
            }



            if($coach->save()){
                // echo message bien ajouter
//            return redirect('/admin/coachs/')->with('success_register','Le Coach a été bien ajouter !');
                session()->flash("success","Le Coach a été bien modifier !");
                return redirect('/coach-admin');
            }else {
                // echo message error
//            return redirect('/coach-admin/')->with('error_register','Erreur d\'ajouer le coach !');
                session()->flash("error","Erreur de modifier le coach !");
                return redirect('/coach-admin');
            }

        }

    }
}
