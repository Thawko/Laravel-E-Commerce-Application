<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $categoryRepository;
    protected $productRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = $this->productRepository->getAll();
        return view("admin.product.list", ['products' => $productList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->categoryRepository->getAll();
        return view("admin.product.add", ['categories' => $categoryList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(["category_id", "title", "status", "description", "price", "quantity", "minquantity", "tax", "detail"]);
        if ($request->has("image")) {
            $data["image"] = Storage::putFile("images", $request->file("image"));
        } else {
            $data["image"] = null;
        }
        $this->productRepository->addProduct($data);
        return redirect()->route("admin_product");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $categoryList = $this->categoryRepository->getAll();
        $product = $this->productRepository->findById($id);
        return view("admin.product.edit", ['product' => $product, 'categories' => $categoryList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $data = $request->only(["category_id", "title", "status", "description", "price", "quantity", "minquantity", "tax", "detail"]);
        $data["id"] = $id;
        if ($request->has("image")) {
            $data["image"] = Storage::putFile("images", $request->file("image"));
        } else {
            $data["image"] = null;
        }

        $this->productRepository->updateProduct($data);
        return redirect()->route("admin_product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $this->productRepository->deleteProduct($id);
        return redirect()->route("admin_product");
    }
}
