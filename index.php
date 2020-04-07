<?php

require_once('Bootstrap.php');

$sets = new Sets($data);

$sets->run_matching();
$sets->display_results();