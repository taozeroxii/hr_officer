<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php" ?>

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


    ?>

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
<div style="position: absolute !important;
    margin-left: 16px !important;
    margin-top: 307px !important;">
<p style="margin-left: 40px !important;"><span style="font-size:8px"><span style="font-family:Trebuchet MS,Helvetica,sans-serif;">---นาย จักรภัทร
<?php echo $_POST['id'];
echo $_POST['insert_datetime'];
echo $_POST['fullname'];
echo $_POST['mission_name'];
echo $_POST['workgroup'];
echo $_POST['note']; ?>---</span></span></p>
</div>
<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p><img alt="" src="./img/085421.PNG" style="height:380px; width:320px" /></p>
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
            width: 810px !important;
        }
    </style>
    <script>
        window.onload = function deleteElement() {
            document = document.getElementById("cke_22");
            myobj.remove();
        }
    </script>
</body>

</html>