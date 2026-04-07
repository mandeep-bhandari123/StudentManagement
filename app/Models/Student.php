<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Student extends Model
{
    //
    use HasFactory;
    // 
    //   protected $hidden ={
    //     'name',
    //     'age'
    //   } ;
    // 

    public function scopeMale($query)
    {
      return $query->where("gender","m");
    }
}
