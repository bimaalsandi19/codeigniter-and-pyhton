<?php
$basic_salary = number_format($customer['basic_salary'], 0, ',', '.');
$tunjangan1 = number_format($customer['tunjangan1'], 0, ',', '.');
$tunjangan2 = number_format($customer['tunjangan2'], 0, ',', '.');
$tunjangan3 = number_format($customer['tunjangan3'], 0, ',', '.');
$total = number_format($customer['total'], 0, ',', '.');

?>

<h3>Data <?= $customer['fname'] ?> <?= $customer['lname'] ?></h3>
<table>
    <tr>
        <th style="text-align: left;">ID</th>
        <td>: <?= $customer['id_customer'] ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Fullname</th>
        <td>: <?= $customer['fname'] ?> <?= $customer['lname'] ?></td>
    </tr>
    <tr>
        <th style="text-align: left;">Company</th>
        <td>: <?= $customer['company'] ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Address</th>
        <td>: <?= $customer['city'] ?>, <?= $customer['country'] ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Phone</th>
        <td>: <?= $customer['phone1'] ?> and <?= $customer['phone2'] ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Email</th>
        <td>: <?= $customer['email'] ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Website</th>
        <td>: <?= $customer['website'] ?> </td>
    </tr>


</table>
<table>
    <tr>
        <th style="text-align: left;">Basic Salary</th>
        <td>:</td>
        <td style="text-align: right;"> <?= $basic_salary ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Tunjangan 1 </th>
        <td>:</td>
        <td style="text-align: right;"> <?= $tunjangan1 ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Tunjangan 2 </th>
        <td>:</td>
        <td style="text-align: right;"> <?= $tunjangan2 ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;">Tunjangan 3 </th>
        <td>:</td>
        <td style="text-align: right;"> <?= $tunjangan3  ?> </td>
    </tr>
    <tr>
        <th style="text-align: left;"> </th>
        <td></td>
        <td style="text-align: right;">
            <p><u></u> +</p>
        </td>
    </tr>
    <tr>
        <th style="text-align: left;">Total</th>
        <td>:</td>
        <td style="text-align: right;"> <?= $total  ?> </td>
    </tr>
</table>
<br>
<a href="<?= site_url('customer/index/' . $customer['id_project']) ?>">Back</a>