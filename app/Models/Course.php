<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    use Userstamps;

    protected $fillable = ['code', 'slug', 'name'];

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