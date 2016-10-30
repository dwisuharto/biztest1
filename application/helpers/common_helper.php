<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function url($url = "", $echoed = true, $index_file = "")
{
    if ($echoed) {
        echo base_url() . $index_file . $url;
    } else {
        return base_url() . $index_file . $url;
    }
}

