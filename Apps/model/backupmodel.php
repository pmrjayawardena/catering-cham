<?php
class backup{
    public function  viewAllBackup(){
        global $con;
        $r=$con->prepare("SELECT * FROM backup b,user u,role r WHERE b.user_id=u.user_id AND r.role_id=u.role_id ORDER BY b.backup_id DESC");
        $r->execute();
        return $r;

    }


         }

?>
