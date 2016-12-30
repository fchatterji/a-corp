<?php include "Partials/header.php"; ?>

<p>input date:</p>
<input data-toggle="datepicker" id="datepicker">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<table>
    <thead>
        <tr>
            <th>id</th>
            <th>id de la salle</th>
            <th>debut sql</th>
            <th>fin</th>
            <th>link</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $reservationList->fetch()): ?>
        <tr>
            <td>
                <?php echo htmlspecialchars($row['id']) ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['salleId']); ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['debut']); ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['fin']); ?>
            </td>
            <td>
                <a href="<?php echo "reservation/".htmlspecialchars($row['id']) ?>">link</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<form action="reservation/create" method="post">
    <label for="salleId">id de la salle:</label>
    <input type="number" name="salleId" id="salleId" value="10">
    <label for="debut">Debut:</label>
    <input type="text" name="debut" id="debut" value="">
    <label for="fin">Fin:</label>
    <input type="text" name="fin" id="fin" value="">
    <input type="submit" value="Submit">
</form>

<script type="text/javascript">
$('[data-toggle="datepicker"]').datepicker({
	autoShow: 'true',
    format: 'yyyy-mm-dd'
});

$( "#datepicker" ).change(function() {
    var date = $('#datepicker').val();
    window.location.href = "/a-corp/reservations/" + date;
});

</script>

<?php include "Partials/footer.php"; ?>

