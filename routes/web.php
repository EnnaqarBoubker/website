<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/updateapp', function()
//{
//    \Artisan::call('dump-autoload');
//    echo 'dump-autoload complete';
//});
//
//Route::get('/clear-cache', function() {
//    $exitCode = Artisan::call('cache:clear');
//    // return what you want
//});
//

Route::get('/', 'HomeController@index');

Route::get('/accueil', 'HomeController@index');
Route::get('/a-propos', 'HomeController@about');
Route::get('/liste-formations', 'HomeController@formationslist');
Route::get('/liste-articles', 'HomeController@articleslist');
Route::get('/liste-formations/{idcat}', 'HomeController@formationslist');
Route::get('/details-formation/{id}', 'HomeController@detailsformation');


Route::get('/details-form/{id}', 'HomeController@detailsformations');


Route::get('/details-article/{id}', 'HomeController@detailsarticle');
Route::get('/whatch-video/{id}', 'HomeController@getsingle_video');
Route::get('/liste-coachs', 'HomeController@coachslist');
//Route::get('/details-coach', 'HomeController@detailscoach');
Route::get('/coach/{idcoach}',"HomeController@detailscoach");
Route::get('/coach/{idcoach}/articles',"HomeController@articlescoach");
Route::get('/coach/{idcoach}/formations',"HomeController@formationscoach");
Route::get('/coach/{idcoach}/formations/{idformation}',"HomeController@detailformationscoach");
Route::get('/coach/{idcoach}/consultations',"HomeController@consultationscoach");
Route::get('/contact', 'HomeController@contact');
Route::post('/contactus', 'HomeController@contactus');

Route::get('/student-profile/{id}',"HomeController@studentcompte");
Route::get('/participer-au-formation/{id}',"HomeController@participerauformation");
Route::get('/paiment-formation/{id}',"HomeController@paimentformation");
Route::post('/validation-paiment',"HomeController@validationRecu");
Route::post('/envoyer-un-message', 'HomeController@sendmsg');

Route::get('/inscription', 'HomeController@inscription');
Route::post('/inscription-valider', 'HomeController@inscription_confirm');
Route::get('/remerciement', 'HomeController@remerciement');
Route::get('/remerciement-paiement', 'HomeController@remerciementp');
Route::get('/remerciement-contact', 'HomeController@remerciementc');
Route::get('/login', 'HomeController@login');
Route::post('/log-in', 'HomeController@login_validation');

Auth::routes();

Route::get('/home', 'HomeController@redirection');


// need to do this to enable the store method on the following route (otherwise POST is on index when resourcing controllers)
Route::get('/admin',"AdminController@index");
Route::get('/admin/profile',"AdminController@profile");
Route::get('/admin/ajouter',"AdminController@create");
Route::post('/admin',"AdminController@store");
Route::get('/admin/{id}/edit',"AdminController@edit");
Route::put('/admin/{id}',"AdminController@update");
Route::delete('/admin/{id}',"AdminController@destroy");

Route::post('admin/changepassword',"AdminController@changepassword");
Route::post('admin/changeemail',"AdminController@changeemail");

Route::get('/admin/categories',"CategorieController@index");
Route::get('/admin/categories/ajouter',"CategorieController@create");
Route::post('/admin/categories',"CategorieController@store");
Route::get('/admin/categories/{id}/edit',"CategorieController@edit");
Route::put('/admin/categories/{id}',"CategorieController@update");
Route::delete('/admin/categories/{id}',"CategorieController@destroy");

//-----------------------------------------------------------------------------

Route::get('/admin/coachs',"CoachController@index");
Route::get('/admin/coachs/ajouter',"CoachController@create");
Route::post('/admin/coachs',"CoachController@store");
Route::get('/admin/coachs/{id}/edit',"CoachController@edit");
Route::put('/admin/coachs/{id}',"CoachController@update");
Route::delete('/admin/coachs/{id}',"CoachController@destroy");

//-----------------------------------------------------------------------------
Route::get('/admin/packs',"PackController@index");
Route::get('/admin/packs/ajouter',"PackController@create");
Route::post('/admin/packs',"PackController@store");
Route::get('/admin/packs/{id}/edit',"PackController@edit");
Route::put('/admin/packs/{id}',"PackController@update");
Route::delete('/admin/packs/{id}',"PackController@destroy");

//-----------------------------------------------------------------------------
Route::get('/admin/abonnements',"AbonnementController@index");
Route::get('/admin/abonnements/ajouter',"AbonnementController@create");
Route::post('/admin/abonnements',"AbonnementController@store");
Route::get('/admin/abonnements/{id}/edit',"AbonnementController@edit");
Route::put('/admin/abonnements/{id}',"AbonnementController@update");
Route::delete('/admin/abonnements/{id}',"AbonnementController@destroy");




//--------------------------------CoachAdmin-----------------------------------------------

Route::get('/coach-admin',"CoachController@coach_admin");

Route::get('/coach-admin/teacher-profile',"CoachController@coach_profile");
Route::post('/coach-admin/edit-profile/{id}',"CoachController@updateprofile");
Route::get('/coach-admin/demandes',"CoachController@demandes");
Route::get('/coach-admin/commentaires',"CoachController@commentaires");
Route::get('/coach-admin/messages',"CoachController@messages");
Route::post('/coach-admin/valider-demande/{id}',"CoachController@validerdemande");
Route::post('/coach-admin/refuser-demande/{id}',"CoachController@refuserdemande");

Route::get('/coach-admin/students',"CoachController@students");
Route::get('/coach-admin/students-permessions/{id}',"CoachController@studentspermessions");
Route::post('/coach-admin/student-delete/{id}',"CoachController@studentdelete");
Route::post('/coach-admin/givepermissions',"CoachController@givepermissions");

//---------------------------------------------------------------------------------
Route::get('/coach-admin/articles',"ArticleController@index");
Route::get('/coach-admin/articles/ajouter',"ArticleController@create");
Route::post('/coach-admin/articles',"ArticleController@store");
Route::get('/coach-admin/articles/{id}/edit',"ArticleController@edit");
Route::put('/coach-admin/articles/{id}',"ArticleController@update");
Route::delete('/coach-admin/articles/{id}',"ArticleController@destroy");

//---------------------------------------------------------------------------------
Route::get('/coach-admin/galeries',"GalerieController@index");
Route::get('/coach-admin/galeries/ajouter',"GalerieController@create");
Route::post('/coach-admin/galeries',"GalerieController@store");
Route::get('/coach-admin/galeries/{id}/edit',"GalerieController@edit");
Route::put('/coach-admin/galeries/{id}',"GalerieController@update");
Route::delete('/coach-admin/galeries/{id}',"GalerieController@destroy");

//--------------------------------Formations---------------------------------------------

Route::get('/coach-admin/formations',"FormationController@index");
Route::get('/coach-admin/formations/ajouter',"FormationController@create");
Route::post('/coach-admin/formations',"FormationController@store");
Route::get('/coach-admin/formations/{id}/edit',"FormationController@edit");
Route::put('/coach-admin/formations/{id}',"FormationController@update");
Route::delete('/coach-admin/formations/{id}',"FormationController@destroy");

//--------------------------------Consultations---------------------------------------------

Route::get('/coach-admin/consultations',"ConsultationController@index");
Route::get('/coach-admin/consultations/ajouter',"ConsultationController@create");
Route::post('/coach-admin/consultations',"ConsultationController@store");
Route::get('/coach-admin/consultations/{id}/edit',"ConsultationController@edit");
Route::put('/coach-admin/consultations/{id}',"ConsultationController@update");
Route::delete('/coach-admin/consultations/{id}',"ConsultationController@destroy");

//-------------------------------Chapitres------------------------------------------------

Route::get('/coach-admin/formations-chapitres',"ChapitreController@index");
Route::get('/coach-admin/formations-chapitres/ajouter',"ChapitreController@create");
Route::post('/coach-admin/formations-chapitres',"ChapitreController@store");
Route::get('/coach-admin/formations-chapitres/{id}/edit',"ChapitreController@edit");
Route::put('/coach-admin/formations-chapitres/{id}',"ChapitreController@update");
Route::delete('/coach-admin/formations-chapitres/{id}',"ChapitreController@destroy");

//-------------------------------Courses------------------------------------------------

Route::get('/coach-admin/formations-courses',"CourseController@index");
Route::get('/coach-admin/formations-courses/ajouter',"CourseController@create");
Route::post('/coach-admin/formations-courses',"CourseController@store");
Route::get('/coach-admin/formations-courses/{id}/edit',"CourseController@edit");
Route::put('/coach-admin/formations-courses/{id}',"CourseController@update");
Route::delete('/coach-admin/formations-courses/{id}',"CourseController@destroy");

//Route::resource('/admin/coachs','CoachController');