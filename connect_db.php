<?php

$servername = "esp.clqxxqbmykxn.ap-northeast-2.rds.amazonaws.com";

$username = "master";

$password = "gksksla333";

   

// Create connection

$conn = mysqli_connect($servername, $username, $password);

 //http://ryusstory.tistory.com/entry/AWS-EC2%EC%99%80-RDS-%EC%97%B0%EA%B2%B0%ED%95%98%EA%B8%B0 ?�기 참고 good
//http://ryusstory.tistory.com/entry/AWS-EC2%EC%99%80-RDS%EC%97%90-phpMyAdmin-%EC%9C%BC%EB%A1%9C-%EC%A0%91%EC%86%8D%ED%95%98%EA%B8%B0?�기??참고 
//https://www.digitalocean.com/community/questions/wordpress-duplicator-does-not-have-write-access  => sdk깔때
//https://cheolguso.com/aws-s3%EC%97%90-%ED%8C%8C%EC%9D%BC-%EC%97%85%EB%A1%9C%EB%93%9C%ED%95%98%EA%B8%B0-for-php/ => s3 upload

// Check connection

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

echo "Connected successfully";

?>



