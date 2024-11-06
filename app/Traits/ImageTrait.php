<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

trait ImageTrait
{

    public function optimizeImage($directory,$imageName)
    {
        $new_directory = $directory . '/' . $imageName;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($new_directory);
        $rectangleWidth = 310;
        $rectangleHeight = 280;
        $image->resize(width: $rectangleWidth, height: $rectangleHeight);

        $imageWidth = $image->width();
        $imageHeight = $image->height();

        $startX = max(0, ($imageWidth - $rectangleWidth) / 2);
        $startY = max(0, ($imageHeight - $rectangleHeight) / 2);
        $image->crop($rectangleWidth, $rectangleHeight, $startX, $startY);
        $image->save(null,90);
    }


}
