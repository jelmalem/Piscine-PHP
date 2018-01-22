<?php
function authentificate($login, $passwd) {
  require_once('connection.php');
  $link = connection();
  $found = FALSE;
  $passwd = hash('whirlpool', $passwd);
  $req_pre = mysqli_prepare($link, 'SELECT login, mot_de_passe FROM t_users WHERE login = ?');
  mysqli_stmt_bind_param($req_pre, "s", $login);
  mysqli_stmt_execute($req_pre);
  mysqli_stmt_bind_result($req_pre, $data['login'], $data['mot_de_passe']);
  if (mysqli_stmt_fetch($req_pre)) {
      if ($data['mot_de_passe'] == $passwd) {
        $found = TRUE;
    }
  }
  mysqli_close($link);
  if ($found == TRUE)
    return TRUE;
  else
    return FALSE;
}
?>
