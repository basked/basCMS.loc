<p><?php echo $title ?></p>
<hr>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col"><a href="/users/index"> User</a></th>
        <th scope="col">Email</th>
        <th scope="col">Stat</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $val): ?>
    <tr>
        <td> <?php echo $val['name']; ?> </td>
        <td> <?php echo $val['email']; ?>  </td>
        <td> <?php echo $val['is_admin']; ?>  </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>







