<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>


<table>
    <thead>
        <tr>
            <th>id</th>
            <th>salle</th>
            <th>heure</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>
                <?php echo htmlspecialchars($row['id']) ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['salle']); ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['hour']); ?>
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

