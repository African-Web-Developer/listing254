@extends('layouts.master')

@section('title')
    Kenya Classifieds : Dashboard
@endsection

@section('description')
    <meta name="description" content="Kenya Classifieds: online soko. Post your what you need to sell to the world">
@endsection


@section('content')
	
    <div class="row">
    <div class="col-sm-2 cat-links">
            <form method="GET" action = "{{ route('search') }}">
                <div class="form-group">
                
                    <input id="search" type="text" class="form-control" name="search" value="{{ old('search') }}" placeholder = "Search">
                               
                </div>
            </form> 
    <h3 class="heading">Categories</h3>
        <ul class="nav nav-pills nav-stacked">
            @forelse($cats as $cat)
                <li role="presentation" @if($cat->id == $id) class = "active" @endif>
                <a href="{{ url('/cats/'.$cat->id ) }}">{{$cat->name}} 
                </a>
                </li>
            @empty
                <li role="presentation"><a href="">No Categories Yet</a></li>
            @endforelse
        </ul>
    </div>
        <div class="col-sm-8">
        
            <div class="panel panel-default">
                <div class="panel-heading"><h1 class="item-title">Latest Listings</h1></div>
                <div class="panel-body">
                    @forelse($items as $item)
                        <div class="col-sm-12 item-home">
                            <img src = "../images/{{$item->main_image}}" class= 'img-responsive center-block  img-thumbnail'>
                            <h4><a href="{{ url('/items/'.$item->id ) }}">{{ $item->title }}</a></h4>
                            <h4>KSH {{ number_format($item->price) }}</h4>

                            <p>{{ $item->description, 0, 100 }} ...</p>
                            <div class="info">
                                Posted by <a href="{{ url('/profile/'.$item->user->username ) }}">{{ $item->user->username }}</a> on {{ $item->created_at }} 
                            </div>
                            
                        </div>
                        <hr>
                        
                    @empty
                        <p>No Items Available</p>
                    @endforelse
                </div>
            </div>
            <div class="text-center">
                {{ $items->links() }}
            </div>
        </div>
        <div class="col-sm-2">
            <ul class="list-group">
                <li class="list-group-item" style="border-radius:0; background:#eee">
                    {{ $items->total() }} total items Listed
                </li>
                <li class="list-group-item" style="border-radius:0; background:#eee">
                    {{ $items->count() }} total items on this page
                </li>
            </ul>
        </div>
    </div>
     
    
@endsection