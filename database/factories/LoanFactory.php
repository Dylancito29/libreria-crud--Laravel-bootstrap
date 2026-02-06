<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use App\Book;
use App\User;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    
    // ANALOGY: The Smart Librarian Logic.
    
    // 1. First, we decide the status of the loan.
    // 'ongoing' (still borrowed), 'returned' (back on shelf), 'overdue' (late).
    $status = $faker -> randomElement(['ongoing', 'returned', 'overdue']);
    
    // 2. LOGICAL CONSISTENCY CHECK
    // If the book is 'returned', it MUST have a return date.
    // If it is 'ongoing' or 'overdue', the return_date should be NULL (they still have it).
    $return_date = ($status == 'returned') ? $faker->dateTimeBetween('-1 month', 'now') : null;


    return [
        // We pick a random person from the "Membership List" (User table).
        'user_id' => User::all()->random()->id,
        
        // We pick a random book from the "Library Catalog" (Book table).
        'book_id' => Book::all()->random()->id,
        
        // The day they checked out the book.
        'loan_date' => $faker->dateTimeBetween('-1 month', 'now'),
        
        'status' => $status,
        
        // We use the date calculated above based on the status logic.
        'return_date' => $return_date,
    ];
});
