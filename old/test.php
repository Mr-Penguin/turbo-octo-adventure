
        
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$content1 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/1');
$content2 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/2');
$content3 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/3');
$content4 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/4');
$content5 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/5');
$content6 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/6');
$content7 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/7');
$content8 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/8');
$content9 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/9');
$content10 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/10');
$content11 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/11');
$content12 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/12');
$content13 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/13');
$content14 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/14');
$content15 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/15');
$content16 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/16');
$content17 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/17');
$content18 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/18');
$content19 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/19');
$content20 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/20');
$content21 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/21');
$content22 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/22');
$content23 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/23');
$content24 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/24');
$content25 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/25');
$content26 = file_get_contents('https://app.psycho.unibas.ch/raumbuchung/index/json/id/26');


/*echo '' . $content1 . '';
echo '' . $content2 . '';
echo '' . $content3 . '';
echo '' . $content4 . '';
echo '' . $content5 . '';
echo '' . $content6 . '';
echo '' . $content7 . '';
echo '' . $content8 . '';
echo '' . $content9 . '';
echo '' . $content10 . '';
echo '' . $content11 . '';
echo '' . $content12 . '';
echo '' . $content13 . '';
echo '' . $content14 . '';
echo '' . $content15 . '';
echo '' . $content16 . '';
echo '' . $content17 . '';
echo '' . $content18 . '';
echo '' . $content19 . '';
echo '' . $content20 . '';
echo '' . $content21 . '';
echo '' . $content22 . '';
echo '' . $content23 . '';
echo '' . $content24 . '';
echo '' . $content25 . '';
echo '' . $content26 . '';*/

//echo' {span"timer"}{/span}{p}';
//echo' "room=s';
echo '{ "record" : ' . $content1 . ',';
echo '  ' . $content2 . ',';
echo '   ' . $content3 . ',';
echo '   ' . $content4 . ',';
echo '   ' . $content5 . ',';
echo '   ' . $content6 . ',';
echo '   ' . $content7 . ',';
echo '   ' . $content8 . ',';
echo '   ' . $content9 . ',';
echo '   ' . $content10 . ',';
echo '   ' . $content11 . ',';
echo '   ' . $content12 . ',';
echo '   ' . $content13 . ',';
echo '   ' . $content14 . ',';
echo '   ' . $content15 . ',';
echo '   ' . $content16 . ',';
echo '   ' . $content17 . ',';
echo '   ' . $content18 . ',';
echo '   ' . $content19 . ',';
echo '   ' . $content20 . ',';
echo '   ' . $content21 . ',';
echo '   ' . $content22 . ',';
echo '   ' . $content23 . ',';
echo '   ' . $content24 . ',';
echo '   ' . $content25 . ',';
echo '   ' . $content26 . '}';

/*echo '{"room1" :' . $content1 . ',';
echo '"room2" :' . $content2 . ',';
echo '"room3" :' . $content3 . ',';
echo '"room4" :' . $content4 . ',';
echo '"room5" :' . $content5 . ',';
echo '"room6" :' . $content6 . ',';
echo '"room7" :' . $content7 . ',';
echo '"room8" :' . $content8 . ',';
echo '"room9" :' . $content9 . ',';
echo '"room10" :' . $content10 . ',';
echo '"room11" :' . $content11 . ',';
echo '"room12" :' . $content12 . ',';
echo '"room13" :' . $content13 . ',';
echo '"room14" :' . $content14 . ',';
echo '"room15" :' . $content15 . ',';
echo '"room16" :' . $content16 . ',';
echo '"room17" :' . $content17 . ',';
echo '"room18" :' . $content18 . ',';
echo '"room19" :' . $content19 . ',';
echo '"room20" :' . $content20 . ',';
echo '"room21" :' . $content21 . ',';
echo '"room22" :' . $content22 . ',';
echo '"room23" :' . $content23 . ',';
echo '"room24" :' . $content24 . ',';
echo '"room25" :' . $content25 . ',';
echo '"room26" :' . $content26 . '}';*/
//echo ',';
//echo '' . $content1 .  $content2 ; $content3 ; $content4 ; $content5 ; $content6 ; $content7 ; $content8 ; $content9 ; $content10 ; $content11 ; $content12 ; $content13 ; $content14 ; $content15 ; $content16 ; $content17 ; $content18 ; $content19 ; $content20 ; $content21 ; $content22 ; $content23 ; $content24 ; $content25 ; $content26;

?>