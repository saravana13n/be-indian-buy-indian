<?php

error_reporting(E_ALL^E_DEPRECATED);
date_default_timezone_get('Asia/Calcutta');
date_default_timezone_set('Asia/Calcutta');
$db = pg_connect("host=ec2-23-23-225-116.compute-1.amazonaws.com port=5432 dbname=dfrevck55gut99 user=lxiqzrpindmkuy password=02a529ef33c96c3d391846efe7710ea0b014793793fd27834ce2af3c45d473b9");
  // $result = pg_query($db,"SELECT actor_id, first_name FROM actor");
  if(!$db)
  {
    die("Connection Error");
  }
  // $db=pg_select_db("tyclorgi_misc");
  // if(!$db)
  // {
  //   die("Database Error");
  // }
?>