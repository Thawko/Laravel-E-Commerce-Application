<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->with('children')->get();
    }

    public function addCategory($data)
    {
        $category = new $this->category;
        $category->parent_id = $data["parent_id"];
        $category->title = $data["title"];
        $category->status = $data["status"];
        $category->description = $data["description"];

        $category->save();
        return $category->fresh();
    }

    public function findById($id)
    {
        return $this->category->where("id",$id)->get()[0];
    }

    public function updateCategory($data)
    {
        $category=$this->category->find($data["id"]);
        $category->parent_id = $data["parent_id"];
        $category->title = $data["title"];
        $category->status = $data["status"];
        $category->description = $data["description"];
        $category->update();
        return $category;
    }

    public function deleteCategory($id)
    {
        $category=$this->category->find($id);
        $category->delete();
        return $category;
    }
}
