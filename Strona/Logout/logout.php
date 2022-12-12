<?php

	session_unset();
    session_destroy();

    header("Location: StronaPoczatkowa.php?page=glowna&nfolder=Glowna");

?>