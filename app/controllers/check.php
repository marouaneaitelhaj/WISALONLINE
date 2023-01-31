<?php
class check extends controller{
    public function __construct(){
        if (!isset($_COOKIE["user"])) {
            echo "rak kharj";
        }else{
            echo "rak dakhl";
            echo "<br>";
            echo $_COOKIE["user"];
        }
    }
}