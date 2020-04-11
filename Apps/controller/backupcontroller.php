<?php

include '../common/sessionhandling.php';
$user_id = 1;
include '../model/backupmodel.php';
$obj = new backup();

$action = $_REQUEST['action'];
if ($action == "backup") {
    // $result=$obj->takeBackup();
    
    // MySQL host
    $mysql_host     = "localhost";
    // MySQL username
    $mysql_username = "root";
    // MySQL password
    $mysql_password = "";
    // Database name
    $mysql_database = "ocs";
    
    
    
    
    
    /* backup the db OR just a table */
    function backup_tables($host, $user, $pass, $name, $tables = '*')
    {
        
        $link = mysqli_connect($host, $user, $pass, $name);
        //  mysql_select_db($name,$link);
        
        //get all of the tables
        if ($tables == '*') {
            $tables = array();
            $result = mysqli_query($link, 'SHOW TABLES');
            while ($row = mysqli_fetch_row($result)) {
                $tables[] = $row[0];
            }
        } else {
            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }
        
        //cycle through
        foreach ($tables as $table) {
            $result     = mysqli_query($link, 'SELECT * FROM ' . $table);
            $num_fields = mysqli_num_fields($result);
            
            //$return.= 'DROP TABLE '.$table.';';
            $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE ' . $table));
            $return .= "\n\n" . $row2[1] . ";\n\n";
            
            for ($i = 0; $i < $num_fields; $i++) {
                while ($row = mysqli_fetch_row($result)) {
                    $return .= 'INSERT INTO ' . $table . ' VALUES(';
                    for ($j = 0; $j < $num_fields; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        //$row[$j] = preg_match("/\n/","/\\n/",$row[$j]);
                        if (isset($row[$j])) {
                            $return .= '"' . $row[$j] . '"';
                        } else {
                            $return .= '""';
                        }
                        if ($j < ($num_fields - 1)) {
                            $return .= ',';
                        }
                    }
                    $return .= ");\n";
                }
            }
            $return .= "\n\n\n";
            
        }
        
        $tid = time();
        
        //save file
        $path   = "../view/store/";
        $handle = fopen($path . $tid . '.sql', 'w+');
        fwrite($handle, $return);
        fclose($handle);
        $p                 = $_SESSION['path'] = $path . $tid . '.sql';
        $_SESSION['path1'] = $tid;
        
        
        
    }
    $a = backup_tables($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    //http://www.latestcode.net/2013/03/create-compressed-zip-file-in-php.html
    $zip              = new ZipArchive();
    $archive_name     = "../view/store/" . $_SESSION['path1'] . ".zip"; //name of the output zip file
    $file_to_compress = $_SESSION['path']; //this is the file that you need to compress
    
    if ($zip->open($archive_name, ZIPARCHIVE::CREATE) !== TRUE) {
        exit("Error while opening $archive_name");
    } else {
        if (file_exists($file_to_compress) && is_file($file_to_compress)) {
            $zip->addFile($file_to_compress, $_SESSION['path1'] . ".sql");
            $zip->close();
            echo 'File size = ' . number_format((filesize($archive_name) / 1024), 2) . ' Kb';
        } else {
            exit("File does not exists");
        }
    }
    
    $tid    = $_SESSION['path1'];
    $result = $obj->takeBackup($tid, $user_id);
    $msg    = base64_encode("Successfully store a backup...");
    $id     = 1;
    header("Location:../view/backup.php?msg=$msg&id=$id");
}

if ($action == "restore") {
    $ref = $_GET['ref'];
    echo $refname = $ref . ".sql";
    
    $mysqli = new mysqli("localhost", "root", "", "tbs1");
    $mysqli->query('SET foreign_key_checks = 0');
    if ($result = $mysqli->query("SHOW TABLES")) {
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            $mysqli->query('DROP TABLE IF EXISTS ' . $row[0]);
        }
    }
    
    $mysqli->query('SET foreign_key_checks = 1');
    
    //UpLoad SQL file
    //UpLoad SQL file
    
    
    
    
    
    $filename = "../view/store/" . $refname;
    // MySQL host
    //$mysql_host = $_POST['sname'];
    //// MySQL username
    //$mysql_username = $_POST['uname'];
    //// MySQL password
    //$mysql_password = $_POST['pass'];
    //// Database name
    //$mysql_database = $_POST['database'];
    // 
    //// Connect to MySQL server
    //$c=mysqli_connect($mysql_host, $mysql_username, $mysql_password,$mysql_database) or die('Error connecting to MySQL server: ' . mysqli_error());
    //// Select database
    ////mysqli_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysqli_error());
    
    // Temporary variable, used to store current query
    $templine = '';
    // Read in entire file
    $lines    = file($filename);
    // Loop through each line
    foreach ($lines as $line) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;
        
        // Add this line to the current segment
        $templine .= $line;
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
            // Perform the query
            mysqli_query($mysqli, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
            // Reset temp variable to empty
            $templine = '';
        }
    }
    
    
    
    
    
    $msg  = "You have successfully restore the Database...";
    $msg1 = base64_encode($msg);
    
    //  header("Location:resoringback.php?id=$id");
    
    
    
    
    
    $mysqli->close();
    
    header("Location:../view/restorebackup.php?msg=$msg1&id=1");
}

?>

