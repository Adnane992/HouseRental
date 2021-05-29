@extends('layouts.ProprietaireMaster')
@section('content')
<div class="container lst">
  
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Oops!</strong> There were more problems with your HTML input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
    @endif
      
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div> 
    @endif
      
    <h3 class="well">Laravel 8 Multiple Image Upload - ItSolutionStuff.com</h3>
     
    <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
        @csrf
      
        <div class="input-group hdtuto control-group lst increment" >
            <input type="text" placeholder="ville" id="ville" name="ville" class="myfrm form-control">
            <input type="text" placeholder="surface" id="surface" name="surface" class="myfrm form-control">
            <input type="text" placeholder="prix" id="prix" name="prix" class="myfrm form-control">
            <input type="file" name="image_path[]" class="myfrm form-control" multiple>
          <div class="input-group-btn"> 
            <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
      
        <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
      
    </form>        
    </div>
      
    <script type="text/javascript">
        $(document).ready(function() {
          $(".btn-success").click(function(){ 
              var lsthmtl = $(".clone").html();
              $(".increment").after(lsthmtl);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".hdtuto").remove();
          });
        });
    </script>

@endsection