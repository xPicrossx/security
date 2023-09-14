<?php

require_once "functions.php";
session_start();
session_destroy();

header('location:index.php?message=Vous êtes bien déconnecté&status=success');