<?php

require __DIR__.'/api.php';

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
use App\Models\Dossier;
use App\Models\StatutConnexion;
use App\Models\NumeroTelephone;
use App\Models\Roles;
use App\Models\UserRole;
use App\Models\Structure;
use App\Models\UsersStructures;
use App\Models\StatutUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Mail\MonMail;
use App\Notifications\InvoicePaid;
use App\Notifications\NotificationWindows;
use App\Notifications\EnvoiCodeVerification;
use DB;
Route::get('/', function () {
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'administrateur
    $users_roles=UserRole::where('id_user',$user_id)->first();  //recupère le numéro du role de l'administrateur
    if($user_id){
        $action=new Action();
        $action->nomAction="l'utilisateur ".$user->name." accède au dashboard";
        $action->id_user=$user->id;
        $action->save();
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);    
        return redirect('/dashboard_dep');
        //return view('admin_reponse_supprimer_utilisateur',compact('users_roles','user','all_users','all_user_role','all_telephone','all_roles','all_structures','all_users_structures'));
    }else{
        return view('welcome');
    }
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
Route::get("/connexion",function(){
   return view('connexion'); 
});

//lorsqu'il essaie de se connecter
Route::post('/traiter_login',[MonController::class,'traiterLogin']);

//identifiants incorrects
Route::get('/connexion/error',function(){
    return view('identifiants_incorrects');
});

//utilisateur bloqué
Route::get('/connexion/block',function(){
    return view('utilisateur_bloqué');
});
//si un user ne possède pas de compte
Route::get("/s'inscrire",function(){
    return view("inscription");
});

//si un user a oublié son mot de passe
Route::get('/motDePasseOublie',function(){
    return view('motDePasseOublie');
});

//envoi du code de vérification
Route::post('/envoi_code',[MonController::class,'envoyerCode']);

//vérification du code
Route::post('/verifier_code',[MonController::class,'verifierCode']);

//affichage du formulaire de réinitialisation du mot de passe
Route::get('/reinitialiser_mot_de_passe',function(){
    return view('reinitialiser_mot_de_passe');
});

//réinitialisation du mot de passe
Route::post('/reinitialiser_mot_de_passe',[MonController::class,'reinitialiserMotDePasse']);

//affichage de la réponse
Route::get('/reinitialisation_mot_de_passe_ok',function(){
    return view('reinitialisation_mot_de_passe_ok');
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
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);    
        return redirect('/modification_utilisateur_ok');
        //return view('admin_reponse_modifier_utilisateur',compact('users_roles','user','all_users','all_user_role','all_telephone','all_roles','all_structures','all_users_structures'));
    }else{
        return view('welcome');
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
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);    
        return view('admin_modifier_utilisateur',compact('users_roles','user1','user','tel','role_user','nom_role_user','structure_user','nom_structure_user','autres_roles','autres_structures'));
    }else{
        return view('welcome');
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
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);    
        return redirect('/supprimer_utilisateur_ok');
        //return view('admin_reponse_supprimer_utilisateur',compact('users_roles','user','all_users','all_user_role','all_telephone','all_roles','all_structures','all_users_structures'));
    }else{
        return view('welcome');
    }
});
//bloquer un utilisateur
Route::get('/bloquer_utilisateur/{id}',function($id){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'administrateur
    $users_roles=UserRole::where('id_user',$user_id)->first();  //recupère le numéro du role de l'administrateur
    if($user_id){
        $user_block=User::find($id); //recherche l'utilisateur a bloquer
        $action=new Action();
        $action->nomAction="l'administrateur a bloque l'utilisateur ".$user_block->name;
        $action->id_user=$user->id;
        DB::update("update statut_users set statut=? where id_user=?",['bloqué',$id]);
        DB::update("update statut_connexions set estConnecte=0 where id_user=?",[$id]);
        $action->save();
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);    
        return redirect('/blocage_utilisateur_ok');
        //return view('admin_reponse_supprimer_utilisateur',compact('users_roles','user','all_users','all_user_role','all_telephone','all_roles','all_structures','all_users_structures'));
    }else{
        return redirect('/');
    }
});
Route::get('/blocage_utilisateur_ok',[MonController::class,'afficherResponseBloquerUtilisateurOk']);
Route::get('/supprimer_utilisateur_ok',[MonController::class,'afficherReponseSuppressionUtilisateur']);
//si un user veut se deconnecter
Route::get("/se deconnecter/{id}",function(Request $request,$id){
    DB::update("update statut_connexions set estConnecte=0 where id_user=?",[$id]);
    DB::update("update statut_users set statut='inactif' where id_user=?",[$id]);
    $request->session()->forget('user_id');
    return redirect('/');
});


//

Route::get('/test',function(Request $request){
    $code=rand(100000,999999);
    $message=$code;
    Notification::route('mail', 'beliasfranklin@gmail.com')->notify(new EnvoiCodeVerification($code));

    return "Notification envoyée directement par email.";
    /*$user->update([
        'push_subscriptions' => json_encode($request->all())
    ]);
    return response()->json(['success' => true]);*/
    //return view('test2');
});



Route::get('/rediriger_home',function(){
    return redirect('/');
});



Route::get('/dep-test',function(){
    return view('ministre_voir_dossier_interne');
});

Route::get('/telecharger/{id}',function($id){
    $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $action=new Action();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $piece=PiecesJointes::find($id);
            if($users_roles->id_role==16){
                if(!Storage::disk('private')->exists('Ministre/'.$piece->nomPieceJointe)){
                    abort(404);
                }
                $action->nomAction="le ministre telecharge un fichier";
                return Storage::disk('private')->download('Ministre/'.$piece->nomPieceJointe);
            }else{
                $user_ext_fichier=Dossier::find($piece->dossier);
                if(!Storage::disk('private')->exists($user_ext_fichier->envoyer_par.'/'.$piece->nomPieceJointe)){
                abort(404);
                }
                $action->nomAction="l'utilisateur".$user->name."telecharge un fichier";
                return Storage::disk('private')->download($user_ext_fichier->envoyer_par.'/'.$piece->nomPieceJointe);
            }
            $action->id_user=$user->id;
            $action->save();
            
        }else{
            return redirect('/');
        }    
    
});

//routes du ministre
//envoyer dossier interne
Route::get('/ministre_envoyer_dossier_interne',[MonController::class,'envoyerDossierInterne']);
//traitement du formulaire d'envoi du formulaire d'envoi d'un dossier interne
Route::post('/traiter_formulaire_envoi_dossier_interne',[MonController::class,'traiterFormulaireDossierInterne']);
//affichage de la réponse 
Route::get('/ministre_envoyer_dossier_interne_ok',function(){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche le ministre
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);
        return view('ministre_envoyer_dossier_interne_response',compact('user'));
        //return view('admin_reponse_supprimer_utilisateur',compact('users_roles','user','all_users','all_user_role','all_telephone','all_roles','all_structures','all_users_structures'));
    }else{
        return redirect('/');
    }
    
});
//voir les détails sur le dossier interne envoyé à la DEP
Route::get('/voir_dossier_externe/{id}',function($id){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'utilisateur
    $users_roles=UserRole::where('id_user',$user_id)->first();  //recupère le numéro du role de l'utilisateur
    if($user_id){
        $dossier=Dossier::find($id);  //recherche le dossier
        $pieces=PiecesJointes::where('id_user',$id)->get();  //pieces du dossier envoyés par le ministre
        $action=new Action();
        $action->nomAction="le membre du courrier ".$user->name." a consulté un dossier interne";
        $action->id_user=$user->id;
        $action->save();
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);
        return view('courrier_dep_voir_dossier_externe',compact('dossier','pieces','user'));
    }else{
        return redirect('/');
    }
});




//Routes de l'usager externe
Route::get('/usager_externe_envoyer_dossier_externe',[MonController::class,'envoyerDossierExterne']);
//traitement de la requete d'envoi dossier externe
Route::post('/traiter_formulaire_envoi_dossier_externe',[MonController::class,'traiterFormulaireDossierExterne']);
//reponse de la requete
Route::get('/usager_externe_envoyer_dossier_externe_ok',function(){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'utilisateur externe
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);
        return view('usager_externe_envoyer_dossier_externe_response',compact('user'));
    }else{
        return redirect('/');
    }
});
//route pour les résultats
Route::get('/resultats',function(){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'utilisateur externe
    $dossier=Dossier::where('statutDossier','valide')->where('typeDossier','externe')->where('envoye_par',$user->name)->get();
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);
        return view('usager_externe_voir_resultats',compact('user','dossier'));
    }else{
        return redirect('/');
    }
});


//routes du courrier de la DEP
Route::get('/courrier_dep_voir_dossier_externe',function(){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'utilisateur externe
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);
        $action=new Action();
        $action->nomAction="le membre du courrier".$user->name."consulte la liste des dossiers externe recus par l'exterieur";
        $action->id_user=$user->id;
        $action->save();
        $dossiers_externes=Dossier::where('typeDossier','externe')->where('statutDossier','cree')->get();
        return view('courrier_dep_recevoir_dossier_externe',compact('user','dossiers_externes'));
    }else{
        return redirect('/');
    }
});
//transfert du dossier vers la DEP par le courrier
Route::get('/transfert_dep/{id}',function($id){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche l'utilisateur externe
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
        $statut_user->update(['statut'=>'disponible']);
        $dossier_transfert=Dossier::where('statutDossier','cree')->where('id',$id)->where('typdeDossier','externe')->get();
        $dossier_transfert->update([
            'statutDossier'=>'recu par DEP'
        ]);
        //envoi de la notification


        $action=new Action();
        $action->nomAction="le membre du courrier ".$user->name." transfère le dossier intitulé ".$dossier_transfert->intitule." a la DEP";
        $action->id_user=$user->id;
        $action->save();
        return redirect('/transfert_dossier_dep_ok');
    }else{
        return redirect('/');
    }
});
//dans le cas ou le dossier est transferer a la DEP avec succès
Route::get('/transfert_dossier_dep_ok',function(){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche le membre courrier de la DEP
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first(); 
        $statut_user->update(['statut'=>'disponible']);
        $action=new Action();
        $action->nomAction="le membre du courrier".$user->name."consulte la liste des dossiers externe recus par l'exterieur";
        $action->id_user=$user->id;
        $action->save();
        $dossiers_externes=Dossier::where('typeDossier','externe')->where('statutDossier','cree')->get();
        return view('courrier_dep_recevoir_dossier_externe_ok',compact('user','dossiers_externes'));
    }else{
        return redirect('/');
    }
});
//un membre du courrier rejette le dossier de l'utilisateur externe puis le système lui envoi une modifiaction
Route::post('/traitement_rejet_dossier/{id}',function($id){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche le membre courrier de la DEP
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first(); 
        $statut_user->update(['statut'=>'disponible']);
        $user_ext=User::where('name',$dossier->envoyer_par)->first();  //recherche l'utilisateur qui a déposé le dossier
        
        //envoi de la notification
        

        $action=new Action();
        $action->nomAction="le membre du courrier ".$user->name." envoie une notification de rejet du dossier à l'utilisateur ".$user_ext->name;
        $action->id_user=$user->id;
        $action->save();
        return redirect('/courrier_recevoir_dossier_externe_rejet_ok');

    }else{
        return redirect('/');
    }
});
Route::get('courrier_dep_recevoir_dossier_externe_rejet_ok',function(){
    $user_id = session('user_id'); //id de session de l'utilisateur
    $user=User::find($user_id); //recherche le membre courrier de la DEP
    if($user_id){
        $conn=StatutConnexion::where('id_user',$user_id);
        $conn->update(['estConnecte'=> 1]);
        $statut_user=StatutUser::where('id_user',$user_id)->get()->first(); 
        $statut_user->update(['statut'=>'disponible']);
        $action=new Action();
        $action->nomAction="le membre du courrier".$user->name."consulte la liste des dossiers externe recus par l'exterieur";
        $action->id_user=$user->id;
        $action->save();
        $dossiers_externes=Dossier::where('typeDossier','externe')->where('statutDossier','cree')->get();
        return view('courrier_dep_recevoir_dossier_externe_rejet_ok',compact('user','dossiers_externes'));
    }else{
        return redirect('/');
    }
});
/*Route::post('/voir',function(Request $request){
    $request->validate([
        'password'=>'required|min:8',
    ],[
        'password.required'=>'mot de passe requis',
        'password.min'=>'mot de passe doit contenir au moins 8 caractères',
        'password.confirmed'=>'la confirmation du mot de passe ne correspond pas'
    ]);
    return redirect('/')->with('success','mot de passe valide');
});*/
Route::post('/voir',[MonController::class,'traiterTest2']);