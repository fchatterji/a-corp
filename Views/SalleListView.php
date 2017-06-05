<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>


<div class="row">
    <?php foreach ($salleList as $salle): ?>

        <!-- Salle thumbnail -->
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3><?php echo $salle['name'] ?></h3>
                    <p>
                        <?php echo $salle['places'] ?> places
                    </p>

                    <p>
                        <!-- Button trigger delete modal -->
                        <button class="btn btn-default" data-toggle="modal" data-target="#deleteSalleModal<?php echo $salle['id']?>">
                            Supprimer
                        </button>
                        <!-- Button trigger update modal -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#updateSalleModal<?php echo $salle['id']?>">
                            Modifier
                        </button>
                    </p>
                </div>
            </div>
        </div>



        <!-- Update modal -->
        <div class="modal fade" id="updateSalleModal<?php echo $salle['id']?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Modifier la salle
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <form action="<?php echo "/{$organismId}/salle/update/".htmlspecialchars($salle['id']) ?>" method="post">

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" required name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($salle['name']); ?>">
                            </div>

                            <div class="form-group">
                                <label for="places">Nombre de places</label>
                                <input type="number" required name="places" id="places" class="form-control" value="<?php echo htmlspecialchars($salle['places']); ?>">
                            </div>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

                            <button type="submit" class="btn btn-primary pull-right">Modifier la salle</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>



        <!-- Delete modal -->
        <div class="modal fade" id="deleteSalleModal<?php echo $salle['id']?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Voulez-vous vraiment supprimer la salle?
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p class="alert alert-danger">Attention, la suppression d'une salle entraîne la suppression des réservations liées à cette salle.</p>

                        <form action="/<?php echo $organismId ?>/salle/delete/<?php echo $salle['id'] ?>" method="post">
                            <button type="submit" class="btn btn-primary pull-right">Confirmer</button>
                        </form>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<div class="row">

    <!-- Button trigger for create salle modal -->
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ajouterSalleModal">
        Ajouter une salle
    </button>

    <!-- Create Salle Modal -->
    <div class="modal fade" id="ajouterSalleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Ajouter une salle
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <form action="/<?php echo $organismId ?>/salle/create" method="post">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" required name="name" id="name" placeholder="Nom" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="places">Nombre de places</label>
                            <input type="number" required name="places" id="places" placeholder="Nombre de places" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter une salle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "Partials/footer.php"; ?>

