<?php

$file = 'rrd/interface-venet0/if_octets.rrd';

$opts = array ( "AVERAGE", "--start", '-2h');
$rrd = rrd_fetch($file, $opts);

function remove_nan(&$item, $key) {
  if(is_nan($item)) { $item = null; }
}

print_r($rrd);

/*foreach($rrd['data'] as &$ds) {
  array_walk($ds,'remove_nan');
}*/

//print_r(rrd_lastupdate($file));

echo json_encode($rrd);
?>

