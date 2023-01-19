<!-- File Ini Menampung Function -->
<?php
// Default Time Asia/Jakarta
date_default_timezone_set("Asia/Jakarta");

// Koneksi
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'ukk_hotel';

$conn = mysqli_connect($host, $user, $pass, $dbname);
//========================================
// Function Untuk Query & Langsung di Fetch menjadi array assosiative
function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
//=========================================
// Function Create Data
function tambah($query)
{
  global $conn;
  mysqli_query($conn,$query);
  if (mysqli_affected_rows($conn) > 0
  ) {
    return true;
  } else {
    return false;
  }
}
//=========================================
// Function Delete Data
function hapus($table,$id)
{
  global $conn;
  $hapus = mysqli_query($conn, "DELETE FROM '$table' WHERE id% = $id");
  return $hapus;
}
//=========================================
// Function Random Number untuk id
function randNumb($lenght = 10)
{
  $num = '1234567890';
  $lenght = strlen($num);
  $random = '';
  for ($i = 1; $i < $lenght; $i++) {
    $random .= $num[rand(0, $lenght - 1)];
  }
  return $random;
}

//=========================================
// Function Registrasi User
function regUser($data)
{
  global $conn;

  $uid   = substr(randNumb(), 3);
  $uname    = htmlspecialchars(stripslashes($_POST['uname']));
  $pass  = mysqli_real_escape_string($conn, $data['pass']);
  $pass2 = mysqli_real_escape_string($conn, $data['pass2']);
  $level = $data['level'];
  $tgl   = date("d-m-Y H:i:s");

  $cekUname = query("SELECT * FROM tb_user WHERE uname = '$uname' ");
  if ($cekUname) {
    echo "
          <script>
          alert('Username Sudah ada!, Silahkan Gunakan Username lain')
          </script>";
    return false;
  }
  if ($pass != $pass2) {
    echo "<script>
              alert('Konfirmasi Password tidak sesuai')
            </script>";
    return false;
  }
  $password = password_hash($pass, PASSWORD_BCRYPT);
  mysqli_query($conn, "INSERT INTO tb_user VALUES ($uid, '$uname', '$password', '$level', '$tgl')");
  return mysqli_affected_rows($conn);
}