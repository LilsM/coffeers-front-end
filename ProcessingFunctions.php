<?php

/**
 * 
 */
class Processing
{
	//function to write error logs
	// public function writeLog($fun, $error)
	// {
	//         date_default_timezone_set('GMT');

	//         $time = date('Y-m-d H:i:s');

	//         file_put_contents('radio_access.log', $error, FILE_APPEND);
	// }+

	//function to connect to the db //How to prevent creating new database instance each time
	public function ConnectDB() // call without passing the parameters
	{
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "coffers";

		$conn = new mysqli($host, $user, $pass, $db)

		if (mysqli_connect_errno()){
			die ("Connection failed" + mysqli_connect_error());
			exit();
			//write error log
		}
		else return $conn;
	}

	//function to register the application - Im considering using prepared statements would it work?
	public function Register($first, $last, $gender, $dob, $email, $pass)
	{
		$conn = ConnectDB();

		$stmt = $conn-> prepare("INSERT INTO users (firstname, lastname, gender, dob, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt-> bind_param ("sssisi", $firstname, $lastname, $gender, $dob, $email, $password);

		//set parameters and execute
		$firstname = "$first";
		$lastname = "$last";
		$gender = "$gender";
		$dob = "$dob";
		$email = "$email";
		$password = "$pass";

		$stmt-> execute();

		if ($stmt-> error()){
			return "Registration failed. Try again";
			//write error in log
		}
		else (
			return "Registration successful";
		)
		
		$stmt-> close();
		$conn->close();

		// if($conn-> query($sql) === TRUE) {
	 //    return "Registration successfull. Please LogIn";
		// } 
		// else {

	 //    return "Registration failed. Try again!";
	    //write error log
		// }  
		
		 
	}

	//function to logIn the user
	public function LogIn($conn, $email, $password)
	{
		$sql = "SELECT * FROM users WHERE email = " .$email;

		$result = $con-> query($sql);
		$user_row = $result-> fetch_array(); 

		if ($password == $user_row['password']) {
			return "Welcome" + $user_row['firstname'];
		} 
		else {
		return "Incorrect Login details. Try again!";
		//write error log
		}

		$conn->close();
	}
}
?>