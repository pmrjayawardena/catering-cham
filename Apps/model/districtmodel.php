<?php


class district{
    
    function displayDistrictsPerPro($pro_id){
        
        global $con;
        
        $r=$con->prepare("SELECT * FROM districts WHERE province_id=?");
        
        $r->execute(array($pro_id)); 
        
        if($r->errorCode()!=0){
            $errors = $r -> errorInfo();
            echo $errors[2];
            
        }
        
        return $r;
                
   
   }
       function displayDistrict($dis_id){
        
        global $con;
        //We use the alias d.name_en as is what we do is to select the particular id and rename that particular coloumn heading to identify it 
        $r=$con->prepare("SELECT p.id as pro_id,d.name_en as dis_name,p.name_en as pro_name FROM districts d,province p WHERE p.id=d.province_id AND d.id=?");
        $r->execute(array($dis_id)); 
        
        if($r->errorCode()!=0){
            $errors = $r -> errorInfo();
            echo $errors[2];
            
        }
        
        return $r;
                
   
   }

}


?>


