<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use App\Coach;
use App\Course;
use App\Formation;
use App\Message;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Helpers;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *HomeController
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd("okk");
        $listCoachs = DB::table("coaches")
        ->where("deleted_at" , null)
        ->where("status" , 1)
        ->get();
//dd($listCoachs);
        $listCategories = DB::table("categories")
        ->where("deleted_at" , null)
        ->where("status" , 1)
        ->get();

//        $listCategories = Categorie::all();

        $listFormation = Formation::take(4)->skip(0)->get();

        $lastarticles  = Article::orderBy('id', 'desc')->take(4)->get();

        //$fullusername = getNbrFormationByCat(1);
        //dd($fullusername);

        return view('frontend.index',array("categories"=> $listCategories, "coachs"=> $listCoachs,"formations" => $listFormation,"articles"=> $lastarticles));
    }

//    public function accueil()
//    {
//        return view('frontend.index');
//    }

    public function about()
    {
        $galeriesimages  = DB::table("galeries")
            ->where("coach_id" , 1)
            ->where("type" , 1)
            ->where("deleted_at" , null)
            ->where("status" , 1)
            ->get();

        $galeriesvideos  = DB::table("galeries")
            ->where("coach_id" , 1)
            ->where("type" , 2)
            ->where("deleted_at" , null)
            ->where("status" , 1)
            ->get();

//        dd($galeriesimages);
        return view('frontend.about',array( "galeries_images"=> $galeriesimages, "galeries_videos"=> $galeriesvideos));
    }

    public function formationslist($idcat= null)
    {
        $url = explode("-",$idcat);
        //var_dump($url[0]);die();
        $idcat = $url[0];

        if ($idcat !=null){
            $categ =  Categorie::find($idcat);
            $listFormation  = $categ->formations()->get();

        }else{
            $listFormation  = DB::table("formations")
                ->where("deleted_at" , null)
                ->where("status" , 1)
                ->get();
        }

        $listCats = DB::table("categories")
            ->where("deleted_at" , null)
            ->where("status" , 1)
            ->get();

        //dd($listFormation);

        return view('frontend.formations-liste',["formations"=>$listFormation,"categories"=>$listCats]);
    }

    public function articleslist()
    {

        $listArticles = DB::table("articles")
            ->where("deleted_at" , null)
            ->where("status" , 1)
            ->orderBy('id', 'desc')
            ->get();

        $lastarticles  = Article::orderBy('id', 'desc')->take(4)->get();
        //dd($listFormation);

        return view('frontend.all-blogs',["articles"=>$listArticles,"lastarticles"=>$lastarticles]);
    }

    public function detailsarticle($id)
    {
        $url = explode("-",$id);
        //var_dump($url[0]);die();
        $id = $url[0];

        $article = Article::find($id);
        $lastarticles  = Article::orderBy('id', 'desc')->take(4)->get();
        return view('frontend.details-blog', ["article"=> $article,"lastarticles"=>$lastarticles]);
    }

    public function detailsformation($id)
    {
        $url = explode("-",$id);
        //var_dump($url[0]);die();
        $id = $url[0];

        $demande =null;
        if (Auth::check())
        {
            $user = Auth::user();
            //dd($user);
            if ($user->role > 2){
                        return redirect('/');
            }

            $demande  = DB::table("formation_user")
                ->where("formation_id" , $id)
                ->where("user_id" , $user->id)
                ->first();
        }

        $formation = Formation::find($id);

        return view('frontend.formation-details', ["formation"=> $formation,"demande" => $demande]);
    }
    
    public function detailsformations($id)
    {
        $url = explode("-",$id);
        //var_dump($url[0]);die();
        $id = $url[0];

        $demande =null;
        if (Auth::check())
        {
            $user = Auth::user();
            //dd($user);
            if ($user->role > 2){
                        return redirect('/');
            }

            $demande  = DB::table("formation_user")
                ->where("formation_id" , $id)
                ->where("user_id" , $user->id)
                ->first();
        }

        $formation = Formation::find($id);

        return view('frontend.formation-det', ["formation"=> $formation,"demande" => $demande]);
    }

    public function detailformationscoach($id=null, $idformation)
    {
        $url = explode("-",$idformation);
        //var_dump($url[0]);die();
        $idformation = $url[0];

        $demande =null;
        if (Auth::check())
        {
            $user = Auth::user();
            //dd($user);
            if ($user->role > 2){
                return redirect('/');
            }

            $demande  = DB::table("formation_user")
                ->where("formation_id" , $id)
                ->where("user_id" , $user->id)
                ->first();
        }

        $formation = Formation::find($idformation);
      //  dd($formation);
        return view('frontend.formation-details', ["formation"=> $formation,"demande" => $demande]);
    }

    public function formationscoach($id)
    {
        $url = explode("-",$id);
        //var_dump($url[0]);die();
        $id = $url[0];

        //$formation = Formation::find($id);
        $coach  = Coach::find($id);
        $formations  = DB::table("formations")
            ->where("coach_id" , $id)
            ->where("deleted_at" , null)
//            ->where("type" , 2)
            ->where("status" , 1)
            ->get();
        $listCats = DB::table("categories")
            ->where("deleted_at" , null)
            ->where("status" , 1)
            ->get();

        return view('frontend.formations-coach', ["coach"=>$coach ,"formations"=> $formations,"categories"=>$listCats]);
    }

    public function consultationscoach($id)
    {
        $url = explode("-",$id);
        //var_dump($url[0]);die();
        $id = $url[0];

        //$formation = Formation::find($id);
        //$coach  = Coach::find($id);
        $consultations  = DB::table("consultations")
            ->where("coach_id" , $id)
            ->where("status" , 1)
            ->get();
        return view('frontend.consultations-liste', ["consultations"=> $consultations]);
    }

    public function coachslist()
    {
        $coachs = DB::table("coaches")
            ->where("deleted_at" , null)
            ->where("status" , 1)
            ->get();
        return view('frontend.coachs',array("coachs" => $coachs));
    }

    public function detailscoach($idcoach = null)
    {
        $url = explode("-",$idcoach);
        //var_dump($url[0]);die();
        $idcoach = $url[0];

        $coach  = Coach::find($idcoach);
        $galeries_images  = DB::table("galeries")
                                    ->where("coach_id" , $coach->id)
                                    ->where("type" , 1)
                                    ->where("deleted_at" , null)
                                    ->where("status" , 1)
                                     ->get();
        $galeries_videos  = DB::table("galeries")
            ->where("coach_id" , $coach->id)
            ->where("type" , 2)
            ->where("deleted_at" , null)
            ->where("status" , 1)
            ->get();

//        dd($coach);
        return view('frontend.details-coach',array("coach" => $coach, "galeries_images"=> $galeries_images, "galeries_videos"=> $galeries_videos));
    }

    public function articlescoach($idcoach = null)
    {
        $url = explode("-",$idcoach);
        //var_dump($url[0]);die();
        $idcoach = $url[0];

        $articles  = DB::table("articles")
                            ->where("coach_id", $idcoach)
                            ->where("deleted_at", null)
                            ->orderBy('id', 'desc')->get();
        $lastarticles  = Article::orderBy('id', 'desc')->take(4)->get();
        $coach  = Coach::find($idcoach);
//        dd($coach);
        return view('frontend.blogs',array("articles" => $articles,"coach" => $coach,"lastarticles"=>$lastarticles));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function contactus(Request $request)
    {
        $to = 'Mohamedmikdad2@gmail.com';
        $from = $request->input('email');
        $fromName = $request->input('name');

        $subject = "Un Message de la page contact du site Centre Mikdad";

        $htmlContent = ' 
        <html> 
    <head> 
        <title>Bienvenu au site Centre Mikdad</title> 
    </head> 
    <body> 
        <h1>Merci d\'être avec nous!</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Nom complet : </th><td>'.$request->input('name').'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Téléphone : </th><td>'.$request->input('tel').'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$request->input('email').'</td> 
            </tr> 
            <tr> 
                <th>Message : </th><td>'.$request->input('message').'</td> 
            </tr> 
        </table> 
    </body> 
    </html>';

// Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n";
        $headers .= 'Cc: '.$from. "\r\n";
//        $headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
        if(mail($to, $subject, $htmlContent, $headers)){
            return redirect("/remerciement-contact");
        }else{
            echo 'Message non envoyer !';
        }


    }

    public function remerciementc(){
        return view('frontend.remerciement-contact');
    }

    public function inscription(Request $request)
    {
        return view('frontend.inscription');
    }

    public function studentcompte($id)
    {
        $student  = Student::find($id);
      //  dd($student);
        $user = User::find($student->user_id);
//        dd($user->formations);
        return view('frontend.compte-student',["student"=>$student,"formations"=> $user->formations ]);
    }

    public function getsingle_video($cour_id)
    {
        //  dd($student);
        $course = Course::find($cour_id);
      //  dd($course->video_url);

        return view('frontend.get-video',["url_video" => $course->video_url,"titre"=>$course->titre]);
    }

    public function participerauformation($id)
    {

        $url = explode("-",$id);
        //var_dump($url[0]);die();
        $id = $url[0];

        if (Auth::check())
        {
            $user = Auth::user();
            //dd($user);
        }else{
            return redirect('/login');
        }

        if ($user->role > 2){
            return redirect('/');
        }

        $data[] = $id;

//        $demande  = DB::table("formation_user")
//            ->where("formation_id" , $id)
//            ->where("user_id" , $user->id)
//            ->first();

//        if($demande !=null){
//            $user->formations()->sync($data);
//
//            // redirect to paiment.
//        }else{
            $user->formations()->sync($data);

            // redirect to paiment.

//        }

        return redirect('paiment-formation/'.$id);

    }

    public function paimentformation($id)
    {
//        dd("Bientôt disponible");
//        return redirect('/paiement/'.$id,["demande" => $demande]);

        $url = explode("-",$id);
        //var_dump($url[0]);die();
        $id = $url[0];

        $formation = Formation::find($id);

        if (Auth::check())
        {
            $user = Auth::user();
            //dd($user);
        }else{
            return redirect('/login');
        }

        if ($user->role > 2){
            return redirect('/');
        }

        return view('frontend.paiement', ["formation" => $formation]);

        //return redirect('/details-formation/'.$id,["demande" => $demande]);

    }

    public function validationRecu(Request $request){

//        $formation = Formation::find($request->id_formation);

        if (Auth::check())
        {
            $user = Auth::user();
            //dd($user);
        }else{
            return redirect('/login');
        }

        if ($user->role > 2){
            return redirect('/');
        }


        $fileName = "";
        if ($request->hasFile('image')) {

            $file = $request->file('image');
//                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $fileName = "coach-maroc-user-".$user->id. "." . $file->getClientOriginalExtension();
            $file->move('./assets/recus/', $fileName);

        }
//        $paiement->recu = $fileName;
        $date_current = date("Y-m-d H:i:s");

        DB::table('formation_user')->where(['formation_id' => $request->id_formation, "user_id"=> $user->id])->update(['recu' =>$fileName, "validation"=> 1, "date_validation"=> $date_current]);


        session()->flash("success","Votre reçu a bien été transmis, merci de votre confiance. Vous pouvez continuer votre formation après avoir vérifié votre reçu, merci de votre patience avec nous, nous vous répondrons dans les 24 heures au maximum!");
        return redirect('remerciement-paiement');


    }

    public function inscription_confirm(Request $request)
    {
//        dd($request->input('role'));

//        dd($this->check_duplicateemail($request->input('email')));


        $user = new User();
        $user->name = "";
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');


        //check duplicate email
        if ( $this->check_duplicateemail($request->input('email'))){
            session()->flash("error","vous êtes déjà inscrit cet email utilisé par un compte!");
            return redirect('login');
        }


        // ajouter les infos vers coach ou vers student

        //Apres l'ajout

        if ($request->input('role') == 1){
            if($user->save()){

                $student = new Student();

                $student->user_id = $user->id;
                $student->nom = $request->input("nom");
                $student->prenom = $request->input("prenom");
                $student->tel = $request->input("tel");
                $student->ville = $request->input("ville");
                $student->photo = "";

                $student->status = 1;

                if($student->save()){

//                    $student->id;
//                    return redirect('/student-profile/'.$student->id.'-'.$student->nom.'-'.$student->prenom);

                    Auth::login($user);
                    return redirect('home');

                }else {
                    // echo message error
                    session()->flash("error","Erreur détecté lors de creation de votre compte merci de ressayez encore un fois. si vous trouver des defuclité nmerci de contacter le support Centre Mikdad.");
                    return redirect('inscription');
                }
            }
            // redirect vers le compte bénificière
        }else if ($request->input('role') == 2 ){
            if($user->save()){

                $coach = new Coach();

                $coach->user_id = $user->id;
                $coach->nom = $request->input("nom");
                $coach->prenom = $request->input("prenom");
                $coach->tel = $request->input("tel");
                $coach->ville = $request->input("ville");
                $coach->photo = "";
                $coach->info_pers = "";
                $coach->specialities = "";
                $coach->diplomes = "";
                $coach->bio = "";
                $coach->url_fb = "";
                $coach->url_inst = "";
                $coach->url_tw = "";
                $coach->url_link = "";
                $coach->url_you = "";
                $coach->adresse = "";
                $coach->whatsapp = "";
                $coach->fixe = "";
                $coach->fax = "";
                $coach->paypal = "";
                $coach->rib = "";
                $coach->status = 0;

                if($coach->save()){
                    // echo message bien ajouter
                    session()->flash("success","Merci de votre inscription sur notre plateforme Centre Mikdad!\nVotre compte sera actif tres bientôt, moins de 1h et 24h au maximum. merci de votre confiance.");
                    return redirect('remerciement');
                }else {
                    // echo message error
                    session()->flash("error","Erreur détecté lors de creation de votre compte merci de ressayez encore un fois. si vous trouver des defuclité nmerci de contacter le support Centre Mikdad.");
                    return redirect('inscription');
                }
            }
            //redirect  message remerciement attend la confirmation
        }

        return view('frontend.inscription');
    }

    public function sendmsg(Request $request){

        $coach = Coach::find($request->id);
        if (Auth::check())
        {
            $user = Auth::user();

            $message = new  Message();

            $message->sender = $user->id;
            $message->reciever = $coach->id;
            $message->message = $request->message;
            $message->status = 0;

            if ($message->save()){
                session()->flash("success","Le message a été bien envoyer !");
                return redirect("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom);
            }else{
                session()->flash("error","Erreur d'envoyer ce message !");
                return redirect("coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom);
            }
        }else{

            Session::put('last_place_url', "coach/".$coach->id.'-'.$coach->nom.'-'.$coach->prenom);
            return redirect('/login');
        }


    }

    public function check_duplicateemail($email){

        $input['email'] = $email;
        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:users,email');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return true;
        }
        else {
            return false ;
        }

    }

    public function remerciement(){

        return view('frontend.remerciement');
    }

    public function remerciementp(){
        return view('frontend.remerciement-paiement');
    }
    public function remerciementcontact(){
        return view('frontend.remerciement-contact');
    }
    public function login(){
        return view('frontend.login');
    }
    public function login_validation(Request $request){

        // traiement ici

        return view('frontend.login');
    }

    public function redirection(){

        $user = Auth::user();

        // dd($user->role);

        if ( $user->role == 3){
            // redirect vers compte admin
            return redirect('admin');
        }else if( $user->role == 2){
            // redirect vers compte coach
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();

            if ( $coach->status == 0 ){
                //return redirect('logout');
                session()->flash("error","Votre compte n'est pas encore activé");
                return redirect('login')->with(Auth::logout());
            }

            return redirect('coach/'.$coach->id.'-'.$coach->prenom.'-'.$coach->nom);
        }else{
            // redirect vers compte student
//            return redirect('student');


               if (Session::get('last_place_url') !="" && Session::get('last_place_url') !=null){
                return redirect(Session::get('last_place_url'));
            }

            // $student = Student::select('*')->where('user_id', Auth::user()->id)->first();
            // return redirect('/student-profile/'.$student->id.'-'.$student->prenom.'-'.$student->nom);
 if (Auth::check()) {
            $user = Auth::user();
            $student = Student::where('user_id', $user->id)->first();
            if ($student) {
                return redirect('/student-profile/'.$student->id.'-'.$student->prenom.'-'.$student->nom);
            } else {
                // Handle case where student record is not found
           session()->flash("error","vous êtes déjà inscrit cet email utilisé par un compte!");
            return redirect('login');
            }
        } else {
            // Handle case where user is not authenticated
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }
        }

    }
}
