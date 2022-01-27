<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>

<body>

    <?php
    $page = 'form';
    require "./public/components/navbar.php";
    include "./service/formmanage.php";
    $obj = new manage_form();
    ?>



    <div class="container mt-5">
        <h2 class="text-light">แบบฟอร์มคำขอต่างๆ</h2>
        <hr class="text-light">
        <button style="width: 150px; height:125px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-archive fa-4x"></i><br>
            <strong>หนังสือรับรอง</strong>
        </button>
        <button style="width: 150px; height:125px;" type="button" class="btn btn-info" data-toggle="modal" data-target="#leavemodal">
            <i class="fa fa-share fa-4x"></i><br>
            <strong>ลา</strong>
        </button>

        <?php if ($_SESSION['role'] === '1' || $_SESSION['role'] === '2' || $_SESSION['role'] === '3') { ?>
            <hr class="text-light">
            <h2 class="text-light">Admin</h2>


            <button style="width: 150px; height:125px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#approveModal">
                <i class="fa fa-archive fa-4x"></i><br>
                <strong>อนุมัติหนังสือรับรอง</strong>
            </button>
        <?php
        } ?>
    </div>



    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">หนังสือรับรอง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="ml-3 "><a class="btn btn-block btn-info text-light text-left" href="./form_request_salary">1. หนังสือรับรอง </a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- leave -->
    <div class="modal" id="leavemodal" tabindex="-1" role="dialog" aria-labelledby="leavemodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leavemodalLabel">ใบลา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $fetch_leave =  $obj->fetch_leave();
                    while ($result = mysqli_fetch_assoc($fetch_leave)) {
                    ?>
                        <p class="ml-3"><a class="btn btn-block btn-info text-light text-left" href="<?php echo $result['link_path']; ?>"><?php echo $result['id'] . ' : ' . $result['leave_name']; ?> </a></p>
                    <?php } ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">หนังสือรับรอง </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="ml-3 "><a class="btn btn-block btn-info text-light text-left" href="./form_request_salary_admin">1. หนังสือรับรอง </a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <?php include './public/components/footer.php'; ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>