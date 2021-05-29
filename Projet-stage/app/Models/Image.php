<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey='id_image';
    protected $fillable = [
        'id_maison',
        'image_path',
    ];
    public function Maison(){
        return $this->belongsTo(Maison::class);
    }
    public function setImagePathAttribute($value)
    {
        $this->attributes['image_path'] = json_encode($value);
    }
}
