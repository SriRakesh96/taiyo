<?php

session_start();
unset($_SESSION['sess_adm_email']);

unset($_SESSION['sess_adm_password']);

session_destroy();

	echo "<meta http-equiv=\"refresh\" content=\"0;url=message.php?msg_id=YRaErZ\" />";
?>
