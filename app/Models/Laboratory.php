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
     * Get all of the graphicstabs for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function graphicstabs(): HasMany
    {
        return $this->hasMany(GraphicsTab::class);
    }

    /**
     * Get all of the hdds for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hdds(): HasMany
    {
        return $this->hasMany(Hdd::class);
    }

    /**
     * Get all of the printers for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function printers(): HasMany
    {
        return $this->hasMany(Printer::class);
    }

    /**
     * Get all of the projectors for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectors(): HasMany
    {
        return $this->hasMany(Projector::class);
    }

    /**
     * Get all of the usbcables for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usbcables(): HasMany
    {
        return $this->hasMany(UsbCable::class);
    }

    /**
     * Get all of the vgaconverters for the Laboratory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vgaconverters(): HasMany
    {
        return $this->hasMany(VgaConverter::class);
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