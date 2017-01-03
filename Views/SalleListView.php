<?php include "Partials/header.php"; ?>
<?php include "Partials/loggedInNav.php"; ?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>places</th>
            <th>link</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($salleList as $salle): ?>
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
            <td>
                <a href="<?php echo "salle/".htmlspecialchars($salle['id']) ?>">link</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form action="salle/create" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="test">
    <label for="places">Places:</label>
    <input type="number" name="places" id="places" value="10">
    <input type="submit" value="Submit">
</form>

<?php include "Partials/footer.php"; ?>

