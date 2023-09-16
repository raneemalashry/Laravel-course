<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens;
    // protected $table= "users";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Guarded id
    protected $guarded= ['id'];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'is_admin',
    // ];

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
        'password' => 'hashed',
    ];

    //one to many relationship   //user has many posts  hasMany
    //post has one user belongsTo

    public function posts(){
        return $this->hasMany(Post::class ,'user_id','id');
    }
}
