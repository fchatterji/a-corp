<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>


<div class="row">
    <?php foreach ($organismList as $organism): ?>

        <!-- Organism thumbnail -->
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3><?php echo $organism['name'] ?></h3>

                    <p>Vous êtes le <?php echo $organism['role'] ?> de ce groupe</p>

                    <a href="/<?php echo $organism['organismId'] ?>/organisms/droits" class="btn btn-alert">Gérer les droits</a>



                    <p>
                        <!-- Button trigger delete modal -->
                        <button class="btn btn-default" data-toggle="modal" data-target="#deleteOrganismModal<?php echo $organism['id']?>">
                            Supprimer
                        </button>
                        <!-- Button trigger update modal -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#updateOrganismModal<?php echo $organism['id']?>">
                            Modifier
                        </button>
                    </p>
                </div>
            </div>
        </div>



        <!-- Update modal -->
        <div class="modal fade" id="updateOrganismModal<?php echo $organism['id']?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Modifier le groupe
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <form action="/<?php echo $organismId ?>/organism/update" method="post">

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" required name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($organism['name']); ?>">
                            </div>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

                            <button type="submit" class="btn btn-primary pull-right">Modifier le groupe</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>



        <!-- Delete modal -->
        <div class="modal fade" id="deleteOrganismModal<?php echo $organism['id']?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Voulez-vous vraiment supprimer le groupe?
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p class="alert alert-danger">Attention, la suppression d'un groupe entraîne la suppression des réservations liées à ce groupe.</p>

                        <form action="/<?php echo $organismId ?>/organism/delete" method="post">
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

    <!-- Button trigger for create organism modal -->
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ajouterOrganismModal">
        Ajouter un groupe
    </button>

    <!-- Create Organism Modal -->
    <div class="modal fade" id="ajouterOrganismModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Ajouter un groupe
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <form action="/<?php echo $organismId ?>/organism/create" method="post">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" required name="name" id="name" placeholder="Nom" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter un groupe</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "Partials/footer.php"; ?>

