<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal_Mengajar extends Model
{
    use HasFactory;
    protected $table = 'jurnal';
    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
    
    
}
