<?php include "Partials/header.php"; ?>

<?php $row = $reservation->fetch(); ?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>id de la salle</th>
            <th>debut</th>
            <th>fin</th>
        </tr>
    </thead>
    <tbody>

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
        </tr>
    </tbody>
</table>

<form action="<?php echo "delete/".htmlspecialchars($row['id']) ?>" method="post">
    <input type="submit" value="delete" />
</form>

<form action="<?php echo "update/".htmlspecialchars($row['id']) ?>" method="post">
    <label for="salleId">id de la salle:</label>
    <input type="text" name="salleId" id="salleId" value="<?php echo htmlspecialchars($row['salleId']); ?>">
    <label for="debut">debut:</label>
    <input type="text" name="debut" id="debut" value="<?php echo htmlspecialchars($row['debut']); ?>">
    <label for="fin">fin:</label>
    <input type="text" name="fin" id="fin" value="<?php echo htmlspecialchars($row['fin']); ?>">
    <input type="submit" value="update">
</form>

<?php include "Partials/footer.php"; ?>

