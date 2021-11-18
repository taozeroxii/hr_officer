<?php
require_once './vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);

ob_start();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มขอใบรับรองเงินเดือน</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }

        .fsz {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container" >
        <div class="row">
            <div class="col-lg-2 col-2 col-md-2">
                <img src="./img/krut-3-cm.png" width="70px" height="70px" alt="">
            </div>
            <div class="col-lg-8 col-8 col-md-2">
                <h2 align="center" style="font-size: 36px;"><b>บันทึกข้อความ</b> </h2>
            </div>
        </div>
        <div class="row">
            <p class="fsz"><B>ส่วนราชการ</B> <u>โรงพยาบาลเจ้าพระยาอภัยภูเบศร (กลุ่มงานทรัพยากรบุคคล โทร.2503/037217128) </u> </p>
            <p class="fsz"><B>ที่</B> <u>ปจ 0032.101.04/พิเศษ </u>วันที่ <u> <?php echo date('d/m/Y'); ?></u> </p>
            <p class="fsz"><B>เรื่อง</B> <u>ขอหนังสือรับรอง </u> </p>
        </div>

        <table class="table table-striped">
            <tr>
                <th>เลขที่</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เกรดเฉลี่ย</th>
            </tr>
            <tr>
                <td>1</td>
                <td>ลูพี่</td>
                <td>หมวกฟาง</td>
                <td>3.99</td>
            </tr>
            <tr>
                <td>2</td>
                <td>สุรสิทธิ์</td>
                <td>รักเรียน</td>
                <td>3.58</td>
            </tr>
            <tr>
                <td>3</td>
                <td>นายสมัคร</td>
                <td>รักดี</td>
                <td>3.65</td>
            </tr>
            <tr>
                <td>4</td>
                <td>นายกิตติ</td>
                <td>ใฝ่ดี</td>
                <td>3.30</td>
            </tr>
            <tr>
                <td>5</td>
                <td>นายจักรเพชร</td>
                <td>ลุยสวน</td>
                <td>3.65</td>
            </tr>
            <tr>
                <td>6</td>
                <td>นายดราก้อน</td>
                <td>ลูกการ์ป</td>
                <td>3.65</td>
            </tr>
            <tr>
                <td>7</td>
                <td>จ่าการ์ป</td>
                <td>รักดี</td>
                <td>3.21</td>
            </tr>
            <tr>
                <td>8</td>
                <td>นางสาวนามิ</td>
                <td>รักดี</td>
                <td>4.00</td>
            </tr>
        </table>

        <?php
        $html = ob_get_contents();
        $mpdf->WriteHTML($html);
        $mpdf->Output("MyReport.pdf");
        ob_end_flush();
        ?>
        <a href="MyReport.pdf" class="btn btn-primary">โหลดแบบฟอร์มใบรับรองเงินเดือน (pdf)</a>
    </div>
</body>