<?php

include('class_config.php');

function remove_nan(&$item, $key) {
  if(is_nan($item)) { $item = null; }
}

$path = config::$rrd_folder.'/'.$_GET['host'].'/'.$_GET['plugin'].'/';

$opts = array ( "AVERAGE", "--start", '-1d');
$rrd_json = Array();

if (is_dir($path)) {

  if ($dh = opendir($path)) {

    while (($dir_entry = readdir($dh)) !== false) {

      if (is_file($path.$dir_entry)) {

        $rrd = rrd_fetch($path.$dir_entry, $opts);

        foreach($rrd['data'] as &$ds) {
          array_walk($ds,'remove_nan');
        }

        $rrd_json[$dir_entry] = $rrd;

      } //if

    }  //while

    closedir($dh);

  } //opendir

} //isdir
               
echo json_encode($rrd_json);

?>
