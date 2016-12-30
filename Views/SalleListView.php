<?php include "Partials/header.php"; ?>

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
        <?php while ($row = $salleList->fetch()): ?>
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
            <td>
                <a href="<?php echo "salle/".htmlspecialchars($row['id']) ?>">link</a>
            </td>
        </tr>
        <?php endwhile; ?>
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

