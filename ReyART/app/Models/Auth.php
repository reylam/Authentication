<?php
session_start();
include_once './config/connect.php';

class Auth extends DB
{
    public static function register($data)
    {
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];


        if ($password === $password_confirm) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(email,username,password) VALUES ('$email','$username','$password')";
            $result = DB::connect()->query($sql);

            return [
                "status" => "success",
                "data" => $result,
                "message" => "Berhasil register",
            ];
        } else {
            return [
                "status" => "error",
                "data" => [],
                "message" => "Password Tidak cocok",
            ];
        }
    }

    public static function login($data)
    {
        $email    = $data["email"];
        $password = $data["password"];

        $user = Auth::checkEmail($email);
        if ($user === null) {
            return [
                "status" => "error",
                "data" => [],
                "message" => "Email tidak ditemukan",
            ];
        } else {
            $decrpty = Auth::checkPassword($password, $user["password"]);

            if (!$decrpty) {
                return [
                    "status" => "error",
                    "data" => [],
                    "message" => "Password Salah",
                ];
            } else {
                $_SESSION["email"] = $email;
                setcookie("email", $email, time() + 86400);

                header("Location: /home");
            }
        }
    }


    public static function logout()
    {
    }

    public static function checkEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = DB::connect()->query($sql)->fetch_assoc();

        return $result;
    }

    public static function checkPassword($password, $password_hash)
    {
        $decrpty = password_verify($password, $password_hash);

        return $decrpty;
    }

    public static function check()
    {
    }
}
