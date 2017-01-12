<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>
    


<div class="row"> 

    <div class="col-md-12 text-center datePickerControls">
        <a class="btn btn-default btn-lg" 
        href="/reservations/<?php echo $previousDay ?>">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a> 
        
        <input data-toggle="datepicker" id="datepicker" class="btn btn-default btn-lg">
        
        <a class="btn btn-default btn-lg" href="/reservations/<?php echo $nextDay ?>">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</div>



<div class="row">
    <div class="col-md-12">

        <table class=" table table-responsive table-bordered">

            <thead>
                <tr class="info">
                    <th class="hoursHeading firstCellOfReservationTable">heure</th>
                    <?php foreach($salleList as $salle):?>
                        <th class="text-center">
                            <?php echo $salle['name']?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach($possibleHoursList as $key => $hour): ?>
                <tr>

                    <td>
                        <span class="hours"><?php echo date("H:i", strtotime($hour["hour"])); ?></span>
                    </td>

                    <?php foreach($salleList as $salle): ?>
                    <td class=" tableContent <?php echo "td".$salle['id']; ?>">
                        <a 
                            href="#" 
                            data-toggle="modal" 
                            data-target="#createReservationModal"
                            data-starthour="<?php echo date("H:i", strtotime($hour["hour"])); ?>"
                            data-endhour="<?php echo date("H:i", strtotime($hour["hour"])); ?>"
                            data-currentsalleid="<?php echo $salle['id'];?>"
                            data-currentsalleplaces ="<?php echo $salle['places'];?>"
                            data-day="<?php echo $day;?>"
                            data-userid="<?php echo $userId;?>"
                        >
                            <span class="hiddenLink">link</span>
                        </a>          
                    </td>

                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



        <!-- reservation layer -->
        <div class="reservationContainer">
        <?php foreach($tableData as $key => $reservation): ?>

            <!-- calculate the coordinates to position the reservation -->
            <?php
            $reservation ["xCoordinate"] = array_search($reservation["name"], array_column($salleList, "name"));
            $reservation ["yCoordinate"] = $reservation["startHourId"] - 1;
            $reservation ["verticalSize"] = $reservation["endHourId"] - $reservation["startHourId"];
            ?>

            <!-- if the reservation was created by the current user, link to modify Reservation modal -->
            <?php if ($reservation['userId'] === $userId): ?>
                <div class="reservation text-center well" id="<?php echo $reservation['id']; ?>">
                
                    <a 
                    href="#" 
                    data-toggle="modal" 
                    data-target="#updateReservationModal"
                    data-starthourid="<?php echo $reservation['startHourId'];?>"
                    data-endhourid="<?php echo $reservation['endHourId'];?>"
                    data-currentsalleid="<?php echo $reservation['salleId'];?>"
                    data-currentsalleplaces ="<?php echo $reservation['places'];?>"
                    data-day="<?php echo $day;?>"
                    data-userid="<?php echo $userId;?>"
                    data-numguests="<?php echo $reservation['numGuests'];?>"
                    data-reservationid="<?php echo $reservation['id'];?>"
                    data-title="<?php echo $reservation['title'];?>"
                    >
                        <?php echo $reservation['title'] ?>
                    </a>
                
                </div>


            <!-- if the reservation exists wasn't created by the current user, modal to alert the user -->
            <?php elseif ($reservation['userId'] !== $userId): ?>
            <div class="reservation text-center well" id="<?php echo $reservation['id']; ?>">
            
                <a 
                    href="#" 
                    data-toggle="modal" 
                    data-target="#alertNotCorrectUserModal"
                >
                    <?php echo $reservation['title'] ?>
                </a>
            </div>
            
            <?php endif; ?>


            <script type="text/javascript">
                var reservation = (<?php echo json_encode($reservation); ?>);
                console.log(reservation);

                var tdClass = ".td" + reservation['salleId'];

                var tdHeight = $(tdClass).outerHeight();
                var tdWidth = $(tdClass).outerWidth();
                var borderHeight = $(tdClass);


                var reservationId = "#" + reservation["id"];

                $(reservationId).css({
                    "top": tdHeight * reservation["yCoordinate"],
                    "left": tdWidth * reservation["xCoordinate"],
                    "height": tdHeight * reservation["verticalSize"],
                    "width": tdWidth,
                })

            </script>

        <?php endforeach; ?>
        </div>
    </div>
</div>



<!-- position reservations script -->
<script type="text/javascript">
    
$( ".reservationContainer" ).position({
  my: "left top",
  at: "right bottom",
  of: ".firstCellOfReservationTable"
});

</script>




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
                <form action="/reservation/create" method="post" id="createReservationForm">

                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" value="Exemple de titre" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="salleId">Salle</label>
                        <select name="salleId" id="salleId" class="form-control">
                            <!-- php is used to display the list of all possible values -->
                            <!-- jquery (see script below) is used to select a default vaue -->
                            <?php foreach($salleList as $salle): ?>
                                <option value="<?php echo $salle['id'] ?>" >
                                    <?php echo $salle['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="startHour">Début</label>
                        <select name="startHourId" id="startHourId" class="form-control">
                            <!-- php is used to display the list of all possible values -->
                            <!-- jquery (see script below) is used to select a default vaue -->
                            <?php foreach($possibleHoursList as $hour): ?>
                                <option value="<?php echo $hour['id'] ?>">
                                    <?php echo date("H:i", strtotime($hour["hour"])); ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="endHourId">Fin</label>
                        <select name="endHourId" id="endHourId" class="form-control">
                            <!-- php is used to display the list of all possible values -->
                            <!-- jquery (see script below) is used to select a default vaue -->
                            <?php foreach($possibleHoursList as $hour): ?>
                                <option value="<?php echo $hour['id'] ?>">
                                    <?php echo date("H:i", strtotime($hour["hour"])); ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="numGuests">Nombre de personnes</label>
                        <input type="number" name="numGuests" id="numGuests" value="1" class="form-control" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="day">Jour</label>
                        <input type="text" name="day" id="day" class="form-control" required>
                    </div>

                    <input type="hidden" name="userId" id="userId">

                    <button type="submit" class="btn btn-primary">Créer la réservation</button>

                </form>
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
                            <!-- php is used to display the list of all possible values -->
                            <!-- jquery (see script below) is used to select a default vaue -->
                            <?php foreach($salleList as $salle): ?>
                                <option value="<?php echo $salle['id'] ?>" >
                                    <?php echo $salle['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="startHourId">Début</label>
                        <select name="startHourId" id="startHourId" class="form-control">
                            <!-- php is used to display the list of all possible values -->
                            <!-- jquery (see script below) is used to select a default vaue -->
                            <?php foreach($possibleHoursList as $hour): ?>
                                <option value="<?php echo $hour['id'] ?>">
                                    <?php echo date("H:i", strtotime($hour["hour"])); ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="endHourId">Fin</label>
                        <select name="endHourId" id="endHourId" class="form-control">
                            <!-- php is used to display the list of all possible values -->
                            <!-- jquery (see script below) is used to select a default vaue -->
                            <?php foreach($possibleHoursList as $hour): ?>
                                <option value="<?php echo $hour['id'] ?>">
                                    <?php echo date("H:i", strtotime($hour["hour"])); ?>
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

                    <button type="submit" class="btn btn-primary">Modifier la réservation</button>

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

        console.log(startHour);
        console.log(endHour)
        console.log(currentSalleId);
        console.log(day);
        console.log(userId);
    })


    $('#updateReservationModal').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // Button that triggered the modal

        // Extract info from data-* attributes
        var startHourId = link.data('starthourid'); 
        var endHourId = link.data('endhourid'); 
        var currentSalleId = link.data('currentsalleid');
        var currentSallePlaces = link.data('currentsalleplaces');
        var day = link.data('day');
        var userId = link.data('userid'); 
        var title = link.data('title');
        var reservationId = link.data('reservationid');
        var numGuests = link.data('numguests');

        var modal = $(this);

        modal.find('#startHourId').val(startHourId);
        modal.find('#endHourId').val(endHourId);
        modal.find('#salleId').val(currentSalleId);
        modal.find('#day').val(day);
        modal.find('#userId').val(userId);
        modal.find('#title').val(title);
        modal.find('#numGuests').val(numGuests);

        modal.find('#numGuests').attr("max", currentSallePlaces);

        modal.find("#updateReservationForm").attr("action", "/reservation/update/" + reservationId);
        modal.find("#deleteReservationForm").attr("action", "/reservation/delete/" + reservationId);


        console.log(startHourId);
        console.log(endHourId)
        console.log(currentSalleId);
        console.log(day);
        console.log(userId);
        console.log(title);
        console.log(reservationId);
        console.log(numGuests);
    });



</script>

<script>


</script>


<!-- datepicker script -->
<script type="text/javascript">

    $('[data-toggle="datepicker"]').datepicker({
        autoPick: 'true',
        format: 'yyyy-mm-dd',
        date: '<?php echo $day ?>',
        weekStart: '1',
        filter: function(date) {
            if (date.getDay() === 0 || date.getDay() === 6) {
                return false; // Disable all Sundays and Saturdays
            }
        }
    });
    
    $("#datepicker").change(function() {
        var day = $('#datepicker').val();
        window.location.href = "/reservations/" + day;
    });

</script>

<!-- table hover script -->
<script type="text/javascript">

    $(document).ready(function(){
        $('table tbody tr td').on('hover', function () {
            $(this).toggleClass('hoverCell');
        });
    });

</script>



<?php include "Partials/footer.php"; ?>

