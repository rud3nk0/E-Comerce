<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->id) {

            $product = Product::find($request->id);

            $product->image = asset('storage/images/' . $product->image);

            return response()->json($product, 200);

        } else {
            $products = Product::all();

            foreach ($products as $product){
                $product->image = asset('storage/images/' . $product->image);
            }

            return response()->json($products, 200);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // операція видаленя
        if($request->deleteId){

            $product = Product::find($request->deleteId);
            $product->delete();

            $response = [
                'data'=> 'все видалено'
            ];

            return response()->json($response, 200);
        }

        //операція оновлення
        if($request->updateId){

            $productId = Product::where('id', $request->updateId)->first();
            // dd($category);

            if($productId){
                $productId->name = $request->name;
                $productId->description = $request->description;
                $productId->image = $request->image;
                $productId->category = $request->category;
                $productId->save();

                $response = [
                    'data'=> $productId
                ];

                return response()->json($response, 200);
            } else {
                $response = [
                    'data'=> 'такого запису немає'
                ];

                return response()->json($response, 200);
            }

        } else {
            // операція створення
            $products = Product::create([
                'name'=> $request->name,
                'description'=> $request->description,
                'image'=> $request->image,
                'category'=> $request->category,

            ]);

            return response()->json($products, 200);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

