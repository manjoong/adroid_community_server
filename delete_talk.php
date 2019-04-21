<?php

$connect=mysqli_connect("esp.clqxxqbmykxn.ap-northeast-2.rds.amazonaws.com", "master", "gksksla333", "esp_community" );

mysqli_set_charset($connect,"utf8");
// mysql_query("insert into talk(num, name, password, content) values('1','song','123','1423')");

//POST 값을 읽어온다.
$t_no=isset($_POST['t_no']) ? $_POST['t_no'] : '';
$input_pwd=isset($_POST['input_pwd']) ? hash('sha256', $_POST['input_pwd']) : '';


if ($t_no !="" and $input_pwd != ""){



    $sql = "select * from esp_free_talk where t_no = '$t_no'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);


    $str = strcmp($row['t_pwd'], $input_pwd); //비밀번호 비교

    if($str){ //password 틀림
    	$error_result["meta"]["code"] = "100";
      $error_result["meta"]["state"] = "NO";
    	$error_result["meta"]["data"] = "not password";
    	$error_result["meta"]["msg"] = "input password : $input_pwd   correct password: $row[t_pwd]";
       //"선택한 글 : $t_no 입력한 비밀번호 : '$input_pwd' 정확한 비밀번호 : $row[t_pwd] ";
    	$json_result = json_encode($error_result);

    	echo $json_result;
    }if (!$str) {
    $result=mysqli_query($connect, "delete from esp_free_talk where t_no='$t_no'");
    $result=mysqli_query($connect, "delete from esp_free_reply where r_t_no='$t_no'");
  }


    if($result){
       //echo "SQL문 처리 성공";
      $result_succ['meta']['code'] = "200";
    	$result_succ['meta']['state'] = "OK";
    	$result_succ['meta']['data'] = "Success";
    	$result_succ['meta']['msg'] = "Talk list Success";
    	$json_result = json_encode($result_succ);

	echo $json_result;
    }
    // else{
    //    echo "SQL문 처리중 에러 발생 : ";
    //    echo mysqli_error($connect);
    // }

} else {
    echo "무슨일이야...";
    echo $t_no;
}


mysqli_close($connect);
?>
