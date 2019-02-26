<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    //
    protected $guarded = ['id'];

    protected $table = "inquiry";

    protected $fillable = [
       'name', 'email', 'gender', 'url', 'message'
    ];
}
