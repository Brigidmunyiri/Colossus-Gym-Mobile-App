<?php
$servername = "localhost";
$username = "id6144953_94121";
$password = "123success";
$db_name = "id6144953_z_gym";

 $db=mysqli_connect($servername, $username, $password,$db_name) or die('Could not connect');

    mysqli_select_db($db,$db_name ) or die('Could not connect to database');


    $result = mysqli_query($db, "SELECT * FROM sessions94121") or die('Could not query');

//store the entire response
$response = array();
//the array that will hold the titles and links
$posts = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ 
$date=$row['date']; 
$location=$row['location']; 
$type=$row['type']; 
$sets=$row['sets'];
$reps=$row['reps']; 
$tempo=$row['tempo']; 
//each item from the rows go in their respective vars and into the posts array
$posts[] = array('date'=> $date,'country'=> $location, 'code'=> $type, 'sets'=> $sets, 'reps'=> $reps, 'tempo'=> $tempo); 
} 
//the posts array goes into the response
$response = $posts;
//creates the file
echo json_encode($response);
$fp = fopen('pastworkout.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
/* Final Output
{"posts": [
  {
    "title":"output_from_table",
    "url":"output_from_table"
  },  
  ...
]}
*/
?> 