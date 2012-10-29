<?php

require('class_high_rrd.php');

$high_rrd = new high_rrd();

echo json_encode($high_rrd->get_hosts());

?>
