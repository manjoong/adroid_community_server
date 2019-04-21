<?php

$link=mysqli_connect("esp.clqxxqbmykxn.ap-northeast-2.rds.amazonaws.com", "master", "gksksla333", "esp_community" );
if (!$link)
{
    echo "MySQL ?‘ì† ?ëŸ¬ : ";
    echo mysqli_connect_error();
    exit();
}

mysqli_set_charset($link,"utf8");


$sql="select *,(select count(r_no) from esp_free_reply where r_t_no = t_no) as t_r_count from esp_free_talk ORDER BY t_no DESC";
 //()?˜ë©´ ?€?‰íŠ¸ ?˜ë‚˜??ì»¬ëŸ¼??replyë¥??„ì²´ë¥??ìƒ‰

$result=mysqli_query($link,$sql);

$data = array();
if($result){

    while($row=mysqli_fetch_array($result)){
        array_push($data,
            array('t_no'=>$row[0],
            't_user_id'=>$row[1],
            't_pwd'=>$row[2],
            't_title'=>$row[3],
            't_content'=>$row[4],
            't_write_date'=>$row[5],
            't_like' => $row[6],
            't_r_count' => $row[7]
        ));
    }
    header('Content-Type: application/json; charset=utf8');
    $json = json_encode(array("results"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    echo $json;

}
else{
    echo "SQLë¬?ì²˜ë¦¬ì¤??ëŸ¬ ë°œìƒ : ";
    echo mysqli_error($link);
}



mysqli_close($link);

?>
