<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $table = "tender";
    protected $fillable = ['jadwal_upload_dokumen_prakualifikasi','jadwal_pembuktian_prakualifikasi','jadwal_download_dokumen_pemilihan','jadwal_pemberian_penjelasan','jadwal_upload_dokumen_penawaran','jadwal_pengumuman_pemenang','show_button','progress_kelengkapan'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $casts = [
        "show_button" => "boolean",
    ];

    public function penggunajasa()
    {
        return $this->belongsTo('App\Enumeration', 'pengguna_jasa_id');
    }

    public function metodeevaluasi()
    {
        return $this->belongsTo('App\Enumeration', 'metode_evaluasi_id');
    }

    public function metodekualifikasi()
    {
        return $this->belongsTo('App\Enumeration', 'metode_kualifikasi_id');
    }

    public function metodedokumen()
    {
        return $this->belongsTo('App\Enumeration', 'metode_dokumen_id');
    }

    public function hasiltender()
    {
        return $this->belongsTo('App\Enumeration', 'hasil_tender_text');
    }
}
