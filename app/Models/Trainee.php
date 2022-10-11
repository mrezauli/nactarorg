<?php

namespace App\Models;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainee extends User
{
    use HasParent;
}