<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $productsModel;

    public function __construct(Product $product){
        $this->productsModel = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->productsModel->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ProductRequest $request){

        $input = $request->all();
        $this->productsModel->fill($input)->save();

        //$product = $this->productsModel->fill($input);
        //$product->save();

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');

        $product = $this->productsModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->productsModel->find($id)->update($request->all());

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productsModel->find($id)->delete($id);

        return redirect()->route('products');
    }

    public function images($id){
        $product = $this->productsModel->find($id);
        return view('products.images', compact('product'));
    }

    public function createImage($id){
        $product = $this->productsModel->find($id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage){

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id){

        $image = $productImage->find($id);

        if(file_exists(public_path('/uploads/'.$image->id.'.'.$image->extension)))
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images',['id'=>$product->id]);

    }

}
