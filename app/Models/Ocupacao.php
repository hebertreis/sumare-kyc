<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupacao extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    protected $table = 'ocupacoes';
}