<?php
$servername = "10.10.86.4";
$username = "root";
$password = "";
$dbname = "indiantellyawards";

$connect = mysqli_connect($servername, $username, $password, $dbname);
echo "connected";
$sql = "SELECT distinct (Email), username, mobile, gender from tbl_user where username!='' and email!='' order by username limit 50";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                         <th>Email</th>  
                         <th>username</th>  
                         <th>mobile</th>  
       <th>gender</th>
       
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["Email"].'</td>  
         <td>'.$row["username"].'</td>  
         <td>'.$row["mobile"].'</td>  
         <td>'.$row["gender"].'</td>  
         
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>  
 </body>  
</html>
