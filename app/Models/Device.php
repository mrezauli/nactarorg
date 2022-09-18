<?php

namespace App\Models;

use Parental\HasChildren;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;
    use HasChildren;
    use SoftDeletes;
    use Userstamps;

    protected $fillable = ['laboratory_id', 'slug', 'name', 'brand', 'model', 'sale', 'sku', 'number', 'warranty'];

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