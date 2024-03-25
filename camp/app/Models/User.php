<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];
    public static function uploadAvatar($image)
    {
        $filename=$image->getClientOriginalName();
        (new self())->deleteOldImage();
        $image->storeAs('images',$filename,'public');
        auth()->user()->update(['avatar'=>$filename]);
    }
    protected function deleteOldImage()
    {
        if($this->avatar){
            // dd('/public/images/'.auth()->user()->avatar);
            Storage::delete('/public/images/'. $this->avatar);
    }
}
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // public function setPasswordAttribute($pass)
    // {
    //     $this->attributes['password'] = bcrypt($pass); 
    // }
    // public function getNameAttribute($name)
    // {
    //     return 'My name is:' . ucfirst($name);
    // }
}

