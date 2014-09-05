<?php
// --- connexion a la base de donnees mysql---
function dbOpen( &$con ) {
	if(substr($_SERVER['HTTP_HOST'],0,12) == "www.chambres"){
	  $con = mysql_connect( "mysql51-120.bdb", "chambresdelolo33", "t6HpDEAFCfTn" ) or die("Connexion Impossible !".mysql_error() );
	  $con_db = mysql_select_db( "chambresdelolo33", $con );
	}
	else{
	  $con = mysql_connect( "localhost", "root", "" ) or die("Connexion Impossible !".mysql_error() );
	  $con_db = mysql_select_db( "chambresdelolo33", $con );
	}
	return( $con );
}

// --- deconnexion a la base de donnees ---
function dbClose( $con ) {
	return( mysql_close( $con ) );
}

function dbReq($con,$query){
  $rs = array();
  $row = array();
  $ligne = array();
  $col = array();

  if( $con ) {
    $result = mysql_query( $query, $con );
    $ncols = mysql_num_fields( $result );
	//print('COL:'.$ncols.'<br>');
    for( $i=0; $i < $ncols; $i++ ) {
	  $colName = mysql_field_name( $result, $i );
	  $col[] = $colName;
    }
    $nrows = mysql_num_rows($result);
	//print('ROW:'.$nrows.'<br>');
    for( $j=0; $j < $nrows; $j++ ) {
	  $row = mysql_fetch_row( $result );
	  for( $i=0; $i < $ncols; $i++ ) {
	    $ligne[$col[$i]] = $row[$i];
	  }
	  $rs[] = $ligne;
    }
	return ($rs);
  }
}

// --- execution d'une requete Oracle ---
function dbExec( $con, $qry ) {
  global $flag_DEBUG;
  
  if( $con ) {
      $result =  mysql_query( $qry, $con );
      if( $flag_DEBUG == true )
		if( mysql_errno($con) )
    	  print( "erreur MySQL: ".mysql_errno( $con )."-".mysql_error()."<BR>" );
  }else{
      $result = null;
      print( "connexion invalide !<BR>\n" );
  }
  return( $result );
}
?>