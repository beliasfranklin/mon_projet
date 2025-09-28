<?php

<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TestBaseDeDonnesMySQL extends TestCase
{
    /** @test */
    public function peut_se_connecter_a_mysql()
    {
        try {
            $result = DB::select("SELECT 1 as test");
            $this->assertEquals(1, $result[0]->test);
        } catch (\Exception $e) {
            $this->fail("La connexion MySQL a échoué : " . $e->getMessage());
        }
    }
}

