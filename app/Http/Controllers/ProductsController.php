<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
class ProductsController extends Controller
{
    public function index(){
    	$product = products::all();

    	return view('product', compact('product'));
    }
   
    public function  add(){
       return view('create_product');
    }
    public function create(request $req){

    	if($req->has('images')){
    		$file = $req->images;
    		// lấy tên file
    		$file_name=$file->getClientOriginalName();
    		//upload

    		$file->move(base_path('upload',$file_name));
    	}

    	$product = products::create($req->all());
    	return view('create_product', compact('product'));
    }
}
