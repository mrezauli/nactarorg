<?php

namespace App\Models;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends User
{
    use HasParent;

    /**
     * Get the laboratory that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }
}
