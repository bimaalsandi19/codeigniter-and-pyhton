<h3>List Project</h3>
<a href="">Add</a>
<br><br>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Project</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($project as $p) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->project ?></td>
                <td>
                    <a href="<?= site_url('customer/index/' . $p->id) ?>">View</a> |
                    <a href="">Edit</a> |
                    <a href="">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>