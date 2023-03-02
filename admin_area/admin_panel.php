<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admindash</title>
    <link rel="icon" href="" type="image/icon type">
    <!--boostrapcsslink-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <!--css file-->
    <link rel="stylesheet"href="assets/css/style.css">

</head>



<body>
    <!--nav bar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="#" alt="" style="width: 7%; height: 7%;">

    
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link"> Welcome Geust</a>
            </li>
        </ul>
    </nav>
    </div>
    </nav>
    <!--secondchild-->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Stock</h3>
    </div>
   <!--thirdchild-->
   <div class="row">
       <div class="col-md-12 bg-secondary p-1 d-flex aling-items-center">
           <div class="p-3">
           <a href="#" >
               <img src="" alt="admin profile" style="height: 90px;width: 90px;">
           </a>
          
           <P class="text-light text-center">Admin Name</P>
        </div>
       
       <div class="button text-center my-3 ">
           <button class="my-3 p-1">
               <a href="" class="nav-link text-light my-1 bg-info p-3">Insert Products</a>
            </button>
           <button class="my-3 p-1">
               <a href="" class="nav-link text-light my-1 bg-info p-3">view Products</a>
            </button>
            <!--category insertion-->
           <button class="my-3 p-1">
               <a href="indexa.php?insert_category" class="nav-link text-light my-1 bg-info p-3">insert Categories</a>
            </button>
           <button class="my-3 p-1">
               <a href="" class="nav-link text-light my-1 bg-info p-3">View Categories</a>
            </button>
            <!--brand insertion-->
           <button class="my-3 p-1">
               <a href="indexa.php?insert_brand" class="nav-link text-light my-1 bg-info p-3">Insert Brands</a>
            </button >
           <button class="my-3 p-1">
               <a href="" class="nav-link text-light my-1 bg-info p-3">View Brands</a></button>
           <button class="my-3 p-1"> 
               <a href="" class="nav-link text-light my-1 bg-info p-3">All Orders</a>
            </buttoinsertcategoriesn>
           <button class="my-3 p-1">
               <a href="" class="nav-link text-light my-1 bg-info p-3">All Payments</a>
            </button>
           <button class="my-3 p-1">
               <a href="" class="nav-link text-light my-1 bg-info p-3">List Users</a>
            </button>
           <button class="my-3 p-1">
               <a href="" class="nav-link text-light my-1  bg-info p-3">Logout</a>
            </button>
            </div>

       </div>
   </div>
</div>
<!--fourthchild-->
<div class="container my-5">
<<?php
if(isset($_GET['insert_cat'])){
    include('insertcategories.php');
}
?>
<?php
if(isset($_GET['insert_brand'])){
    include('insertbrands.php');
}
?>

</div>

     <!--boostrapjslink-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
</body>
</html>