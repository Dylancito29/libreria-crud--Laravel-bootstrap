<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // $table: It's like telling it: "Hey, in the database your house is called 'roles'".
    protected $table = 'roles';

    // $fillable: The "VIP List".
    // Laravel protects your database against malicious intruders.
    // Only the fields you write in this array have permission to be mass-assigned
    // (for example, when you use Role::create([...])).
    // If you try to send a field that isn't here, Laravel will ignore it for security.
    protected $fillable = [
        'Rol_name'
    ];
}
