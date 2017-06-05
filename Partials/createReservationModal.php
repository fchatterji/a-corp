
<!-- Create reservation modal -->
<div class="modal fade" id="createReservationModal" tabindex="-1">
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
                <form action="/<?php echo $organismId ?>/reservation/create" method="post" id="createReservationForm">

                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" placeholder="Titre" class="form-control" required>
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
                        <label for="startHour">Début</label>
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

                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

                    <button type="submit" class="btn btn-primary pull-right">Créer la réservation</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- dynamic modal script -->
<script type="text/javascript">

    $('#createReservationModal').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // Button that triggered the modal

        // Extract info from data-* attributes
        var startHour = link.data('starthour'); 
        var endHour = link.data('starthour'); 
        var currentSalleId = link.data('currentsalleid');
        var currentSallePlaces = link.data('currentsalleplaces');
        var day = link.data('day'); 
        var userId = link.data('userid') ;

        var modal = $(this);

        // add default values
        modal.find("#startHourId option").filter(function() {
            return this.text == startHour; 
        }).attr('selected', true);

        modal.find("#endHourId option").filter(function() {
            return this.text == endHour; 
        }).next().attr('selected', true);

        modal.find('#salleId').val(currentSalleId);
        modal.find('#day').val(day);
        modal.find('#userId').val(userId);

        modal.find('#numGuests').val(currentSallePlaces); 
        modal.find('#numGuests').attr("max", currentSallePlaces);
    })

</script>