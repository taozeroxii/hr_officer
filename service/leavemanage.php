<?
include_once './config/dbcon.php';

class manage_officer extends Dbcon
{

     //MISSION  -----------------------------------------------------------------------------------
    public function fetchdata_mission(){
      $searchid = " SELECT DATE(start_date) as sdate ,COUNT(*) as total FROM hr_cpa_leavedetail  GROUP BY start_date ";
      $queryid = mysqli_query($this->mycon, $searchid );
      return $queryid;
    }
    }
    ?>