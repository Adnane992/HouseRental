<!doctype html>
@php
    use App\Models\Image;
@endphp
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <title>Maison Web</title>
    <link rel="stylesheet" href="acceuil.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
   </head>
  <body>
    <!--Nav-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-black">
        <div class="container">
          <a href="#" class="navbar-brand font-italic">Maision Web</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a href="#"class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="#products" class="nav-link">Maisons</a>
              </li>
              <li class="nav-item">
                <a href="#about-sec" class="nav-link">A propos</a>
              </li>
              <li class="nav-item">
              <div class="dropdown">
                <a class="btn dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    Contact
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('login')}}">Se connecter</a>
                  <a class="dropdown-item" href="{{route('register')}}">S'inscrire</a>
                </div>
              </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!--End of NAv-->
      <!-- SLIDER -->
      <section id="main">
        <div id="Carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item carousel-image-1 active">
              <div class="container">
                <div class="carousel-caption d-none d-sm-block text-right mb-5">
                  <h1 class="display-3 h-color">Heading One</h1>
                  <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, aperiam vel ullam deleniti reiciendis ratione
                    quod aliquid inventore vero perspiciatis.</p>
                  <a href="{{route('register')}}" class="btn btn-color slide-btn btn-lg">Sign Up</a>
                </div>
              </div>
            </div>
            
            <div class="carousel-item carousel-image-2">
              <div class="container">
                <div class="carousel-caption d-none d-sm-block mb-5">
                  <h1 class="display-3 h-color">Heading Two</h1>
                  <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, aperiam vel ullam deleniti reiciendis ratione
                    quod aliquid inventore vero perspiciatis.</p>
                  <a href="#about-sec" class="btn btn-color slide-btn btn-lg">Learn More</a>
                </div>
              </div>
            </div>
            
          </div>
    
          <a href="#Carousel" data-slide="prev" class="carousel-control-prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
    
          <a href="#Carousel" data-slide="next" class="carousel-control-next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </section>
      <!--End of slider-->
      
 <!-- Product section -->
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
     @php
        $images=Image::where('id_maison',$maison->id_maison)->get();
       // $data=preg_replace('/"/', '', $image['image_path']);
        //dd($image['0']->image_path);
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
       <div class="card-body">
         <div class="card-text d-flex justify-content-between text-capitalize">
           <h5 id="item-name"> {{$maison->ville}}</h5>
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
<!-- end of store section -->
  <!---End of Product Section===-->
  <!---About Section=====-->
  <section id="about-sec">
     <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 text-center">
          <img src="img\maison3.jpg" width="450" height="150" 
          class="img-fluid watch-img">
        </div>
        <div class="col-lg-7 text-lg-right  text-center text-color about-text" >
          <h1 style="color:#0275d8;">About Company</h1>
          <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing 
            elit. Perferendis itaque sequi facere deleniti 
            repellat minima doloribus nostrum consectetur enim 
            accusantium.</p>
        </div>
      </div>
      </div>
      </section>
      <!---End of About Section---->
    <!--Footer-->
    <footer class="footer mt-5">
      <div class="text-center py-1">
          <h2 class="py-1">Maison WEB</h2>
       </div>
      <div class="container">
         <!-- <div class="row mb-3">
              <div class="col-lg-8 offset-lg-2 text-center">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla aliquet est nec aliquet. 
                    Cras convallis ultrices sem, id cursus tellus varius. </p>
                  <div class="justify-content-center">
                    <i class="fab fa-facebook fa-2x"></i>
                    <i class="fab fa-twitter fa-2x"></i>
                    <i class="fab fa-instagram fa-2x"></i>
                    
                    </div>
             </div>
          </div>-->
          <div class="copyright text-center py-3 border-top text-light">
            <p>&copy; Copy Right Maison WEB</p>
              
          </div>
      </div>

  </footer>



 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>