<?php
	class EquipeManager extends DatabaseManager {

		function __construct() {
			parent::__construct();
		}

		public function createEquipe(Equipe $equipe) {
			$name = $equipe->getName();
            $point = $equipe->getScore();
            $butEncaisse = $equipe->getButEncaisse();
            $butMarque = $equipe->getButMarque();
			

			try {
				$query = $this->pdo->prepare("INSERT INTO equipe (name, score, butEncaisse, butMarque) VALUES (?,?,?,?);");
				$query->bindParam(1, $name);
				$query->bindParam(2, $score);
                $query->bindParam(3, $butEncaisse);
                $query->bindParam(2, $butMarque);
				$query->execute();

				$error = null;
			} catch(PDOException $ex) {
				if ($ex->getCode() === '23000'){
					$error = 'Cette équipe existe déjà !';
				} else {
					$error = 'Oups ! Erreur inconnue ! ';
				}
			}

			return ['error'=> $error];
		}




		public function getAllEquipes() {
			$query = $this->pdo->prepare("SELECT * FROM equipe ORDER BY score DESC, butEncaisse DESC, butMarque DESC");
			$query->execute();

			$error = null;
			$equipes = [];

			while($result = $query->fetch()){
				if ($result === false) {
					$error = 'AUCUNE EQUIPE';
				} else {
					$equipe = new Equipe($result['id'], $result['name'], $result['score'], $result['butEncaisse'], $result['butMarque']);
					array_push($equipes, $equipe);
				}
			}

			return ['error'=> $error, 'equipes'=> $equipes];
		
		}

		
		public function delete($id) {
			$query = $this->pdo->prepare("DELETE FROM equipe WHERE id = ?");
			$query->bindParam(1, $id);
			$query->execute();
		}


		public function edit($id, Equipe $equipe){
			$name = $equipe->getName();
            $point = $equipe->getScore();
            $butEncaisse = $equipe->getButEncaisse();
            $butMarque = $equipe->getButMarque();
			

			try {
				$query = $this->pdo->prepare("UPDATE equipe (name, score, butEncaisse, butMarque) VALUES (?,?,?,?);");
				$query->bindParam(1, $name);
				$query->bindParam(2, $score);
                $query->bindParam(3, $butEncaisse);
                $query->bindParam(2, $butMarque);
				$query->execute();

				$error = null;
			} catch(PDOException $ex) {
				if ($ex->getCode() === '23000'){
					$error = 'Erreur!! Mise à jour impossible!!';
				} else {
					$error = 'Oups ! Erreur inconnue ! ';
				}
			}

			return ['error'=> $error];
		}

	}	
?>
