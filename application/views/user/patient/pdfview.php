<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
    font-family: arial, san-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 1px solid #dddddd;
    text_align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<body>
    <table>
        <thead style="text-align: center">
            <?php foreach($act as $l_a){ ?>
            <tr>
                <th scope="col">Patient :<?= $l_a['nom'] ?> <?= $l_a['prenom'] ?> </th>
                <th>Date: <?= $daty ?></th>
            </tr>
            <?php } ?>
        </thead>
    </table>
    <table>
        <thead>
            <tr>
                <th scope="col">Acte</th>
                <th scope="col">Tarif</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($liste as $l){ ?>
            <tr>
                <td><?= $l['nom'] ?></td>
                <td><?=  number_format($l['tarif'],2,',',' '); ?> Ar </td>
                <td>#</td>
            </tr>
            <?php } ?>
            <tr>
                <td><strong>TOTAL:</strong></td>
                <td><strong><?=  number_format($prix,2,',',' '); ?> Ar</strong></td>
                <td>#</td>
            </tr>
        </tbody>
    </table>
</body>

</html>