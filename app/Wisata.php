<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';
    protected $primaryKey  = 'id_wisata';
    protected $fillable = ['kategori', 'nama_wisata', 'deskripsi', 'alamat', 'nama_desa',  'maps', 'koordinat', 'youtube_profil', 'jam_buka', 'jam_tutup'];

    public function Ulasan()
    {
        return $this->hasMany('App\Ulasan','wisata_id');
    }

    public function Gambar()
    {
        return $this->hasMany('App\Gambar');
    }
}
