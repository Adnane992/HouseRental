<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    use HasFactory;
    protected $primaryKey='id_maison';
    protected $fillable = [
        'ville',
        'surface',
        'id_prop',
        'prix',
    ];
    public function Proprietaire(){
        return $this->belongsTo(Proprietaire::class);
    }
    public function Favori(){
        return $this->hasMany(Favorie::class);
    }
    public function Images(){
        return $this->hasMany(Image::class);
    }
}
