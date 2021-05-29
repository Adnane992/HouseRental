<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $primaryKey='id_reserv';
    protected $fillable = [
        'date_debut_reserv',
        'date_fin_reserv',
    ];
    public function Maisons(){
        return $this->belongsToMany(Maison::class);
    }
    public function Locataire(){
        return $this->belongsTo(Locataire::class);
    }
}
