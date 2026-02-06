<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
    
    protected $fillable = [
        'title', 'author', 'isbn', 'cover_url', 'stock', 'category_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // We make it 'public static' so we can access this list from the Factory (BookFactory).
    public static $covers = [
       'https://images-na.ssl-images-amazon.com/images/I/51Ga5GuElyL._AC_SX184_.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/91S+nNHdHSL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/81ibfYk4qZL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/71kXa1wS1fL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/61tqe+O-C0L.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/71aFt4+OTOL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/5154xlgGA5L.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/81X4R7QhFkL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/91bYsX41DVL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/81WojUxbbFL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/71EszYjLkwL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/81h2gWPTYJL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/81jq7BmfO+L.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/71jlbKQ-8BL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/81eI0ExR+VL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/A1kNdHAjwXL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/81g0apAtCQL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/71Kiy6GMvnL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/91uwocAMtSL.jpg',
       'https://images-na.ssl-images-amazon.com/images/I/91zXx12K3DL.jpg',
    ];
}
