<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Stock;
use App\Article;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id_unit = $user->unit->id;
        $stocks = Stock::all()->where('unit_id', $id_unit);
        //return $stocks; 
        return view('inventario.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $unit = $user->unit;
        $unit_type = $user->unit->type_id;
        $unit_name = $user->unit->name;
        return view('inventario.register', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Stock::create([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "year" => $request->input('year'),
            "unit_id" => $request->input('unit_id'),
        ]);

        $stock_id = Stock::get()->last()->id;
        $names = $request->input('name');

        for ($i=0; $i < count($names); $i++) { 
            Article::create([
                "code" => $request->input('code')[$i],
                "name" => $request->input('name')[$i],
                "description" => $request->input('Artdescription')[$i],
                "stock_id" => $stock_id,
                "quantity" => $request->input('quantity')[$i],
            ]);
        }

        return redirect()->route('inventarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::where('id', $id)
            ->with('articles','unit')->first();

        return view('inventario.show', compact('stock'));
    }
}
