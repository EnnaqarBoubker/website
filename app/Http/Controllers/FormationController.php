<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Coach;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use File;
use App\Formation;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //        $id_coach = Auth::user()->id;
        // dd($id_coach);
        //      var_dump("ok");die;

        if (Auth::user()->role == 3) {
            $listFormation = Formation::all();
        } else {
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
            $listFormation = $coach->formations;
        }

        //        $listFormation = Formation::all();

        //         dd($listFormation);
        return view("backend.coach.formations.list-formations", array("formations" => $listFormation));
    }

    public function show()
    {
        //return view("backend.coach.formations.create");

    }

    public function create()
    {
        $categories = Categorie::all();
        return view("backend.coach.formations.create", array("categories" => $categories));
    }

    public function store(Request $request)
    {

        $formation = new Formation();

        $formation->date = date("Y-m-d H:i:s");
        $formation->lieu = "";
        $formation->new_prix = 0;

        $formation->type = $request->input("type");
        $formation->categorie_id = $request->input("categorie_id");
        $formation->titre = $request->input("titre");
        $formation->titre1 = $request->input("titre1");
        $formation->titre2 = $request->input("titre2");
        $formation->titre3 = $request->input("titre3");
        $formation->titre4 = $request->input("titre4");
        $formation->titre5 = $request->input("titre5");
        $formation->titre6 = $request->input("titre6");
        $formation->titre7 = $request->input("titre7");
        $formation->titre8 = $request->input("titre8");
        
          $formation->video = $request->input("video");
        $formation->video_1 = $request->input("video_1");
        $formation->video_2 = $request->input("video_2");
        $formation->video_3 = $request->input("video_3");
        $formation->video_4 = $request->input("video_4");
        $formation->video_5 = $request->input("video_5");
        $formation->video_6 = $request->input("video_6");
        $formation->video_7 = $request->input("video_7");
        
        
        $formation->btn_1 = $request->input("btn_1");
        $formation->btn_2 = $request->input("btn_2");
        $formation->btn_3 = $request->input("btn_3");
        $formation->btn_4 = $request->input("btn_4");
        $formation->btn_5 = $request->input("btn_5");
        $formation->btn_6 = $request->input("btn_6");
        $formation->btn_7 = $request->input("btn_7");
        
        $formation->prix = $request->input("prix");
        $formation->description = $request->input("description");
        $formation->description1 = $request->input("description1");
        $formation->description2 = $request->input("description2");
        $formation->description3 = $request->input("description3");
        $formation->description4 = $request->input("description4");
        $formation->description5 = $request->input("description5");
        $formation->description6 = $request->input("description6");
        $formation->description7 = $request->input("description7");
        $formation->description8 = $request->input("description8");
        $formation->description9 = $request->input("description9");
        $formation->description10 = $request->input("description10");
        $formation->status = $request->input("status");

        if ($request->has("date")) {
            $formation->date = $request->input("date");
        }

        if ($request->has("new_prix")) {
            $formation->new_prix = $request->input("new_prix");
        }

        if ($request->has("lieu")) {
            $formation->lieu = $request->input("lieu");
        }

        if ($request->has("coach_id")) {
            $formation->coach_id = $request->input("coach_id");
        } else {
            $coach = Coach::where('user_id', Auth::user()->id)->first();
            if ($coach) {
                $formation->coach_id = $coach->id;
            } else {
                // Handle error if coach not found for the authenticated user
                session()->flash("error", "Coach not found for authenticated user!");
                return redirect('/coach-admin/formations');
            }
        }

        $imageFileName = "";
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = "coach-maroc-" . $formation->titre . "." . $imageFile->getClientOriginalExtension();
            $imageFile->move('./assets/formations/', $imageFileName);
        }
        $formation->image = $imageFileName;


        $image1FileName = "";
        if ($request->hasFile('image_1')) {
            $image1File = $request->file('image_1');
            $image1FileName = "coach-maroc-" . $formation->titre . "." . $image1File->getClientOriginalExtension();
            $image1File->move('./assets/formations/', $image1FileName);
        }
        $formation->image_1 = $image1FileName;


        // Image 2
        $image2FileName = "";
        if ($request->hasFile('image_2')) {
            $image2File = $request->file('image_2');
            $image2FileName = "coach-maroc-" . $formation->titre . "-image2." . $image2File->getClientOriginalExtension();
            $image2File->move('./assets/formations/', $image2FileName);
        }
        $formation->image_2 = $image2FileName;

        // Image 3
        $image3FileName = "";
        if ($request->hasFile('image_3')) {
            $image3File = $request->file('image_3');
            $image3FileName = "coach-maroc-" . $formation->titre . "-image3." . $image3File->getClientOriginalExtension();
            $image3File->move('./assets/formations/', $image3FileName);
        }
        $formation->image_3 = $image3FileName;

        // Image 4
        $image4FileName = "";
        if ($request->hasFile('image_4')) {
            $image4File = $request->file('image_4');
            $image4FileName = "coach-maroc-" . $formation->titre . "-image4." . $image4File->getClientOriginalExtension();
            $image4File->move('./assets/formations/', $image4FileName);
        }
        $formation->image_4 = $image4FileName;
        
        // Image 5
        $image5FileName = "";
        if ($request->hasFile('image_5')) {
            $image5File = $request->file('image_5');
            $image5FileName = "coach-maroc-" . $formation->titre . "-image5." . $image5File->getClientOriginalExtension();
            $image5File->move('./assets/formations/', $image5FileName);
        }
        $formation->image_5 = $image5FileName;
        
        // Image 6
        $image6FileName = "";
        if ($request->hasFile('image_6')) {
            $image6File = $request->file('image_6');
            $image6FileName = "coach-maroc-" . $formation->titre . "-image6." . $image6File->getClientOriginalExtension();
            $image6File->move('./assets/formations/', $image6FileName);
        }
        $formation->image_6 = $image6FileName;
        // Image 7
        $image7FileName = "";
        if ($request->hasFile('image_7')) {
            $image7File = $request->file('image_7');
            $image7FileName = "coach-maroc-" . $formation->titre . "-image7." . $image7File->getClientOriginalExtension();
            $image7File->move('./assets/formations/', $image7FileName);
        }
        $formation->image_7 = $image7FileName;

        


        if ($formation->save()) {
            session()->flash("success", "La Formation a été bien ajoutée !");
            return redirect('/coach-admin/formations');
        } else {
            session()->flash("error", "Erreur lors de l'ajout de la formation !");
            return redirect('/coach-admin/formations');
        }
    }


    public function edit($id)
    {
        $formation = Formation::find($id);
        $categories = Categorie::all();
        //        $this->authorize('update',$coach);
        return view("backend.coach.formations.edit", ["formation" => $formation, "categories" => $categories]);
    }

    public function update(Request $request, $id)
    {

        $formation = Formation::find($id);

        $formation->date = date("Y-m-d H:i:s");
        $formation->lieu = "";
        $formation->new_prix = 0;

        $formation->type = $request->input("type");
        $formation->categorie_id = $request->input("categorie_id");
        $formation->titre = $request->input("titre");
        $formation->titre1 = $request->input("titre1");
        $formation->titre2 = $request->input("titre2");
        $formation->titre3 = $request->input("titre3");
        $formation->titre4 = $request->input("titre4");
        $formation->titre5 = $request->input("titre5");
        
        $formation->titre6 = $request->input("titre6");
        $formation->titre7 = $request->input("titre7");
        $formation->titre8 = $request->input("titre8");
       
        
        $formation->video = $request->input("video");
        $formation->video_1 = $request->input("video_1");
        $formation->video_2 = $request->input("video_2");
        $formation->video_3 = $request->input("video_3");
        $formation->video_4 = $request->input("video_4");
        $formation->video_5 = $request->input("video_5");
        $formation->video_6 = $request->input("video_6");
        $formation->video_7 = $request->input("video_7");
        
        
        $formation->btn_1 = $request->input("btn_1");
        $formation->btn_2 = $request->input("btn_2");
        $formation->btn_3 = $request->input("btn_3");
        $formation->btn_4 = $request->input("btn_4");
        $formation->btn_5 = $request->input("btn_5");
        $formation->btn_5 = $request->input("btn_5");
        $formation->btn_6 = $request->input("btn_6");
        
        $formation->prix = $request->input("prix");
        $formation->description = $request->input("description");
        $formation->description1 = $request->input("description1");
        $formation->description2 = $request->input("description2");
        $formation->description3 = $request->input("description3");
        $formation->description4 = $request->input("description4");
        $formation->description5 = $request->input("description5");
        $formation->description6 = $request->input("description6");
        $formation->description7 = $request->input("description7");
        $formation->description8 = $request->input("description8");
        $formation->description9 = $request->input("description9");
        $formation->description10 = $request->input("description10");
        $formation->status = $request->input("status");

        if ($request->input("date") != null) {
            $formation->date = $request->input("date");
        }

        if ($request->input("new_prix") != null) {
            $formation->new_prix = $request->input("new_prix");
        }

        if ($request->input("lieu") != null) {
            $formation->lieu = $request->input("lieu");
        }

        if ($request->input("coach_id") != null) {
            $formation->id_coach = $request->input("coach_id");
        } else {
            $coach = Coach::select('*')->where('user_id', Auth::user()->id)->first();
            $formation->coach_id = $coach->id;
        }

// $imageFileName = "";
//       if ($request->hasFile('image')) {
//         $imageFile = $request->file('image');
//         $imageFileName = "coach-maroc-" . $formation->titre . "." . $imageFile->getClientOriginalExtension();
//         $imageFile->move('./assets/formations/', $imageFileName);

        
//         if ($formation->image) {
            
//             $oldImagePath = './assets/formations/' . $formation->image;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

        
//         $formation->image = $imageFileName;
//     }


//  $image1FileName = "";

//         if ($request->hasFile('image_1')) {
        
//         $image1File = $request->file('image_1');
//         $image1FileName = "coach-maroc-" . $formation->titre . "." . $image1File->getClientOriginalExtension();
//         $image1File->move('./assets/formations/', $image1FileName);

        
//         if ($formation->image_1) {
            
//             $oldImagePath = './assets/formations/' . $formation->image_1;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

        
//         $formation->image_1 = $image1FileName;
//     }
    
//  $image2FileName = "";

//         if ($request->hasFile('image_2')) {
        
//         $image2File = $request->file('image_2');
//         $image2FileName = "coach-maroc-" . $formation->titre . "." . $image2File->getClientOriginalExtension();
//         $image2File->move('./assets/formations/', $image2FileName);

        
//         if ($formation->image_2) {
            
//             $oldImagePath = './assets/formations/' . $formation->image_2;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

        
//         $formation->image_2 = $image2FileName;
//     }
    
//  $image3FileName = "";

//         if ($request->hasFile('image_3')) {
//         // If a new image is uploaded, save it
//         $image3File = $request->file('image_3');
//         $image3FileName = "coach-maroc-" . $formation->titre . "." . $image3File->getClientOriginalExtension();
//         $image3File->move('./assets/formations/', $image3FileName);

        
//         if ($formation->image_3) {
           
//             $oldImagePath = './assets/formations/' . $formation->image_3;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

//         $formation->image_3 = $image3FileName;
//     }
    
//  $image4FileName = "";

//         if ($request->hasFile('image_4')) {
//         // If a new image is uploaded, save it
//         $image4File = $request->file('image_4');
//         $image4FileName = "coach-maroc-" . $formation->titre . "." . $image4File->getClientOriginalExtension();
//         $image4File->move('./assets/formations/', $image4FileName);

        
//         if ($formation->image_4) {
           
//             $oldImagePath = './assets/formations/' . $formation->image_4;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

//         $formation->image_4 = $image4FileName;
//     }
    
//  $image5FileName = "";

//         if ($request->hasFile('image_5')) {
//         // If a new image is uploaded, save it
//         $image5File = $request->file('image_5');
//         $image5FileName = "coach-maroc-" . $formation->titre . "." . $image5File->getClientOriginalExtension();
//         $image5File->move('./assets/formations/', $image5FileName);

        
//         if ($formation->image_5) {
           
//             $oldImagePath = './assets/formations/' . $formation->image_5;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

//         $formation->image_5 = $image5FileName;
//     }
    
//  $image6FileName = "";

//         if ($request->hasFile('image_6')) {
//         // If a new image is uploaded, save it
//         $image6File = $request->file('image_6');
//         $image6FileName = "coach-maroc-" . $formation->titre . "." . $image6File->getClientOriginalExtension();
//         $image6File->move('./assets/formations/', $image6FileName);

        
//         if ($formation->image_6) {
           
//             $oldImagePath = './assets/formations/' . $formation->image_6;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

//         $formation->image_6 = $image6FileName;
//     }
    
//  $image7FileName = "";

//         if ($request->hasFile('image_7')) {
//         // If a new image is uploaded, save it
//         $image7File = $request->file('image_7');
//         $image7FileName = "coach-maroc-" . $formation->titre . "." . $image7File->getClientOriginalExtension();
//         $image7File->move('./assets/formations/', $image7FileName);

        
//         if ($formation->image_7) {
           
//             $oldImagePath = './assets/formations/' . $formation->image_7;
//             if (file_exists($oldImagePath)) {
//                 unlink($oldImagePath);
//             }
//         }

//         $formation->image_7 = $image7FileName;
//     }

      $imageFields = [ 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7', 'image_8'];
    foreach ($imageFields as $key => $imageField) {
        if ($request->hasFile($imageField)) {
            $imageFile = $request->file($imageField);
            $newImageFileName = "coach-maroc-" . $formation->titre . "_" . $key . "." . $imageFile->getClientOriginalExtension();

            // Check if the new image is different from all other existing images
            $isUnique = true;
            foreach ($imageFields as $otherImageField) {
                if ($formation->$otherImageField === $newImageFileName) {
                    $isUnique = false;
                    break;
                }
            }

            if ($isUnique) {
                // Move the new image to the destination directory
                $imageFile->move('./assets/formations/', $newImageFileName);

                // Remove the old image if it exists
                if ($formation->$imageField) {
                    $oldImagePath = './assets/formations/' . $formation->$imageField;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Update the formation with the new image filename
                $formation->$imageField = $newImageFileName;
            }
        }
    }



        if ($formation->save()) {
            // echo message bien ajouter
            //            return redirect('/admin/formations/')->with('success_register','La Formation a été bien ajouter !');
            session()->flash("success", "La Formation a été bien modifier !");
            return redirect('/coach-admin/formations');
        } else {
            // echo message error
            //            return redirect('/coach-admin/formations/')->with('error_register','Erreur d\'ajouer le coach !');
            session()->flash("error", "Erreur de modofier la formation !");
            return redirect('/coach-admin/formations');
        }
    }

    public function destroy(Request $request, $id)
    {
        $formation = Formation::find($id);

        if ($formation->delete()) {
            // echo message bien supprimer
            session()->flash("success", 'La Formation a été bien supprimer !');
            return redirect('/coach-admin/formations');
        } else {
            // echo message error
            session()->flash("success", 'Erreur de supprimer la formation !');
            return redirect('/coach-admin/formations');
        }
    }
}
