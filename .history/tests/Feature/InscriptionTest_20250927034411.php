<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class InscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_utilisateur_peut_s_inscrire_avec_des_donnees_valides()
    {
        $response = $this->post('/traiter_creation_compte', [
            'nom' => 'Test User',
            'email' => 'newuser@example.com',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
        ]);

        $response->assertRedirect('/connexion/compte/ok');
        $this->assertDatabaseHas('users', [
            'email' => 'newuser@example.com',
            'name' => 'Test User',
        ]);
    }

    /** @test */
    public function l_inscription_echoue_si_email_deja_utilise()
    {
        User::factory()->create([
            'email' => 'newuser@example.com',
        ]);

        $response = $this->post('/traiter_creation_compte', [
            'nom' => 'Test User',
            'email' => 'newuser@example.com',
            'password' => 'Password123',
            'password_confirmation' => 'Password123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function l_inscription_echoue_si_mot_de_passe_non_valide()
    {
        $response = $this->post('/traiter_creation_compte', [
            'nom' => 'Test User',
            'email' => 'newuser2@example.com',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
