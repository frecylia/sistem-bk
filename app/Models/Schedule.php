<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_id',
        'schedule_date',
        'schedule_time',
        'description',
        'status' // kalau kamu pakai acc/disetujui/ditolak
    ];

    // Relasi ke siswa
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relasi ke guru BK
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id')->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        });
    }
}
