<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model

{
    // $fillable: The "Loan Slip".
    // We define which fields are allowed to be filled in automatically when creating a loan.
    // Without this, the system forbids saving data for security.
    protected $fillable = [
        'user_id', 'book_id', 'loan_date', 'return_date', 'status'
    ];

    // RELATIONSHIP 1: "The Borrower"
    // A loan ALWAYS belongs to a single user.
    // usage: $loan->user->name (Get the name of the person who took the book).
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // RELATIONSHIP 2: "The Item"
    // A loan ALWAYS refers to a single book.
    // usage: $loan->book->title (Get the title of the borrowed book).
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
