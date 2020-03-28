<?php
//Output buffer
ob_start();

//To report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$rc=date_default_timezone_set("Asia/Colombo"); //Time Zone

//starting the session
if(!isset($_SESSION)){
	session_start();
}

$userinfo=$_SESSION['userinfo'];
$user_id=$userinfo['user_id']; //get the user id of the logged user

global $user_id;

// MySQL host
$mysql_host = "localhost";
// MySQL username
$mysql_username = "root";
// MySQL password
$mysql_password = "";
// Database name
$mysql_database = "ocs"; //database name


// backup database or just the table
function backup_tables($host,$user,$pass,$name,$user_id,$tables = '*')
{
  
  $link = mysqli_connect($host,$user,$pass,$name);

  
  //Get all tables
  if($tables == '*')
  {
    $tables = array();//get the tables to an array
    $result = mysqli_query($link,'SHOW TABLES');
    while($row = mysqli_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  foreach($tables as $table)
  {
    $result = mysqli_query($link,'SELECT * FROM '.$table);
    $num_fields = mysqli_num_fields($result);
    
    $row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysqli_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
	
  }
  
  $tid=time();
  
  //save backup file
  $path="store/";
  $handle = fopen($path.$tid.'.sql','w+');
  fwrite($handle,$return);
  fclose($handle);
  $p=$_SESSION['path']=$path.$tid.'.sql';
  $_SESSION['path1']=$tid;
  $cdate=date('Y-m-d'); $ctime=date("H:i:s");
	
  $sql="INSERT INTO backup VALUES('','$user_id','$cdate','$ctime','$tid','1')"; //inserting backup details into backup table
  $result=mysqli_query($link,$sql) or die(mysqli_error($link));
  if($result){
	$msg="Success!";
}else{
	$msg="Failed!";
}
  return $msg;
}
$a=backup_tables($mysql_host,$mysql_username,$mysql_password,$mysql_database,$user_id);

//http://www.latestcode.net/2013/03/create-compressed-zip-file-in-php.html
$zip = new ZipArchive();
$archive_name = "store/".$_SESSION['path1'].".zip";
$file_to_compress = $_SESSION['path'];

if ($zip->open($archive_name, ZIPARCHIVE::CREATE)!==TRUE) {
exit("Error while opening $archive_name");
}else{ 
if(file_exists($file_to_compress) && is_file($file_to_compress)){
$zip->addFile($file_to_compress,$_SESSION['path1'].".sql");
$zip->close();
echo 'File size = '.number_format((filesize($archive_name)/1024),2).' Kb';
}else{
exit("File does not exist!");
}
}

$msg="Database backup successfully";
$id="1";
header("Location:../backup_management.php?msg=4");

?>
