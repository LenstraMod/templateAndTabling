<div class="container-fluid pt-5 px-5">
    <div class="row">
        <div class="col">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- Get Teacher's ID -->
              <?php
                include "./connection.php";
                $query = mysqli_query($conn,"SELECT * FROM tbl_guru");
              ?>
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Depan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Depan" name="nama_depan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Belakang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Belakang" name="nama_belakang">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Wali Kelas</label>
                    <select name="walikelas" class="form-control">
                        <option value="none">--Pilih Wali Kelas--</option>
                        <?php
                            while($data = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $data['id_guru']; ?>"><?php echo $data['nama_lengkap']; ?></option>
                                <?php
                            }
                        ?>
                        
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="no_hp" placeholder="No Hp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal_lahir" placeholder="Tanggal Lahir">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <div class="radio">
                        <div class="male">
                            <input type="radio" name="gender" value="laki-laki">
                            <label for="gender">Laki laki</label>
                        </div>
                        <div class="female">
                            <input type="radio" name="gender" value="perempuan">
                            <label for="gender">Perempuan</label>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label><br>  
                    <textarea name="alamat" cols="50" rows="5" class="form-control" placeholder="Alamat"></textarea>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<?php

if(isset($_POST['submit'])){
  $nama_depan = $_POST['nama_depan'];
  $nama_belakang = $_POST['nama_belakang'];
  $walikelas = $_POST['walikelas'];
  $no_hp = $_POST['no_hp'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $gender = $_POST['gender'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn,"INSERT INTO tbl_siswa VALUES('','$walikelas','$nama_depan','$nama_belakang','$no_hp','$tanggal_lahir','$gender','$alamat')");
}