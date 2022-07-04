<!DOCTYPE html>
<html lang="th">
<?php
require "./public/components/head.php";
require "./public/components/func_datethai.php";
?>

<head>
    <script src="./adminltes/ckeditor/ckeditor.js"></script>
    <!-- <script src="./adminltes/ckeditor/samples/js/sample.js"></script> -->
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
    $sql =  $obj->fetctprint_byuser($_POST['id']);

    while ($row = mysqli_fetch_array($sql)) {
        $insert_datetime = DateThai($row['insert_datetime']);
        $position_name = $row['position_name'];
        $mobile_phone_number = $row['mobile_phone_number'] == '' ? 'xxx-xxx-xxxx' : $row['mobile_phone_number'];
        $inphone = $row['inphone'] == '' ? 'xxxx': $row['inphone'];
        $fullname = $row['fullname'];
        $workgroup =  $row['now_dep'] == '' ?$row['workgroup']: $row['now_dep'] ; // หากใส่ฝ่ายหรือกลุ่มงานปัจจุบันมาจะใช้ตามใบคำขอหากไม่ใส่จะใช้ค่าตั้งต้นตามที่ตั้งไว้ตามตำแหน้ง
        $note = $row['note'];
    }
    ?>
    <br>
    <textarea name="editor1">
<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
<div style="margin-left: 195px !important;
    margin-top: 253px;
    position: absolute !important;">
<p style="margin-left: 40px !important;"><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $insert_datetime ?></span></span></p>
</div>
<div style="    margin-left: 132px !important;
    margin-top: 313px !important;
    position: absolute !important;">
<p style="margin-left: 40px !important;"><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $fullname; ?></span></span></p>
</div>

<div style="margin-left: 30px !important;
    margin-top: 329px !important;
    position: absolute !important;">
<p style="margin-left: 40px !important;"><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $position_name ?></span></span></p>
</div>
<div style="    margin-left: 205px !important;
    margin-top: 329px !important;
    position: absolute !important;">
<p style="margin-left: 40px !important;"><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $workgroup ?></span></span></p>
</div>
<div style="line-height: 1.15;margin-left: -6px !important;
    margin-top: 363px !important;
    position: absolute !important;
    max-width: 333px;">
<p style="margin-left: 40px !important;"><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $note ?></span></span></p>
</div>
<div style="margin-left: 236px !important;
    margin-top: 392px !important;
    position: absolute !important;">
<p style="margin-left: 40px !important;"><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $mobile_phone_number.' / '.$inphone; ?></span></span></p>
</div>
<div style="margin-left: 117px !important;
    margin-top: 485px !important;
    position: absolute !important;
    width: 200px;
    text-align: center;">
<p style=""><span style="font-size:12px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php $full = explode(" ", $fullname);
                                                                                                        echo $full[2] . ' ' . $full[3]  ?></span></span></p>
</div>
<div style="margin-left: 117px !important;
    margin-top: 503px !important;
    position: absolute !important;
    width: 200px;
    text-align: center;">
<p style=""><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;">( <?php echo $fullname ?> )</span></span></p>
</div>
<div style="margin-left: 140px !important;
    margin-top: 526px !important;
    position: absolute !important;">
<p style="margin-left: 40px !important;"><span style="font-size:10px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $position_name ?></span></span></p>
</div>
<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p><img alt="" src="./img/miniformcut.PNG" style="margin-left: 20px;margin-top: 11px;height:416px; width:350px;" /></p>
    </textarea>
    <script>
        CKEDITOR.replace('editor1');
    </script>
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
            width: 812px !important;
        }
    </style>
    <script>
        window.onload = function deleteElement() {
            console.log('152313asd');
            document = document.getElementById("cke_22");
            myobj.remove();
            CKEDITOR.tools.callFunction(9, this);
            console.log('152313asd');
        }
        $(document).ready(function() {

        });
    </script>
</body>

</html>