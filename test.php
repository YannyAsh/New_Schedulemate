<?php 
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $select = mysqli_query($conn, "SELECT * FROM tb_register where userEmail = '$email' AND userPass = '$password'");
        $row = mysqli_fetch_array($select);

        $userApproval = $row['userApproval'];

        $select2 = mysqli_query($conn, "SELECT *FROM tb_register WHERE userEmail = '$email' AND userPass = '$password'");
        $check_user = mysqli_num_rows($select);

        if($check_user == 1){
            $_SESSION["userApproval"] = $row['userApproval'];
            $_SESSION["userEmail"] = $row['userEmail'];
            $_SESSION["userPass"] = $row['userPass'];

            if($userApproval == "approved"){
                echo '<script type = "text/javascript">';
                echo 'alert("Login Successful")';
                echo 'window.location.href = "index.php"';
                echo '</script>';
            }
            else if ($userApproval == "pending"){
                echo '<script type = "text/javascript">';
                echo 'alert("Your account is still pending for approval")';
                echo 'window.location.href = "index.php"';
                echo '</script>';
            }
            else
            {
                echo "Incorrect email or password";
            }
        }
    }
?>