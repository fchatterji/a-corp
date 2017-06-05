
<!-- Alert when the user tries to modify another user's reservation modal -->
<div class="modal fade" id="alertNotCorrectUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal header -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <p>
                    Vous ne pouvez pas modifer les réservations des autres utilisateurs
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Update reservation modal -->
<div class="modal fade" id="updateReservationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Modifier une réservation
                </h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" id="updateReservationForm">

                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="salleId">Salle</label>
                        <select name="salleId" id="salleId" class="form-control">
                            <?php foreach($salleList as $salle): ?>
                                <option value="<?php echo $salle['id'] ?>" >
                                    <?php echo $salle['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="startHourId">Début</label>
                        <select name="startHourId" id="startHourId" class="form-control startHourSelect">
                            <?php foreach($possibleHoursList as $hour): ?>
                                <option value="<?php echo $hour['id'] ?>">
                                    <?php echo $hour["hour"]; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="endHourId">Fin</label>
                        <select name="endHourId" id="endHourId" class="form-control endHourSelect">
                            <?php foreach($possibleHoursList as $hour): ?>
                                <option value="<?php echo $hour['id'] ?>">
                                    <?php echo $hour["hour"]; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="numGuests">Nombre de personnes</label>
                        <input type="number" name="numGuests" id="numGuests" class="form-control" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="day">Jour</label>
                        <input type="text" name="day" id="day" class="form-control" required>
                    </div>

                    <input type="hidden" name="userId" id="userId">

                    <button type="submit" class="btn btn-primary pull-right">Modifier la réservation</button>

                </form>

                <form method="post" id="deleteReservationForm">

                    <input type="hidden" name="day" id="day" class="form-control">
                    <input type="hidden" name="userId" id="userId">

                    <button type="submit" class="btn btn-default">Supprimer la réservation</button>

                </form>

            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    // this script sets up the modal data so that it reflects current day, date, hour and 
    // reservation info

    $('#updateReservationModal').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // Button that triggered the modal

        // Extract info from data-* attributes in html
        var startHourId = link.data('starthourid'); 
        var endHourId = link.data('endhourid'); 
        var currentSalleId = link.data('currentsalleid');
        var currentSallePlaces = link.data('currentsalleplaces');
        var day = link.data('day');
        var userId = link.data('userid'); 
        var title = link.data('title');
        var reservationId = link.data('reservationid');
        var numGuests = link.data('numguests');
        var organismId = link.data('organismId');

        console.log(organismId);
        console.log('test');
        console.log(link.data);

        var modal = $(this);

        // set values
        modal.find('#startHourId').val(startHourId);
        modal.find('#endHourId').val(endHourId);
        modal.find('#salleId').val(currentSalleId);
        modal.find('#day').val(day);
        modal.find('#userId').val(userId);
        modal.find('#title').val(title);
        modal.find('#numGuests').val(numGuests);

        modal.find('#numGuests').attr("max", currentSallePlaces);

        modal.find("#updateReservationForm").attr("action", "/" + organismId + "/reservation/update/" + reservationId);
        modal.find("#deleteReservationForm").attr("action", "/" + organismId + "/reservation/delete/" + reservationId);

    });

</script>

