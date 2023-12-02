<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.listProduct', ['products' => $products]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $imageName;

            $request->image->move(public_path('storage/images'), $imageName);
        }
        Product::create($data);

        $products = Product::all();
        return view('product.listProduct', ['products'=>$products]);
    }

    public function update(Request $request, $id){
        $product = Product::find($id);

        $oldImage = $product->image;

        $product -> name = $request -> name;
        $product -> description = $request -> description;
        $product -> category  = $request -> category ;

        //Update image valid
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $product->image = $imageName;
            $image->move(public_path('storage/images'), $imageName);

            if ($oldImage && file_exists(public_path('storage/images/' . $oldImage))) {
                unlink(public_path('storage/images/' . $oldImage));
            }

        }

        $product->save();

        $products = Product::all();
        return view('product.listProduct', ['products'=>$products])
            ->with('success', 'Запись успешно обновлена.');
    }

    public function destroy($id){
        $product = Product::find($id);
        if ($product){
            $product->delete();
        }
        $products = Product::all();
        return view('product.listProduct', ['products'=>$products])
            ->with('success', 'Запись успешно Удалена.');
    }

}
