<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            
			$table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            
            $table->foreign('role_id')
					->references('role_id')
					->on('roles')
                    ->onDelete('cascade');
            
            $table->foreign('user_id')
					->references('id')
					->on('users')
                    ->onDelete('cascade');
                    
            $table->foreign('created_by')
					->references('id')
					->on('users')
                    ->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
