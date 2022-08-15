<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accessory extends Model
{
    use HasFactory, SoftDeletes;
    use Userstamps;

    protected $fillable = ['laboratory_id', 'slug', 'nos_of_printer', 'nos_of_projector', 'nos_of_usb_cable', 'nos_of_hdd', 'nos_of_vga_converter', 'nos_of_graphics_tab'];

    /**
     * Get the laboratory that owns the Accessory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }
}