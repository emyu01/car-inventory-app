<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $table = "cars";
    public $timestamps = true;

    protected $fillable = [
        'make', 'model', 'price', 'year', 'condition', 'remarks'
    ];
}