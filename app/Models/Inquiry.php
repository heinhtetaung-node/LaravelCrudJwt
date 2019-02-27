<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\FuzzySearchRepository;

class Inquiry extends Model
{
	use FuzzySearchRepository;

    //
    protected $guarded = ['id'];

    protected $table = "inquiry";

    protected $fillable = [
       'name', 'email', 'gender', 'url', 'message'
    ];

    protected $searchable = [
        'name',
    ];
}
