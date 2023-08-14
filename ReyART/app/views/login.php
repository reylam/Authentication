<?php
include_once 'app/Models/Auth.php';

if (isset($_POST['login'])) {
    $data = [
        "email" => $_POST['email'],
        "password" => $_POST['password'],
    ];

    $result = Auth::login($data);

    // die(var_dump($result));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body class="bg-black">
    <div class="container-fluid mt-2 ">
        <main class="card bg-dark p-4 d-flex flex-row">
            <div class="col-6 flex">
                <img src="https://i.pinimg.com/564x/05/de/54/05de54edcfe213403ca983305d567181.jpg" class="img-fluit rounded">
            </div>
            <div class="col-6 flex">
                <article class="card-body">
                    <?php if(isset($result)) : ?>
                    <div class="alert alert-<?php $result["status"] === 'error' ? print("danger") : print("success") ?>">
                        <?= $result["message"] ?>
                    </div>
                    <?php endif ?>
                    <h1 class="card-title text-warning mt-3 pt-5">Masuk ke akun anda</h1>
                    <p class="card-title text-light fs-6 pt-1 pb-4  ">Selamat datang! Pilih dan Masukan input untuk login</p>
                    <form class="mt-4" action="" method="POST">
                        <div class="mb-4">
                            <label class="text-warning fw-lighter fs-6" for="email">Email</label>
                            <input class="form-control bg-dark-subtle" placeholder="example@email.com" type="email" name="email" id="email">
                        </div>
                        <div class="mb-4">
                            <label class="text-warning fw-lighter fs-6" for="password">Password</label>
                            <input class="form-control bg-dark-subtle" placeholder="********" type="password" name="password" id="password">
                            <p class="text-light"><input type="checkbox" onclick="checkPass()"> Show Password</p>
                        </div>
                        <div class="d-grid gap-2 pt-3">
                            <button name="login" type="submit" class="btn btn-outline-warning">Login</button>
                        </div>
                    </form>
                    <div class="card-footer">
                        <div class="text-center text-white">Don’t have an account? <a href="/register" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover">Register Now</a></div>
                    </div>
                </article>
            </div>
        </main>
    </div>

    <script>
        function checkPass() {
            var check = document.getElementById("password");
            if (check.type === "password") {
                check.type = "text";
            } else {
                check.type = "password";
            }
        }
    </script>
</body>

</html>