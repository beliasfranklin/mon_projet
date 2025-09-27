<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersStructures;
use App\Models\Structure;
use App\Models\SousStructures;
use App\Models\Service;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Action;
use App\Models\StatutConnexion;
use App\Models\NumeroTelephone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodeMail;

class MonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $code_email;
    


    public function index(Request $request)
    {
        //
        $user_id = session('user_id');
        $user=User::find($user_id);
        $actions=new Action();
        $users_roles=UserRole::where('id_user',$user_id)->first();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $actions->nomAction="utilisateur ".$user->name." a consulté le tableau de bord";
            $actions->id_user=$user->id;
            $actions->save();
            return view('dashboard_dep',compact('user','users_roles'));
        }else{
            return view('connexion');
        }   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return $request->email;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //methode permettant de creer un compte
    public function creerCompteUtilisateurExterne(Request $request){
        $user=new User();
        $roles=new Roles();
        $actions=new Action();
        $user_roles=new UserRole();
        if($request->password != $request->confirm_password){
            return view('mdp_different');
        }elseif(User::where('email',$request->email)->exists()){
            return view('email_deja_utilise');
        }else{
            //créer un nouvel utilisateur externe avec son role
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->name=$request->nom;
            $user->save();
            $user_roles->id_role=15;
            $user_roles->id_user=$user->id;
            $user_roles->save();
            $actions->nomAction="utilisateur ".$user->name." a cree son compte";
            $actions->id_user=$user->id;
            $actions->save();
            $conn=new StatutConnexion();
            $conn->id_user=$user->id;
            $conn->estConnecte=0;
            $conn->save();
            //recuperation des données de l'utilisateur créé
            //$user=User::find($id);
            //$roles->id_user=$id;
            //$actions->id_user=$id;
            //$actions->nomAction="Utilisateur".$user->name."a cree un nouveau compte utilisateur_externe";
            //$actions->save();
            //$roles->save();
            return view("compte_cree_avec_succes");
        }
        
    }
    public function afficherUtilisateurs(){
        $users=User::all();
        return view('test',compact('users'));
    }
    public function traiterLogin(Request $request){
        $actions=new Action();
        $e=$request->email;
        $p=$request->password;
        $users=User::where('email',$e)->first();
        if($users && Hash::check($p,$users->password)){
            session(['user_id' => $users->id]); //creation de la session
            $actions->nomAction="utlisateur ".$users->name." s'est connecté au système";
            $actions->id_user=$users->id;
            $actions->save();
            return redirect('/dashboard_dep');
        }else{
            return view('identifiants_incorrects');
        }
        
    }
    public function envoyerCode(Request $request){
        $actions=new Action();
        $e=$request->email;
        if(!User::where('email',$e)->exists()){
            return view('email_non_existante');
        }else{
            //continuer
            $user=User::where('email',$e)->first();
            $actions->nomAction="utilisateur ".$user->name." a oublie son mot de passe. il tente de le recuperer";
            $actions->id_user=$user->id;
            $actions->save();
            //générer un code aléatoire
            $code=rand(100000,999999);
            //envoyer le code par email
            //Mail::to($e)->send(new CodeMail($code));
            //rediriger vers la page de vérification du code
            return view('recevoir_code',compact('code','e'));
        }
         
    }
    public function verifierCode(Request $request){

        
    }
    //affichage de la page dashboard
    public function afficherDashboard(){
        $user_id = session('user_id');
        $users = User::find($user_id);
        $roles=Roles::find('id_user',$user_id);
        return view('dashboard_dep',compact('users','roles'));
    }

    //affichage de l'historique
    public function afficherHistorique(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $action=new Action();
        $hist=Action::all();
        $users_hist=User::all();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $action->nomAction="l'utilisateur ".$user->name."a consulté l'historique des actions";
            $action->id_user=$user->id;
            $action->save();
            return view('admin_consulter_historiques',compact('user','users_roles','hist','users_hist'));
        }else{
            return view('connexion');
        }
    }
    public function afficherResultatHistorique(Request $request){
        //on filtre selon les résultats suivants : Aujourd'hui , hier , il y'a 7 jours , il y'a 1 mois il y'a 1 an
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $hist=Action::all();
        $action=new Action();
        $users_hist=User::all();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $result=$request->date_opt;
            $action->nomAction="l'utilisateur ".$user->name."a affiné la recherche sur l'historique des actions";
            $action->id_user=$user->id;
            $action->save();
            return view('admin_resultat_historiques',compact('user','users_roles','hist','users_hist','result'));
        }else{
            return view('connexion');
        }
        
    }

    //gestion des utilisateurs

    public function gererUtilisateurs(){
        $user_id = session('user_id'); //id de session de l'utilisateur
        $user=User::find($user_id); //recherche l'administrateur
        $users_roles=UserRole::where('id_user',$user_id)->first();  //role de l'administrateur
        $users=User::all();  //tout les utilisateurs
        $user_role=UserRole::all();                // tout les roles des utilisateurs
        $telephone=NumeroTelephone::all();  //tout les numeros de telephones des utilisateurs
        $roles=Roles::all();  //tout les roles 
        $structures=Structure::all();  //toutes les structures
        $users_structures=UsersStructures::all();  //les structures auxquelles sont rattachés chaque utilisateurs

        if($user_id){
            $action=new Action();
            $action->nomAction="l'utilisateur ".$user->name."gère les utilisateurs";
            $action->id_user=$user->id;
            $action->save();
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            return view('admin_gerer_utilisateurs',compact('user','users_roles','roles','structures','users_structures','telephone','user_role','users'));
        }else{
            return view('connexion');
        }

    }
    //admin cree un compte utilisateur
    public function creerCompte(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $structure=Structure::all();  //table des structures
        $roles=Roles::all();
        $action=new Action();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $action->nomAction="l'utilisateur ".$user->name."veut creer le compte";
            $action->id_user=$user->id;
            $action->save();
            return view('admin_creer_utilisateur',compact('user','users_roles','roles','structure'));
        }else{
            return view('connexion');
        }

    }
    //le système va créer un compte puis renvoie un résultat
    public function traiterFormulaireCreationCompte(Request $request){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first(); //
        $action=new Action();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            //recuperation des données du formulaire , traitement et validation
            $u=new User();
            $ur=new UserRole();
            $us=new UsersStructures();
            $t=new NumeroTelephone();
            $u->name=$request->nom;
            $u->email=$request->email;
            $u->password=Hash::make($request->mdp);
            $u->save();
            $t->numeroTelephone=$request->tel;
            $t->id_user=$u->id;
            $t->save();
            $role_trouve=Roles::where('nomRole',$request->role)->get();
            $ur->id_user=$u->id;
            $ur->id_role=$role_trouve[0]['id'];
            $ur->save();
            $structure_trouve=Structure::where('nomStructure',$request->structure)->get();
            $us->user_id=$u->id;
            $us->structure_id=$structure_trouve[0]['id'];
            $us->save();
            $action->nomAction="l'utilisateur ".$user->name."a créé le compte";
            $action->id_user=$user->id;
            $action->save();
            return redirect('/creation_utilisateurs_ok');
        }else{
            return view('connexion');
        }
    }
    //affichage de la reponse lors de la création du compte
    public function afficherReponseCreationUtilisateur(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $users=User::all();  //tout les utilisateurs
            $user_role=UserRole::all();                // tout les roles des utilisateurs
            $telephone=NumeroTelephone::all();  //tout les numeros de telephones des utilisateurs
            $roles=Roles::all();  //tout les roles 
            $structures=Structure::all();  //toutes les structures
            $users_structures=UsersStructures::all();  //les structures auxquelles sont rattachés chaque utilisateurs
            return view('admin_reponse_utilisateur',compact('user','users_roles','roles','structures','users_structures','telephone','user_role','users'));

        }
        
    }



}
