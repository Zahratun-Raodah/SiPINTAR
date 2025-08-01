<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = [];

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_siswa');
    }

    public function absensiHariIni()
{
    return $this->hasMany(Absensi::class, 'id_siswa')
    ->whereDate('created_at', Carbon::today());
}

}
