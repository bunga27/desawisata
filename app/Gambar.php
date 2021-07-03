<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = 'gambar';
    protected $primaryKey = 'id_gambar';
    protected $fillable = ['wisata_id',  'gambar2'];

    public function Wisata()
    {
        return $this->belongsTo('App\Wisata');
    }
}
