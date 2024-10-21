<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){

    }
    public function create(){
return view('admin.category.create');
    }
    public function store(Request $req){
        $validator=Validator::make($req->all(),[
            'name'=>'required',
            'slug' => 'required|unique:categories,slug',
        ]);
if($validator->passes()){
    Category::create([
        'name'=>$req->name,
         'slug' =>strtolower(str_replace(' ','-',$req->slug)),
    ]);
}else{
    return redirect()->route('category.create')->withErrors($validator)->withInput();
}
    }
    public function edit(){

    }
}
