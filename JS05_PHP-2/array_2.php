<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Dosen</title>
        <style>
        body {
            font-family: sans-serif;
            padding : 10px;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 300px;
        }
        td {
            border: 1px solid black;
            padding: 8px;
        }
        caption {
            font-weight : bold;
            margin-bottom: 10px;
        }
    </style>

</head>
<body>
    <?php
        $Dosen = [
            'nama' => 'Elok Nur Hamdana' ,
            'domisili' => 'Malang',
            'jenis_kelamin' => 'Perempuan' ];

        echo "<table>";
        echo "<caption>Data Dosen</caption>";
        echo "<tr><td>Nama</td><td>{$Dosen['nama']}</td></tr>";
        echo "<tr><td>Domisili</td><td>{$Dosen['domisili']}</td></tr>";
        echo "<tr><td>Jenis Kelamin</td><td>{$Dosen['jenis_kelamin']}</td></tr>";
        echo "</table>";


    ?>

        </body>
        </html>
        