<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

            $page = $_GET['page'];

            if($page == "login"){
                echo "login | UjianRPL.MK";
            }
            else if($page == "tambahBarang"){
                echo "Tambah Barang | UjianRPL.MK";
            }
            else if($page == "dataBarang"){
                echo "Data Barang | UjianRPL.MK";
            }
            else if($page == "editBarang"){
                echo "Edit Barang | UjianRPL.MK";
            }
            else if($page == "deleteBarang"){
                echo "Hapus Barang| UjianRPL.MK";
            }
            else if($page == "home"){
                echo "HOME";
            }
        ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/9ed7f141a6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/akjpro/form-anticlear/base.js"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          },
          fontFamily: {
            'poppins' : ['Poppins','sans-serif'],
          },
        },
      },
    }
  </script>
  <style>

</style>

</head>
<body class="m-0 p-0 font-poppins "><!--flex flex-1 justify-center mt-[10vh] bg-[#333357]-->
    <?php
    if(isset($_GET['page'])){

        switch($page){
            case $page == "login":
                include "login.php";
                break;
            case $page == "tambahBarang":
                include "tambahBarang.php";
                break;
            case $page == "dataBarang":
                include "dataBarang.php";
                break;
            case $page == "editBarang":
                include "editBarang.php";
                break;
            case $page == "deleteBarang":
                include "deleteBarang.php";
                break;
            case $page == "home":
                include "home.php";
                break;
            default:
                include "login.php";
        }
    }
    ?>
</body>
</html>