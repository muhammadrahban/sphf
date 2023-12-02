<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\UserDevice;
use App\Models\WithdrawLog;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'phone',
        'phone_verified_at',
        'password',
        'nationality_no',
        'nationality',
        'address',
        'city',
        'country',
        'post_code',
        'organiation',
        'job_title',
        'comments',
        'is_anonymously',
        'is_individual',
        'is_company',
        'remember_token'
    ];

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
        'phone_verified_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * The booted method of the model
     */
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->verification_code = mt_rand(10000, 99999);
        });
    }


    // public function verifyUser()
    // {
    //     $this->phone_verified_at = now();
    //     $this->phone_verification_code = NULL;
    //     $this->save();
    // }

    /**
     * Set password encryption when insert
     *
     * @param $password
     */
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    /**
     * Get formatted timestamp of email_verified_at
     *
     * @param $date
     * @return string
     */
    // public function getExpiredAtAttribute($date)
    // {
    //     if ($date !== null) {
    //         return Carbon::parse($date)->format('Y-m-d H:i:s');
    //     }
    // }

    /**
     * Mark user verified
     */
    public function markUserVerified()
    {
        $this->verification_code = null;
        $this->expired_at = null;
        $this->email_verified_at = now();

        $this->save();
    }

    /**
     * Check if verification code is not expired
     *
     * @return bool
     */
    public function hasValidCode()
    {
        return $this->verification_code !== null && Carbon::parse($this->expired_at)->addMinutes(36000) > now();
    }

    // public function userDevice($request, $access_token)
    // {
    //     $request['access_token'] = $access_token;
    //     $this->devices()->updateOrCreate(
    //         $request->only('udid'),
    //         $request->all()
    //     );
    // }
}
