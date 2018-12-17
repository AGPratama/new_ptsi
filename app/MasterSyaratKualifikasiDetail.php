<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterSyaratKualifikasiDetail extends Model
{
    use SoftDeletes;
    protected $table = "master_syarat_kualifikasi_detail";
    protected $fillable = ['field_name','sequence','field_type','datatable'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    public function master_syarat_kualifikasi()
    {
        return $this->belongsTo('App\MasterSyaratKualifikasi');
    }
}
