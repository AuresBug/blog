<?php

namespace App\Models;

use App\Enums\EnumRoles;
use App\Models\SocialProfile;
use Auresbug\Media\HasMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable, MustVerifyEmail
{

    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, HasMedia, HasUuids;

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
    ];

    /**
     * @var array
     */
    protected $with = [
        'media',
    ];

/* -------------------------------------------------------------------------- */
/*                                  Personal                                  */
/* -------------------------------------------------------------------------- */

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function avatar()
    {
        $media = $this->getMedia('avatar')->last();

        if (!$media) {
            return asset('images/default-avatar.jpeg');
        }

        $avatar = $media->name ?: null;

        return route('getFile', [$avatar, 'avatar']);
    }

/* -------------------------------------------------------------------------- */
/*                                Relationships                               */
/* -------------------------------------------------------------------------- */

    /**
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by');
    }

/* -------------------------------------------------------------------------- */
/*                                  Socialite                                 */
/* -------------------------------------------------------------------------- */

    /**
     * @return mixed
     */
    public function social_profiles()
    {
        return $this->hasMany(SocialProfile::class);
    }

/* -------------------------------------------------------------------------- */
/*                                 AdminLTE                                 */
/* -------------------------------------------------------------------------- */

    public function adminlte_image()
    {
        return auth()->user()->avatar();
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

/* -------------------------------------------------------------------------- */
/*                                 Media Library  Auresbug/media                                 */
/* -------------------------------------------------------------------------- */

    public function registerMediaGroups()
    {
        $this->addMediaGroup('avatar')
            ->performConversions('avatar');
    }

/* -------------------------------------------------------------------------- */
/*                                 LaraTables                                 */
/* -------------------------------------------------------------------------- */

    /**
     * @param  $query
     * @return mixed
     */
    public static function laratablesQueryConditions($query)
    {
        return $query->where('name', '<>', EnumRoles::SUDO);
    }

    /**
     * @param $user
     */
    public static function laratablesCustomAction($user)
    {
        return view('admin.users.includes.index_action', compact('user'))->render();
    }

    /**
     * @param $user
     */
    public static function laratablesCustomName($user)
    {
        return view('admin.users.includes.index_name', compact('user'))->render();
    }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['name', 'uuid'];
    }
}
