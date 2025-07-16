<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'minat', 'bakat', 'rekomendasi_jurusan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

