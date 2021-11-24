<?php
require_once 'vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
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

$content = "
<p style=\"font-family: garuda\">
ทอมไคลแม็กซ์แฟ้บแครกเกอร์ เปียโนแผดเผาฮิบรู แม่ค้าป๋อหลอแพตเทิร์นช็อปเปอร์ สเต็ปเที่ยงคืนคอนแทคเด้อสเปก อพาร์ตเมนท์ จูนถ่ายทำ สงบสุขแฮปปี้เทควันโดบลูเบอร์รี่เยอร์บีร่า ไกด์ แบล็กสารขัณฑ์อุปสงค์ แหววเวิลด์ทัวริสต์ คันถธุระ หมิงโกเต็กซ์วีซ่าพูล ไฮกุจตุคามโหลยโท่ยง่าวรอยัลตี้ คอนโทรล เชฟโนติสน้องใหม่ชะโนดสเปก ราชานุญาตเพนกวิน

</p>

<p style=\"font-family: thsarabun; font-size: 16pt;\">
ทอมไคลแม็กซ์แฟ้บแครกเกอร์ เปียโนแผดเผาฮิบรู แม่ค้าป๋อหลอแพตเทิร์นช็อปเปอร์ สเต็ปเที่ยงคืนคอนแทคเด้อสเปก อพาร์ตเมนท์ จูนถ่ายทำ สงบสุขแฮปปี้เทควันโดบลูเบอร์รี่เยอร์บีร่า ไกด์ แบล็กสารขัณฑ์อุปสงค์ แหววเวิลด์ทัวริสต์ คันถธุระ หมิงโกเต็กซ์วีซ่าพูล ไฮกุจตุคามโหลยโท่ยง่าวรอยัลตี้ คอนโทรล เชฟโนติสน้องใหม่ชะโนดสเปก ราชานุญาตเพนกวิน

</p>

";


$mpdf->WriteHTML($content);
$mpdf->Output();

?>