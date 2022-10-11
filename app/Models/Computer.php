<?php

namespace App\Models;

use App\Models\Laboratory;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Computer extends Model
{
    use HasFactory, SoftDeletes;
    use Userstamps;

    protected $fillable = ['laboratory_id', 'slug', 'name', 'brand', 'model', 'cpu', 'ram', 'storage', 'sale', 'sku', 'number', 'warranty'];

    /**
     * Get the laboratory that owns the Computer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }
}