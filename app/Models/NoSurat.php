<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoSurat extends Model
{
    use HasFactory;

    public $table = 'no_surat';

    protected $primary = 'id';
    protected $guarded = [];

    public function CDesa()
    {
        return $this->belongsTo(DataCDesa::class, 'id_surat', 'id_c_desa');
    }
    public function PemilikTanah()
    {
        return $this->belongsTo(DataPemilikTanah::class, 'id_surat', 'id_pemilik');
    }
    public function PermohonanInformasi()
    {
        return $this->belongsTo(DataPermohonanInformasi::class, 'id_surat', 'id_pemohon');
    }
}
