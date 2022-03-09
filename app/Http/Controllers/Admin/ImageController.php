<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    protected $productRepository;
    protected $imageRepository;

    public function __construct(ProductRepository $productRepository, ImageRepository $imageRepository)
    {
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = $this->productRepository->findById($product_id);
        $images = $this->imageRepository->findByProductId($product_id);
        return view("admin.image.add", ['data' => $product, 'images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->only(["title"]);
        $data["product_id"] = $product_id;
        if ($request->has("image")) {
            $data["image"] = Storage::putFile("images", $request->file("image"));
        } else {
            $data["image"] = null;
        }
        $this->imageRepository->addImage($data);
        return redirect()->route("admin_image_create", ['product_id' => $product_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, $product_id,$id)
    {
        $this->imageRepository->deleteImage($id);
        return redirect()->route("admin_image_create", ['product_id' => $product_id]);
    }
}
