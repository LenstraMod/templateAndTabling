<div class="container-barang">
    <div class="wrapper-barang">
        <div class="inBarang">
            <table class="border-collapse border border-slate-400 text-white bg-[#404152]">
                <thead>
                    <tr>
                        <th class="border border-slate-300 p-3">No</th>
                        <th class="border border-slate-300 p-3">Nama Barang</th>
                        <th class="border border-slate-300 p-3">Kategori Barang</th>
                        <th class="border border-slate-300 p-3">Jumlah Barang</th>
                        <th class="border border-slate-300 p-3">Tanggal Masuk Barang</th>
                        <th class="border border-slate-300 p-3">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
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

                    $query = mysqli_query($conn,"SELECT * FROM barang");
                    $no = 1;

                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td class="border border-slate-300"><?php echo $no++ ?></td>
                        <td class="border border-slate-300"><?php echo $data['nama_barang']; ?></td>
                        <td class="border border-slate-300"><?php echo $data['kategori_barang']; ?></td>
                        <td class="border border-slate-300"><?php echo $data['jumlah_barang']; ?></td>
                        <td class="border border-slate-300"><?php echo $data['tanggal_masuk']; ?></td>
                        <td class="border border-slate-300">                         
                            <a href="route.php?page=editBarang&&id=<?php echo $data['id_barang']; ?>"><button class="px-6 py-2 m-3 bg-[#FED049] rounded-md text-black">Edit</button>
                            <a href="route.php?page=deleteBarang&&id=<?php echo $data['id_barang']; ?>"><button name="delete" class="px-6 py-2 m-3 bg-[#FF3333] rounded-md text-black">Delete</button></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <form method="post" class="flex flex-1 flex-col">
                <div class="btn-1">
                <button>
                    <a href="route.php?page=tambahBarang">
                        <div class="adding px-12 py-11 bg-[#191d38] shadow-2xl absolute bottom-12 right-10 cursor-pointer rounded-full">
                        <i class="fa-solid fa-plus fa-2xl"  style="color: #ffffff;"></i>
                        </div>
                    </a>
                </button>
                </div>
                <div class="btn-2">
                <button name="logout">
                    <div class="logout px-12 py-11 bg-[#191d38] shadow-2xl absolute bottom-12 right-[10vw] cursor-pointer rounded-full">
                    <i class="fa-solid fa-power-off fa-2xl" style="color: #ffffff;"></i>
                    </div>
                </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['logout'])){
    @session_destroy();
    ?>
        <style>
            .error{
                display:none;
            }
        </style>
        <div class="layering w-full h-screen top-0 opacity-[60%] bg-black absolute"></div>
        <div class="modals absolute rounded-md p-12 mt-[-80px] bg-[#545c69]">
            <div class="inModals">
                <h1 class="text-[#03C988] text-[50px]">Anda Telah Log Out</h1>
                <a href="route.php?page=login"><button class="text-white rounded-md border p-3 mt-12 hover:bg-[#dadce3] hover:text-black ease-in-out duration-300">Kembali ke halaman Login</button></a>
            </div>
        </div>
    <?php
}