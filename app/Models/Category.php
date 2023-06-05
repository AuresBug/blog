<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable , SoftDeletes;
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
    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::updated(function ($model) {

            // Slug
            if (is_null($model->slug)) {
                $model->slug = Str::slug($model->name);
            }

        });

    }

    /* -------------------------------------------------------------------------- */
    /*                                   Scopes                                   */
    /* -------------------------------------------------------------------------- */
    //

    /* -------------------------------------------------------------------------- */
    /*                                Relationships                               */
    /* -------------------------------------------------------------------------- */
    //

    /* -------------------------------------------------------------------------- */
    /*                                 LaraTables                                 */
    /* -------------------------------------------------------------------------- */

    /**
     * @param $category
     */
    public static function laratablesCustomAction($category)
    {
        return view('admin.categories.includes.index_action', compact('category'))->render();
    }

    //  title

    /**
     * @param $category
     */
    public static function laratablesCustomName($category)
    {
        return view('admin.categories.includes.index_name', compact('category'))->render();
    }

    /**
     * Additional columns to be loaded for datatables.
     *
     * @return array
     */
    public static function laratablesAdditionalColumns()
    {
        return ['name', 'slug'];
    }

}
