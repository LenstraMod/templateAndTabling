<div class="edit-container">
    <div class="edit-warpper">
        <div class="inEdit w-[100vh] rounded-md shadow-2xl p-12 bg-[#0f102c]">
            <?php
            include "connection.php";
            @session_start();

            if($_SESSION['level'] != "admin"){
                ?>
                <script>
                    alert("Login Terlebih Dahulu")
                    document.location = "route.php?page=login";
                </script>
                <?php
            }
                $id = $_GET['id'];

                $query = mysqli_query($conn,"SELECT * FROM barang WHERE id_barang = $id");
                $data = mysqli_fetch_array($query);
            ?>
            <h1 class="font-bold text-white text-[35px] mb-12">Edit Barang</h1>
           <form method="post" class="flex flex-1 flex-col gap-[30px] text-black form-anticlear">
                <label for="nama barang" class="text-white">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo $data['nama_barang'];  ?>" class="border-2 border-white p-3 rounded-md outline-none focus:border-[#19A7CE] ease-in-out duration-300" placeholder="Nama Barang">
                <label for="Kategori Barang" class="text-white">Kategori Barang</label>
                <input type="text" name="kategori_barang" value="<?php echo $data['kategori_barang'];  ?>" class="border-2 border-white p-3 rounded-md outline-none focus:border-[#19A7CE] ease-in-out duration-300" placeholder="Nama Barang">
                <label for="Jumlah Barang" class="text-white">Jumlah Barang</label>
                <input type="text" name="jumlah_barang" value="<?php echo $data['jumlah_barang'];  ?>" class="border-2 border-white p-3 rounded-md outline-none focus:border-[#19A7CE] ease-in-out duration-300" placeholder="Nama Barang">
                <label for="Tanggal Masuk" class="text-white">Tanggal Masuk</label>
                <input type="datetime-local" name="tanggal_masuk" value="<?php echo $data['tanggal_masuk'];  ?>" class="border-2 border-white p-3 rounded-md outline-none focus:border-[#19A7CE] ease-in-out duration-300" placeholder="Nama Barang">
                <div class="btn flex justify-center">
                    <button type="submit" name="submitted_update" class="border-2 border-white text-white p-3 rounded-md w-[50%] mt-10 hover:bg-white hover:text-black ease-in-out duration-300">Update</button>
                </div>
           </form>
        </div>
    </div>
</div>

<?php

if(isset($_POST['submitted_update'])){
    $nama_barang = $_POST['nama_barang'];
    $kategori_barang = $_POST['kategori_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    ?>
        <div class="error absolute py-8 px-12 mt-[-70px] rounded-md bg-[#FF3333] ">
        <div class="inErr">
        <i class="fa-solid fa-circle-exclamation mx-[40%]"></i><p id="err" class="text-white"></p>
        </div>
    </div>
    <?php

    if(empty($nama_barang)){
        ?>
        <script>
            document.getElementById('err').innerHTML = "Isi Nama Barang"
        </script>
        <?php
    }
    else if(empty($kategori_barang)){
        ?>
        <script>
            document.getElementById('err').innerHTML = "Isi Kategori Barang"
        </script>
        <?php
    }
    else if(empty($jumlah_barang)){
        ?>
        <script>
            document.getElementById('err').innerHTML = "Isi Jumlah Barang"
        </script>
        <?php
    }
    else if(empty($tanggal_masuk)){
        ?>
        <script>
            document.getElementById('err').innerHTML = "Isi Tanggal Masuk"
        </script>
        <?php
    }
    else{
        $update = mysqli_query($conn,"UPDATE barang SET nama_barang = '$nama_barang',kategori_barang = '$kategori_barang',jumlah_barang = '$jumlah_barang',tanggal_masuk = '$tanggal_masuk' WHERE id_barang = $id");

        if($update){
            ?>
             <style>
                .error{
                    display:none;
                }
            </style>
            <div class="layering w-full h-screen top-0 opacity-[60%] bg-black absolute"></div>
            <div class="modals absolute rounded-md p-12 mt-[-80px] bg-[#545c69]">
                <div class="inModals">
                    <h1 class="text-[#03C988] text-[50px]">Data Berhasil Diubah</h1>
                    <a href="route.php?page=dataBarang"><button class="text-white rounded-md border p-3 mt-12 hover:bg-[#dadce3] hover:text-black ease-in-out duration-300">Lihat data table</button></a>
                </div>
            </div>
            <?php
        }
    }
}