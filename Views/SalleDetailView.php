<?php include "Partials/header.php"; ?>

<?php $row = $salle->fetch(); ?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>places</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>
                <?php echo htmlspecialchars($row['id']) ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['name']); ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['places']); ?>
            </td>
        </tr>
    </tbody>
</table>

<form action="<?php echo "delete/".htmlspecialchars($row['id']) ?>" method="post">
    <input type="submit" value="delete" />
</form>

<form action="<?php echo "update/".htmlspecialchars($row['id']) ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['name']); ?>">
    <label for="places">Places:</label>
    <input type="text" name="places" id="places" value="<?php echo htmlspecialchars($row['places']); ?>">
    <input type="submit" value="update">
</form>

<?php include "Partials/footer.php"; ?>