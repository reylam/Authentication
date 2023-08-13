<?php

class DB{
    private static $hostname = "localhost";
    private static $username = "root";
    private static $password = "";  
    private static $database = "db_art";

    public static $conn;

    public static function connect()
    {
        self::$conn = mysqli_connect(self::$hostname,self::$username,self::$password,self::$database);

        if(self::$conn -> connect_error){
            die('koneksi bermasalah');
        }
        echo "Koneksi berhasil ";
        return self::$conn;
    }
}