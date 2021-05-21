<?php

setcookie("username", "", time() - 3600);
setcookie("password", "", time() - 3600);
setcookie("remember", "", time() - 3600);

echo "<script>location.href='index.php'</script>";



?>