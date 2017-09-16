@extends('layouts.master')

@section('title')
    Kenya Classifieds : {{ $item->title }}
@endsection

@section('description')
    <meta name="description" content="Kenya Classifieds: {{ $item->title }} being sold at {{ $item->price }}">
@endsection


@section('content')
	
<div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8">
        
            <div class="panel panel-default">
                <div class="panel-heading"><h1 class="item-title">{{ $item->title }}</h1></div>
                <div class="panel-body">
                    <div class="row">
                        
                            <div class="col-sm-6">
                                @if(!empty($item->main_image))
                                    <img src = "../images/{{$item->main_image}}" class= 'img-responsive  img-thumbnail'>
                                @else
                                    <img src = "../images/noimage.png" class= 'img-responsive  img-thumbnail'>
                                @endif
                                
                            </div>
                            <div class = "col-sm-6">
                                
                                
                                <h3>Item Description</h3>
                                <p>{{ $item->description }}</p>

                                <h3>Item Details</h3>
                                <ul class = "list-group">
                                    <li class="list-group-item"><strong> Price: </strong><span class="pull-right">KSH  {{ number_format($item->price) }}</span></li>
                                    <li class="list-group-item"><strong> Condition: </strong> <span class="pull-right">{{ $item->condition }}</span></li>
                                </ul>

                                <h3>Seller Details</h3>
                                <ul class = "list-group">

                                    <li class="list-group-item"><strong> Location: </strong><span class=""> {{ $item->location }}</span></li>
                                    <li class="list-group-item"><strong> Email Adress: </strong><span class="pull-right clearfix"> {{ $item->email }}</span></li>
                                    <li class="list-group-item"><strong> Phone: </strong><span class="pull-right clearfix"> {{ $item->phone }}</span></li>

                                </ul>
                                <div class="info">
                                    By <a href="{{ url('/profile/'.$item->user->username ) }}">{{ $item->user->name }}</a>
                                </div>
                                    @if(!Auth::guest())
                                    @if($item->owner_id == Auth::user()->id)
                                      <div class="pull-right classified-actions">
                                        <a href="{{ url('/items/'.$item->id.'/edit/' ) }}">
                                          <button class="btn btn-info">
                                            <SPAN class="glyphicon glyphicon-pencil"></SPAN>
                                          </button> 
                                        </a>  
                                        
                                        <form method="post" action = "{{ url('/items/'.$item->id) }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">
                                                <SPAN class="glyphicon glyphicon-remove"></SPAN>
                                            </button>
                                        </form>                   
                                      </div>
                                    @endif
                                    @endif
                            </div>
                        
                   </div>
                
                   <div class="row comments">
                   <ul class="nav nav-pills">
                            <li role="presentation"><a href="">Reviews</a></li>
                            <li role="presentation"><a href="">Similiar Products</a></li>
                    </ul>
                        <div class="media coms">
                            @forelse($reviews as $review)
                            <div class="row">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object" src="../images/254user.png" alt="" width="50">
                                </a>
                              </div>
                              <div class="media-body">
                                <div class="media-heading info">Posted by {{$review->user->name}} | {{$review->created_at}} </div>
                                <p>{{$review->body}}</p>
                              </div>
                            </div>
                            @empty
                                <div class="list-group">
                                    <div class="list-group-item">No Reviews Yet</div>
                                </div>
                            @endforelse
                              
                        </div>
                        @if(!Auth::guest() && (Auth::user()->id != $item->owner_id))
                       <form method="POST" action = "{{ route('review.create') }}" class="review-form">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <textarea id="review" type="text" class="form-control" name="review" placeholder = "Add a Review">{{ old('search') }}</textarea>

                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                           
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                        @endif
                   </div>
                </div>
        </div>
    </div>
    <div class="col-sm-3">
            <!-- <ul class="list-group">
                <li class="list-group-item" style="border-radius:0; background:#eee">
                    
                </li>
            </ul> -->
    </div>
</div>
     
    
@endsection