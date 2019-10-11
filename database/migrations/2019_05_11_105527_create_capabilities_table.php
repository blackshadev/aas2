<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
        });

        $capa = [
            // participants
            ["participants::info::show::basic", "Deelnemersinfo - Inzien - Basis"],
            ["participants::info::show::private", "Deelnemersinfo - Inzien - Privé"],
            ["participants::info::show::finance", "Deelnemersinfo - Inzien - Financieel"],
            ["participants::info::show::practical", "Deelnemersinfo - Inzien - Praktisch"],
            ["participants::info::show::system", "Deelnemersinfo - Inzien - Administratie"],
            
            ["participants::info::edit::basic", "Deelnemersinfo - Aanpassen - Basis"],
            ["participants::info::edit::private", "Deelnemersinfo - Aanpassen - Privé"],
            ["participants::info::edit::finance", "Deelnemersinfo - Aanpassen - Financieel"],
            ["participants::info::edit::practical", "Deelnemersinfo - Aanpassen - Praktisch"],
            ["participants::info::edit::system", "Deelnemersinfo - Aanpassen - Administratie"],
            
            ["participants::info::export", "Deelnemersinfo - Export - Leiding"],
            
            ["participants::account::create", "Deelnemersaccount - Aanmaken"],
            ["participants::account::delete", "Deelnemersaccount - Verwijderen"],
            
            // members
            ["members::info::show::basic", "Leidinginfo - Inzien - Basis"],
            ["members::info::show::private", "Leidinginfo - Inzien - Privé"],
            ["members::info::show::finance", "Leidinginfo - Inzien - Financieel"],
            ["members::info::show::practical", "Leidinginfo - Inzien - Praktisch"],
            ["members::info::show::system", "Leidinginfo - Inzien - Administratie"],
            
            ["members::info::edit::basic", "Leidinginfo - Aanpassen - Basis"],
            ["members::info::edit::private", "Leidinginfo - Aanpassen - Privé"],
            ["members::info::edit::finance", "Leidinginfo - Aanpassen - Financieel"],
            ["members::info::edit::practical", "Leidinginfo - Aanpassen - Praktisch"],
            ["members::info::edit::system", "Leidinginfo - Aanpassen - Administratie"],

            ["members::account::create", "Deelnemersaccount - Aanmaken"],
            ["members::account::delete", "Deelnemersaccount - Verwijderen"],
            
            // comments
            ["comments::show::secret", "Opmerkingen - Inzien - geheim"],
            ["comments::edit::secret", "Opmerkingen - Aanpassen - geheim"],
            
            // events
            ["event::show::basic", "Evenement - Inzien - basic"],
            ["event::show::advanced", "Evenement - Inzien - uitgebreid"],

            ["event::edit::basic", "Evenement - Aanpassen - basic"],
            ["event::edit::advanced", "Evenement - Aanpassen - uitgebreid"],

            ["event::create", "Evenement - Aanmaken"],
            ["event::delete", "Evenement - Verwijderen"],
            
            // roles
            ["roles::info", "Rollen - Inzien"],
            ["roles::edit", "Rollen - Aanpassen"],
            ["roles::create", "Rollen - Aanmaken"],
            ["roles::delete", "Rollen - Verwijderen"],
            
            ["roles::info", "Rollen - Inzien"],
            ["roles::edit", "Rollen - Aanpassen"],
            ["roles::create", "Rollen - Aanmaken"],
            ["roles::delete", "Rollen - Verwijderen"],
            
            // locations
            ["locations::info::basic", "Locaties - Inzien - Basis"],
            ["locations::info::advanced", "Locaties - Inzien - Uitgebreid"],
            ["locations::edit::basic", "Locaties - Aanpassen - Basis"],
            ["locations::edit::advanced", "Locaties - Aanpassen - Uitgebreid"],
            ["locations::create", "Locaties - Aanmaken"],
            ["locations::delete", "Locaties - Verwijderen"],
            
            
            
        ];
        $all = array_map(function ($i) { return [ "name" => $i[0], "description" => $i[1] ]; }, $capa);

        Schema::table("capabilities")->insert($all);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capabilities');
    }
}
