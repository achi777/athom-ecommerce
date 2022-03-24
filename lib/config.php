<?php
/*Globa config*/
session_start();
ob_start();
date_default_timezone_set("Asia/Tbilisi");

/*Domain config*/
define('domain','http://192.168.64.2');
define('path', '');
//define('path', '/fw');
define('baseurl',domain.path);

/*db config*/
define('dbHost','192.168.64.2');
define('dbUser','wpuser');
define('dbPass','password');
define('dbName','shopdb');

/***Bog Payment Method***/
/**for test host is dev.ipay.ge, for real host is ipay.ge **/
/**
 * test user : 1006
 * test pass: 581ba5eeadd657c8ccddc74c839bd3ad
**/
define('paymentHost', 'dev.ipay.ge');
define('paymentUser', '1006');
define('paymentPass', '581ba5eeadd657c8ccddc74c839bd3ad');
/********Project Mode********/
/**Change dev to production**/
define('project_mode', 'production');