<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Jobs\NewProductMail;
use App\Mail\AddProductNotify;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ProductController extends BaseController
{

    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $products = Product::where('STATUS', '1')->get();
        foreach ($products as $k => $product) {
            $product->DATA = json_decode($product->DATA);
        }
        return view('index', compact('products'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['USER_ID'] = Auth::id();
        $res = $this->service->store($data);
        if($res->id) {
            session()->flash('message', 'Product added successfully!');
            dispatch(new NewProductMail($res));
        }

        return redirect(route('index'))->with('success',
          'Product added successfully!');
    }

    public function show(Product $product)
    {
        if ($product->exists) {
            return $product;
        }

        abort(282);
    }

    public function destroy(Product $product)
    {
        if (Gate::allows('is_owner', Product::find($product->id))) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully!');
            return redirect(route('index'));
        } else {
            abort(244);
        }
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        session()->flash('message', 'Product updated successfully!');
        return redirect()->route('index');
    }
}
