<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Range;
use App\Models\Product;
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

        return redirect()->route('product.index')->with('message', 'La gamme a bien été ajouté');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // on rècupère : gamme, produits associés, promos associées aux produits (nom) + réduction (table intermédiaire)
        $date=date('Y-m-d');
       
        $range = DB::table('ranges')  // gamme concernée
        ->where('ranges.id', $id)
        ->join('products', 'products.range_id', '=', 'ranges.id')  // produits liés à la gamme 
        ->leftJoin('promotion_products as pp', 'pp.product_id', '=', 'products.id')  // table intermédiaire
        ->leftJoin('promotions', 'promotions.id', '=', 'pp.promotion_id')  // promotions liées aux produits
        ->where('promotions.start_date', '<=', $date)
        ->where('promotions.end_date',  '>=', $date)
        ->select('ranges.*', 'products.*', 'pp.discount', 'promotions.name as promotion_name') // champs souhaités
        ->orderBy('products.name', 'asc')
        ->get();
        
        return view('products.range', ['range' => $range]);
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

        return redirect()->route('product.index');

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
