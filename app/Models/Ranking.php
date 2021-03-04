<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Ranking extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function getAllRanking()
    {
        return self::orderBy('point', 'asc')->get();
    }

    public static function getMyAllRanking()
    {
        $rankings = self::where('user_id', Auth::user()->id)
            ->orderBy('point', 'asc')
            ->get();
            return $rankings;
    }
}
