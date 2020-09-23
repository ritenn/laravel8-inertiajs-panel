<?php

namespace App\Models;


use App\Traits\Datable;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use Datable;
}
