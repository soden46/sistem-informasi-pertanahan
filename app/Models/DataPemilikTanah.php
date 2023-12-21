<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemilikTanah extends Model
{
    use HasFactory;

    public $table = 'tb_pemilik';
    protected $primary = 'id_pemilik';

    protected $guarded = [];
}
