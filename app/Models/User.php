<?php

namespace App\Models;

use Faker\Core\Blood;
use App\Models\Booking;
use App\Models\Trainee;
use Parental\HasChildren;
use Laravel\Sanctum\HasApiTokens;
use Wildside\Userstamps\Userstamps;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use SoftDeletes;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasChildren;
    use HasRoles;

    public function canAccessFilament(): bool
    {
        if ($this->hasRole('Admin')) {
            return true;
        } elseif ($this->hasRole('Employee')) {
            return true;
        } elseif ($this->hasRole('super_admin')) {
            return true;
        } else {
            return false;
        }
    }

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'type',
        'remember_token',
        'laboratory_id',
        'name_in_bangla'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The intakes that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function intakes(): BelongsToMany
    {
        return $this->belongsToMany(Intake::class);
    }

    /**
     * Get all of the bookings for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the bloodtype that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bloodtype(): BelongsTo
    {
        return $this->belongsTo(BloodType::class);
    }

    /**
     * Get the gender that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Get the quota that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quota(): BelongsTo
    {
        return $this->belongsTo(Quota::class);
    }

    /**
     * Get the religion that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }
}