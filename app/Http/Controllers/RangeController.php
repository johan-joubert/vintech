<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Range;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\Review;
use DateTime;

class RangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
        $request->validate([
            'range' => '',   
        ]);

        $range = new Range;
        $range->range = $request->input('range');
        $range->save();

        return redirect()->route('product.create')->with('message', 'La gamme a bien été ajouté');

    }



    public function show($id)
    {
        $promotions = Promotion::all();
        $range = Range::where('id', $id)->get();
        $products = Product::where('range_id', $id)->with('reviews')->get();
        // on rècupère : gamme, produits associés, promos associées aux produits (nom) + réduction (table intermédiaire)
       
        
        return view('products.range', ['range' => $range, 'promotions' => $promotions, 'products' => $products]);
    }

    

    public function showUpdateRange(Range $range) {
        return view('admin/updateRange', ['range' => $range]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        $ranges = Range::all();
        return view('edit', ['ranges' => $ranges]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Range $range)
    {
        $request->validate([
            'range' => '',
        ]);

        $range->range = $request->input('range');
        $range->save();

        return redirect()->route('admin.edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Range $range) {
        $range->delete();
    return redirect('admin/edit');
    }
}