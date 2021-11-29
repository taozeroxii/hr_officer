<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php" ?>

<head>
    <script src="./adminltes/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="./adminltes/ckeditor/samples/css/samples.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Try the latest sample of CKEditor 4 and learn more about customizing your WYSIWYG editor with endless possibilities.">

</head>

<body>
    <?php
    $page = 'form';
    include "./public/components/navbar.php";
    $formname = 'หนังสือรับรองเงินเดือน';
    $form_id = '001';
    require("./service/formmanage.php");
    $obj  = new manage_form();


    ?>

    <textarea name="editor1"><p>&nbsp;</p>

<p style="margin-left:40px">&nbsp;<span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px"><strong><img src="./img/krut-3-cm.PNG" style="height:80px; width:80px" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></span><span style="font-size:36px"><strong>บันทึกข้อความ</strong></span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px"><strong>ส่วนราชการ</strong><u> &nbsp;&nbsp;โรงพยาบาลเจ้าพระยาอภัยภูเบศร&nbsp; (กลุ่มงานทรัพยากรบุคคล โทร.2503/037217128) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u></span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px"><strong>ที่</strong><u>&nbsp;&nbsp; ปจ 0032.101.04/พิเศษ<strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></u><strong>วันที่</strong><u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u></span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px"><strong>เรื่อง</strong><u>&nbsp;&nbsp; ขอหนังสือรับรอง&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</u></span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">เรียน&nbsp;&nbsp;&nbsp; ผู้อำนวยการโรงพยาบาลเจ้าพระยาอภัยภูเบศร</span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ด้วยข้าพเจ้า (นาย/นาง/นางสาว).................................</span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">ตำแหน่ง............................................................... ฝ่าย/กลุ่มงาน...........................................................</span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">โรงพยาบาลเจ้าพระยาอภัยภูเบศร&nbsp; มีความประสงค์ขอหนังสือรับรองเพื่อ................................................................................................................................................................................................................................................................................................................................................................</span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px"><strong><u>แนบสลิปเงินเดือนปัจจุบัน 1 ฉบับ หมายเลขโทรศัพท์ เบอร์ภายใน/มือถือ</u></strong>...................................</span></span></p>

<p>&nbsp;</p>

<p><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</span></span></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p style="text-align:center"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</span></span></p>

<p style="text-align:center"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">(...........................................................)</span></span></p>

<p style="text-align:center"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">ตำแหน่ง.............................................................</span></span></p>

<p>&nbsp;</p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">เรียน&nbsp;&nbsp;&nbsp; ผอก.&nbsp; (ผ่าน รองฯ บริหาร)</span></span></p>

<p style="margin-left:40px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif"><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เพื่อทราบและลงนามรับรอง</span></span></p>

<p>&nbsp;</p>

    </textarea>     
    <style>
        /* .cke_reset {
            margin: auto;
            padding: 7px;
            border: 0;
            background: transparent;
            text-decoration: none;
            width: 748.333px;
            height: auto;
            vertical-align: baseline;
            box-sizing: content-box;
            position: static;
            transition: none;
        } */
        /* .cke_inner, */
        .cke_inner,
        .cke_reset {
            width: 1300px;
            background: #9c9c9c;
            margin: auto;
            /* height: 600px !important; */
        }

        #cke_1_contents {
            height: 700px !important;
        }

        .cke_wysiwyg_frame,
        .cke_wysiwyg_div {
            margin-top: 20px !important;
            margin-left: 245px !important;
            padding: auto !important;
            background-color: #fff;
            width: 810px !important;
        }
    </style>
<script src="./adminltes/ckeditor/config.js"></script>
<script>CKEDITOR.replace('editor1');</script>
</body>
</html>