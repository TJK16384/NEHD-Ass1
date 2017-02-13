<?php require "SQL.php"; ?>

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
    <script src="./js/Script.js"></script>
  </head>
  
  <body>
    
    <h1><?php echo $Title; ?></h1>
    
    <h2>SQL Data:</h2>
    <div class="table-responsive">
      <!-- <table class="table table-striped"> -->
      <table class="table-striped table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone #</th>
            <th>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Dialog_Add">
                Add Entry
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
          <!-- Database rows go here -->
          <?php require "Read.php"; ?>
        </tbody>
      </table>
    </div>
    
    <!-- ADD NEW ENTRY POPUP -->
    <div id="Dialog_Add" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title">Add a New Entry to the Database</h3>
          </div>
          
          <div class="modal-body">
            <!-- FORM STARTS HERE -->
            <form class="form-horizontal" action="Create.php" method="POST">
              <fieldset>
                <!-- <legend>Legend</legend> -->
                <div class="form-group">
                  <label for="Name" class="col-lg-2 control-label">Name:</label>
                  <div class="col-lg-10">
                    <input required class="form-control" id="Name" name="Name" placeholder="Name" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PhoneNum" class="col-lg-2 control-label">Phone #:</label>
                  <div class="col-lg-10">
                    <input required class="form-control" id="PhoneNum" name="PhoneNum" placeholder="" type="tel">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </fieldset>
            </form>
            <!-- END FORM -->
          </div>
          <!--
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
          -->
        </div>
      </div>
    </div>
    
    <!-- DELETE ENTRY POPUP -->
    <div id="Dialog_Delete" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title">Delete This Entry?</h3>
          </div>
          <div class="modal-body">
            <!-- FORM STARTS HERE -->
            <form class="form-horizontal" action="Delete.php" method="POST">
              <fieldset>
                <p>Are you sure you wish to delete this row?</p>
                <input hidden readonly id="ID" name="ID" type="text">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </fieldset>
            </form>
            <!-- END FORM -->
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
