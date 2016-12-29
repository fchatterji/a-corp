<table>
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>places</th>
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
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

