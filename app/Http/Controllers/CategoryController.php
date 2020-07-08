<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function category()
    {
        return view('categories.category');
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'category' => 'required'
        ]);

        $category = new Category;
        $category->category = $request->input('category');
        $category->save();
        return redirect('/category')->with('success', 'Category Added Succesfully');
    }
}
