<?php

namespace App\Models;

use App\Models\User;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Intake extends Model
{
    use HasFactory, SoftDeletes;
    use Userstamps;

    protected $fillable = ['code', 'slug', 'batch_id', 'course_id'];

    /**
     * The batch that belong to the Intake
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToany
     */
    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * The course that belong to the Intake
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * The users that belong to the Intake
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
