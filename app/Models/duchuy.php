<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class duchuy extends Model
{
    use HasFactory;
    public function hello(){
        echo 'hello mom ';
    }
}

