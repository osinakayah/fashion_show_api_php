<?php

namespace Monary\Modules\Designs\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Design extends Model
{
    use HasTags;

    protected $fillable = [
        'name',
        'image_url',
        'user_id',
        'designer_id',
        'tags',
        'likes'
    ];
}
