# hr_officer
 
# ระบบบุคลากรโรงพยาบาล V.0.1 add Altorouter
# ** ติดตั้ง **
- 1.หลังจากclone เรียบร้อยแล้ว
- 2.หาก db ยังไม่ได้สร้างไว้ให้นำเข้าไฟล์ structureDB ก่อน **
- 3.สร้าง folder config/ dbcon.php   เพื่อเชื่อม DB โดยคัดลอก code ด้านล่างไปใช้งานได้เลย 
 ```
      <?php
       define('DB_SERVER', '');
       define('DB_USER', '');
       define('DB_PASS', '');
       define('DB_NAME', 'hrdb');

       class Dbcon
       {
          public $mycon; // ปรับให้สามารถเรียกใช้ mycon จากภายนอก class เดิมที่เป็น protected เรียกได้เฉพาะใน class และ class ที่สืบทอดมัน ผ่าน $this->mycon 
          function __construct()
           {
               $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
               $con -> set_charset("utf8");
               $this->mycon = $con;

               if (mysqli_connect_errno()) {
                  echo "Fail to connect to MySql : " . mysqli_connect_error();
               }// else echo "<small>Connect Database Sucessfuly.</small>";
           }
         }
        ?>
 ```
4.หากโฟลเดอร์ vender ไม่มีหรือมาไม่ครบทำให้เรียก path Routing ไม่ได้ ติดตั้งcomposer ก่อนและ ให้รันคำสั้ง composer require altorouter/altorouter ใน directory hr_officer

