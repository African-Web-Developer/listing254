@extends('layouts.master')

@section('title')
	254 Classifieds : create listings
@endsection

@section('content')
	
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
        
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Adding Listing</h1></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action = "{{ url('/items') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <h4 class="">Product Info</h4>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">Title of Product</label>

                            <div class="col-sm-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-sm-3 control-label">Category</label>

                            <div class="col-sm-9">
                                <select id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required>
                                	@forelse($cats as $cat)
                                	<option value="{{$cat->id}}">{{$cat->name}}</option>
                                	@empty
                                    <option value=""></option>
                                    @endforelse;                                	
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-9">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-sm-3 control-label">Price</label>

                            <!-- <div class="col-sm-9">
                                <input id="price" type="number" step="0.1" class="form-control" name="price" value="{{ old('price') }}" required>
                            </div> -->
                            <div class="input-group col-sm-9">
                                  <span class="input-group-addon">KSH</span>
                                  <input type="number" step="0.1" class="form-control" aria-label="Amount (to the nearest Kenya Shillings)" name="price" value="{{ old('price') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('condition') ? ' has-error' : '' }}">
                            <label for="condtion" class="col-sm-3 control-label">Condition</label>

                            <div class="col-sm-9">
                                <select id="condition" type="text" class="form-control" name="condition" value="{{ old('condition') }}" required>
                                	<option value=""></option>
                                	<option value="fresh">Fresh</option>
                                	<option value="used">Used</option>
                                	<option value="New">New</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('main_image') ? ' has-error' : '' }}">
                            <label for="main_image" class="col-sm-3 control-label">Product Image</label>

                            <div class="col-sm-9">
                                <input id="main_image" type="file" class="form-control" name="main_image" required>
                            </div>
                        </div>

                        <h4 class="">Owner Info</h4>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-sm-3 control-label">Location</label>

                            <div class="col-sm-9">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-9">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-sm-3 control-label">Phone</label>

                            <div class="col-sm-9">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button type="submit" class="btn btn-default">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
     
    
@endsection