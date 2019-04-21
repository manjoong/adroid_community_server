<?php

$connect=mysql_connect( "esp.clqxxqbmykxn.ap-northeast-2.rds.amazonaws.com", "master", "gksksla333") or
    die( "SQL server???°ê²°?????†ìŠµ?ˆë‹¤.");

mysql_query("SET NAMES UTF8");
mysql_select_db("esp_community", $connect);
// mysql_query("insert into talk(num, name, password, content) values('1','song','123','1423')");

//POST ê°’ì„ ?½ì–´?¨ë‹¤.
$t_user_id=isset($_POST['t_user_id']) ? $_POST['t_user_id'] : '';
$t_pwd=isset($_POST['t_pwd']) ? hash('sha256', $_POST['t_pwd']) : '';
$t_title=isset($_POST['t_title']) ? $_POST['t_title'] : '';
$t_content=isset($_POST['t_content']) ? $_POST['t_content'] : '';
$t_like=isset($_POST['t_like']) ? $_POST['t_like'] : '';

if ($t_user_id !="" and $t_pwd !="" and $t_title !="" and $t_content !="" and $t_like !=""){


    $result=mysql_query("insert into esp_free_talk(t_user_id, t_pwd, t_title, t_content, t_like) values('$t_user_id','$t_pwd','$t_title','$t_content', '$t_like')");



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
    echo "?°ì´?°ë? ?…ë ¥?˜ì„¸??";
}


mysqli_close($connect);
?>
