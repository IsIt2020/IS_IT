<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\WhereLike;

class BaseModel extends Model
{
    use WhereLike;
    //
}
