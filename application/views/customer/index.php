<h3>List <?= $customer['project_name'] ? $customer['project_name'] : 'Kosong' ?></h3>
<a href="<?= site_url('/customer/download/' . $customer['id_project']) ?>">Download Template</a> |
<!-- <a href="<?= site_url('/customer/upload') ?>">Upload</a> -->
<button onclick="openPopup()">Upload</button>

<div id="popup" style="display: none;">
    <h3>Upload Data</h3>

    <form action="<?= site_url('customer/upload_proses') ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Upload</th>
                <td></td>
                <td><input type="file" name="file" id=""></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="submit" value="Upload"></td>
            </tr>
        </table>
    </form>
    <button onclick="closePopup()">Close</button>
</div>

<br><br>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1;
        foreach ($customers as $c) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $c->id_customer ?></td>
                <td><?= $c->fname ?> <?= $c->lname ?></td>
                <td><?= $c->city ?>, <?= $c->country ?></td>
                <td>
                    <a href="<?= site_url('customer/show/' . $c->id) ?>">View</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<a href="<?= site_url('/') ?>">Back</a>

<script>
    function openPopup() {
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>