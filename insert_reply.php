<?php

$connect=mysql_connect( "esp.clqxxqbmykxn.ap-northeast-2.rds.amazonaws.com", "master", "gksksla333") or
    die( "SQL server???�결?????�습?�다.");

mysql_query("SET NAMES UTF8");
mysql_select_db("esp_community", $connect);
// mysql_query("insert into talk(num, name, password, content) values('1','song','123','1423')");

//POST 값을 ?�어?�다.
$r_t_no=isset($_POST['r_t_no']) ? $_POST['r_t_no'] : '';
$r_user_id=isset($_POST['r_user_id']) ? $_POST['r_user_id'] : '';
$r_content=isset($_POST['r_content']) ? $_POST['r_content'] : '';

if ($r_t_no !="" and $r_user_id !="" and $r_content !=""){


    $result=mysql_query("insert into esp_free_reply(r_t_no, r_user_id, r_content) values('$r_t_no','$r_user_id','$r_content')");
    $result2=mysql_query("update esp_free_talk set t_r_count = t_r_count + 1 where t_no = '$r_t_no'");

    if($result){
       //echo "SQL�?처리 ?�공";
      $result_succ['meta']['code'] = "200";
    	$result_succ['meta']['state'] = "OK";
    	$result_succ['meta']['data'] = "Success";
    	$result_succ['meta']['msg'] = "Talk list Success";
    	$json_result = json_encode($result_succ);

	echo $json_result;
    }
    else{
       echo "SQL�?처리�??�러 발생 : ";
       echo mysqli_error($connect);
    }

} else {
    echo "?�이?��? ?�력?�세??";
}


mysqli_close($connect);
?>
