<?php

include('class_config.php');

class high_rrd {

  private $rrd_folder = '';

  function high_rrd() {
    
    $this->rrd_folder = config::$rrd_folder;

  }

  public function get_hosts() {

    $hosts = array();

    if (is_dir($this->rrd_folder)) {

      if ($dh = opendir($this->rrd_folder)) {

        while (($dir_entry = readdir($dh)) !== false) {

          if (is_dir($this->rrd_folder.$dir_entry) && $dir_entry!=='.' && $dir_entry!=='..') {

            $hosts[$dir_entry] = array();
            $this->get_plugins($this->rrd_folder.$dir_entry.'/', &$hosts[$dir_entry]);

          } //if

        }  //while

        closedir($dh);

        return $hosts;

      } //opendir

    } //isdir

  } //get_hosts

  public function get_plugins($plugins_folder, $plugins) {

    if (is_dir($plugins_folder)) {

      if ($dh = opendir($plugins_folder)) {

        while (($dir_entry = readdir($dh)) !== false) {

          if (is_dir($plugins_folder.$dir_entry) && $dir_entry!=='.' && $dir_entry!=='..') {

            $plugins[$dir_entry] = array();
            $this->get_rrd_files($plugins_folder.$dir_entry.'/', &$plugins[$dir_entry]);

          } //if

        }  //while

        closedir($dh);

      } //opendir

    } //isdir

  } //get_hosts

  public function get_rrd_files($rrd_files_folder, $files) {

    if (is_dir($rrd_files_folder)) {

      if ($dh = opendir($rrd_files_folder)) {

        while (($dir_entry = readdir($dh)) !== false) {

          if (!is_dir($rrd_files_folder.$dir_entry)) {

            $files[] = $dir_entry;

          } //if

        }  //while

        closedir($dh);

      } //opendir

    } //isdir

  } //get_hosts

}

?>
