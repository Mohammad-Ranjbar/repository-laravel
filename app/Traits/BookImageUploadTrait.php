<?php

namespace App\Traits;

use Image;


trait BookImageUploadTrait
{

    protected $img_width = 200;
    protected $img_heigth = 200;
    protected $img_path = "app/public/images/products";

    public function uploadImage($image)
    {
        $image_name = $this->imageName($image);


        $im = Image::make($image)->resize($this->img_width,$this->img_heigth)->save(public_path("images/products/".$image_name));

        return "images/products/".$image_name;
    }

    public function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
