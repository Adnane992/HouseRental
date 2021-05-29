<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;
    protected $primaryKey='cne';
    protected $fillable = [
        'cin',
        'nom',
        'phone',
        'id_user',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function Favoris(){
        return $this->hasMany(Favorie::class);
    }
}
