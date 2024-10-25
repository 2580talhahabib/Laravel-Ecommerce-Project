<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::latest(); 
        
        if(!empty($req->get('keyword'))){
            $categories=$categories->where('name','like','%'. $req->get('keyword') .'%');
        }

        // if(!empty($req->get('keyword'))){
        //     $categories=$categories->where('slug','like','%'. $req->get('keyword').'%');
        // }
        $categories = $categories->paginate(10); 
        return view('admin.category.list', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $req)
    {
        
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'slug' => 'required',
            'image'=> 'required|image|mimes:png,jpg,jpeg',
        ]);

        if ($validator->passes()) {
            if (Category::where('slug', strtolower(str_replace(' ', '-', $req->slug)))->exists()) {
                return redirect()->route('category.create')
                    ->withErrors(['slug' => 'The slug has already been taken.'])
                    ->withInput();
            }
            if($req->hasFile('image')){
                $image=$req->file('image');
                dd($image);
            }

            Category::create([
                'name' => $req->name,
                'slug' => strtolower(str_replace(' ', '-', $req->slug)),
                'status' => $req->status,
                'image'=>$req->image
            ]);

            return redirect()->route('category.index')->with('success','Your Category created Successfully');
        } else {
            return redirect()->route('category.create')->withErrors($validator)->withInput();
        }
    }

    public function edit()
    {
        
    }
}
