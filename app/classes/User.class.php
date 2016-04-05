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

			if($qry->num_rows == 1){
				echo 'Dit email adres wordt al gebruikt...';
			}else{
				if($db->query($query) === TRUE){
					echo "U bent succesvol geregistreerd<br>U kan vanaf nu aanmelden op uw account";
				}else{
					echo "Error: " . $query . "<br>" . $conn->error;
				}
			}
		}

		public function login($email, $password){
			global $db;
			$query = "SELECT id, username, email, password FROM users WHERE email='$email'";
			$qry = $db->query($query);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if(password_verify($password, $result['password'])){
					$_SESSION['logged'] = true;
					$_SESSION['userID'] = $result['id'];
					$_SESSION['username'] = $result['username'];
					header('Location: index.php');
				}else{
					echo 'Aanmelden niet gelukt, probeer het opnieuw';
				}
			}else{
				echo 'het opgegeven email adres werd niet gevonden...';
			}
		}

		public function auth($page, $secure_pages){

			if( in_array($page, $secure_pages) ){

				if( !isset($_SESSION['logged']) ){
					session_destroy();
					header('Location: '.SITE_URL);
					exit;
				}

			}

		}

		public function logout(){
			session_destroy();
			header('Location:'.SITE_URL);
			exit;
		}
		
	}

?>