<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Permission;

class GroupPermission extends Model
{
    public $table = 'group_permission';

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }


}
