<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model  implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, SoftDeletes;
    //



/* -------------------------------------------------------------------------- */
/*                                Relationships                               */
/* -------------------------------------------------------------------------- */

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }

}
