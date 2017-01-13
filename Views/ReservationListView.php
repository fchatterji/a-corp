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
                        <span class="hours"><?php echo $hour["hour"]; ?></span>
                    </td>

                    <?php foreach($salleList as $salle): ?>
                    <td class=" tableContent <?php echo "td".$salle['id']; ?>">
                        <a 
                            href="#" 
                            data-toggle="modal" 
                            data-target="#createReservationModal"
                            data-starthour="<?php echo $hour["hour"]; ?>"
                            data-endhour="<?php echo $hour["hour"]; ?>"
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

<?php include "Partials/createReservationModal.php" ?>
<?php include "Partials/updateReservationModal.php" ?>

<!-- position reservations script -->
<script type="text/javascript">
    
$( ".reservationContainer" ).position({
  my: "left top",
  at: "right bottom",
  of: ".firstCellOfReservationTable"
});

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

