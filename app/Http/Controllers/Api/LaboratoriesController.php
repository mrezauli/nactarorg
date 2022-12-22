<?php

namespace App\Http\Controllers\Api;

use App\Models\Laboratory;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class LaboratoriesController extends Controller
{
    use DisableAuthorization;
    /**
     * Fully-qualified model class name
     */
    protected $model = Laboratory::class; // or "App\Models\Laboratory"

}
