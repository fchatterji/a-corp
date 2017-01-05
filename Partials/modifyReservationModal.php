
<!-- Modify reservation Modal -->
<div class="modal fade" id="modifyReservationModal<?php echo $reservation['id']?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Modifier la réservation
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="/reservation/update/<?php echo $reservation['id'] ?>" method="post">

                    <select name="salleId" id="salleId">
                        <?php foreach($salleList as $salle): ?>
                        <option value="<?php echo $salle['id'] ?>">
                            <?php echo $salle['name'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>

                    <select name="hourId" id="hourId">
                        <?php foreach($possibleHoursList as $hour): ?>
                        <option value="<?php echo $hour['id'] ?>">
                            <?php echo $hour['hour'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>

                    <div class="form-group">
                        <label for="salle">Jour</label>
                        <input type="text" name="day" id="day" value="<?php echo $reservation['day'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="salle">Nombre de personnes</label>
                        <input type="text" name="numGuests" id="numGuests" value="<?php echo $reservation['numGuests'] ?>" class="form-control">
                    </div>

                    <input type="hidden" name="userId" value="0">

                    <button type="submit" class="btn btn-primary">Modifer la réservation</button>
                </form>

                <form action="/reservation/delete/<?php echo $reservation['id'] ?>" method="post"> 
                    <button type="submit" class="btn btn-warning">Supprimer la réservation</button>
                </form>
            </div>

        </div>
    </div>
</div>

