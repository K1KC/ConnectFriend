<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOfWork extends Model
{
    use HasFactory;

    protected $table = 'fields_of_work';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
