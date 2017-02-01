<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <title>
      <?php
      $Title = "N.E.H.D. Assignment 1: Basic PHP+MySQL CRUD";
      echo $Title;
      ?>
    </title>
    
    <!-- <link rel="stylesheet" href="./css/normalize.min.css" /> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/Style.css" />
    
    <script src="./js/jquery.slim.min.js"></script>
    <script src="./js/tether.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </head>
  
  <body>
    
    <h1><?php echo $Title; ?></h1>
    
    <h2>SQL Data:</h2>
    <div class="table-responsive">
      <!-- <table class="table table-striped"> -->
      <table class="table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone #</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php require "fetch.php"; ?>
        </tbody>
      </table>
    </div>
    
  </body>
</html>
