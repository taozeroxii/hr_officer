<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body{
        font-family: 'Sarabun,sans-seif';
    }
</style>
<body>
    <?php
    require_once './vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1> สวัสดีชาวโลก Hello world!</h1>');
    $mpdf->Output();
    ?>
    <p>test</p>
</body>

</html>