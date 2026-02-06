<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create is the "Architect". It draws the blueprints for the 'users' table.
        Schema::create('users', function (Blueprint $table) {
            // $table->id(); creates an auto-incrementing numeric column (1, 2, 3...) which is the primary key.
            $table->id();

            $table->string('name');
            // unique() ensures that two users cannot exist with the same email.
            $table->string('email')->unique();
            $table->string('password');

            // FOREIGN KEYS
            // Here we store the ID of another table. It's like keeping the ID card number of a parent.
            // foreignId('role_id') expects a column named 'id' in a table (presumably 'roles').
            $table->foreignId('role_id')->nullable();
            
            $table->foreignId('loan_id')->nullable();
            
            // nullable() means this field can be empty (null).
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            // timestamps() magically creates two columns: 'created_at' and 'updated_at' to keep track of time.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
