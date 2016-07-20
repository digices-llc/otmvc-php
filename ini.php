<?php

define ('OTMVC',__DIR__);

if (!defined ('DS')) {
    define ('DS',DIRECTORY_SEPARATOR);
}

$otmvc_lib = new DirectoryIterator(OTMVC.DS.'lib');

foreach ($otmvc_lib as $item) {

    $fn = $item->getfilename();
    
    if (substr ($fn,0,1) != '.') {
        require_once (OTMVC.DS.'lib'.DS.$fn);
    }

}
