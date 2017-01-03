<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

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
                <?php echo htmlspecialchars($salle['id']) ?>
            </td>
            <td>
                <?php echo htmlspecialchars($salle['name']); ?>
            </td>
            <td>
                <?php echo htmlspecialchars($salle['places']); ?>
            </td>
        </tr>
    </tbody>
</table>

<form action="<?php echo "delete/".htmlspecialchars($salle['id']) ?>" method="post">
    <input type="submit" value="delete" />
</form>

<form action="<?php echo "update/".htmlspecialchars($salle['id']) ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($salle['name']); ?>">
    <label for="places">Places:</label>
    <input type="text" name="places" id="places" value="<?php echo htmlspecialchars($salle['places']); ?>">
    <input type="submit" value="update">
</form>

<?php include "Partials/footer.php"; ?>

