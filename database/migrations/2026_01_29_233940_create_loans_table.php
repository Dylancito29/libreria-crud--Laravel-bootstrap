<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // We create the loans table.
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            // The loan belongs to a User AND a Book.
            // If the user is deleted -> The loan is deleted (cascade).
            // If the book is deleted -> The loan is deleted (cascade).
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
            
            // Important dates: When the book was taken and when it was returned (can be null if they still have it).
            $table->date('loan_date');
            $table->date('return_date')->nullable();
        });

        // SOLUTION TO THE "CHICKEN AND EGG" PROBLEM:
        // Since the 'users' table was created FIRST, we couldn't add a foreign key to 'loans' (which didn't exist).
        // Now that 'loans' ALREADY exists (lines above), we can reopen the 'users' table and add the missing relationship.
        Schema::table('users', function (Blueprint $table) {
            //onDelete('set null'): If I delete the loan, the user is NOT deleted. Only their 'loan_id' field becomes blank.
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
