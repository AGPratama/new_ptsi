<?php

namespace App;
use App\Relations\HasManySyncable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TenderSyaratKualifikasi extends Model
{
    use SoftDeletes;
    protected $table = "tender_syarat_kualifikasi";
    protected $fillable = [
        'tender_id',
        'master_syarat_kualifikasi_id',
        'value',
        'approved',
        'sequence',
        'active',
        'verified',
        'completed',
        'sesuai',
        'catatan'
    ];
    protected $casts = [
        "approved" => "boolean",
        "active" => "boolean",
        "verified" => "boolean",
        "completed" => "boolean"
    ];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        $instance = $this->newRelatedInstance($related);

        $foreignKey = $foreignKey ?: $this->getForeignKey();

        $localKey = $localKey ?: $this->getKeyName();

        return new HasManySyncable(
            $instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey
        );
    }

    public function tender()
    {
        return $this->belongsTo('App\Tender');
    }
    public function master_syarat_kualifikasi()
    {
        return $this->belongsTo('App\MasterSyaratKualifikasi');
    }
    public function details()
    {
        return $this->hasMany('App\TenderSyaratKualifikasiDetail');
    }
}
