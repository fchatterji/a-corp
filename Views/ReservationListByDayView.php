<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

<input data-toggle="datepicker" id="datepicker" class="btn btn-default">

<div class="table-responsive">

    <table class="table">
        <thead>

            <tr>
                <th>heure</th>
                <?php foreach($salleList as $salle):?>
                <th>
                    <?php echo $salle['name']?>
                </th>
                <?php endforeach; ?>
            </tr>

        </thead>

        <tbody>
            <?php foreach($reservationListByHour as $hour => $reservationList): ?>

            <tr>
                <td>
                    <?php echo $hour; ?>
                </td>
                <?php foreach($reservationList as $reservation): ?>
                <?php if (isset($reservation['id'])) { ?>
                <td class="success">
                    <a href="#" data-toggle="modal" data-target="#modifyReservationModal<?php echo $reservation['id']?>">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </td>
                <?php } else { ?>
                <td class="warning">
                    <a href="#" data-toggle="modal" data-target="#createReservationModal<?php echo $reservation['id']?>">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </td>
                <?php }?>

                <?php include "Partials/createReservationModal.php"; ?>
                <?php include "Partials/modifyReservationModal.php"; ?>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>



<script type="text/javascript">
    $('[data-toggle="datepicker"]').datepicker({
        autoPick: 'true',
        startDate: '<?php echo date("Y-m-d"); ?>',
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

<?php include "Partials/footer.php"; ?>

