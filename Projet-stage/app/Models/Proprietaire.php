<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    use HasFactory;
    protected $primaryKey='id_prop';
    protected $fillable = [
        'cin',
        'nom',
        'phone',
        'id_user',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Maisons(){
        return $this->hasMany(Maison::class);
    }
}
