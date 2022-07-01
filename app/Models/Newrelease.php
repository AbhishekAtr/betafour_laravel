<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newrelease extends Model
{
    use HasFactory;
    protected $table = 'new-release';
    protected $fillable =[
        'description',
        'category',
        'title',
        'image'
    ];
}
