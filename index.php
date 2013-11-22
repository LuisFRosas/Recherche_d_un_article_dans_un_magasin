<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Rechercher un article dans le magasin : Luis Felipe Rosas</title>
</head>
<body>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<legend><b>Rechercher un article en magasin</b></legend>
			<table>
				<tbody>
					<tr><td>Mot-cl&eacute;: </td>
						<td><input type="text" name="motcle" size="40" maxlength="40" value="<?= (isset($_POST["motcle"]))? $_POST["motcle"] : ""	?>"/></td>
					</tr>
					<tr>
						<td>Dans la cat&eacute;gorie : </td> 
						<td>
							<select name="categorie">
								<option value="tous" <?= ($_POST["categorie"]=="tous")? "selected" : "" ?> >Tous</option>
								<option value="vidéo" <?= ($_POST["categorie"]=="vidéo")? "selected" : "" ?> >Vid&eacute;o</option>
								<option value="informatique" <?= ($_POST["categorie"]=="informatique")? "selected" : "" ?> >Informatique</option>
								<option value="photo" <?= ($_POST["categorie"]=="photo")? "selected" : "" ?> >Photo</option>
								<option value="divers" <?= ($_POST["categorie"]=="divers")? "selected" : "" ?> >Divers</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Trier par : </td> 
						<td>
							<select name="tri">
								<option value="prix" <?= (isset($_POST["tri"]) && $_POST["tri"]=="prix")? "selected" : "" ?> >Prix</option>
								<option value="categorie" <?= (isset($_POST["tri"]) && $_POST["tri"]=="categorie")? "selected" : "" ?> >Cat&eacute;gorie</option>
								<option value="id_article" <?= (isset($_POST["tri"]) && $_POST["tri"]=="id_article")? "selected" : "" ?> >Code</option>
							</select> 
						</td>
					</tr>
					<tr><td>En ordre: </td>
						<td>Croissant<input type="radio" name="ordre" value="ASC" <?= (isset($_POST["ordre"]) && $_POST["ordre"]=="ASC")? "checked='checked'" : "" ?> />
                            D&eacute;croissant<input type="radio" name="ordre" value="DESC" <?= (isset($_POST["ordre"]) && $_POST["ordre"]=="DESC")? "checked='checked'" : "" ?> />
						</td> </tr>
						<tr><td>Envoyer</td><td><input type="submit" name="" value="OK"/></td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</form>
	<?php		
		if(isset($_POST["motcle"]) && $_POST["motcle"] != ""){
			include("./includes/connexionObjet.inc.php");
			$id = connexionObjet("????", "dbconnect");
			
			$motCle = $_POST["motcle"];
			$categorie = $_POST["categorie"];
			$tri = $_POST["tri"];
			$ordre = $_POST["ordre"];
			
			$content = "";
			
			if($categorie == "tous"){			
				$requete = "SELECT * FROM article WHERE designation LIKE '%".$motCle."%' ORDER BY ".$tri." ".$ordre;
			}
			else{
				$requete = "SELECT * FROM article WHERE categorie ='".$categorie."' AND designation LIKE '%".$motCle."%' ORDER BY ".$tri." ".$ordre;
			}
			
			$result = $id->query($requete);

			if(!$result){
				echo "<h1>Lecture imposible</h1>";
			}
			else{
				$content .= "<h1>Il y a ". $result->num_rows . " correspondant au mot clé : ".$motCle."</h1>";
				
				if($result->num_rows != 0){
					$content .= "<table border=1>
									<tr>
										<th>Code article</th>
										<th>Description</th>
										<th>Prix</th>
										<th>Catégorie</th>
									</tr>";
					
					
					while($row = $result->fetch_object()){
						
						$content.= "<tr><td>".$row->id_article ."</td>
										<td>".$row->designation ."</td>
										<td>".$row->prix ."</td>
										<td>".$row->categorie ."</td></tr>";
					}
					echo $content."</table>";
				}
				else{
					echo "<h2>Desolé il n'y a pas aucun résultat</h2>";
				}
			}
			$result->close();
			$id->close();
		}
		else{
			if(isset($_POST["motcle"]) && $_POST["motcle"] == ""){
				echo "<h1>Vous devez saisir un mot-clé pour faire la recherche!</h1>";
			}
		}
	?>
	</body>
</html>