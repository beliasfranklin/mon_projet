<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;
use App\Models\Structure;

class TraiterFormulaireDossierInterneTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_peut_creer_dossier_interne_avec_fichier()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $structure = Structure::factory()->create();
        $this->withSession(['user_id' => $user->id]);

        $file = UploadedFile::fake()->create('document.pdf', 500, 'application/pdf');

        $response = $this->post('/traiter_formulaire_dossier_interne', [
            'titre' => 'Dossier Test',
            'description' => 'Description du dossier',
            'structure' => $structure->nomStructure,
            'fichier' => $file,
        ]);

        $response->assertRedirect('/dossier_interne_ok');
        $this->assertDatabaseHas('dossiers', [
            'titre' => 'Dossier Test',
            'description' => 'Description du dossier',
            'id_structure' => $structure->id,
            'id_user' => $user->id,
            'statut' => 'en attente',
        ]);
        Storage::disk('public')->assertExists('dossiers/' . $file->hashName());
    }

    public function test_validation_echoue_si_champ_obligatoire_manquant()
    {
        $user = User::factory()->create();
        $structure = Structure::factory()->create();
        $this->withSession(['user_id' => $user->id]);

        $response = $this->post('/traiter_formulaire_dossier_interne', [
            // 'titre' manquant
            'description' => 'Description',
            'structure' => $structure->nomStructure,
        ]);

        $response->assertSessionHasErrors(['titre']);
    }
}
