<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey  = 'id_berita';
    protected $fillable = ['nama_berita', 'deskripsi', 'tampil_mulai', 'tampil_selesai', 'gambar','nama_penulis'];
}
