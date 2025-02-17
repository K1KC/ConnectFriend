<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $table = 'friends';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
