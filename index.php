<html lang="en">
<?php include "config.php"; ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <title>Todo Application</title>
</head>

<body>
<!-- Edit modal -->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">EditRecord</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

 <form action ="/test/index.php" class="row g-3" method="POST">
  <input type="hidden" name="snoEdit" id = "snoEdit">
  <div class="col-4">
    <label for="title" class="form-label">Note Title</label>
    <input type="text" name = "titleEdit" class="form-control" id="titleEdit" placeholder="Note Title">
  </div>
<div class="mb-3">
  <label for="desc" class="form-label">Description</label>
  <textarea class="form-control" id="descEdit" rows="5" name = "descEdit" placeholder="Description Area" ></textarea>
</div>
  
  <div class="col-12">
    <button type="submit"  class="btn btn-primary">Update Note</button>
  </div>
</form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">To do Application</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>

    </script>
<div class = "container my-5"> 
<h1>Add a Note</h1>
<form action ="index.php" class="row g-3" method="POST">
  <div class="col-4">
    <label for="title" class="form-label">Note Title</label>
    <input type="text" name = "title" class="form-control" id="title" placeholder="Note Title">
  </div>
<div class="mb-3">
  <label for="desc" class="form-label">Description</label>
  <textarea class="form-control" id="desc" rows="5" name = "desc" placeholder="Description Area" ></textarea>
</div>
  
  <div class="col-12">
    <button type="submit" name = "add" class="btn btn-primary" >Add a Note</button>
  </div>
</form>
</div>


<div class="container my-5">
  <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Notes Title</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     $sql = "SELECT * FROM `notes` WHERE status=0";
     $res = mysqli_query($conn,$sql);
     $sno = 0;
     while($row = mysqli_fetch_assoc($res))
     {
      $sno = $sno + 1 ;
      echo "
      <tr>
      <th scope='row'>".$sno." </th>
      <td>".$row['Title']." </td>
      <td>".$row['Description']." </td>
      <td>".$row['Date']."</td>
      <td><button class ='edit btn btn-sm btn-primary' id=".$row['Id'].">Edit</button>|<button class='delete btn btn-sm btn-primary' id=d".$row['Id'].">Delete</button>  </td>
      </tr>";
       
     }
  ?>
  
  </tbody>
</table>
</div>
</body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
    <!--Second JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


   
  <!-- Third Data tables JS -->
  


    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <!-- Fouth Data tables JQuery -->

    <script >
      $(document).ready( function () {
      $('#myTable').DataTable();
        } );
    </script>
<script>
	edits = document.getElementsByClassName('edit');
     Array.from(edits).forEach((element)=>{
      element.addEventListener("click", (e)=>{
        console.log("edit" , );
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description= tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descEdit.value  = description;
        snoEdit.value   =  e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle')
      })

     })

     deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/test/index.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })


</script>
<?php
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $status = 1;
  $sql = "UPDATE `notes`  SET `status` = '$status'  WHERE `notes`.`Id` = $sno";
  $result = mysqli_query($conn, $sql);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['snoEdit'])){

        $sno          =  $_POST["snoEdit"];
        $note         =  $_POST['titleEdit'];
        $description  =  $_POST['descEdit'];
        $status       =  0;
        $sql2 = "UPDATE `notes` SET `Title`= '$note', `Description` = '$description' ,`status`='$status' WHERE `notes`. `Id` = $sno";         
        $res2=mysqli_query($conn,$sql2);
          if($res2)
          	
            echo '<div class="alert alert-success" role="alert">
            Successfully Updated !!!
            </div>';
          else
            echo '<div class="alert alert-danger" role="alert">
            Error' . mysqli_connect_error();


    }
    else {
        $note         =  $_POST['title'];
        $description  =  $_POST['desc'];
        $status       =  0;
        $sql = "INSERT INTO `notes`(`Title`, `Description`,`status`) VALUES ('".$note."','".$description."','".$status."')";         
        $res=mysqli_query($conn,$sql);
          if($res)
            echo '<div class="alert alert-success" role="alert">
            Successfully Submitted !!!
            </div>';
          else
            echo '<div class="alert alert-danger" role="alert">
            Error' . mysqli_connect_error();
          
      }
    }

?>

</html>
