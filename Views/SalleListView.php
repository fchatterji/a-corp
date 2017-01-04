<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

<?php foreach ($salleList as $salle): ?>
<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3><?php echo $salle['name'] ?></h3>
                <p>
                    <?php echo $salle['places'] ?> places
                </p>

                <p>
                    <a href="#" class="btn btn-primary" role="button">Modifier</a>
                    <a href="#" class="btn btn-default" role="button">Supprimer</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>

<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ajouterSalleModal">
    Ajouter une salle
</button>

<!-- Modal -->
<div class="modal fade" id="ajouterSalleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Ajouter une salle
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form action="/salle/create" method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" value="test" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="places">Nombre de places</label>
                        <input type="number" name="places" id="places" value="10" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter une salle</button>
                </form>

            </div>

        </div>
    </div>
</div>

<?php include "Partials/footer.php"; ?>

