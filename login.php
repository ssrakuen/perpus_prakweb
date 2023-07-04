<?php
    session_start();
    error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
    $conn = mysqli_connect('localhost','root','','dbperpus');
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $submit = $_POST['submit'];
    if($submit){
        $sql = "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        if($row['Username']!=""){
            //berhasil login
            $_SESSION['Username']=$row['Username'];
            $_SESSION['status']=$row['Status'];
            ?>
            <script language script="JavaScript">
            alert('Anda Login Sebagai <?php echo $row['Username']; ?>');
            document.location='hasillogin.php';
            </script>
            <?php
        }else{
            //gagal login
            ?>
            <script language script="JavaScript">
                alert('Gagal Login');
                document.location='login.php';
            </script>
            <?php
        }
    }
?>
<form method='post' action='login.php'>
    <p align='center'>
        Username : <input type='text' name='Username'><br>
        Password : <input type='Password' name='Password'><br>
        <input type='submit' name='submit'>
    </p>
</form>
