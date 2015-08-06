<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $productsModel;

    public function __construct(Product $product){
        ///$this->middleware('auth'); /// autentificar login porem é melhor usar middleware de rotas
        $this->productsModel = $product;
    }

    public function index()
    {
        $products = $this->productsModel->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $request){

        ///dd($request->input('tag_id'));
        ///$tag = $request->input('tag_id');

        $input = $request->all();
        $this->productsModel->fill($input)->save();

        ///productsModel->tags()->attach($tag);

        return redirect()->route('products');
    }

    public function show($id)
    {
        //
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');

        $product = $this->productsModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->productsModel->find($id)->update($request->all());

        return redirect()->route('products');
    }

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

    public function Tags($id)
    {
        $product = $this->productsModel->find($id);
        return view('products.tags', compact('product'));
    }

    public function createTag($id){
        $product = $this->productsModel->find($id);
        $tags = Tag::lists('name','id');

        return view('products.create_tag', compact('product', 'tags'));
    }

    public function storeTag(Request $request, $id){
        $this->productsModel->find($id)->tags()->attach($request->input('tag_id'));
        return redirect()->route('products.tags', ['id'=>$id]);
    }

    public function destroyTag($tag_id, $product_id){

        $product = $this->productsModel->find($product_id);

        $product->tags()->detach($tag_id);

        return redirect()->route('products.tags', ['id'=>$product_id]);
    }

}
