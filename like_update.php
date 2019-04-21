<?php

$connect=mysql_connect( "esp.clqxxqbmykxn.ap-northeast-2.rds.amazonaws.com", "master", "gksksla333") or
    die( "SQL server???°ê²°?????†ìŠµ?ˆë‹¤.");

mysql_query("SET NAMES UTF8");
mysql_select_db("esp_community", $connect);
// mysql_query("insert into talk(num, name, password, content) values('1','song','123','1423')");

//POST ê°’ì„ ?½ì–´?¨ë‹¤.
$t_no=isset($_POST['t_no']) ? $_POST['t_no'] : '';
$t_like=isset($_POST['t_like']) ? $_POST['t_like'] : '';


if ($t_no !="" and $t_like !=""){


    $result=mysql_query("update esp_free_talk set t_like='$t_like' where t_no='$t_no'");



    if($result){
       //echo "SQLë¬?ì²˜ë¦¬ ?±ê³µ";
      $result_succ['meta']['code'] = "200";
    	$result_succ['meta']['state'] = "OK";
    	$result_succ['meta']['data'] = "Success";
    	$result_succ['meta']['msg'] = "Talk list Success";
    	$json_result = json_encode($result_succ);

	echo $json_result;
    }
    else{
       echo "SQLë¬?ì²˜ë¦¬ì¤??ëŸ¬ ë°œìƒ : ";
       echo mysqli_error($connect);
    }

} else {
    echo "µÎ°³ÀÇ °ªÀÌ ¾ø½À´Ï´Ù";
}


mysqli_close($connect);
?>
