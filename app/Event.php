<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id_event';
    protected $fillable = ['kategori', 'judul',  'deskripsi', 'tampil_mulai', 'tampil_selesai', 'gambar', 'nama_penulis'];
}
