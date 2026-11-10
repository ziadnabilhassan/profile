<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      $products = Product::whereHas('variants', function ($q) {
        $q->whereNotNull('old_price');
    })
    ->with('variants') // لو محتاج تجيب الـ variants كمان
    ->get();
        return view('admin.offers.index', compact('products'));


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
