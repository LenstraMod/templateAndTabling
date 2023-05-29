<?php
include "connection.php";
$id = $_GET['id'];
@session_start();

if($_SESSION['level'] != "admin"){
    ?>
    <script>
        alert("Login Terlebih Dahulu")
        document.location = "route.php?page=login";
    </script>
    <?php
}

$query = mysqli_query($conn,"DELETE FROM barang WHERE id_barang = $id");

if($query){
    ?>
   <style>
        .error{
            display:none;
        }
    </style>
    <div class="layering w-full h-screen top-0 opacity-[60%] bg-black absolute"></div>
    <div class="modals absolute rounded-md p-12 mt-[-80px] bg-[#545c69]">
        <div class="inModals">
            <h1 class="text-[#03C988] text-[50px]">Berhasil Dihapus</h1>
            <a href="route.php?page=dataBarang"><button class="text-white rounded-md border p-3 mt-12 hover:bg-[#dadce3] hover:text-black ease-in-out duration-300">Lihat data table</button></a>
        </div>
    </div>
    </style>
    <?php
}