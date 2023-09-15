<?php
    require("../functions/web_config.php");
    $domain = $_SERVER['SERVER_NAME'];

    if (substr($domain, 0, 4) === 'www.') $domain = substr($domain, 4, strlen($domain));
    // $domain =  explode('.', $_SERVER['SERVER_NAME'])[0] ?? '';
    $allowed_domains = ['localhost', 'ambiedata.com.ng', 'swiftdatang.com'];
    $allowed_ips = ['199.188.200.137', '192.168.43.248'];

    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR')) $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED')) $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR')) $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED')) $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR');
    else $ipaddress = 'UNKNOWN';

    if (isset($environment) && $environment !== 'local') {
        if (!in_array($domain, $allowed_domains) || !in_array($ipaddress, $allowed_ips)) {
            die();
        }
    }
?>