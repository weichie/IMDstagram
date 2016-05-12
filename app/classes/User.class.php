<?php

	class User extends Post {

		protected $userID;
		protected $username;
		public static $db;

		public function __contruct($db){
			$this->db = $db;
		}

		public function setUserID($id){
			$this->userID = $id;
		}

		public function setUsername($username){
			$this->username = $username;
		}

		public function getUserID(){
			return $this->userID;
		}

		public function getUsername(){
			return $this->username;
		}

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
				return 'Dit email adres wordt al gebruikt...';
			}else{
				if($db->query($query) === TRUE){
					return "U bent succesvol geregistreerd<br>U kan vanaf nu aanmelden op uw account";
				}else{
					return "Error: " . $query . "<br>" . $conn->error;
				}
			}
		}

		public function update_user($email, $name, $username, $site, $bio){
			global $db;

			$query = "UPDATE users SET name='".$name."', username='".$username."', bio='".$bio."', url='".$site."', email='".$email."' WHERE id=".$_SESSION['userID'].";";

			$controle = "SELECT id FROM users WHERE id=".$_SESSION['userID']."";
			echo $controle;
			$qry = $db->query($controle);
			$result = $qry->fetch_assoc();

			if($qry->num_rows == 1){
				if($db->query($query)){
					return "Uw account werd succesvol geupdate";
				}else{
					return "Error: " . $query . "<br>" . $db->error;
				}
			}

			/*
			if ($conn->query($query) === TRUE) {
				echo "Uw account is succesvol geupdate!";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			*/
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

					$this->setUserID($result['id']);
					$this->setUsername($result['username']);

					header('Location: index.php');
				}else{
					return 'Aanmelden niet gelukt, probeer het opnieuw';
				}
			}else{
				return 'het opgegeven email adres werd niet gevonden...';
			}
		}

		public function auth($page, $secure_pages){

			if( in_array($page, $secure_pages) ){

				if( !isset($_SESSION['logged']) ){
					session_destroy();
					header('Location: '.SITE_URL);
					exit;
				} else {
					// Set our username and userid inside class, so we can access it instead of via Session
					$this->setUserID( $_SESSION['userID'] );
					$this->setUsername( $_SESSION['username'] );
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