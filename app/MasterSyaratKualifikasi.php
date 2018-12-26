<?php

namespace App;
use App\Relations\HasManySyncable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MasterSyaratKualifikasi extends Model
{
    use SoftDeletes;
    protected $table = "master_syarat_kualifikasi";
    protected $fillable = ['parent_id','nama','is_dokumen','is_leaf','file_upload'];
    protected $casts = [
        "is_dokumen" => "boolean",
        "is_leaf" => "boolean"
    ];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    // protected $guarded = ['created_at','updated_at'];

    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        $instance = $this->newRelatedInstance($related);

        $foreignKey = $foreignKey ?: $this->getForeignKey();

        $localKey = $localKey ?: $this->getKeyName();

        return new HasManySyncable(
            $instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey
        );
    }

    public function details()
    {
        return $this->hasMany('App\MasterSyaratKualifikasiDetail');
    }
}
