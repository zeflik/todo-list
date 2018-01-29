<!-- INFO!!!!
     It is a pseudo code created to test microservice in the docker internal network.
     For professional web development please check out:
     http://getbootstrap.com
     https://reactjs.org/
     -->

<?php
$api_request_url = 'http://spring-rest-service:8080/todo/' . $_POST['id'];
$ch = curl_init($api_request_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_exec($ch);
echo "<script>location.href='index.php';</script>";
