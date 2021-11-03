<?php
 // header("Content-type:application/json; charset=UTF-8");          
  //header("Cache-Control: no-store, no-cache, must-revalidate");         
  //header("Cache-Control: post-check=0, pre-check=0", false); 
          $connect = "host=172.18.2.2 dbname=hrdb user=webcvhost password=WebCpa10665Hos!";
          $conn = mysqli_connect($connect);
          //pg_set_client_encoding($conn, "utf8");
  
  //$cli = "คลินิกอายุรกรรม";
 // $cli = $_GET['cli'];        
  $data = array();
  $query = "SELECT DATE(start_date) as sdate ,COUNT(*) as total FROM hr_cpa_leavedetail  GROUP BY start_date ";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result)) 
  {
   $data[] = array(
    //'title'   	=> $row["name"].' :: '.$row["total"],
    'title'    =>  " ".$row["total"]." ",
    'start'   	=> $row["sdate"],
    //'ctotal'    => $row["total"]
    'ctotal'    => $row["total"]
   );
  }
  //echo json_encode($data);
 echo  $row["total"]
  ?>

