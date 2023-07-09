<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;

    protected $table = 'histori';

    protected $fillable = [
        'tindakan',
        'tanggal_tindakan',
        'tanggal_Selesai',
        'id_komplain',
        'id_petugas'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function Petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function Komplain()
    {
        return $this->belongsTo(Komplain::class, 'id_komplain');
    }
}
