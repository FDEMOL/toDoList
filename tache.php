<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$titre_tache = $_POST['titre_tache'];
$desc_tache = $_POST['desc_tache'];
$date = $_POST['date_fin'];
$verif = TRUE;

if($titre_tache != NULL){echo $titre_tache;}

if($titre_tache == NULL OR $desc_tache == NULL)			
{
    echo'Merci de renseigner un titre ou une description de tâche<br />';
	$verif = FALSE;
}

if($verif=TRUE){
        $req_etudiant=$bdd->prepare("INSERT INTO taches (titre_tache, desc_tache, date_fin, date_crea) VALUES (?, ?, ?, NOW())"); 
	
        //Execute la requete
        $req_etudiant->execute(array($titre_tache, $desc_tache, $date));
}
	
//deconnexion
$bdd= null;

echo 'La tâche a été ajoutée.';


?>