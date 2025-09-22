<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SlugTrait
{
    public function generateSlug($title)
    {
        return Str::slug($title);
    }
}