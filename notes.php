<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_assoc($result); 
    $username = $row['username'];
    $email = $row['email']; 
    if(isset($row['profilepicture'])){
      $picture=$row['profilepicture'];
    }else{
      $picture='';
    }
}else{
    echo "There was an error retrieving the username and email from the database";   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
<style>
html{
    position: relative;
    min-height: 100%;
}

#myContainer {
  margin-top:15vh;
  min-height:85vh;
  height: auto;
  text-align: center;
  color: black;
}
.foot{
  height: auto;
  min-height:100px;
}
.preview{
  height: 30px;
  border-radius:50%;
}
.image_preview{
  float: left;
  margin-right:10px;
  margin-top:-2px;
}
#notePad, #allNotes, #done, .delete{
    display: none;   
}
.buttons{
    margin-bottom: 20px;   
}
textarea{
    width: 100%;
    max-width: 100%;
    font-size: 16px;
    line-height: 1.5em;
    border-left-width: 20px;
    border-color: #CA3DD9;
    color: #CA3DD9;
    background-color: #FBEFFF;
    padding: 10px;
      
}
.noteheader{
    border: 1px solid grey;
    border-radius: 10px;
    margin-bottom: 10px;
    cursor: pointer;
    padding: 0 10px;
    background: linear-gradient(#FFFFFF,#ECEAE7);
} 
.text{
    font-size: 20px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.timetext{
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.notes{
    margin-bottom: 100px;
}
.green{
    background-color: rgba(114,190,35,0.8);   
}
.green:hover{
    background-color: rgb(114,190,35);   
}
#spinner{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    height: 85px;
    text-align: center;
    margin: auto;
    z-index: 1100;
}

</style>
<script src="js/jquery.min.js" ></script>  

</head>

  <body>
   <nav  role="navigation" class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
     <div class="container-fluid">
         <a href="" class="navbar-brand mb-1 border-bottom border-info">Online Notes</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse">
           <span class="navbar-toggler-icon"></span>
         </button>

       <div class="collapse navbar-collapse" id="navbarCollapse">
        
         <ul class="navbar-nav">
           <li class="nav-item "><a class="nav-link" href="profile.php">Profile</a></li>
           <li class="nav-item active"><a class="nav-link" href="notes.php">Notes</a></li>
         </ul>

         <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="profile.php">
             <div class="image_preview">
                <?php
                  if(empty($picture)){
                      echo "<img class='preview' src='profilepicture/noimage.jpg' />";
                  }else{
                      echo "<img class='preview' src='$picture' />";
                  }
                ?>
             </div>
             <b><?php echo $username ; ?></b>
            </a>
          </li>  
           <li class="nav-item active text-center"><a class="nav-link border-left border-right border-alert-dark rounded" href="index.php?logout=1">Log out</a></li>
         </ul>
       </div>
     </div>
   </nav>

<div class="container" id="myContainer">
          <!--Alert Message-->
          <div id="alert" class="alert alert-danger collapse">
              <a class="close" data-dismiss="alert">
                &times;
              </a>
              <p id="alertContent"></p> 
          </div>
          <div class="row">
            <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="buttons mb-5">
                      <button id="addNote" type="button" class="btn btn-info btn-lg float-left">Add Note</button>
                      <button id="edit" type="button" class="btn btn-info btn-lg float-right">Delete</button>
                      <button id="done" type="button" class="btn-lg btn-info float-right">Done</button>
                      <button id="allNotes" type="button" class="btn btn-info btn-lg">Show all notes</button>
                  </div>
                  
                  <div id="notePad">
                      <textarea rows="10"></textarea>
                  </div>
                  
                  <div id="notes" class="notes">
<!-- Ajax call to a php file-->
                  </div>
              
              </div>
          </div>
</div>



<!-- footer -->
  <div class="foot bg-dark p-2">
    <div class="container p-3 text-secondary text-justify">
      <p>&copy;orem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio molestiae laudantium nulla et similique, reprehenderit perferendis tempora 2018-<?php $today= date("Y"); echo $today; ?></p>
    </div>
  </div>

  </body>
  <script src="js/bootstrap.min.js" ></script>  
  <script src="js/mynotes.js"></script> 
</html>