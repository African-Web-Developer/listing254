  @if(count($errors))
    <div class = "row">
      <div class="col-sm-4 col-sm-offset-4 alert alert-danger">        
        <ul>
          @foreach($errors->all() as $error)
            <li class="">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif 

  @if(Session::has('message'))
    <div class = "row">
      <div class="col-sm-4 col-sm-offset-4 alert alert-success">
        {{Session::get('message')}}
      </div>
    </div>
  @endif