<?php

$file = '/tmp/if_octets.rrd';

$opts = array ( "AVERAGE", "--start", '-1d');
$rrd = rrd_fetch($file, $opts);

function remove_nan(&$item, $key) {
  if(is_nan($item)) { $item = null; }
}

foreach($rrd['data'] as &$ds) {
  array_walk($ds,'remove_nan');
}

//print_r(rrd_lastupdate($file));

echo json_encode($rrd);
?>

