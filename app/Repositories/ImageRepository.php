<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository{
    protected $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function addImage($data)
    {
        $image = new $this->image;
        $image->product_id = $data["product_id"];
        $image->title = $data["title"];
        $image->image=$data["image"];

        $image->save();
        return $image->fresh();
    }

    public function findByProductId($product_id){
        return $this->image->where("product_id",$product_id)->get();
    }

    public function deleteImage($id)
    {
        $image = $this->image->find($id);
        $image->delete();
        return $image;
    }
}
