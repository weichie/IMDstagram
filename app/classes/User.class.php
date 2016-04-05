<?php

	class User extends Post {

		public function registration($email, $password){
			global $db;

			$options = [
				'cost' => 12
			];

			$password = password_hash($password,PASSWORD_DEFAULT, $options);
			$query = "INSERT INTO users(email, password) VALUES ('$email','$password');";

			//staat email al in de database?
			$controle = "SELECT email, password FROM users WHERE email='$email'";
			echo $controle;
			$qry = $db->query($controle);
			$result = $qry->fetch_assoc();

			if($qru->num_rows == 1){
				echo 'Dit email adres wordt al gebruikt...';
			}else{
				if($db->query($query) === TRUE){
					echo "U bent succesvol geregistreerd<br>U kan vanaf nu aanmelden op uw account";
				}else{
					echo "Error: " . $query . "<br>" . $conn->error;
				}
			}
		}
		
	}

?>