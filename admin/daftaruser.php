<?php
$title = "Daftar User";
include 'nav_admin/header.php'
?> 
<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading"><strong>Data Pengguna</strong></div>
    <div class="panel-body">
       <table class="table table-hover table-responsive">
                  <thead>
                     <tr class="success">
                       <th>#</th>
                       <th>Nama</th>
                       <th>Username</th>
                       <th>Level</th>
                       <th><center>Aksi</center></th>
                     </tr>
                  </thead>
                        <?php 
                          include '../koneksi.php';
                          $no = 1;
                            $data = mysqli_query($koneksi,"SELECT * FROM users");
                            while($d = mysqli_fetch_array($data)){
                         ?>
                  <tbody>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['username']; ?></td>
                      <td><?php echo $d['level']; ?></td>
                      <td>
                        <center>
                          <a href="proses/edituser.php?id=<?php echo $d['id']; ?>" class="btn btn-warning">Ubah</a>

                          <a href="proses/prosesuser.php?act=delete&id=<?php echo $d['id']; ?>" class="btn btn-danger" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;">Hapus</a>
                        </center>
                      </td>
                    </tr>
                    <?php 
                  }
                     ?>                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
<?php include 'nav_admin/footer.php'; ?>