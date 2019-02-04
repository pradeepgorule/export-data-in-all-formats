<?php  
//export.php  
$servername = "10.10.86.4";
$username = "root";
$password = "";
$dbname = "indiantellyawards";

$connect = mysqli_connect($servername, $username, $password, $dbname);
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT distinct (Email), username, mobile, gender from tbl_user where username!='' and email!='' order by username ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>email</th>  
                         <th>username</th>  
                         <th>mobile</th>  
       <th>gender Code</th>
     
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Email"].'</td>  
                         <td>'.$row["username"].'</td>  
                         <td>'.$row["mobile"].'</td>  
       <td>'.$row["gender"].'</td>  
     
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename=users_details.pdf');
  echo $output;
 }
}
?>
