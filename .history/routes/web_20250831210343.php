<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MonController;
use App\Http\Middleware\AuthMiddleware;
use App\Models\Livre;
use App\Models\User;
use App\Models\Action;
use App\Models\SoftDeletes;
use App\Models\StatutConnexion;
use App\Models\NumeroTelephone;
use App\Models\Roles;
use App\Models\UserRole;
use App\Models\Structure;
use App\Models\UsersStructures;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\MonMail;
use DB;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';

Route::fallback(function () {
    return "page not found";
});


//pages de connexion,d'inscription et de deconnexion
//si un user veut se connecter
Route::get("/connexion",[MonController::class,'index']);

//lorsqu'il essaie de se connecter
Route::post('/traiter_login',[MonController::class,'traiterLogin']);

//si un user ne possède pas de compte
Route::get("/s'inscrire",function(){
    return view("inscription");
});

//traitement de la création de compte
Route::post('/traiter_creation_compte',[MonController::class,'creerCompteUtilisateurExterne']);

//si un user veut accéder au dashboard
Route::get('/dashboard_dep',[MonController::class,'index']);

//si l'admin veut consulter les historiques
Route::get('/historiques',[MonController::class,'afficherHistorique']);
//si l'admin veut filtrer les historiques
Route::post('/resultat-filtre',[MonController::class,'afficherResultatHistorique']);
//si l'admin veut gérer les utilisateurs
Route::get('/gerer_utilisateurs',[MonController::class,'gererUtilisateurs']);
//si l'admin veut créer un compte
Route::get('/creer_utilisateur',[MonController::class,'creerCompte']);
//le système va créer le compte
Route::post('/traiter_formulaire_creation_utilisateur',[MonController::class,'traiterFormulaireCreationCompte']);
//une fois que système cree un utilisateur cela va afficher une reponse
Route::get('/creation_utilisateurs_ok',[MonController::class,'afficherReponseCreationUtilisateur']);


Route::get('/traiter_formulaire_modification_utilisateur/{id}',function(Request $request,$id){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'administrateur
    $users_roles=UserRole::where('id_user',$user_id)->first();  //recupère le numéro du role de l'administrateur
    $user1=User::find($id);  //va rechercher dans la base données l'utilisateur dont on veut modifier les données
    $tel=NumeroTelephone::where('id_user',$id)->get();
    $user1_role=UserRole::where('id_user',$id)->get();
    $role=Roles::where('nomRole',$request->role)->get(); //récupères le nom de l'utilisateur à modifier
    $user1_structure=UsersStructures::where('structure_id',$id)->get();  //récupères le numéro de la structure de l'utilisateur à modifier
    $structure=Structure::where('nomStructure',$request->structure)->get();
    if($user_id){
        //changement des valeurs
        $user1->update(
            [
                'name'=> $request->nom,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]

        );
        DB::update("update numero_telephones set numeroTelephone=(?) where id_user=(?)",[$request->tel,$id]);
        DB::update("update user_roles set id_role=(?) where id_user=(?)",[$role[0]["id"],$id]);
        DB::update("update users_structures set structure_id=(?) where user_id=(?)",[$structure[0]["id"],$id]);
        $users_roles=UserRole::where('id_user',$user_id)->first();  //role de l'administrateur
        $all_users=User::all();  //tout les utilisateurs
        $all_user_role=UserRole::all();                // tout les roles des utilisateurs
        $all_telephone=NumeroTelephone::all();  //tout les numeros de telephones des utilisateurs
        $all_roles=Roles::all();  //tout les roles 
        $all_structures=Structure::all();  //toutes les structures
        $all_users_structures=UsersStructures::all();  //les structures auxquelles sont rattachés chaque utilisateurs
        $action=new Action();
        $action->nomAction="l'administrateur a modifié les informations de l'utilisateur ".$user1->name;
        $action->id_user=$user->id;
        $action->save();
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        return redirect('/modification_utilisateur_ok');
        //return view('admin_reponse_modifier_utilisateur',compact('users_roles','user','all_users','all_user_role','all_telephone','all_roles','all_structures','all_users_structures'));
    }else{
        return view('connexion');
    }
    
});

//affichage des modifications
Route::get('/modification_utilisateur_ok',[MonController::class,'afficherReponseModificationUtilisateur']);
//si le système veut modifier un compte
Route::get('/modifier_utilisateur/{id}',function($id){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'administrateur
    $users_roles=UserRole::where('id_user',$user_id)->first();  //recupère le numéro du role de l'administrateur
    $user1=User::find($id);  //va rechercher dans la base données l'utilisateur dont on veut modifier les données
    //echo $user1;
    $tel=NumeroTelephone::where('id_user',$id)->get();  //prendre le numero de telephone de l'utilisateur à modifier
    //echo $tel;
    $role_user=UserRole::where('id_user',$id)->get();   //prendre le numéro du role de l'user
    //echo $role_user;
    $nom_role_user=Roles::where('id',$role_user[0]['id_role'])->get();  //prendre le nom du role de l'utilisateur
    //echo $nom_role_user;
    $structure_user=UsersStructures::where('user_id',$id)->get();  //on prend le numéro de la structure du user
    $nom_structure_user=Structure::where('id',$structure_user[0]['structure_id'])->get();  //on prend le nom du role de l'utilisateur
    //echo $nom_structure_user;
    $autres_roles=Roles::where('id','!=',$role_user[0]['id_role'])->get();  //récupères les autres rôles autre que celui de l'utilisateur à modifier
    $autres_structures=Structure::where('id','!=',$structure_user[0]['structure_id'])->get();  //récupères les autres strucutures autre que celui de l'utilisateur à modifier
    if($user_id){
        $action=new Action();
        $action->nomAction="l'administrateur ".$user->name."veut modifier l'utilisateur ".$user1->name;
        $action->id_user=$user->id;
        $action->save();
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        return view('admin_modifier_utilisateur',compact('users_roles','user1','user','tel','role_user','nom_role_user','structure_user','nom_structure_user','autres_roles','autres_structures'));
    }else{
        return view('connexion');
    }
    
});
//supprimer un utilisateur
Route::get("/supprimer_utilisateur/{id}",function($id){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'administrateur
    $users_roles=UserRole::where('id_user',$user_id)->first();  //recupère le numéro du role de l'administrateur
    if($user_id){
        $all_users=User::all();  //tout les utilisateurs
        $all_user_role=UserRole::all();                // tout les roles des utilisateurs
        $all_telephone=NumeroTelephone::all();  //tout les numeros de telephones des utilisateurs
        $all_roles=Roles::all();  //tout les roles 
        $all_structures=Structure::all();  //toutes les structures
        $all_users_structures=UsersStructures::all();  //les structures auxquelles sont rattachés chaque utilisateurs
        $action=new Action();
        $action->nomAction="l'administrateur a supprimé l'utilisateur";
        $action->id_user=$user->id;
        DB::delete("delete from users where id=?",[$id]);
        $action->save();
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        return redirect('/supprimer_utilisateur_ok');
        //return view('admin_reponse_supprimer_utilisateur',compact('users_roles','user','all_users','all_user_role','all_telephone','all_roles','all_structures','all_users_structures'));
    }else{
        return view('connexion');
    }
});

Route::get('/supprimer_utilisateur_ok',[MonController::class,'afficherReponseSuppressionUtilisateur']);
//si un user veut se deconnecter
Route::get("/se deconnecter/{id}",function(Request $request,$id){
    $statut_conn_user=StatutConnexion::where('id_user',$id)->get();
    echo $statut_conn_user;
    $statut_conn_user->update(['estConnecte'=>0]);
    //$request->session()->forget('user_id');
    //return redirect('/connexion');
});


//

Route::get('/test',function(){
    return view('test_page');
});

Route::get('/rediriger_home',function(){
    return redirect('/');
});