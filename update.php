<?php
require_once "config.php";
$nama = "";
$username = "";
$password = "";

$namaerr = "";
$usernameerr = "";
$passworderr = "";

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

    $id = trim($_GET["id"]);


    //prepare
    $sql = "SELECT * FROM users WHERE id =?";

    if($statement = mysqli_prepare($connect,$sql)){
        mysqli_stmt_bind_param($statement, "i", $paramid);
        $paramid = $id;

        if(mysqli_stmt_execute($statement)){
            $result = mysqli_stmt_get_result ($statement);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $nama = $row ['nama'];
            $username = $row ['username'];
            $password = $row ['password'];
        }
    }
}

if(empty($username)){
    $usernameerr = "Silahkan isi kolom Username";

}else{
   
    $cekUsername = "SELECT username FROM users WHERE username = ?";
    if($stmt = mysqli_prepare($connect, $cekUsername)){

        mysqli_stmt_bind_param($stmt, "s", $param_username);

        $param_username = $username;

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                $usernameerr = "Username Sudah Digunakan";
            }
        }
    }
}

if(empty($password)){
    $passworderr = "Silahkan isi kolom Password";

}else{
    $cekPassword = "SELECT password FROM users WHERE password = ?";
    if($stmt = mysqli_prepare($connect, $cekPassword)){

        mysqli_stmt_bind_param($stmt, "s", $param_password);

        $param_password = $password;

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                $passworderr = "Password Sudah Digunakan";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Click | Tambah Data User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data User</h2>
                    </div>
                    <p>Silahkan isi form di bawah ini kemudian submit untuk mengubah data user di dalam database</p>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="from-group <?= (!empty($namaerr)) ? 'has-error' : ''; ?>">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>"> 
                            <span class="help-block"><?= $namaerr;?></span>
                        </div>
                        <div class="form-group <?= (!empty($usernameerr)) ? 'has-error' : ''; ?>">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username"value="<?php echo $username; ?>">
                            <span class= "help-block"> <?= $usernameerr;?></span>
                        </div>
                        <div class="form-group <?= (!empty($passworderr)) ? 'has-error' : ''; ?>">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password"value="<?php echo $password; ?>">
                            <span class="help-block"><?= $passworderr;?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>