<?php

namespace App\Models;

use App\Models\Computer;
use App\Models\Employee;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratory extends Model
{
    use HasFactory, SoftDeletes;
    use Userstamps;

    protected $fillable = ['slug', 'number', 'isTheory'];

    /**
     * Get all of the computers for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class);
    }

    /**
     * Get all of the accessories for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accessories(): HasMany
    {
        return $this->hasMany(Accessory::class);
    }

    /**
     * Get the employee associated with the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }
}
