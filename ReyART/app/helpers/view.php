<?php

function view(string $path){
    return include_once("app/views/$path.php");
}