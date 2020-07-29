<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;

class CategoryController extends Controller
{
    public function cate(){
    	$category = CategoryModel::all();

    	$name = '';
    	$status = true;

    	return view('danh_muc',[
            'name' => $name,
            'status' => $status,
            'category'=> $category
         
    	]);
    }
    public function add(){
           return view('create_danh_muc');
    }
    public function create(request $req){
        CategoryModel::create($req->all());
        return redirect()->route('danh_muc');
    }

    // Sửa danh mục
    public function edit($id) {
    	$category = CategoryModel::find($id);
    	return view('update_cate',compact('category'));
    }
    public function update($id , request $req){
    	$category = CategoryModel::find($id)->update($req->all());
    	return redirect()->route('danh_muc');
    }

    // Xóa Danh Mục

    public function delete($id){
      CategoryModel::where('id', $id)->delete();
      return redirect()->route('danh_muc');
    }  
    
}
