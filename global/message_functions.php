<?php
function show_get_message():void {
    if(isset($_GET['Message'])){

        echo "<p>".$_GET['Message']."</p>";
    }
}