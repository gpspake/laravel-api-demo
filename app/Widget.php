<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
