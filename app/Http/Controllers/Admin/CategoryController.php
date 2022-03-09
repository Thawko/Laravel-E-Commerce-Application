<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryRepository;
    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = $this->categoryRepository->getAll();
        $categoryList=$this->findParents($categoryList);
        return view("admin.category.list", ['categories' => $categoryList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->categoryRepository->getAll();
        $categoryList = $this->findParents($categoryList);
        return view("admin.category.add", ['categories' => $categoryList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(["parent_id", "title", "status", "description"]);
        $this->categoryRepository->addCategory($data);
        return redirect()->route("admin_category");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $categoryList = $this->categoryRepository->getAll();
        $categoryList = $this->findParents($categoryList);
        $category = $this->categoryRepository->findById($id);
        return view("admin.category.edit", ['category' => $category, 'categories' => $categoryList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $data = $request->only(["parent_id", "title", "status", "description"]);
        $data["id"] = $id;
        $this->categoryRepository->updateCategory($data);
        return redirect()->route("admin_category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $this->categoryRepository->deleteCategory($id);
        return redirect()->route("admin_category");
    }

    public function getParents($category, $title)
    {
        if ($category->parent_id == 0) {
            return $title;
        }
        $parent = $this->categoryRepository->findById($category->parent_id);
        $title = $parent->title . ' > ' . $title;

        return $this->getParents($parent, $title);
    }

    public function findParents($categoryList){
        foreach ($categoryList as $category) {
            $category->parents = $this->getParents($category, $category->title);
        }
        return $categoryList;
    }
}
