<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ConnexionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_utilisateur_peut_se_connecter_avec_les_bons_identifiants()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('Password123'),
        ]);

        $response = $this->post('/traiter_login', [
            'email' => 'test@example.com',
            'password' => 'Password123',
        ]);

        $response->assertRedirect('/dashboard_dep');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function la_connexion_echoue_avec_mauvais_mot_de_passe()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('Password123'),
        ]);

        $response = $this->post('/traiter_login', [
            'email' => 'test@example.com',
            'password' => 'WrongPassword',
        ]);

        $response->assertRedirect('/connexion/error');
        $this->assertGuest();
    }

    /** @test */
    public function la_connexion_echoue_si_utilisateur_bloque()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('Password123'),
        ]);
        // Bloquer l'utilisateur
        \App\Models\StatutUser::factory()->create([
            'id_user' => $user->id,
            'statut' => 'bloqué',
        ]);

        $response = $this->post('/traiter_login', [
            'email' => 'test@example.com',
            'password' => 'Password123',
        ]);

        $response->assertRedirect('/connexion/block');
        $this->assertGuest();
    }
}
