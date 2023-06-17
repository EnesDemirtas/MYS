<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periyodik Bakım Formu Validasyonu</title>
    <style>
        body {
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <h3>Periyodik Bakım Formu Validasyonu</h3>
    @if ($isValid)
        <p>Bu periyodik bakım formu {{ $form->created_at }} tarihinde oluşturulmuş olup {{ $form->onay_timestamp }} saat
            ve
            tarihinde SBE Mühendislik tarafından onaylanmıştır.</p>
    @else
        <p>Bu periyodik bakım formu {{ $form->created_at }} tarihinde oluşturulmuş olup {{ $form->onay_timestamp }} saat
            ve
            tarihinde SBE Mühendislik tarafından <b>onaylanmamıştır.</b></p>
    @endif
</body>
