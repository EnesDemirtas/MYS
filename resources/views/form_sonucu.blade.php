<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periyodik Bakım Formu</title>
    <style>
        body {
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Kontrol</th>
                <th>Uygun</th>
                <th>Uygun Değil</th>
                <th>Onarıldı</th>
                <th>Yenilendi</th>
                <th>Açıklamalar</th>
            </tr>
        </thead>
        <tbody>
            @each('components.bakim_formu_sonucu_row', $sorular, 'data')
        </tbody>
    </table>
</body>

</html>
