<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial scale=1.0">
        <title>Admin login</title>
        <link rel="stylesheet" href="../css/login.css">
        <link rel="preconnet" href="http://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Outline&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

    <body class="bg-light">
        <style>
            div.login-form{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                width: 400px;
            }
            .custom-bg{
                background-color: whitesmoke;
                size:80px;
            }
            .custom-bg:hover{
                background-color: black;
                color: whitesmoke;

            }
            .custom-alert{
                position: fixed;
                top: 25px;
                color: white;
                background-color: rgb(223, 72, 72);
                left: 25px;
            }
        </style>
        <div class="login-form text-center rounded bg-white shadow overflow-hidden">
            <form method="POST">
                <h4 class="text-dark py-3">
                    Admin Login
                </h4>
                <div class="p-4">
                    <div class="mb-4">
                        <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="UserName">
                    </div>
                    <div>
                        <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                    </div>
                    <button name="login" type="submit" class="custom-bg shadow mt-3 rounded-pill">Login</button>

                </div>
            </form>
        </div>

        <?php
            if(isset($_POST['login']))
            {
                $frm_data = filteration($_POST);
                $query = "SELECT * from admin_cred where `admin_name`=? and `admin_pass`=?";
                $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
                $datatypes = "ss";
                $res = select($query,$values,$datatypes); 
                if($res->num_rows==1){
                    $row= mysqli_fetch_assoc($res);
                    session_start();
                    $_SESSION['adminLogin']=true;
                    $_SESSION['adminId']=$row['sr_no'];
                    header('Location: dashboard.php');
                    exit();
                }
                else{
                   alert('error','Invalid Name or Password!');
                }
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    
</html>