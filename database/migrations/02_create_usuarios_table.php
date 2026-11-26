<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table ->id();
            $table->unsignedBigInteger("roles_id");
            $table->string("name, 225");
            $table->string("email, 225");
            $table->timestamps("email_verified_at");
            $table->string("password, 225");
            $table->string("remember_token, 100");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign("roles_id")->references("id")->on("roles")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema:: dropIfExists("usuarios");
            //
        
    }
};