<?php
error_reporting(E_ALL);

$service_port = 8080;
$address = gethostbyname('ec2-54-242-144-30.compute-1.amazonaws.com');

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false)
{
    exit("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
}

$result = socket_connect($socket, $address, $service_port);
if ($result === false)
{
    exit("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
}

$lat=33.86;
$lng=-118.37;
$range=1609.0 * 1.0; // Range is in meeters, this is 10 miles

$in=$lat . ',' . $lng . ',' . $range . "\n";

socket_write($socket, $in, strlen($in));

$out = '';
$all_out = '';
while ($out = socket_read($socket, 2048))
{
  $all_out .= $out;
}

socket_close($socket);

$response = json_decode($all_out);

print_r($response);

?>
