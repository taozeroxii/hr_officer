<?php session_start();
ob_start();
date_default_timezone_set("Asia/Bangkok");
require_once('./mpdf/mpdf.php');
// require("./config/dbcon.php");

/*
function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		//$strHour= date("H",strtotime($strDate));
		//$strMinute= date("i",strtotime($strDate));
		//$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
*/

/*
$idfile     = $_GET['slipid'];
$filedate	= MD5(DATE('YmdHis') . "mPay");
$todateth   = DATE('Y-m-d');
$selectaddresspt = " Select * 
FROM abhrcdb as a
LEFT JOIN transfer_bank as b on a.transfer_bank = b.bank_name
LEFT JOIN object_name as c on c.id = a.object_name
WHERE 1 = 1
AND a.id = ' $idfile'";
$queryAdpt = mysqli_query($conn, $selectaddresspt);
$resultaddressPt = mysqli_fetch_array($queryAdpt);
*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
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
        <br>
        <div class="hh3">
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
            <br>
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



</body>

</html>
<?php

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


?>