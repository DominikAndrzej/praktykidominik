<?php
include '../global/database_service.php';
include '../database_config.php';

delete_email_by_email($_POST["email"]);
