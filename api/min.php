<?php

include "simple_html_dom.php";

$user_message = "https://ibb.co/hKGwMKK";

$token = "5694209635:AAFtqInNR29XyYmrrTrZxUdivauMx5ziydk";

$user_id = "5288966788";

$html = file_get_html($user_message);

$gettitle = $html->find('meta[property=og:title]');

$title =  $gettitle[0]->content;

$image = $html->find('meta[property=og:image]');

$src =  $image[0]->content;

if (!empty($src)) {
    $message_encode = "File Name: <b>$title</b> \n\n Direct File URL : <a href='$src'>Click Here</a>";
    $message = urlencode($message_encode);
    $run = file_get_contents("https://api.telegram.org/bot$token/sendDocument?chat_id=$user_id&document=$src&caption=$message&parse_mode=HTML");

    $response =  $http_response_header[0]; // Output: HTTP/2 200 OK
}
if($response != "HTTP/1.1 200 OK"){
$message_encode = "We Cant Grab this image 😟";
$message = urlencode($message_encode);
$run = file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$user_id&text=$message&parse_mode=HTML");

echo $http_response_header[0]; // Output: HTTP/2 200 OK
}
?>
