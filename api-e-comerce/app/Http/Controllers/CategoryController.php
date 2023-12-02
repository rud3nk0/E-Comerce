<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.listCategory', ['categories'=>$categories]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);
        Category::create($data);

        $categories = Category::all();
        return view('category.listCategory', ['categories'=>$categories]);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);

        $category -> name = $request -> name;
        $category->save();

        $categories = Category::all();
        return view('category.listCategory', ['categories'=>$categories]);
    }

    public function destroy($id){
        $category = Category::find($id);
        if ($category){
            $category->delete();
        }
        $categories = Category::all();
        return view('category.listCategory', ['categories'=>$categories]);
    }
}
