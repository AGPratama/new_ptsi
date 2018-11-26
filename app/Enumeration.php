<?php

namespace App;
use App\Relations\HasManySyncable;
use Illuminate\Database\Eloquent\Model;
class Enumeration extends Model
{
    protected $table = "enumeration";
    protected $fillable = ['key','value'];
}
