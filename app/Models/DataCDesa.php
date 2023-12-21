<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class DataCDesa extends Model
{
    use HasFactory;

    public $table = 'tb_c_desa';

    protected $primary = 'id_c_desa';
    protected $guarded = [];
}
