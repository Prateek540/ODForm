<script src="script.js"></script>

<?php

session_start();

session_destroy();

echo '<script type="text/javascript">logout();</script>';

?>