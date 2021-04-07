<?php
	class UserManager extends DatabaseManager {
		function __construct() {
			parent::__construct();
		}

		public function register(User $user) {
			$username = $user->getUsername();
			$password = $user->getPassword();

			try {
				$query = $this->pdo->prepare("INSERT INTO user (username, password) VALUES (?,?);");
				$query->bindParam(1, $username);
				$query->bindParam(2, $password);
				$query->execute();

				$error = null;
			} catch(PDOException $ex) {
				if ($ex->getCode() === '23000'){
					$error = 'Un utilisateur existe déjà avec de nom d\'utilisateur !';
				} else {
					$error = 'Oups ! Erreur inconnue ! ';
				}
			}

			return ['error'=> $error];
		}

		public function login($username, $password) {
			$query = $this->pdo->prepare("SELECT * FROM user WHERE username = ? AND password = ?;");
			$query->bindParam(1, $username);
			$query->bindParam(2, $password);
			$query->execute();

			$result = $query->fetch();

			$error = null;
			$user = null;

			if ($result === false) {
				$error = 'Identifiants non reconnus !';
			} else {
				$user = new User($result['id'], $result['username'], $result['password']);
			}

			return ['error'=> $error, 'user'=> $user];
		}
	}
?>
