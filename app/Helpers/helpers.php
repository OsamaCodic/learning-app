<?php

use Illuminate\Support\Str;

if (!function_exists('generateSlug')) {
    function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}

?>