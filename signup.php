<?php

	 include 'config.inc.php';
	 
	 // Check whether username or password is set from android	
     if(isset($_POST['first_name']) && isset($_POST['last_name'])&& isset($_POST['username'])&& isset($_POST['email'])&& isset($_POST['password']))
     {
		  // Innitialize Variable
		  $result='';
		  $first_name = $_POST['first_name'];
		  $last_name = $_POST['last_name'];
	   	  $username = $_POST['username'];
		  $email = $_POST['email'];
          $password = $_POST['password'];
		  
		  // Query database for row exist or not	  
		  $sql = 'SELECT * FROM users_94121 WHERE  first_name = :first_name AND last_name = :last_name AND username = :username AND email = :email AND password = :password';
		  $stmt = $conn->prepare($sql);		  
		  $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
		  $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
          $stmt->bindParam(':username', $username, PDO::PARAM_STR);
		  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
          $stmt->bindParam(':password', $password, PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->rowCount())
          {
			 $result="true";	
          }  
          elseif(!$stmt->rowCount())
          {
			  	$result="false";
				
				$sqli ='INSERT INTO users_94121 (first_name,
            last_name,
            username,
            email,
            password) VALUES (
            :first_name, 
            :last_name, 
            :username, 
            :email, 
            :password)';
		  
		  $stmti = $conn->prepare($sqli);
		  $stmti->bindParam(':first_name', $first_name, PDO::PARAM_STR);
		  $stmti->bindParam(':last_name', $last_name, PDO::PARAM_STR);
          $stmti->bindParam(':username', $username, PDO::PARAM_STR);
		  $stmti->bindParam(':email', $email, PDO::PARAM_STR);
          $stmti->bindParam(':password', $password, PDO::PARAM_STR);
          $stmti->execute();
				
          }
		  
		  // send result back to android
   		  echo $result;
  	}
	
?>