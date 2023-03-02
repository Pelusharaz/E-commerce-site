<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>grocershop</title>
  <link rel="icon" href="assets/imgs/download.png" type="image/icon type">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <link rel="stylesheet"href="assets/css/style.css">
  <link rel="stylesheet"href="assets/css/style2.css">

</head>
<body>
  
  <!--navbar-->
  
  <div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <img src="assets/imgs/download.png" alt="logo" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <!--products-->
          <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
          </li>
           <!--register-->
          <li class="nav-item">
            <a class="nav-link" href="Register.php">Register</a>
          </li>
           <!--contacts-->
          <li class="nav-item">
            <a class="nav-link" href="#">Contacts</a>
          </li>
           <!--cart-->
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"><sup>1</sup></i>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Total Price /1500</a> <li class="nav-item">
            </li>
          </li> -->
        </ul>
        <div class="drop-down">
        <ul class="navbar-nav d-flex flex-row">
          <li class="nav-item me-3 me-lg-0 dropdown" >
            <li class="nav-item">
              <a class="nav-link"href="#" >Welcome Geust</a>
            </li>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-mdb-toggle="dropdown"
               aria-expanded="false">
               <i class="fas fa-user"></i>
            </a>
            
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="php/Users/signup.php">Sign Up</a>
              </li>
              <li>
                <a class="dropdown-item" href="php/Users/signup.php">Log in</a>
              </li>
            </ul>
          </li>
        </ul>
        </div>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  </div>
  <!--second child-->
  <nav class="navbar.navbar-expand-lg navbar-dark bg-secondary">
    <!-- <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link"href="login.php" >login</a>
      </li>
    </ul> -->
</nav>
  <!--Third child-->
  <div class="bg-light">
    <h3 class="text-center">Smoby Groceries</h3>
    <p class="text-center">Stock up your pantry with us.</p>
  </div>
  <!--corousel-->
 
  <!--fourth child-->
  <div class="row">
    <div class="col-md-10">
      <!---->
     
       <div class="row">
         <div class="col-md-4 mb-2">
          <div class="card">
            <img src="assets/imgs/capsicum.jpeg" class="card-img-top" alt="capsicum">
            <div class="card-body">
              <h5 class="card-title">Ksh 100=/kg </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add To Cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
           </div>

         <div class="col-md-4 mb-2">
          <div class="card">
            <img src="assets/imgs/corriander.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add To Cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
         </div>

        <div class="col-md-4 mb-2">
          <div class="card">
            <img src="assets/imgs/onions.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add To Cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <div class="card">
            <img src="assets/imgs/mangoes.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Mangoes</h5>
              <p class="card-text">Mangoes are not only delicious, but also nutritious</p>
              <a href="#" class="btn btn-info">Add To Cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-2">
          <div class="card">
            <img src="/home/cyprian/onlinegrocery/assets/imgs/download.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add To Cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-2">
          <div class="card">
            <img src="/home/cyprian/onlinegrocery/assets/imgs/tomato.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add To Cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-2">
          <div class="card">
            <img src="/home/cyprian/onlinegrocery/assets/imgs/mangoes.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add To Cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>

     </div>
      <!--products-->
    </div>
    <div class="col-md-2 bg-secondary p-0">
      <ul class="navbar-nav me-auto">
        <li class="nav-item bg-info">
          <!--Brands-->
          <a href="#" class="nav-link text-center text-light"><h4>Brands</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>Brand1</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>Brand2</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>Brand3</h4> </a>
        </li>

      </ul>
      <ul class="navbar-nav me-auto">
        <li class="nav-item bg-info">
          <!--categories-->
          <a href="#" class="nav-link text-center text-light"><h4>Categories</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>category1</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>category2</h4> </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link text-center text-light"><h4>category3</h4> </a>
        </li>

      </ul>
      
    </div>
  </div>



  <!--footer-->
 <div class="bg-info p-3 text-center">
    <p>All Rights Reserved --developed by cyprian 2023</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Scripts -->
  <script type="text/javascript" src="js/script1.js"></script>

</body>
</html>