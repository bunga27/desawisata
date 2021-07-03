<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $fillable = ['wisata_id', 'nama_penulis', 'ulasan', 'email',  'nilai'];

    public function Wisata()
    {
        return $this->belongsTo('App\Wisata','wisata_id');
    }
}
