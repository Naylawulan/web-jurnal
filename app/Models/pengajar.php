<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajar extends Model
{
    use HasFactory;
    protected $table ='pengajar';
    protected $fillable = [
        'guru_id',
        'mapel_id',
        'kelas',
        'jam_pelajaran'
    ];

    public function guru()
    {
        return $this->belongsTo(guru::class, 'guru_id');
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class, 'mapel_id');
    }
}
