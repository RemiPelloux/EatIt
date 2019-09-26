<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EatIt</title>
    <?php include "packages/package_required.php" ?>
</head>

<body>

<?php include "packages/menu.php" ?>


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Ajout d'un menu</h1>

        <form action="">

            <div class="form-group">

                <label for="jour">Jour du repas</label>
                <select class="form-control" id="jour" name="jour">
                    <option>Lundi</option>
                    <option>Mardi</option>
                    <option>Mercredi</option>
                    <option>Jeudi</option>
                    <option>Vendredi</option>
                    <option>Samedi</option>
                    <option>Dimanche</option>
                </select>

            </div>

            <div class="form-group">

                <label for="moment">Moment du repas</label>
                <select class="form-control" id="moment" name="moment">
                    <option>Matin</option>
                    <option>Midi</option>
                    <option>Soir</option>
                </select>


            </div>

            <div class="form-group">

                <label for="nom_recette">Nom de la recette</label>
                <input type="text" class="form-control" id="nom_recette" placeholder="Entrer le Nom de la recette">

            </div>

            <div class="form-group">

                <label for="desc_recette">Description</label>
                <div class="form-group">
                            <textarea placeholder="Entrer une description pour la recette" class="form-control"
                                      name="nomequipe"
                                      id="desc_recette"
                                      rows="4"></textarea>
                </div>

            </div>

            <button type="button" style="margin-top: 10px" name="add_menu"
                    class="btn btn-primary" id="add_menu">
                Envoi
            </button>
        </form>


        <div class="probleme"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
    $(document).ready(function () {
        let menu_data = [];


        $('#add_menu').click(function () {
            $(this).attr('disabled', 'disabled');
            let id = $(this).attr("id");

            menu_data['moment'] = $('#moment')[0].value;
            menu_data['nom_recette'] = $('#nom_recette')[0].value;
            menu_data['description'] = $('#desc_recette')[0].value;
            menu_data['jour'] = $('#jour')[0].value;


            // console.log(menu_data);


            $.ajax({
                url: "actions/add_menu_db.php",
                method: "POST",
                data: {
                    moment: menu_data['moment'],
                    nom_recette: menu_data['nom_recette'],
                    description: menu_data['description'],
                    jour: menu_data['jour']

                },
                beforeSend: function () {
                    $('#' + id).html('Envoi en cours...');
                    $('#' + id).addClass('btn-danger');
                },
                success: function (data) {
                    if (data == 'ok') {
                        $('#' + id).text('Menu ajouté avec succès');
                        $('#' + id).removeClass('btn-danger');
                        $('#' + id).removeClass('btn-info');
                        $('#' + id).addClass('btn-success');
                    }
                    else {
                        $('.probleme').text(data);
                    }
                    $('#' + id).attr('disabled', false);
                }
            })


        });


    });
</script>
</body>

</html>