<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cat;
use App\item;

class CatsController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $id = $id;
        $cats = cat::all();
        $items = cat::find($id)->items()->paginate();
        return view('items.dashboard_cat', compact('items', 'cats', 'id'));
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
