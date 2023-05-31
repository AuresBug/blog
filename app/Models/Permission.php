<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission implements Auditable
{

    use \OwenIt\Auditing\Auditable , HasUuids;

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

}
