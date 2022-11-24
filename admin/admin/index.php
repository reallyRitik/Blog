 <?php
  include 'config/config.php';
  include 'config/function.php';
  if(empty($_SESSION['bloguser']))
  {
      header('location:'.$baseurl.'/login');
  }
  else
  {
      header('location:'.$baseurl.'/dashboard');
  }
 ?>