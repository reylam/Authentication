<?php
include_once 'app/Models/Auth.php';

if (isset($_POST['register'])) {
    $data = [
        "email" => $_POST["email"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "password_confirm" => $_POST["password_confirm"],
    ];

    $register = Auth::register($data);


    if ($register["status"] === "success") {
        header("Location: /login");
    } else {
        header("Location: /register");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Register</title>
</head>

<body class="bg-black overflow-hidden">
    <div class="container-fluid mt-2">
        <main class="card bg-dark p-4 d-flex flex-row">
            <div class="col-6 me-5">
                <article class="card-body">
                    <h1 class="card-title text-warning">Register</h1>
                    <p class="card-title text-light fs-6 ">Silahkan register terlebih dahulu</p>
                    <form class="mt-4" action="" method="POST">
                        <div class="mb-4">
                            <label class="text-warning fw-lighter" for="email">Email</label>
                            <input class="form-control bg-dark-subtle" placeholder="example@email.com" type="email" name="email" id="email" required>
                        </div>
                        <div class="mb-4">
                            <label class="text-warning fw-lighter" for="username">Username</label>
                            <input class="form-control bg-dark-subtle" placeholder="Sudin"  type="text" name="username" id="username" required>
                        </div>
                        <div class="mb-4">
                            <label class="text-warning fw-lighter" for="password">Password</label>
                            <input class="form-control bg-dark-subtle" placeholder="********"  type="password" name="password" id="password" required>
                        </div>
                        <div class="mb-4">
                            <label class="text-warning fw-lighter" for="password_confirm">Password confirm</label>
                            <input class="form-control bg-dark-subtle" placeholder="********"  type="password" name="password_confirm" id="password_confirm" required>
                        </div>
                        <div class="d-grid gap-2 pt-3">
                            <button name="register" type="submit" class="btn btn-outline-warning">Register</button>
                        </div>
                    </form>
                    <div class="card-footer">
                        <div class="text-center text-white">Already have an account? <a href="/login" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover">Login Now</a></div>
                    </div>
                </article>
            </div>
            <div class="col-6" >
                <img src="https://i.pinimg.com/564x/08/01/39/0801395ffeae2f146bf413e30164c4c0.jpg" class="img-fluit rounded">
            </div>
        </main>
    </div>
</body>

</html>