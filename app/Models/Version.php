<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    protected $table = 'version';
    protected $dates = ['create_at', 'uptdate_at'];
    protected $fillable = ['id', 'version', 'min_version'];
}
