<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\CompanyCategory');
    }

}
