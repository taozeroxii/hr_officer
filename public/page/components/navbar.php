<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #6c757d;">
  <div class="container-fluid">
    <span class="navbar-brand">CPA HR Managements</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if ($page == 'home') echo 'active';if ($page == 'edit') echo 'disabled'; ?>" aria-current="page" href="./">หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($page == 'detail') echo 'active';if ($page == 'edit') echo 'disabled'; ?>" href="./detail">ข้อมูลบุคลากร</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($page == 'about') echo 'active'; if ($page == 'edit') echo 'disabled'; ?>" href="./about">เกี่ยวกับ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($page == 'form') echo 'active'; if ($page == 'edit') echo 'disabled'; ?>" href="./form">แบบฟอร์มต่างๆ</a>
        </li>



        <?php if ($_SESSION['role'] === '1' || $_SESSION['role'] === '2' || $_SESSION['role'] === '3') { ?>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle
            <?php if ($page == 'tabledetail') echo 'active';if ($page == 'edit') echo 'disabled'; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              admin (ข้อมูลพื้นฐาน)
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./tabledetailmission">กลุ่มภารกิจ(mission)</a></li>
              <li><a class="dropdown-item" href="./tabledepartment">ข้อมูลหน่วยงาน(workgroup)</a></li>
              <li><a class="dropdown-item" href="./tableposition">ตำแหน่ง(position)</a></li>
              <li><a class="dropdown-item" href="./tablepersontype">ประเภทการจ้าง(persontype)</a></li>
              <li><a class="dropdown-item" href="./tableperson">บุคลากร(person)</a></li>
              <!-- <li><hr class="dropdown-divider"></li> -->
              <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
            </ul>
          </li>
        <?php  } ?>

        <?php if ($_SESSION['role'] === '1' || $_SESSION['role'] === '2') { ?>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle <?php if ($page == 'tabledetailuser') echo 'active';if ($page == 'edit') echo 'disabled'; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              admin (จัดการ user)
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./register">เพิ่มข้อมูลผู้ใช้งานระบบ </a></li>
              <li><a class="dropdown-item" href="./tableusergroup">กลุ่มการใช้งาน</a></li>
              <li><a class="dropdown-item" href="./table-userrole">สิทธิการเข้าถึง </a></li>
            </ul>
          </li>
        <?php  } ?>

      </ul>
      <?php
      if ($_SESSION['username'] == '' and $page != 'login') { ?>
        <!-- <form class="d-flex" >
        </form> -->
        <hi class="text-white"> User : guest &nbsp;</hi><?php echo $_SESSION['fullname'] ?>
        <button class="btn btn-success" style="float: right;" onclick="login()"><i class="fas fa-sign-in-alt f-16"> LOGIN</i></button>
        <form action="logout" method="GET" autocomplete="off">
        <?php } else if ($_SESSION['username'] != '') {  ?> <hi class="text-white"><?php echo 'User : '.$_SESSION['fullname'] ?> &nbsp; </hi><a href="logout"><button style="float: right;" class="btn btn-light" name="logout" type="submit">LOGOUT</button></a><?php }  ?>
        </form>

    </div>
  </div>
</nav>

<script>
  function login() {
    window.location.href = "./login";
  }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>