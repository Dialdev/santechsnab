<?php  return 'if(isset($_GET[\'limit\'])){
    $sec_limit = $_GET[\'limit\'];
    echo $sec_limit;
    //print_r($sec_id);
}else{
    echo 10;
}
return;
';