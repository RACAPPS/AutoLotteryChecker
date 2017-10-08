<?php
 
 if(isset($_GET["mail"])){
    if($_GET["mail"]=="success"){
        echo("<p style='color: green;'>El e-mail se envió con éxito.</p>\n");
    }elseif($_GET["mail"]=="fail"){
        echo("<p style='color: red;'>El e-mail NO se envió con éxito.</p>\n");
    }
 }

//Upload a blank cookie.txt to the same directory as this file with a CHMOD/Permission to 777
function login($url,$data){
    $fp = fopen("cookie.txt", "w");
    fclose($fp);
    $login = curl_init();
    curl_setopt($login, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($login, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($login, CURLOPT_POST, TRUE);
    curl_setopt($login, CURLOPT_POSTFIELDS, $data);
    ob_start();
    return curl_exec ($login);
    ob_end_clean();
    curl_close ($login);
    unset($login);    
}                  
 
function grab_page($site){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_URL, $site);
    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
}
 
function post_data($site,$data){
    $datapost = curl_init();
        $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
        curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
        curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
        curl_setopt($datapost, CURLOPT_COOKIEFILE, "cookie.txt");
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost);    
}
 
?>

<?php
    $prepage =  grab_page("http://www.loteriasyapuestas.es/es/euromillones");
    $parser = '/(<input type="hidden" name="\d{9}" value=".{40}">)/';
    preg_match_all($parser, $prepage, $codes);
    
    foreach ($codes[0] as $index => $value) {
        $parsernum = '/("\d{9}")/';
        $parserval = '/(".{40}")/';
        preg_match($parsernum, $value, $num);
        preg_match($parserval, $value, $val);
        $post[$index] = substr($num[0], 1, 9)."=".substr($val[0], 1, 40);
    }

    $drawid = substr($post[0], 0, 9);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  //&".$post[25]."
    $page = login("http://www.loteriasyapuestas.es/portal/site/loterias/template.PAGE/menuitem.c081bc60d7373350f596964057228a0c/?vgnextoid=b818cd0240fe7310VgnVCM1000007522a8c0RCRD&lang=es_ES&javax.portlet.tpst=dcc9a00e8d5867590c7da0720e448a0c&javax.portlet.prp_dcc9a00e8d5867590c7da0720e448a0c=action%3DcheckBet&javax.portlet.begCacheTok=com.vignette.cachetoken&javax.portlet.endCacheTok=com.vignette.cachetoken","drawId=".$drawid."&".$post[0]."&".$post[1]."&".$post[2]."&".$post[3]."&".$post[4]."&".$post[5]."&".$post[6]."&".$post[7]."&".$post[8]."&".$post[9]."&".$post[10]."&".$post[11]."&".$post[12]."&".$post[13]."&".$post[14]."&".$post[15]."&".$post[16]."&".$post[17]."&".$post[18]."&".$post[19]."&".$post[20]."&".$post[21]."&".$post[22]."&".$post[23]."&".$post[24]."&bets%5B0%5D%5B0%5D=&bets%5B0%5D%5B1%5D=&bets%5B0%5D%5B2%5D=&bets%5B0%5D%5B3%5D=&bets%5B0%5D%5B4%5D=&bets%5B0%5D%5B5%5D=&bets%5B0%5D%5B6%5D=&bets%5B0%5D%5B7%5D=&bets%5B0%5D%5B8%5D=&bets%5B0%5D%5B9%5D=&starts%5B0%5D%5B0%5D=&starts%5B0%5D%5B1%5D=&starts%5B0%5D%5B2%5D=&starts%5B0%5D%5B3%5D=&starts%5B0%5D%5B4%5D=&bets%5B1%5D%5B0%5D=4&bets%5B1%5D%5B1%5D=12&bets%5B1%5D%5B2%5D=19&bets%5B1%5D%5B3%5D=30&bets%5B1%5D%5B4%5D=47&starts%5B1%5D%5B0%5D=2&starts%5B1%5D%5B1%5D=9&bets%5B2%5D%5B0%5D=8&bets%5B2%5D%5B1%5D=9&bets%5B2%5D%5B2%5D=18&bets%5B2%5D%5B3%5D=19&bets%5B2%5D%5B4%5D=36&starts%5B2%5D%5B0%5D=4&starts%5B2%5D%5B1%5D=7&bets%5B3%5D%5B0%5D=&bets%5B3%5D%5B1%5D=&bets%5B3%5D%5B2%5D=&bets%5B3%5D%5B3%5D=&bets%5B3%5D%5B4%5D=&starts%5B3%5D%5B0%5D=&starts%5B3%5D%5B1%5D=&bets%5B4%5D%5B0%5D=&bets%5B4%5D%5B1%5D=&bets%5B4%5D%5B2%5D=&bets%5B4%5D%5B3%5D=&bets%5B4%5D%5B4%5D=&starts%5B4%5D%5B0%5D=&starts%5B4%5D%5B1%5D=&change=change");
    //echo($page);
    $search = '/(<div class="alerta.*<input type="hidden" id="currentdrawIdChecked" value="\d{9}"\/>)/s';
    preg_match($search, $page, $premio);
    echo ($premio[0]);
    echo ("<a href='http://www.loteriasyapuestas.es/es/euromillones'>Comprobar</a>\n<a href='.'>Refresh</a>");
    
    $notoca = "/(Tu apuesta no ha sido premiada)/";
    preg_match($notoca, $premio[0], $toca);

    $semifinal = str_replace('"', '&quot;', $premio[0]);
    $final = str_replace("'", "&#39;", $semifinal);

    if(empty($toca)){
        echo("\n<p><strong><a href='mail.php?premio=".$final."'>Enviar Mail</a></strong></p>");
    }
?>