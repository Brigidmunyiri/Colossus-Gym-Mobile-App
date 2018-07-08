<?php

	 include 'config.inc.php';
	// echo"working";
	 
	 // Check whether sets or tempo is set from android	
     if(isset($_POST['location']) && isset($_POST['type'])&& isset($_POST['sets'])&& isset($_POST['reps'])&& isset($_POST['tempo']))

     {
		  // Innitialize Variable
		  $result='';
		  $location = $_POST['location'];
		  $type = $_POST['type'];
	   	  $sets = $_POST['sets'];
		  $reps = $_POST['reps'];
          $tempo = $_POST['tempo'];
          

          
		  
		  // insert into database 	  
		  $sql ='INSERT INTO sessions94121 (location,
            type,
            sets,
            reps,
            tempo) VALUES (
            :location, 
            :type, 
            :sets, 
            :reps, 
            :tempo)';
            

		  $stmt = $conn->prepare($sql);		  
		  $stmt->bindParam(':location', $location, PDO::PARAM_STR);
		  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
          $stmt->bindParam(':sets', $sets, PDO::PARAM_STR);
		  $stmt->bindParam(':reps', $reps, PDO::PARAM_STR);
          $stmt->bindParam(':tempo', $tempo, PDO::PARAM_STR);
          $stmt->execute();
          
			 $result="true";

		  
		  // send result back to android
   		  echo $result;
  	}
	
?>