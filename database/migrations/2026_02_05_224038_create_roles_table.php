<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. We create the 'roles' table first.
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            // Name of the role (e.g. 'admin', 'user').
            $table->string('Rol_name', 255);
            
            // Reverse relationship (Optional/Specific): Link to a user who might "own" the role or similar?
            // Usually roles are static, but here we have a link to 'users'.
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            
            $table->timestamps();
        });

        // 2. We add the relationship to the 'users' table.
        // Similar to the Loans table, we modify 'users' after creating 'roles'.
        Schema::table('users', function (Blueprint $table) {
            // We connect the 'role_id' column in 'users' with the 'id' column in 'roles'.
            // onDelete('cascade'): If we delete the role 'admin', all admin users are deleted.
            // (Be careful with cascade here, maybe 'set null' would be safer in production, but 'cascade' cleans up well).
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
