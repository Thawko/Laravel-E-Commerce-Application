<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->get();
    }

    public function addProduct($data)
    {

        $product = new $this->product;
        $product->category_id = $data["category_id"];
        $product->title = $data["title"];
        $product->status = $data["status"];
        $product->price = $data["price"];
        $product->quantity = $data["quantity"];
        $product->minquantity = $data["minquantity"];
        $product->tax = $data["tax"];
        $product->detail = $data["detail"];
        $product->description = $data["description"];
        $product->image=$data["image"];
        $product->user_id= Auth::id();

        $product->save();
        return $product->fresh();
    }

    public function findById($id)
    {
        return $this->product->where("id", $id)->get()[0];
    }

    public function updateProduct($data)
    {
        $product = $this->product->find($data["id"]);
        $product->category_id = $data["category_id"];
        $product->title = $data["title"];
        $product->status = $data["status"];
        $product->price = $data["price"];
        $product->quantity = $data["quantity"];
        $product->minquantity = $data["minquantity"];
        $product->tax = $data["tax"];
        $product->detail = $data["detail"];
        $product->description = $data["description"];
        $product->user_id= Auth::id();
        if($data["image"]){
            $product->image=$data["image"];
        }

        $product->update();
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        return $product;
    }
}
