@extends('layouts.ProprietaireMaster')
@section('content')
@php
    use App\Models\Image;
@endphp
<link href="acceuil.css" rel="stylsheet">
<section id="products" class="products py-5">
    <div class="container">
      <!-- section title -->
      <div class="row">
        <div class="col-10 mx-auto col-sm-6 text-center">
          <h1 class="text-capitalize product-title">Featured Products</h1>
        </div>
      </div>
      <!-- end section title -->
       <!-- Product items -->
       <!-- single items -->
       <div class="row product-items" id="product-items">
       @foreach ($maisons as $maison)
       <div class="model fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action={{ route('delete',['id_maison' => Crypt::encrypt($maison->id_maison) ]) }} method="POST" id="deleteForm">
                  @csrf
                  @method('DELETE')
                  <div class="modal-body">
                      <input type="hidden" name="id" id="id" class="serdelete_val" value={{Crypt::encrypt($maison->id_maison)}}>
                      <p>Are you sure you want to delete this item ?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary" id="modal-confirm_delete" data-dismiss="modal">Supprimer</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
       @php
          $images=Image::where('id_maison',$maison->id_maison)->get();
       @endphp
       @foreach ($images as $image)
           @php
               $data=preg_replace('/"/', '', $image->image_path);
           @endphp
       @endforeach
       <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3">
        <div class="card single-item">
         <div class="img-container">
           <img src="imageUpload/{{$data}}" class="card-img-top product-img" alt="">
           </div>
         <div class="card-body serdelete_val">
           <div class="card-text d-flex justify-content-between text-capitalize">
             <h5 id="item-name"> {{$maison->ville}}</h5>
             <a href="{{route('ajouter')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
              </svg></a>
              <a  href="{{route('modifier')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
              </svg></a>
              <a  onclick="loadDeleteModal({{ $maison->id_maison }})" data-toggle="modal" class="button servicedeletebtn delete" data-target="#deleteModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg></a>
              <a href="{{route('details')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
              </svg></a>
            <span><i class="fas fa-dollar-sign"></i>{{$maison->prix}}</span>
           </div>
         </div>
       </div>
     </div>
       @endforeach
        <!-- end of single item -->
      </div>
    </div>
  </section>
  <script>
    function loadDeleteModal(id) {
        $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
        $('#deleteModal').modal('show');
    }

    function confirmDelete(id) {
        $.ajax({
            var id=$(this).closest("input").find('.serdelete_val').val();
            url: '{{ url('delete') }}/' + id,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                '_method': 'delete',
            },
            success: function (data) {
                // Success logic goes here..!

            $('#deleteModal').modal('hide');
            },
            error: function (error) {
                // Error logic goes here..!
            }
        });
    }
</script>
@endsection


