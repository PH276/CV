<?php

// Fonction pour afficher les debug (print_r())
function debug($tab){
	echo '<div style="color: white; padding: 20px; font-weight: bold; background:#' . rand(111111, 999999) . '">';

	$trace = debug_backtrace(); // Retourne les infos sur l'emplacement où est exécutée une fonction
	echo 'Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' à la ligne : ' . $trace[0]['line'] . '<hr/>';

	echo '<pre>';
	print_r($tab);
	echo '</pre>';

	echo '</div>';
}

// données de traitement d'une table en fonction de celle choisie
function table_choisie($table){
	switch ($table) {
		case 't_competences' :
		$data =  array(
			'table' => 't_competences',
			'affiche_nom_table' => 'compétence',
			'colonnes' => array('competence' => 'Compétence', 'c_niveau' => 'Niveau en %'),
			'largeur_tableau' => '4'
		);
		break;
		case 't_titre_cv' :
		$data =  array(
			'table' => 't_titre_cv',
			'affiche_nom_table' => 'Titre CV',
			'colonnes' => array('titre_cv' => 'Titre', 'accroche' => 'Accroche', 'logo' => 'Logo'),
			'largeur_tableau' => '6'
		);
		break;
		case 't_formations' :
			$data =  array(
				'table' => 't_formations',
				'affiche_nom_table' => 'formation',
				'colonnes' => array('f_titre' => 'Titre', 'f_soustitre' => 'Sous-titre', 'f_dates' => 'Dates','f_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;
			case 't_realisations' :
			$data =  array(
				'table' => 't_realisations',
				'affiche_nom_table' => 'réalisation',
				'colonnes' => array('r_titre' => 'Titre', 'r_soustitre' => 'Sous-titre', 'r_dates' => 'Dates','r_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;
			case 't_experiences' :
			$data =  array(
				'table' => 't_experiences',
				'affiche_nom_table' => 'expérience',
				'colonnes' => array('e_titre' => 'Titre', 'e_soustitre' => 'Sous-titre', 'e_dates' => 'Dates','e_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;
			case 't_loisirs' :
			$data =  array(
				'table' => 't_loisirs',
				'affiche_nom_table' => 'loisir',
				'colonnes' => array('loisir' => 'Loisirs'),
				'largeur_tableau' => '4'
			);
			break;
			default :
			$data = 'erreur';

		}
		return $data;

	}

		function table_liste($pdoCV, $table){
			$req= $pdoCV->prepare("SELECT * FROM ".$table);
			$req->execute();
			$nbr_lignes = $req-> rowCount();
			$contenu = '';

			$lignes = $req->fetchAll(PDO::FETCH_ASSOC);
			// debug($lignes);
			$contenu .= '<h1>Liste des '.$_SESSION['table']['affiche_nom_table'].'s</h1>';

			$contenu .= '<p>Il ';

			$contenu .= ($nbr_lignes==0)?'n\'y a pas de ':'y a ';
			$contenu .= ($nbr_lignes==0)?'':$nbr_lignes.' ';
			$contenu .= $_SESSION['table']['affiche_nom_table'];
			$contenu .= ($nbr_lignes>1)?'s':'';

			$contenu .= ' </p>';

			$contenu .= '<div class="row">';
			$contenu .= '    <div class="col-md-'.$_SESSION['table']['largeur_tableau'].'">';
			$contenu .= '        <table class="table table-bordered">';
			$contenu .= '            <tr>';
			foreach($_SESSION['table']['colonnes'] as $titre){
				$contenu .= '                <th class="text-center">'.$titre.'</th>';
			}
			$contenu .= '                <th class="text-center">Actions</th>';
			$contenu .= '            </tr>';

			foreach($lignes as $ligne) {

				$contenu .= '                <tr>';
				foreach($_SESSION['table']['colonnes'] as $key =>$colonne) {
					// debug($ligne);
					$contenu .= '                    <td>'.$ligne["$key"].'</td>';
				}
				$contenu .= '                    <td class="text-center">';
				$contenu .= '                            <button type="button" onclick="form_ajout('.$ligne['id'].')" class="btn btn-info">';
				$contenu .= '                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
				$contenu .= '                            </button>';
				$contenu .= '                        </a>';
				$contenu .= '                            <button onclick="supp('.$ligne['id'].')"  type="button" class="btn btn-danger">';
				$contenu .= '                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>';
				$contenu .= '                            </button>';
				$contenu .= '                    </td>';

				$contenu .= '                </tr>';
			}
			$contenu .= '        </table>';

			$contenu .= '    </div>';
			$contenu .= '</div>';
			// onclick="modif('.$ligne['id'].')"
			$contenu .= '<div class="row">';
			$contenu .= '    <button onclick="form_ajout(0)" type="button" class="btn btn-primary">';
			$contenu .= '    Ajout';
			$contenu .= '                            </button>';

			$contenu .= '</div>';

			$contenu .= '<script src="js/ajax.js"></script>';

			return $contenu;

		}

		function table_form($pdoCV, $table, $id){
			$contenu = '';
			$req= $pdoCV->prepare("SELECT * FROM " . $table . " WHERE id=" . $id);
			$req->execute();
			$ligne = $req->fetch(PDO::FETCH_ASSOC);
			// if ($id != 0) {
			// 	extract($ligne);
			// } else{
			// 	$id = '';
			// 	$competence = '';
			// 	$c_niveau = '';
			// }

			$contenu .= '<h1>'.$_SESSION['table']['affiche_nom_table'].' à ajouter</h1>';
			$contenu .= '		<form id="frm" method="post" class="form-inline">';
			$contenu .= '				<input hidden type="number" name="id" value="'.$id.'">';
			foreach ($_SESSION['table']['colonnes'] as $key => $col){

				$contenu .= '			<div class="form-group">';
				// $contenu .= '				<input type="text" class="form-control">';
				$contenu .= '				<input type="text" class="form-control"  name="'
				.$key
				.'" placeholder="'
				.$_SESSION["table"]["colonnes"]["$key"]
				.' à saisir"  value="'
				. ((isset($ligne["$key"]))?$ligne["$key"]:"")
				. '">';
				$contenu .= '			</div>';
			}

			// $contenu .= '			<div class="form-group">';
			// $contenu .= '				<input type="number" class="form-control" name="c_niveau" id="c_niveau" placeholder="Inserez le niveau"  value="'.$c_niveau.'">';
			// $contenu .= '			</div>';

			$contenu .= '			<button type="submit" class="btn btn-primary"  >Enregistrer</button>';
			$contenu .= '		</form>';

			$contenu .= '<script src="js/ajax.js"></script>';
			return $contenu;


		}

		// fonction pour voir si un utilisateur est connecté:
		function userConnecte(){
			if(isset($_SESSION['membre'])){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		// Cette fonction nous retourne TRUE si l'utilisateur est connecté et false, s'il ne l'est pas.

		// Fonction pour voir si l'utilisateur est admin :
		function userAdmin(){
			if(userConnecte() && $_SESSION['membre']['statut'] == 1){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		// Si l'utilisateur est connecté... et en plus si son statut c'est 1 alors il a les droits d'admin et pourra accéder au backoffice.
