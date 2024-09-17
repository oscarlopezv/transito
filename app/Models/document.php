<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type_documents():HasOne
    {
        return $this->hasOne(document_type::class,'id','document_type_id');
    }
}
