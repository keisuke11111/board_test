<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;
    protected $table ='recruits';

    const UPDATED_AT=null;
    const CREATED_AT=null;

    protected $fillable = [
        'img_path',
    ];
}

