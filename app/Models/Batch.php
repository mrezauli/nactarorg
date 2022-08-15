<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Batch extends Model
{
    use HasFactory, SoftDeletes;
    use Userstamps;

    protected $fillable = ['serial', 'slug'];

    /**
     * Get all of the intakes for the Batch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intakes(): HasMany
    {
        return $this->hasMany(Intake::class);
    }
}
