<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database Error</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;background:#f6f7fb;margin:0;padding:24px;color:#111}
    .box{background:#fff;border:1px solid #e5e7ef;border-radius:10px;padding:18px;max-width:820px;margin:0 auto}
    h1{font-size:18px;margin:0 0 12px}
    pre{background:#0b1020;color:#e6e6e6;padding:12px;border-radius:8px;overflow:auto}
    .muted{color:#666;font-size:13px}
  </style>
</head>
<body>
  <div class="box">
    <h1>Database Error</h1>
    <div class="muted">A database error occurred while processing the request.</div>
    <hr>
    <pre><?php
      echo isset($heading) ? $heading."\n\n" : '';
      echo isset($message) ? $message : 'A database error occurred.';
    ?></pre>
  </div>
</body>
</html>

