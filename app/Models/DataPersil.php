<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPersil extends Model
{
    use HasFactory;

    public $table = 'tb_persil';

    protected $guarded = [];
    protected $primary = 'id_persil';
}
