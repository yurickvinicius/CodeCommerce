<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;

class StoreController extends Controller
{
    /*
    private $categoriesModel;

    public function __construct(Category $category){
        $this->categoriesModel = $category;
    }
    */

    public function index(){

        ///$pFeatured = $this->productsModel->where('featured','=','1')->get();

        $pFeatured = Product::featured()->get(); //// consulta de scopo, muito foda
        $pRecomended = Product::recomended()->get();

        $categories = Category::all();

        return view('store.index', compact('categories', 'pFeatured', 'pRecomended'));
    }

    public function category($id){
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));
    }

    public function product($id){
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.product', compact('categories', 'product'));
    }
}
