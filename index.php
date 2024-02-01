<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oneclick</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                    require_once("config.php");

                    $sql = "SELECT * FROM users";
                    $result= mysqli_query($connect, $sql);
                    $row = mysqli_num_rows($result);
                    if ($result && $row>0){
                      
                            ?>
                            <a href="tambah.php"><button class="btn btn-info">Tambah Data</button></a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>nama</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php
                                    while($row = mysqli_fetch_array($result)){
                                        ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td> <a href="update.php?id=<?= $row['id']?>"> update </a> | 
                                             <a href="delete.php?id<?= $row['id']?>"> delete </a> </td>
                                     </tr>
                                    <?php
                                    }
                                ?>
                                   
                                </tbody>
                            </table>

                            <?php

                     }        
                 ?>
            </div>
        </div>
    </div> 
</div>

</body>
</html>