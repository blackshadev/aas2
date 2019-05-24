<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Helpers\Payment\MolliePaymentProvider;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class RegistationTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    private $data = [
        "voornaam" => "Keesje",
        "tussenvoegsel" => "",
        "achternaam" => "Test",
        "geboortedatum" => "2001-01-01",
        "geslacht" => "M",
        "telefoon_deelnemer" => "0612345678",
        "email_deelnemer" => "keesje@test.com",
        "adres" => "TestLaan",
        "postcode" => "1111AA",
        "plaats" => "Zwapperdam",
        "telefoon_ouder_vast" => "0361234567",
        "telefoon_ouder_mobiel" => "0612345678",
        "email_ouder" => "keesje@test.com",
        "mag_gemaild" => "0",
        "selected_camp" => "5",
        "inkomen" => "0",
        "school" => "HierLeerJeNietsSchool",
        "niveau" => "VMBO",
        "klas" => "2",
        "vak0" => "3",
        "vakinfo0" => "zoiets",
        "vak1" => 3,
        "vakinfo1" => "Daar snap ik toch geen kut van joh, iets met E=MC2",
        "vak2" => 0,
        "vakinfo2" => "",
        "vak3" => 0,
        "vakinfo3" => "",
        "vak4" => 0,
        "vakinfo4" => "",
        "vak5" => 0,
        "vakinfo5" => "",
        "iDeal" => "1",
        "hoebij" => ["Nieuwsbrief school"],
        "hoebij_anders" => "",
        "opmerkingen" => "",
        "voorwaarden" => "1",
        "privacy" => "1"
    ];

    protected function tearDown(): void
    {
        // DB::statement('delete from users u where profile_type = '' ");
    }

    // public function testParticipantRegistrationWithIDeal()
    // {
    //     $this->instance(MolliePaymentProvider::class, Mockery::mock(MolliePaymentProvider::class, function ($mock) {
    //         $mock->shouldReceive('process')->once();
    //     }));

    //     $this->data["iDeal"] = "1";
    //     $response = $this->post('/register-participant', $this->data);

    //     $response->assertStatus(200);
    // }

    public function testParticipantRegistrationWithoutIDeal()
    {
        Mail::fake();

        $this->instance(MolliePaymentProvider::class, Mockery::mock(MolliePaymentProvider::class, function ($mock) {
            $mock->shouldNotReceive('process')->once();
        }));

        $this->data["iDeal"] = "0";

        $response = $this->post('/register-participant', $this->data);

        $response->assertStatus(200);

        $username = strtolower(substr($this->data["voornaam"], 0, 1) . $this->data["achternaam"]);
        $this->assertDatabaseHas('users', [
            "username" => $username,
            "is_admin" => 0
        ]);

        $this->assertDatabaseHas('participants', [
            "voornaam" => $this->data["voornaam"],
            "tussenvoegsel" => $this->data["tussenvoegsel"],
            "achternaam" => $this->data["achternaam"],
            "geboortedatum" => $this->data["geboortedatum"],
            "geslacht" => $this->data["geslacht"],
            "adres" => $this->data["geslacht"],
            "postcode" => $this->data["postcode"],
            "plaats" => $this->data["plaats"],
            "telefoon_deelnemer" => $this->data["telefoon_deelnemer"],
            "telefoon_ouder_vast" => $this->data["telefoon_ouder_vast"],
            "telefoon_ouder_mobiel" => $this->data["telefoon_ouder_mobiel"],
            "email_deelnemer" => $this->data["email_deelnemer"],
            "email_ouder" => $this->data["email_ouder"],
            "mag_gemaild" => $this->data["mag_gemaild"],
            "inkomen" => $this->data["inkomen"],
            "school" => $this->data["school"],
            "niveau" => $this->data["niveau"],
            "klas" => $this->data["klas"],
            "inkomensverklaring" => null
        ]);
    }
}