<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    public $table = 'karyawan';
    public $timestamps = true;
    protected $guarded = ['id'];
}
