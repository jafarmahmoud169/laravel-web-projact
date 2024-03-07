<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class prouctsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        //$this->middleware('auth')->only(['edit', 'delete','create']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = products::latest()->paginate(5);
        return view("products.index", compact('product'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jfif|max:2048'
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $ProfileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $ProfileImage);
            $input['image'] = $ProfileImage;
        }
        products::create($input);
        return redirect()->route('products.index')->with('success', 'product added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $product)
    {
        return view("products.show", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $product)
    {
        return view("products.edit", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $ProfileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $ProfileImage);
            $input['image'] = '$ProfileImage';
        } else
            unset($input['image']);
        $product->update($input);
        return redirect()->route('products.index')->with('success', 'product updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted succesfully');
    }
    public function softdelete($id)
    {
        $product=products::find($id)->delete();
        return redirect()->route('products.index')->with('success', 'product deleted succesfully');
    }
    public function harddelete($id)
    {
        $product=products::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('products.trash')->with('success', 'product deleted succesfully');
    }
    public function trash()
    {
        $product = products::onlyTrashed()->latest()->paginate(5);
        return view('products.trash', compact('product'));
    }
    public function back($id)
    {
        $product=products::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('products.index')->with('success', 'product backed succesfully');
    }
}
