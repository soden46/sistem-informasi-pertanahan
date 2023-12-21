<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataKeluarga;

class DataPermohonanInformasi extends Model
{
    use HasFactory;

    public $table = 'tb_pemohon';
    protected $primary = 'id_pemohon';

    protected $guarded = [];
}
