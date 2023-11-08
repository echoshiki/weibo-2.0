<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function boot() {
        parent::boot();
        static::creating(function($user) {
            $user->activation_token = Str::random(10);
        });
    }

    public function gravatar($size = '100') {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://cdn.v2ex.com/gravatar/$hash?d=retro&s=$size";
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    # 获取所有的粉丝
    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower')->withTimestamps();
    }

    # 获取所有的关注
    public function followings() {
        return $this->belongsToMany(User::class, 'followers', 'follower', 'user_id')->withTimestamps();
    }

    public function feed() {
        $ids = $this->followings->pluck('id')->toArray();
        array_push($ids, $this->id);
        return Post::whereIn('user_id', $ids)->with('user');
    }

    # 关注
    public function follow($user_ids) {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    public function unfollow($user_ids) {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    public function isFollowing(User $user) {
        return $this->followings->contains($user->id);
    }
      
}
