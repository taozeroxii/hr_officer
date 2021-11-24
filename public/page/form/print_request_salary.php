<?php
<<<<<<< Updated upstream
require_once './vendor/autoload.php';
=======
require_once 'vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
>>>>>>> Stashed changes

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
<<<<<<< Updated upstream
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
=======
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
        'thsarabun' => [
            'R' => 'THSarabunNew.ttf',
            //'I' => 'THSarabunIT๙.ttf',
            //'B' => 'THSarabunNew Bold.ttf',
        ]
    ],
    'default_font' => 'thsarabun'
]);

$content = '
>>>>>>> Stashed changes
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
<<<<<<< Updated upstream
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/style_pdf.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="hr1">
                <div><img src="./img/krut-3-cm.png" width="70px" height="70px" alt=""></div>
            </div>
            <div class="hr2">
                <div>บันทึกข้อความ</div>
            </div>
        </div>


        <div class="row">
            <div class="hh2">
                <div><b class="fix1">ส่วนราชการ</b>&nbsp;&nbsp;&nbsp;<u>โรงพยาบาลเจ้าพระยาอภัยภูเบศร (กลุ่มงานทรัพยากรบุคคล โทร.2503/037217128)</u> </div>
            </div>
            <br>

=======
    <link rel="stylesheet" type="text/css" href="./css/style_pdf.css">
    
</head>

<body>

    <div class="row">
        <div class="hr1">
            <div><img src="./img/krut-3-cm.png" width="70px" height="70px" alt=""></div>
        </div>
        <div class="hr2">
            <div>บันทึกข้อความ</div>
        </div>
    </div>


    <div class="row">
        <div class="hh2">
            <div><b class="fix1">ส่วนราชการ</b>&nbsp;&nbsp;&nbsp;<u>โรงพยาบาลเจ้าพระยาอภัยภูเบศร (กลุ่มงานทรัพยากรบุคคล โทร.2503/037217128)</u> </div>
        </div>
      
        <div class="hh3">
>>>>>>> Stashed changes
            <div>
                <b>ที่</b>
                <u>&nbsp;&nbsp;&nbsp;ปจ 0032.101.04/พิเศษ
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
                <b>วันที่</b>
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
            </div>
<<<<<<< Updated upstream
            <br>

            <div>
                <b>เรื่อง</b>
                <u>&nbsp;&nbsp;&nbsp;ขอหนังสือรับรอง
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </u>
            </div>
            <br>
            <div class="hh3">
                <div>
                    <b>เรียน</b>
                    <u>ผู้อำนวยการโรงพยาบาลเจ้าพระยาอภัยภูเบศร
                    </u>
                </div>





                <br><br><br><br>
                <hr>

                <table style="width:100%">
                    <tr>
                        <td>ด้วยข้าพเจ้า (นาย/นาง/นางสาว)</td>
                        <td>.......................................</td>
                        <td>10</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>ตำแหน่ง.......................................</td>
                        <td>ฝ่าย/กลุ่มงาน.........................</td>
                        <td>10</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>โรงพยาบาลเจ้าพระยาอภัยภูเบศร มีความประสงค์ขอหนังสือรับรองเพื่อ</td>
                        <td>.....................................</td>
                        <td>10</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>.....................................</td>
                        <td>.....................................</td>
                        <td>10</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>.....................................</td>
                        <td>.....................................</td>
                        <td>10</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>แนบสลิปเงินเดือนปัจจุบัน 1 ฉบับ หมายเลขโทรศัพท์ เบอร์ภายใน/มือถือ....................................................</td>
                        <td>10 </td>
                        <td>10</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</td>
                        <td>10 </td>
                        <td>10</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>..</td>
                        <td>10 </td>
                        <td>................................</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>..</td>
                        <td>10 </td>
                        <td>(................................)</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>..</td>
                        <td>10 </td>
                        <td>ตำแหน่ง................................</td>
                        <td>Person 3</td>
                    </tr>
                    <tr>
                        <td>เรียน ผอก. (ผ่าน รองฯ บริหาร)</td>
                        <td>10 </td>
                        <td>Person 3</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>เรียน ผอก. (ผ่าน รองฯ บริหาร) </td>
                        <td></td>
                        <td>Person 3</td>
                    </tr>
                </table>


                <!-- ลงนามแล้ว -->

                <?php
                $html = ob_get_contents();
                $mpdf->WriteHTML($html);
                $mpdf->Output("MyReport.pdf");
                ob_end_flush();
                ?>
                <a href="MyReport.pdf" class="btn btn-primary">โหลดแบบฟอร์มใบรับรองเงินเดือน (pdf)</a>
            </div>
        </div>
</body>
=======
           
            <div class="hh3">
                <div>
                    <b>เรื่อง</b>
                    <u>&nbsp;&nbsp;&nbsp;ขอหนังสือรับรอง
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </u>
                </div>
              
                <div class="hh3">
                    <div>
                        <b>เรียน</b>
                        <u>ผู้อำนวยการโรงพยาบาลเจ้าพระยาอภัยภูเบศร
                        </u>
                    </div>






<br><br><br><br>
<hr>

                    <table style="width:100%">
                        <tr>
                            <td>ด้วยข้าพเจ้า (นาย/นาง/นางสาว)</td>
                            <td>.......................................</td>
                            <td>10</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>ตำแหน่ง.......................................</td>
                            <td>ฝ่าย/กลุ่มงาน.........................</td>
                            <td>10</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>โรงพยาบาลเจ้าพระยาอภัยภูเบศร มีความประสงค์ขอหนังสือรับรองเพื่อ</td>
                            <td>.....................................</td>
                            <td>10</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>.....................................</td>
                            <td>.....................................</td>
                            <td>10</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>.....................................</td>
                            <td>.....................................</td>
                            <td>10</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>แนบสลิปเงินเดือนปัจจุบัน 1 ฉบับ หมายเลขโทรศัพท์ เบอร์ภายใน/มือถือ....................................................</td>
                            <td>10 </td>
                            <td>10</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</td>
                            <td>10 </td>
                            <td>10</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>..</td>
                            <td>10 </td>
                            <td>................................</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>..</td>
                            <td>10 </td>
                            <td>(................................)</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>..</td>
                            <td>10 </td>
                            <td>ตำแหน่ง................................</td>
                            <td>Person 3</td>
                        </tr>
                        <tr>
                            <td>เรียน ผอก. (ผ่าน รองฯ บริหาร)</td>
                            <td>10 </td>
                            <td>Person 3</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>เรียน ผอก. (ผ่าน รองฯ บริหาร) </td>
                            <td></td>
                            <td>Person 3</td>
                        </tr>
                    </table>






                    <!-- ลงนามแล้ว -->

'
?>

</body>
</html>
<?php

$mpdf->WriteHTML($content);
$mpdf->Output();


/*
$filedate = DATE('YmdHis');
$save = "./pdf/".$filedate.".pdf";
$lo   = "Location:".$save;

$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th','A4','0','THSaraban');
$pdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('./css/style_pdf.css');
$pdf->WriteHTML($stylesheet,1);
$pdf->WriteHTML($html,2);
$success = $pdf->Output($save);
header($lo);
die();
*/

?>
>>>>>>> Stashed changes
