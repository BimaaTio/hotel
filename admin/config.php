<?php
// jika menerima parameter hal = kosong include hal 
if($_GET['hal'] == ''){
  include 'pages/index.php';
} else if($_GET['hal'] == 'kamar'){
  include 'pages/kamar.php';
} else if ($_GET['hal'] == 'fasilitas') {
  include 'pages/fasilitas.php';
} else if ($_GET['hal'] == 'akun') {
  include 'pages/akun.php';
} else if ($_GET['hal'] == 'set-profile') {
  include 'pages/profile.php';
} else if ($_GET['hal'] == 'set-web') {
  include 'pages/setting.php';
}