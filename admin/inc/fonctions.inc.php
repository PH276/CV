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

// paramètres de traitement d'une table en fonction de celle choisie
function table_choisie($table){
	switch ($table) {
		// table t_compétences
		case 't_utilisateurs' :
		$data = array(
			'table' => 't_utilisateurs',
			'affiche_nom_table' => 'utilisateurs',
			'colonnes' => array(
				'prenom' => 'Prénom',
				'nom' => 'nom',
				'email' => 'email',
				'telephone' => 'téléphone',
				'autre_tel' => 'Autre téléphone',
				// 'mdp' => 'mdp',
				'pseudo' => 'Pseudo',
				'avatar' => 'avatar',
				'date_naissance' => 'date de naissance',
				'sexe' => 'Sexe',
				'etat_civil' => 'Etat civil',
				'adresse' => 'Adresse',
				'code_postal' => 'Code postal',
				'ville' => 'Ville',
				'pays' => 'Pays',
				'site_web' =>'Site web'
			),
			'largeur_tableau' => '12'
		);
		break;

		case 't_competences' :
		$data = array(
			'table' => 't_competences',
			'affiche_nom_table' => 'compétences',
			'colonnes' => array('competence' => 'Compétence', 'c_niveau' => 'Niveau en %'),
			'largeur_tableau' => '4'
		);
		break;

		// table t_titre_CV
		case 't_titre_cv' :
		$data = array(
			'table' => 't_titre_cv',
			'affiche_nom_table' => 'titre CV',
			'colonnes' => array('titre_cv' => 'Titre', 'accroche' => 'Accroche', 'logo' => 'Logo'),
			'largeur_tableau' => '6'
		);
		break;

		// table t_formations
		case 't_formations' :
			$data = array(
				'table' => 't_formations',
				'affiche_nom_table' => 'formations',
				'colonnes' => array('f_titre' => 'Titre', 'f_soustitre' => 'Sous-titre', 'f_dates' => 'Dates','f_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;

			// table t_realisations
			case 't_realisations' :
			$data =  array(
				'table' => 't_realisations',
				'affiche_nom_table' => 'réalisations',
				'colonnes' => array('r_titre' => 'Titre', 'r_soustitre' => 'Sous-titre', 'r_dates' => 'Dates','r_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;

			// table t_experiences
			case 't_experiences' :
			$data =  array(
				'table' => 't_experiences',
				'affiche_nom_table' => 'expériences',
				'colonnes' => array('e_titre' => 'Titre', 'e_soustitre' => 'Sous-titre', 'e_dates' => 'Dates','e_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;

			// table t_loisirs
			case 't_loisirs' :
			$data =  array(
				'table' => 't_loisirs',
				'affiche_nom_table' => 'loisirs',
				'colonnes' => array('loisir' => 'Loisirs'),
				'largeur_tableau' => '4'
			);
			break;

			// table t_reseaux
			case 't_reseaux' :
			$data =  array(
				'table' => 't_reseaux',
				'affiche_nom_table' => 'réseaux',
				'colonnes' => array('nom' => 'Nom', 'lien' => 'Lien', 'logo' => 'Logo'),
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
		$retour = array();
		$contenu = '';

		$lignes = $req->fetchAll(PDO::FETCH_ASSOC);
		// debug($lignes);
		$contenu .= '<h1>Liste des '.$_SESSION['table']['affiche_nom_table'].'</h1>';

		$contenu .= '<p>Il ';

		$contenu .= ($nbr_lignes==0)?'n\'y en a pas':'y en a ';
		$contenu .= ($nbr_lignes==0)?'':$nbr_lignes.' ';
		// $contenu .= $_SESSION['table']['affiche_nom_table'];
		// $contenu .= ($nbr_lignes>1)?'s':'';

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

				switch ($key){
					case 'telephone' :
					case 'autre_tel' :
					$affiche = wordwrap($ligne["$key"], 2, ' ', true);
					break;

					case 'date_naissance' :
					$affiche = substr($ligne["$key"], 8) . '/';
					$affiche .= substr($ligne["$key"], 5, 2) . '/';
					$affiche .= substr($ligne["$key"], 0, 4);
					break;

					default:
					$affiche = $ligne["$key"];

				}



				$contenu .= '                    <td>'.$affiche.'</td>';
				// $contenu .= '                    <td>'.$ligne["$key"].'</td>';
			}
			$contenu .= '                    <td class="text-center">';

			$contenu .= '                            <button type="button" onclick="form_ajout('.$ligne['id'].')" class="btn btn-info">';
			$contenu .= '                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
			$contenu .= '                            </button>';

			$contenu .= '                            <button onclick="suppr('.$ligne['id'].')"  type="button" class="btn btn-danger">';
			$contenu .= '                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>';
			$contenu .= '                            </button>';

			$contenu .= '                    </td>';

			$contenu .= '                </tr>';
		}

		$contenu .= '        </table>';

		$contenu .= '    </div>';
		$contenu .= '</div>';
		$contenu .= '<div class="row">';
		if ($table != 't_utilisateurs'){
			$contenu .= '    <button onclick="form_ajout(0)" type="button" class="btn btn-primary">';
			$contenu .= '    Ajout';
			$contenu .= '                            </button>';
		}
		$contenu .= '</div>';

		// $contenu .= '<script src="js/ajax.js"></script>';
		// return $contenu;

		$retour['contenu'] = $contenu;
		$retour['title'] = 't'.$_SESSION['table']['affiche_nom_table'] . ' - Admin : ' . $_SESSION['utilisateur']['pseudo'];


		return $retour;


	}

	function table_form($pdoCV, $table, $id){
		$action=($id==0)?'ajouter':'modifier';

		$contenu = '';
		$retour = array();
		$req= $pdoCV->prepare("SELECT * FROM " . $table . " WHERE id=" . $id);
		$req->execute();
		$ligne = $req->fetch(PDO::FETCH_ASSOC);

		$contenu .= '<h1>'.$_SESSION['table']['affiche_nom_table'].' à '.$action.' </h1>';
		$contenu .= '		<form id="formulaire" action="table_ins.php" method="post" class="form-inline">';
		// $contenu .= '		<form id="formulaire"  class="form-inline">';
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

		// return $contenu;
		$retour['contenu'] = $contenu;
		$retour['title'] = 't'.$_SESSION['table']['affiche_nom_table'] . ' - Admin : ' . $_SESSION['utilisateur']['pseudo'];

		return $retour;

	}

	// fonction pour voir si un utilisateur est connecté:
	function userConnecte(){
		if(isset($_SESSION['utilisateur'])){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	// Cette fonction nous retourne TRUE si l'utilisateur est connecté et false, s'il ne l'est pas.

	// Fonction pour voir si l'utilisateur est admin :
	function userAdmin(){
		if(userConnecte() && $_SESSION['utilisateur']['statut'] == 1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	// Si l'utilisateur est connecté... et en plus si son statut c'est 1 alors il a les droits d'admin et pourra accéder au backoffice.
