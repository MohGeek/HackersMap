<?php                         

function geolocateCity($ipAddress){           
        require_once("geoipcity.inc.php");   
        $handle = geoip_open(dirname(__FILE__) . "/GeoLiteCity.dat", GEOIP_STANDARD);    
        $region = geoip_record_by_addr($handle, $ipAddress);        
        geoip_close($handle);                
        return $region;       
}    