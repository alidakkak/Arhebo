<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'expired_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }

    public function reminder()
    {
        return $this->hasMany(Reminder::class);
    }

    public function receptions()
    {
        return $this->hasMany(Reception::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function deviceToken()
    {
        return $this->hasMany(DeviceToken::class);
    }

    public function setImageAttribute($image)
    {
        $newImageName = uniqid().'_'.'user_image'.'.'.$image->extension();
        $image->move(public_path('user_image'), $newImageName);

        return $this->attributes['image'] = '/'.'user_image'.'/'.$newImageName;
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($user) {
            if ($user->image) {
                $imagePath = public_path($user->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

        });
        static::updated(function ($user) {
            if ($user->image) {
                if ($user->isDirty('image')) {
                    $oldImagePath = public_path($user->getOriginal('image'));
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
            }

        });
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function generate_code()
    {
        $this->timestamps = false;
        $otp = rand(1000, 9999);
        $this->code = $otp;
        $this->expired_at = now()->addMinutes(10);
        $this->save();

        return $otp;
    }

    public function reset_code()
    {
        $this->timestamps = false;
        $this->code = null;
        $this->expired_at = null;
        $this->save();
    }

    public function verifyOtp($inputOtp)
    {
        if ($this->code == $inputOtp && $this->expired_at && $this->expired_at->isFuture()) {
            $this->reset_code();
            $this->update(['email_verified_at' => Carbon::now()]);

            return true;
        }

        return false;
    }
}
