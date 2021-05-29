<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorie extends Model
{
    use HasFactory;
    protected $primaryKey='id_fav';
    protected $fillable = [
        'id_maison',
        'id_locataire',
    ];
    public function Maisons(){
        return $this->belongsToMany(Maison::class);
    }
    public function Locataires(){
        return $this->belongsToMany(Locataire::class);
    }
}
