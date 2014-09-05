<?php 
  include ("include/db.php");
  
  dbOpen($con);
  $query  = "SELECT ws.sid, ws.nid, FROM_UNIXTIME(submitted) date_soumission, wsd.cid, wsd.no, wsd.data, wc.name, n.language, n.title ";
  $query .= "FROM `webform_submissions` ws, webform_submitted_data wsd, webform_component wc, node n ";
  $query .= "WHERE ws.sid = wsd.sid ";
  $query .= "  AND ws.nid = wc.nid ";
  $query .= "  AND wsd.cid = wc.cid ";
  $query .= "  AND ws.nid = n.nid ";
  $query .= "ORDER BY FROM_UNIXTIME(submitted) desc, wsd.cid";
  // echo $query."<br>";
  
  $lst_soumissions = dbReq($con,$query);
  
  dbClose($con);

  if($lst_soumissions){
    $sav_no_soumission = -1;
    for($i=0;$i<count($lst_soumissions);$i++){
	  if($sav_no_soumission != $lst_soumissions[$i]['sid']){
	    $sav_no_soumission = $lst_soumissions[$i]['sid'];
		if($i) echo "<br>";
		echo "<u><b>Nouvelle  Soumission :</b></u> ".$lst_soumissions[$i]['sid']."<br>";
		echo "<b>Date Soumission :</b> ".$lst_soumissions[$i]['date_soumission']."<br>";
		echo "<b>Type Soumission :</b> ".$lst_soumissions[$i]['title']."<br>";
		echo "<b>Langue :</b> ".$lst_soumissions[$i]['language']."<br>";
	  }
	  echo "<b>".$lst_soumissions[$i]['name']."</b> : ".$lst_soumissions[$i]['data']."<br>";
	}
  }
  else
    echo "Pas de soumissions !!!";
  
?>