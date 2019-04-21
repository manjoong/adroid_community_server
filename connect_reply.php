<?php
$link=mysqli_connect("esp.clqxxqbmykxn.ap-northeast-2.rds.amazonaws.com", "master", "gksksla333", "esp_community" );
if (!$link)
{
    echo "MySQL ?‘ì† ?ëŸ¬ : ";
    echo mysqli_connect_error();
    exit();
}

mysqli_set_charset($link,"utf8");
$r_t_no=isset($_GET['r_t_no']) ? $_GET['r_t_no'] : '';

$sql="select * from esp_free_reply where r_t_no=$r_t_no ORDER BY r_no DESC";

$result=mysqli_query($link,$sql);

$data = array();
if($result){

    while($row=mysqli_fetch_array($result)){
        array_push($data,
            array('r_no'=>$row[0],
            'r_t_no'=>$row[1],
            'r_user_id'=>$row[2],
            'r_content'=>$row[3],
            'r_write_date'=>$row[4]
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
