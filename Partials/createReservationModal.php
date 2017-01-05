
<!-- Create reservation modal -->
<div class="modal fade" id="createReservationModal<?php echo $reservation['id']?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Créer une réservation
                </h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/reservation/create" method="post" id="reservationForm">

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

                    <label for="numGuests">Nombre de personnes</label>
                    <input type="number" name="numGuests" id="numGuests" value="10" class="form-control">

                    <input type="hidden" name="day" value="<?php echo $day ?>">
                    <input type="hidden" name="userId" value="0">
                    <input type="submit" value="Submit">

                </form>
            </div>
        </div>
    </div>
</div>