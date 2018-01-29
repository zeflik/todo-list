<!-- INFO!!!!
     It is a pseudo code created to test microservice in the docker internal network.
     For professional web development please check out:
     http://getbootstrap.com
     https://reactjs.org/
     -->

<?php
$api_request_url = 'http://spring-rest-service:8080/todo';
if ($_POST['description'] != "") {
    if ($_POST['completed'] == 'on') {
        $complete = 1;
    }
    $data = array("description" => $_POST['description'], "complete" => $complete);
    $data_string = json_encode($data);
    $ch = curl_init($api_request_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    curl_exec($ch);
}
echo "<script>location.href='index.php';</script>";

