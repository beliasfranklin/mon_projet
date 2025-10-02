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
use App\Models\Dossier;
use App\Models\PiecesJointes;
use App\Models\StatutUser;
use App\Models\CodesVerifications;
use App\Models\EnvoyerRecevoirDossier; 
use App\Notifications\EnvoiCodeVerification;
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
        $dossiers=Dossier::all();
        $pieces_jointes=PiecesJointes::all();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $actions->nomAction="utilisateur ".$user->name." a consulté le tableau de bord";
            $actions->id_user=$user->id;
            $actions->save();
            return view('dashboard_dep',compact('user','users_roles','dossiers','pieces_jointes'));
        }else{
            return view('welcome');
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
        $validated = $request->validate(
            [
                'nom' => [
                    'required',
                    'string',
                    'max:255',
                    "regex:/^[a-zA-ZÀ-ÿ\s\-']+$/u"
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email'
                ],
                'password' => [
                    'required',
                    'min:8',
                    'max:255',
                    'confirmed',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).{8,}$/'
                ],    
            ],
            [
                'nom.required' => 'Le nom est requis.',
                'nom.string' => 'Le nom doit être une chaîne de caractères.',
                'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',
                'nom.regex' => 'Le nom ne doit contenir que des lettres, espaces ou tirets.',
                'email.required' => "L'email est requis.",
                'email.email' => "L'email doit être valide.",
                'email.max' => "L'email ne doit pas dépasser 255 caractères.",
                'email.unique' => 'Cet email est déjà utilisé.',
                'password.required' => 'Le mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
                'password.max' => 'Le mot de passe ne doit pas dépasser 255 caractères.',
                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
                'password.regex' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre.',
                'password_confirmation.required' => 'La confirmation du mot de passe est requise.',
                'password_confirmation.min' => 'La confirmation doit contenir au moins 8 caractères.',
                'password_confirmation.max' => 'La confirmation ne doit pas dépasser 255 caractères.',
                'password_confirmation.regex' => 'La confirmation doit contenir au moins une minuscule, une majuscule et un chiffre.',
                'password_confirmation.confirmed' => 'La confirmation du mot de passe ne correspond pas.'
            ]
        );

        $user = new User();
        $user_roles = new UserRole();
        $user_statut = new StatutUser();
        $actions = new Action();

        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->name = $validated['nom'];
        $user->save();

        $user_roles->id_role = 18; // rôle par défaut pour utilisateur externe
        $user_roles->id_user = $user->id;
        $user_roles->save();

        $actions->nomAction = "utilisateur " . $user->name . " a cree son compte";
        $actions->id_user = $user->id;
        $actions->save();

        $conn = new StatutConnexion();
        $conn->id_user = $user->id;
        $conn->estConnecte = 0;
        $conn->save();

        $user_statut->id_user = $user->id;
        $user_statut->statut = 'inactif';
        $user_statut->save();

        return redirect('/connexion/compte/ok');
    }
    public function afficherUtilisateurs(){
        $users=User::all();
        return view('test',compact('users'));
    }
    public function traiterLogin(Request $request){
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|string|min:8'
            ],
            [
                'email.required' => "L'email est requis.",
                'email.email' => "L'email doit être valide.",
                'password.required' => 'Le mot de passe est requis.',
                'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.'
            ]
        );
        $actions=new Action();
        $e=$request->email;
        $p=$request->password;
        $users=User::where('email',$e)->first();
        if($users && Hash::check($p,$users->password)){
            $statut_user=StatutUser::where('id_user',$users->id)->first();
            if($statut_user->statut=='bloque'){
                $actions->nomAction="utlisateur ".$users->name." a tenté de se connecter au système mais son compte est bloqué";
                $actions->id_user=$users->id;
                $actions->save();                
                return redirect('/connexion/block');
            }else{
                session(['user_id' => $users->id]); //creation de la session
                $actions->nomAction="utlisateur ".$users->name." s'est connecté au système";
                $actions->id_user=$users->id;
                $actions->save(); 
                return redirect('/dashboard_dep');
            }
        }else{
            $actions->nomAction="utlisateur ".$e." a tenté de se connecter au système avec un mot de passe erroné";
            $actions->id_user=$users ? $users->id : null;
            return redirect('/connexion/error');
        }
        
    }
    public function envoyerCode(Request $request){
        $request->validate(
            [
                'email' => 'required|email'
            ],
            [
                'email.required' => "L'email est requis.",
                'email.email' => "L'email doit être valide."
            ]
        );
        $actions=new Action();
        $e=$request->email;
        if(!User::where('email',$e)->exists()){
            return redirect('/motDePasseOublie/error');
        }else{
            //continuer
            $user=User::where('email',$e)->first();
            $actions->nomAction="utilisateur ".$user->name." a oublie son mot de passe. il tente de le recuperer";
            $actions->id_user=$user->id;
            $actions->save();
            //envoyer le code par email
            $code=rand(100000,999999);
            CodesVerifications::create([
                'id_user'=>$user->id,
                'code'=>$code
            ]);
            $user->notify(new EnvoiCodeVerification($code));
            return view('recevoir_code',compact('user'));
        }
         
    }
    public function verifierCode(Request $request){
        $request->validate([
            'code' => 'required|digits:6',
            'email' => 'required|email|exists:users,email'
        ], [
            'code.required' => 'Le code est requis.',
            'code.digits' => 'Le code doit contenir exactement 6 chiffres.',
            'email.required' => "L'email est requis.",
            'email.email' => "L'email doit être valide.",
            'email.exists' => "Cet email n'existe pas."
        ]);
        $e = $request->email;
        $c = $request->code;
        $user = User::where('email', $e)->first();
        if (!$user) {
            return redirect("/recevoir_code/error/$user->id");
        }
        $code_trouve = CodesVerifications::where('id_user', $user->id)
            ->where('code', $c)
            ->first();
        if ($code_trouve) {
            // Code correct, supprimer le code de la table
            CodesVerifications::where('id_user', $user->id)->delete();
            $id = $user->id;
            return redirect("/reinitialisation_mdp/user/$id");
        } else {
            return redirect("/recevoir_code/error/$user->id");
        }
    }
    //reinitialisation du mot de passe
    public function reinitialiserMotDePasse(Request $request){
        $request->validate([
            'password' => [
                'required',
                'min:8',
                'max:255',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).{8,}$/'
            ],
            'password_confirmation' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).{8,}$/'
            ]
        ], [
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.max' => 'Le mot de passe ne doit pas dépasser 255 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.regex' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre.',
            'password_confirmation.required' => 'La confirmation du mot de passe est requise.',
            'password_confirmation.min' => 'La confirmation doit contenir au moins 8 caractères.',
            'password_confirmation.max' => 'La confirmation ne doit pas dépasser 255 caractères.',
            'password_confirmation.regex' => 'La confirmation doit contenir au moins une minuscule, une majuscule et un chiffre.'
        ]);
        $user=User::find($request->id);
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect('/connexion/password_ok');
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
            return view('admin.admin_consulter_historiques',compact('user','users_roles','hist','users_hist'));
        }else{
            return redirect('/');
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
            return view('admin.admin_resultat_historiques',compact('user','users_roles','hist','users_hist','result'));
        }else{
            return redirect('/');
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
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $action=new Action();
            $action->nomAction="l'utilisateur ".$user->name."gère les utilisateurs";
            $action->id_user=$user->id;
            $action->save();
            return view('admin.admin_gerer_utilisateurs',compact('user','users_roles','roles','structures','users_structures','telephone','user_role','users'));
        }else{
            return redirect('/');
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
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $action->nomAction="l'utilisateur ".$user->name."veut creer le compte";
            $action->id_user=$user->id;
            $action->save();
            return view('admin.admin_creer_utilisateur',compact('user','users_roles','roles','structure'));
        }else{
            return redirect('/');
        }

    }
    //le système va créer un compte puis renvoie un résultat
// ...existing code...
public function traiterFormulaireCreationCompte(Request $request)
{
    $validated = $request->validate(
        [
            'nom' => [
                'required',
                'string',
                'max:255',
                "regex:/^[a-zA-ZÀ-ÿ\s\-']+$/u"
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'tel' => [
                'required',
                'regex:/^\+?[0-9]{7,15}$/'
            ],
            'mdp' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).{8,}$/'
            ],
            'role' => [
                'required',
                'exists:roles,nomRole'
            ],
            'structure' => [
                'required',
                'exists:structures,nomStructure'
            ]
        ],
        [
            'nom.required' => 'Le nom est requis.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'nom.regex' => 'Le nom ne doit contenir que des lettres, espaces ou tirets.',
            'email.required' => "L'email est requis.",
            'email.email' => "L'email doit être valide.",
            'email.max' => "L'email ne doit pas dépasser 255 caractères.",
            'email.unique' => 'Cet email est déjà utilisé.',
            'tel.required' => 'Le numéro de téléphone est requis.',
            'tel.regex' => "Le numéro de téléphone doit contenir uniquement des chiffres et peut commencer par un '+'.",
            'mdp.required' => 'Le mot de passe est requis.',
            'mdp.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'mdp.max' => 'Le mot de passe ne doit pas dépasser 255 caractères.',
            'mdp.regex' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre.',
            'role.required' => 'Le rôle est requis.',
            'role.exists' => "Le rôle sélectionné n'existe pas.",
            'structure.required' => 'La structure est requise.',
            'structure.exists' => "La structure sélectionnée n'existe pas."
        ]
    );

    $user_id = session('user_id');
    $admin = User::find($user_id);

    if (!$admin) {
        return redirect('/');
    }

    // Création de l'utilisateur
    $user = new User();
    $user->name = $validated['nom'];
    $user->email = $validated['email'];
    $user->password = \Hash::make($validated['mdp']);
    $user->save();

    // Ajout du numéro de téléphone
    NumeroTelephone::create([
        'numeroTelephone' => $validated['tel'],
        'id_user' => $user->id
    ]);

    // Récupération du rôle et de la structure
    $role = Roles::where('nomRole', $validated['role'])->first();
    $structure = Structure::where('nomStructure', $validated['structure'])->first();

    // Attribution du rôle
    UserRole::create([
        'id_user' => $user->id,
        'id_role' => $role ? $role->id : null
    ]);

    // Attribution de la structure
    UsersStructures::create([
        'user_id' => $user->id,
        'structure_id' => $structure ? $structure->id : null
    ]);

    // Création du statut utilisateur
    StatutUser::create([
        'id_user' => $user->id,
        'statut' => 'inactif'
    ]);

    // Historique de l'action
    Action::create([
        'nomAction' => "L'utilisateur {$admin->name} a créé le compte {$user->name}",
        'id_user' => $admin->id
    ]);

    // Connexion
    StatutConnexion::create([
        'id_user' => $user->id,
        'estConnecte' => 0
    ]);

    return redirect('/creation_utilisateurs_ok');
}

//affichage de la reponse lors de la création du compte utilisateur
public function afficherReponseCreationUtilisateur()
{
    $user_id = session('user_id');
    if (!$user_id) {
        return redirect('/')->with('error', "Session administrateur introuvable.");
    }

    $user = User::find($user_id);
    $users_roles = UserRole::where('id_user', $user_id)->first();

    // Mise à jour du statut et de la connexion
    StatutUser::where('id_user', $user_id)->update(['statut' => 'disponible']);
    StatutConnexion::where('id_user', $user_id)->update(['estConnecte' => 1]);

    // Récupération des données nécessaires pour la vue
    $users = User::all();
    $user_role = UserRole::all();
    $telephone = NumeroTelephone::all();
    $roles = Roles::all();
    $structures = Structure::all();
    $users_structures = UsersStructures::all();
    $statut_user=StatutUser::all();

    // Ajout d'un message de succès ou d'erreur si présent dans la session
    $success = session('success');
    $error = session('error');

    return view(
        'admin.admin_reponse_utilisateur',
        compact(
            'user',
            'users_roles',
            'roles',
            'structures',
            'users_structures',
            'telephone',
            'user_role',
            'users',
            'success',
            'error',
            'statut_user'
        )
    );
}
//reponse après qu'on ait modifié l'utilisateur
public function afficherReponseModificationUtilisateur()
{
    $user_id = session('user_id');
    if (!$user_id) {
        return redirect('/')->with('error', "Session administrateur introuvable.");
    }

    // Mise à jour du statut et de la connexion
    StatutConnexion::where('id_user', $user_id)->update(['estConnecte' => 1]);
    StatutUser::where('id_user', $user_id)->update(['statut' => 'disponible']);

    // Récupération des données nécessaires pour la vue
    $user = User::find($user_id);
    $users_roles = UserRole::where('id_user', $user_id)->first();
    $users = User::all();
    $user_role = UserRole::all();
    $telephone = NumeroTelephone::all();
    $roles = Roles::all();
    $structures = Structure::all();
    $users_structures = UsersStructures::all();
    $statut_user=StatutUser::all();

    // Ajout d'un message de succès ou d'erreur si présent dans la session
    $success = session('success');
    $error = session('error');

    return view(
        'admin.admin_reponse_modifier_utilisateur',
        compact(
            'user',
            'users_roles',
            'roles',
            'structures',
            'users_structures',
            'telephone',
            'user_role',
            'users',
            'success',
            'error',
            'statut_user'
        )
    );
}
// ...existing code...
    //réponse après qu'on ait supprimé un utilisateur
    public function afficherReponseSuppressionUtilisateur(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $users=User::all();  //tout les utilisateurs
            $user_role=UserRole::all();                // tout les roles des utilisateurs
            $telephone=NumeroTelephone::all();  //tout les numeros de telephones des utilisateurs
            $roles=Roles::all();  //tout les roles 
            $structures=Structure::all();  //toutes les structures
            $users_structures=UsersStructures::all();  //les structures auxquelles sont rattachés chaque utilisateurs
            return view('admin.admin_reponse_supprimer_utilisateur',compact('user','users_roles','roles','structures','users_structures','telephone','user_role','users'));

        }
    }
    //reponse apres qu'on ait bloqué un utilisateur
    public function afficherResponseBloquerUtilisateurOk(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $users=User::all();  //tout les utilisateurs
            $user_role=UserRole::all();                // tout les roles des utilisateurs
            $telephone=NumeroTelephone::all();  //tout les numeros de telephones des utilisateurs
            $roles=Roles::all();  //tout les roles 
            $structures=Structure::all();  //toutes les structures
            $users_structures=UsersStructures::all();  //les structures auxquelles sont rattachés chaque utilisateurs
            return view('admin.admin_reponse_bloquer_utilisateur',compact('user','users_roles','roles','structures','users_structures','telephone','user_role','users'));

        }
    }
    //reponse apres qu'on ait débloqué un utilisateur
    public function afficherResponseDebloquerUtilisateurOk(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $users=User::all();  //tout les utilisateurs
            $user_role=UserRole::all();                // tout les roles des utilisateurs
            $telephone=NumeroTelephone::all();  //tout les numeros de telephones des utilisateurs
            $roles=Roles::all();  //tout les roles 
            $structures=Structure::all();  //toutes les structures
            $users_structures=UsersStructures::all();  //les structures auxquelles sont rattachés chaque utilisateurs
            $statut_user=StatutUser::all();
            return view('admin.admin_reponse_debloquer_utilisateur',compact('user','users_roles','roles','structures','users_structures','telephone','user_role','users','statut_user'));
        }
    }
//recherche d'un utilisateur
public function rechercherUtilisateur(Request $request){
    $user_id = session('user_id');
    if (!$user_id) {
        return redirect('/')->with('error', "Session administrateur introuvable.");
    }

    $user = User::find($user_id);
    $users_roles = UserRole::where('id_user', $user_id)->first();
    $action = new Action();

    // Filtres
    $recherche = $request->input('recherche');
    $statut = $request->input('statut');
    $role = $request->input('role');
    $structure = $request->input('structure');
    $date_debut = $request->input('date_debut');
    $date_fin = $request->input('date_fin');

    // Construction de la requête filtrée
    $query = User::query();

    if ($recherche) {
        $query->where(function($q) use ($recherche) {
            $q->where('name', 'like', "%$recherche%")
              ->orWhere('email', 'like', "%$recherche%");
        });
    }

    if ($statut && $statut !== 'tous') {
        $user_ids_statut = StatutUser::where('statut', $statut)->pluck('id_user');
        $query->whereIn('id', $user_ids_statut);
    }

    if ($role && $role !== 'tous') {
        $role_obj = Roles::where('nomRole', $role)->first();
        if ($role_obj) {
            $user_ids_role = UserRole::where('id_role', $role_obj->id)->pluck('id_user');
            $query->whereIn('id', $user_ids_role);
        }
    }

    if ($structure && $structure !== 'tous') {
        $structure_obj = Structure::where('nomStructure', $structure)->first();
        if ($structure_obj) {
            $user_ids_structure = UsersStructures::where('structure_id', $structure_obj->id)->pluck('user_id');
            $query->whereIn('id', $user_ids_structure);
        }
    }

    if ($date_debut && $date_fin) {
        $query->whereBetween('created_at', [$date_debut, $date_fin]);
    }

    $users = $query->get();

    // Récupération des autres données pour la vue
    $user_role = UserRole::all();
    $telephone = NumeroTelephone::all();
    $roles = Roles::all();
    $structures = Structure::all();
    $users_structures = UsersStructures::all();
    $statut_user = StatutUser::all();

    // Historique de la recherche
    $action->nomAction = "L'utilisateur {$user->name} a recherché un utilisateur dans la liste des utilisateurs";
    $action->id_user = $user->id;
    $action->save();

    // Mise à jour du statut et connexion
    StatutConnexion::where('id_user', $user_id)->update(['estConnecte' => 1]);
    StatutUser::where('id_user', $user_id)->update(['statut' => 'disponible']);

    return view(
        'admin.admin_resultat_recherche_utilisateur',
        compact(
            'user',
            'users_roles',
            'roles',
            'structures',
            'users_structures',
            'telephone',
            'user_role',
            'users',
            'recherche',
            'statut_user'
        )
    );
}


    // Ministre envoyant un dossier interne
    public function envoyerDossierInterne(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $action=new Action();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $action->nomAction="le ministre veut envoyer un dossier interne";
            $action->id_user=$user->id;
            $action->save();
            return view('ministre_envoyer_dossier_interne',compact('user'));
        }else{
            return redirect('/');
        }
    }
    //traitement de la requete d'envoi du dossier interne par le ministre
    public function traiterFormulaireDossierInterne(Request $request){
        $docs=$request->file('files');
        //dd($request->nom);
        //dd($request->priorites);
        //dd($request->commentaires);
        /*foreach($docs as $d){
            echo $d;
        }*/
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $action=new Action();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $request->validate(
                [
                'files.*'=>'required|mimes:jpg,jpeg,png,pdf|max:10000',
                'nom'=>'required|string|max:255',
                ]
            );
            $docs=$request->file('files');
            echo($request->nom.'<br>');
            echo($request->priorites.'<br>');
            echo($request->commentaires.'<br>');
            //recherche d'un membre du secretariat de la DEP
            $membres_DEP=UserRole::where('id_role',21)->get();
            $membre_connecte=null;
            $all_statut_users=StatutUser::all();
            foreach($membres_DEP as $m){
                foreach($all_statut_users as $s){
                    if($m->id_user==$s->id_user && $s->statut=='disponible'){
                        $membre_connecte=User::find($m->id_user);
                        break 2;
                    }
                }
            }
            if($membre_connecte){
                echo("membre du secretariat de la DEP connecté : ".$membre_connecte->name);
                //envoi du dossier
                $dossier=new Dossier();
                $dossier->envoyer_par=$user->name;
                $dossier->intitule=$request->nom;
                $dossier->priorite=$request->priorites;
                $dossier->commentaires=$request->commentaires;
                $dossier->typeDossier='interne';
                $dossier->dateHeureEnvoiMinistre=now();
                $dossier->statutDossier='recu par DEP';
                //generation du numero ministre
                $numero=random_int(001,999);
                $num_existe=Dossier::where('typeDossier','interne')->where('numeroMinistre',$numero)->exists();
                while($num_existe==true){
                    $numero=random_int(001,999);
                    $num_existe=Dossier::where('typeDossier','interne')->where('numeroMinistre',$numero)->exists();
                }
                $dossier->numeroMinistre=$numero;
                $dossier->save();
                //enregistrment des pieces jointes
                foreach($docs as $d){
                    PiecesJointes::create([
                        'nom'=>$d->getClientOriginalName(),
                        'chemin'=>$d->storeAs('Ministre',$d->getClientOriginalName(),'public'),
                        'taille'=>$d->getSize()/1024,
                        'idDossier'=>$dossier->id
                    ]);
                }
                EnvoyeRecevoirDossier::create([
                    'id_dossier'=>$dossier->id,
                    'id_expediteur'=>$user->id,
                    'id_destinataire'=>$membre_connecte->id
                ]);
                //envoi de la notification au membre du secretariat de la DEP
                //$membre_connecte->notify(new NotificationNouveauDossierInterne($dossier));
                //historiser l'action
                $action->nomAction="le ministre a envoyé un dossier interne intitulé ".$dossier->intitule." à la dep et à été recu par ".$membre->connecte->name;
                $action->id_user=$user->id;
                $action->save();
                return redirect('/ministre_envoyer_dossier_interne_ok');

            }else{
                echo("aucun membre du secretariat de la DEP n'est connecté");
            }
            //dd($membre_connecte);

            //si on en trouve un qui est connecté et disponible
            //si oui on enregistre le dossier et on l'envoie
            //sinon on enregistre le dossier mais on ne l'envoie pas
            //envoi de la notification au membre du secretariat de la DEP
            //historiser l'action
            /*$dossier=new Dossier();
            $dossier->envoyer_par=$user->name;
            $dossier->intitule=$request->nom;
            $dossier->priorite=$request->priorites;
            $dossier->commentaires=$request->commentaires;
            $dossier->typeDossier='interne';
            $dossier->dateHeureEnvoiMinistre=now();
            $dossier->statutDossier='cree';
            $nb=0;
            do{
                $nb=random_int(001,999);
                $numero_ministre_a_trouver=Dossier::where('typeDossier','interne')->where('numeroMinistre',$nb)->first()->get();
                $trouve=($nb==$numero_ministre_a_trouver[0]['numeroMinistre']);
            }while($trouve==true);
            $dossier->numeroMinistre=$nb;
            $dossier->save();
            foreach($docs as $d){
                PiecesJointes::create([
                    'nom'=>$d->getClientOriginalName(),
                    'chemin'=>$d->storeAs('Ministre',$d->getClientOriginalName()),
                    'idDossier'=>$dossier->id
                ]);
            }
            //verifier si un membre du secretariat de la DEP est connecté pourqu'il puisse recevoir le dossier (a demander au copilot)
            $all_users_DEP=UserRole::where('id_role',18)->get();

            $all_users_DEP_statut=StatutUser::where('statut','disponible')->first();
            /*foreach($all_users_DEP as $aud){
                foreach($all_users_DEP_statut as $auds){
                    if($aud->id_user==$auds->id_user && $auds->statut=='disponible'){
                        $user_DEP=User::find($aud->id_user);
                        $dossier->dateReceptionCourrier=now();
                        //envoi de la notification
                        break;
                    }
                }
            }*/
            /*$action->nomAction="le ministre a envoyé un dossier interne à la dep";
            $action->id_user=$user->id;
            $action->save();
            return redirect('/ministre_envoyer_dossier_interne_ok');*/
        }else{
            return redirect('/');
        }
        
    }

    //formulaire d'envoi d'un dossier externe
    public function envoyerDossierExterne(){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $action=new Action();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $action->nomAction="l'utilisateur".$user->name."veut envoyer un dossier externe";
            $action->id_user=$user->id;
            $action->save();
            return view('usager_externe_envoyer_dossier_externe',compact('user'));
        }else{
            return redirect('/');
        }
    }
    //traitement de la requete d'envoi d'un dossier externe
    public function traiterFormulaireDossierExterne(Request $request){
        $user_id = session('user_id');
        $user=User::find($user_id);
        $users_roles=UserRole::where('id_user',$user_id)->first();
        $action=new Action();
        if($user_id){
            $conn=StatutConnexion::where('id_user',$user_id);
            $conn->update(['estConnecte'=> 1]);
            $statut_user=StatutUser::where('id_user',$user_id)->get()->first();
            $statut_user->update(['statut'=>'disponible']);
            $request->validate(
                [
                'files.*'=>'required|mimes:jpg,jpeg,png,pdf|max:10000',
                'nom'=>'required|string|max:255',
                ]
            );
            $docs=$request->file('files');
            $dossier=new Dossier();
            $dossier->envoyer_par=$user->name;
            $dossier->intitule=$request->nom;
            $dossier->typeDossier='externe';
            $dossier->dateEnvoiUsager=now();
            $dossier->statutDossier='cree';
            $dossier->save();
            foreach($docs as $d){
                PiecesJointes::create([
                    'nom'=>$d->getClientOriginalName(),
                    'chemin'=>$d->storeAs($user->name,$d->getClientOriginalName()),
                    'idDossier'=>$dossier->id
                ]);
            }
            //verifier si un membre du courrier est connecté pourqu'il puisse recevoir le dossier (demander au copilot)
            $all_users_courrier=UserRole::where('id_role',17)->get();
            $all_users_courrier_statut=StatutUser::where('statut','disponible')->get();
            foreach($all_users_courrier as $auc){
                foreach($all_users_courrier_statut as $aucs){
                    if($auc->id_user==$aucs->id_user && $aucs->statut=='disponible'){
                        $user_courrier=User::find($auc->id_user);
                        $dossier->dateReceptionCourrier=now();
                        //envoi de la notification
                        break;
                    }
                }
            }
            $action->nomAction="l'utilisateur".$user->name."a envoyé un dossier externe au courrier de la DEP";
            $action->id_user=$user->id;
            $action->save();
            return redirect('/usager_externe_envoyer_dossier_interne_ok');
        }else{
            return redirect('/');
        }  
    }
    public function traiterTest2(Request $request){
        $request->validate([
            'password'=> 'required|min:8|max:255|confirmed',  
        ]
        );
        echo $request->password;
    }

}
