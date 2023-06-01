<?php

namespace App\Models;

use App\Enums\EnumPostStatuses;
use Auresbug\Media\HasMedia;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable;

class Post extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable , SoftDeletes, HasMedia;
    //

/* -------------------------------------------------------------------------- */
/*                                  Personal                                  */
/* -------------------------------------------------------------------------- */

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['image'];

    /**
     * @var array
     */
    protected $with = [
        'media',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {

            // Created by
            if (is_null($model->created_by)) {
                $model->created_by = auth()->id();
            }

            // Slug
            if (is_null($model->slug)) {
                $model->slug = Str::slug($model->title);
            }

        });

        self::addGlobalScope('myPost', function (Builder $builder) {
            $builder->where('created_by', auth()->id());
        });
    }

    public function image()
    {
        $media = $this->getMedia()->last();

        if (!$media) {
            return 'https://picsum.photos/id/' . rand(1, 1000) . '/1920/1080';
        }

        $image = $media->name ?: null;

        return route('getFile', [$image]);
    }

/* -------------------------------------------------------------------------- */
/*                                   Scopes                                   */
/* -------------------------------------------------------------------------- */

    /**
     * Scope a query to only include published posts
     *
     * @param  \Illuminate\Database\Eloquent\Builder   $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', EnumPostStatuses::PUBLISHED);
    }

    /**
     * Scope a query to only include public post
     *
     * @param  \Illuminate\Database\Eloquent\Builder   $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic($query)
    {
        return $query->withoutGlobalScope('myPost')
            ->published()
            ->orWhere('created_by', optional(auth()->user())->id);
    }

/* -------------------------------------------------------------------------- */
/*                                Relationships                               */
/* -------------------------------------------------------------------------- */

    /**
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

/* -------------------------------------------------------------------------- */
/*                                 LaraTables                                 */
/* -------------------------------------------------------------------------- */

    /**
     * @param $post
     */
    public static function laratablesCustomAction($post)
    {
        return view('admin.posts.includes.index_action', compact('post'))->render();
    }

    //  title

    /**
     * @param $post
     */
    public static function laratablesCustomTitle($post)
    {
        return view('admin.posts.includes.index_title', compact('post'))->render();
    }

    // created_at

    /**
     * @param $post
     */
    public static function laratablesCustomCreatedAt($post)
    {
        // return view('admin.posts.includes.index_created_at', compact('post'))->render();

        return $post->created_at->diffForHumans();
    }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['title', 'slug', 'created_at', 'created_by'];
    }

}
