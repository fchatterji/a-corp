<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

<h1>Choisissez une date</h1>
<input data-toggle="datepicker" id="datepicker" class="btn btn-default">

<div class="table-responsive">

    <table class="table table-hover">
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
                <td>
                    <?php if (isset($reservation['id'])) { ?>
                        <button class="btn btn-primary btn-default" data-toggle="modal" data-target="#modifyReservationModal<?php echo $reservation['id']?>">
                        M
                        </button>

                    <?php } else { ?>
                        <button class="btn btn-primary tn-default" data-toggle="modal" data-target="#createReservationModal<?php echo $reservation['id']?>">
                        R
                        </button>
                    <?php }?>
                </td>

                <?php include "Partials/createReservationModal.php"; ?>
                <?php include "Partials/modifyReservationModal.php"; ?>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>




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

    <input type="hidden" name="day" value="<?php echo $day ?>">
    <input type="hidden" name="userId" value="<?php echo $userId ?>">
    <input type="submit" value="Submit">
</form>

<script type="text/javascript">
    $('[data-toggle="datepicker"]').datepicker({
        autoShow: 'true',
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

