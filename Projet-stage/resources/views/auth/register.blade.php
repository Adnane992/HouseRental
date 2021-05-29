<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>S'inscrire</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        img {width:100%;}
   </style>
  </head>
<!------ Include the above in your HEAD tag ---------->
<body>
<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 text-white text-center " style="background:#f39c12">
                <div class=" ">
                    <div class="card-body">
                        <img src="img\logo.png" style="width:50%">
                        <h2 class="py-3">Registration</h2>
                        <p>Faire votre inscription pour devenir un membre de notre communauté.

</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4" style="color:#0275d8 ">Entrer vos informations</h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="cin" name="cin" placeholder="CIN" class="form-control" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input id="name" name="name" placeholder="Nom" class="form-control" type="text">
                          </div>
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="phone" name="phone" placeholder="Telephone" class="form-control" required="required" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="password" name="password" placeholder="Mot De Passe" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>
                        <div class="form-group col-md-6">
                            <input id="password_confirmation" name="password_confirmation" placeholder="Confirmer Mot de passe" class="form-control" type="password" required>
                          </div>
                      </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                  
                            <select id="role" class="form-control" name="role">
                              <option selected>Choisir...</option>
                              <option value="locataire"> locataire</option>
                              <option value="proprietaire"> proprietaire</option>
                            </select>
                        </div>
                  <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
