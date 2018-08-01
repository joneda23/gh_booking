<!DOCTYPE html> 
<html lang = "en"> 
   <head>
      <meta charset = "utf-8"> 
      <title>Booking with dr. Foo Bar</title>
      <link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
      crossorigin="anonymous">

      <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <script 
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" 
        integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" 
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"  crossorigin="anonymous">
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <?php
          $arr = explode('/', uri_string());
          if (file_exists($arr[0].'/app.js'));
            echo '<script src="'.base_url().'js/'.$arr[0].'/app.js"></script>';
      ?>
      

   </head>	
   <body> 
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Dr. Foo Bar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'index.php/'?>"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'index.php/booking'?>">Book an appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'index.php/patient'?>">List of Patients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'index.php/today'?>">What's today?</a>
      </li>
      
    </ul>
   
  </div>
</nav>