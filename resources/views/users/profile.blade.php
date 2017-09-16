@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h1>{{ ucwords($user->username) }} Profile
                    @if(Auth::user()->id == $user->id)
                        <span class="pull-right">
                            <a href={{ url('/edit/'.Auth::user()->username ) }}><button class="btn btn-info btn-small">Edit Info</button></a>
                        </span>
                    @endif
                    </h1>
                </div>

                <div class="panel-body">
                    <img src = {{url("/images/noimage.png")}} class="img-thumbnail img-responsive center-block" width="200">
                
                    <div class="info">

                        <ul class="list-group">
                            <li class="list-group-item"><span class="alignLeft"><strong>Name : </strong></span> <span class="pull-right">{{ $user->name }} </span></li>
                            <li class="list-group-item"><strong>Email : </strong><span class="pull-right">{{ $user->email }}</span></li>
                            <li class="list-group-item"><strong>Phone : </strong><span class="pull-right">{{ $user->phone }}</span></li>
                            <li class="list-group-item"><strong>Location : </strong><span class="pull-right">{{ $user->location }}</span></li>
                        </ul>
                        
                    </div>
                </div>
                <div class="panel-heading clearfix">
                    <h3>Related Items</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @forelse($items as $item)
                           <li class="list-group-item"> <a href="{{ url('/items/'.$item->id ) }}">{{ $item->title }} </a>: Price -> KSH  {{ $item->price }}<span class="pull-right"> Posted on {{ $item->created_at }} </span></li> 
                        @empty
                            <li class="list-group-item">No Listing Yet</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection