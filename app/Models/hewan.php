<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hewan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function jenis()
    {
        return $this->belongsTo(jns_hwn::class);
    }

    public function owner()
    {
        return $this->belongsTo(owner::class);
    }
}
