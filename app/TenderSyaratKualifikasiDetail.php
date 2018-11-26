<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TenderSyaratKualifikasiDetail extends Model
{
    use SoftDeletes;
    protected $table = "tender_syarat_kualifikasi_detail";
    protected $fillable = ['tender_syarat_kualifikasi_id','master_syarat_kualifikasi_detail_id','value','sequence'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    public function master_syarat_kualifikasi_detail()
    {
        return $this->belongsTo('App\MasterSyaratKualifikasiDetail');
    }
    public function tender_syarat_kualifikasi()
    {
        return $this->belongsTo('App\TenderSyaratKualifikasi');
    }
}
