<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\item;
use App\cat;
use Auth;
use App\User;
use DB;
use App\Comment;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }


    public function index()
    {
        $items = item::orderBy('created_at', 'desc')->paginate(3);
        $cats = cat::all();
        return view('items.dashboard', compact('items', 'cats'));
    }

    public function search(Request $request)
    {
       $search = $request['search'];
       $cats = cat::all();
       $items = item::where('title', 'LIKE', '%'.$search.'%')->paginate(10);
       return view('items.search_results', compact('items', 'cats'));
    }

    
    public function create()
    {
        $cats = cat::all();
        return view('items.create', compact('cats'));
    }

    
    public function store(Request $request)
    {   
        $this->validate($request, [
            'email'=>'email|required',
            'description'=>'required',
            'price'=>'required',
            'condition'=>'required',
            'location'=>'required',
            'title'=>'required|max:50',
            'phone'=>'required',
        ]);

        $item = new item();

        $item->title = $request['title'];
        $item->cat_id = $request['category'];
        $item->description = $request['description'];
        $item->price = $request['price'];
        $item->condition = $request['condition'];
        $item->location = $request['location'];
        $item->email = $request['email'];
        $item->phone=$request['phone']; 
       
        $item->owner_id = Auth::user()->id;
        

        $image = $request->file('main_image');

        if($image) {

            $image_filename = $image->getClientOriginalName();
            $temp = explode(".", $image_filename);
            $main_image_filename = round(microtime(true)).".".end($temp);
            $image->move(public_path('images'), $main_image_filename);

        } else {
            $main_image_filename = "noimage.png";
        }

        $item->main_image = $main_image_filename;

        $item->save();

        return redirect()->route('items.index')->with(['message'=>"Listing Successfully Added"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = item::whereId($id)->first();
        $reviews = Comment::where('item_id', '=', $id)->get();
        return view('items.show', compact('item', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = item::whereId($id)->first();
        return view('items.edit', compact('item'));
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
         $this->validate($request, [
            'email'=>'email|required',
            'description'=>'required',
            'price'=>'required',
            'condition'=>'required',
            'location'=>'required',
            'title'=>'required|max:50',
            'phone'=>'required',
        ]);

        $item = item::find($id);

        $item->title = $request['title'];
        $item->cat_id = $request['category'];
        $item->description = $request['description'];
        $item->price = $request['price'];
        $item->condition = $request['condition'];
        $item->location = $request['location'];
        $item->email = $request['email'];
        $item->phone=$request['phone']; 
       
        $item->owner_id = Auth::user()->id;
        

        $image = $request->file('main_image');
        $current_image_file = $item->main_image;

        if($image) {

            $image_filename = $image->getClientOriginalName();
            $temp = explode(".", $image_filename);
            $main_image_filename = round(microtime(true)).".".end($temp);
            $image->move(public_path('images'), $main_image_filename);

        } else {
            $main_image_filename = $current_image_file;
        }

        $item->main_image = $main_image_filename;

        $item->update();

        return redirect()->route('items.index')->with(['message'=>"Item Successfully Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = item::where('id', $id)->first();
        $item->delete();
        return redirect()->route('items.index')->with(['message'=>"Item Successfully Deleted"]);
    }



    public function createReviews(Request $r)
    {
        $this->validate($r, [
            'review'=>'required',
            'item_id'=>'required'
        ]);
        $review = new Comment();
        $review->body = $r['review'];
        $review->item_id = $r['item_id'];
        $review->user_id = Auth::user()->id;

        $review->save();

        return redirect()->back()->with(['message'=>"Review Successfully Added"]);
    }



}
