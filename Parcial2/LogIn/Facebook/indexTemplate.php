<?php
session_start();
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Login with facebook</title>
   --- --- ---
  css stuff
   --- --- ----
 </head>
  <body>
  <?php if ($_SESSION['FBID']): ?>
              -- --- - - - -- -
           Display content After user login
             -- -- - --- ---- -- -
    <?php else: ?>
              -- --- - - - -- -
           Display content before login
             -- -- - --- ---- -- -
    <?php endif ?>
  </body>
</html>
