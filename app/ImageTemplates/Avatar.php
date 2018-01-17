<?php

namespace Inspirium\ImageTemplates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Avatar implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(450, 450)->sharpen(20);
    }
}