<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'words';

    protected $fillable = ['word', 'en_des', 'vn_des', 'date', 'count'];

}
