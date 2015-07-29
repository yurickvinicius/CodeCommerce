<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

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
}
