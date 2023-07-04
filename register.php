<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$conn = mysqli_connect('localhost', 'root', '', 'dbperpus');
$email = $_POST['email'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$prodi = $_POST['prodi'];
$submit = $_POST['submit'];
if ($submit) {
  $sql = "SELECT * FROM user WHERE email='$email'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  if ($row['email'] != "") {
    //email ditemukan
    ?>
    <script language script="JavaScript">
      alert('Email sudah digunakan gunakan email lain XD');
      document.location = 'register.php';
    </script>
    <?php
  } elseif ($row['email'] = "") {
    //gagal login
    $sql = "INSERT INTO user(email, password, nama, prodi) VALUES ('$email','$password','$nama_lengkap,'$prodi')";
    $_SESSION['email'] = $row['email'];
    $_SESSION['status'] = $row['Status'];
    ?>
    <script language script="JavaScript">
      alert('User berhasil Register');
      document.location = 'main-page.php';
    </script>
    <?php
  } else {
    ?>
    <script language script="JavaScript">
      alert('register gagal');
      document.location = 'register.php';
    </script>
    <?php
  }
}
?>
<form method='post' action='register.php'>
  <p align='center'>
    Email <input type='text' name='email'><br>
    Password <input type='text' name='password'><br>
    Nama Lengkap <input type='text' name='nama_lengkap'><br>
    Prodi <input type='text' name='prodi'><br>
    <input type='submit' name='submit'>
  </p>
</form>