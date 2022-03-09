<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //

    public function __construct(){

        $this->middleware('admin');
    }

    public function create(){
        return view('categories.create');
    }

    public function store(){

        request()->validate([
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:3|max:200',
            
        ]);
  
        // $input = $request->all();
    
        Category::create(request()->except('_token'));
     
        return redirect('/categories/index')
                        ->with('success','categories created successfully.');
    }

    public function index(){
        $categoryes=Category::all();
        return view('categories.index',compact('categoryes'));
    }

    public function edit(Category $category){
        // $categoryes=Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Category $category){
        request()->validate([
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:3|max:200',
            
        ]);
        $category->update(request()->except('_token'));
        return redirect('/categories/index')
        ->with('success','categories created successfully.');
    }
}
