
<script type="text/javascript"> 

function disablebackbutton ()
{ window.history.forward();}
disablebackbutton(); 
</script>


<?php

    session_destroy();

    header('Location:index.php');

?>