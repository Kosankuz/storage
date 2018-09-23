<?PHP
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
}

$user_ip = getUserIP();
echo $user_ip; // Output IP address [Ex: 177.87.193.134]
echo $_SERVER['HTTP_USER_AGENT'];
echo $_SERVER['REMOTE_PORT'];
echo '<br><br><br>';
echo date('l \t\h\e jS');
echo date("h:i:sa");

 $time_stamp = date('l \t\h\e jS') . " " . date("h:i:sa");
echo $time_stamp;
?>
