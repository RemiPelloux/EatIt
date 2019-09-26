<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EatLike</title>
    <?php include "packages/package_required.php" ?>
</head>

<body>

<?php include "packages/menu.php" ?>

<div class="flexbox">
    <a href="add_menu.php">
        <button type="button" class="custom-btn btn btn-secondary btn-lg">Ajouter dans le menu</button>
    </a>
</div>


<div class="container" style="padding-top: 20px">
    <h3 class="titreContainer" align="center">Menu de la semaine</h3>
    <?php

    include "actions/dbconnect.php";
    $query = "SELECT * FROM menu";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    // print("<pre>".print_r($result,true)."</pre>");

    ?>

    <br/>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Jour</th>
                <th>Moment</th>
                <th>Nom de la recette</th>
                <th>Description de la recette</th>
                <th colspan="2"></th>

            </tr>
            <?php

            foreach ($result as $row) {
                $url = "tournament_state.php?name=" . $row["hashtournament"];

                echo '
					<tr>
							
						<td>' . $row["jour"] . '</td>
						<td>' . $row["moment"] . '</td>
						<td>' . $row["nom_recette"] . '</td>
						<td>' . $row["description_recette"] . '</td>
					
			
						<td>
						
						<form method="POST" style="margin-bottom: 10px;">
						    
						
						    <button  type="button" name="this_tournament" class="btn btn-info btn-xs email_button" value="' . $row["id"] . '">
						        
						       Modifier la recette
						   
						    </button> 
	                   
						   
						    <button  type="submit" name="email_button" class="btn btn-info btn-danger btn-xs email_button" >
						
						   Supprimer
						   
						</button>
						
						</form>
						
						</td>
						
					</tr>
					';
            }
            ?>
        </table>
    </div>
</div>




</body>

</html>