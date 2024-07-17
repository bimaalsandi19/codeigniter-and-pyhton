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