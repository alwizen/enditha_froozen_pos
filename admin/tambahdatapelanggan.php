<?php 
$title = "Tambah pelanggan";
include 'nav_admin/header.php';
 ?>
<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-user"></span>  Form Tambah pelanggan</div>
  <div class="panel-body">
    <form class="form-horizontal" action="proses/prosespelanggan.php?act=input" method="POST">

    <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama pelanggan :</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control" placeholder="Nama pelanggan" name="nama_pelanggan" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Jenis Kelamin :</label>
      <div class="col-sm-6">          
        <select required name="jns_kel"  class="form-control" data-style="btn-primary">
            <option value="">- Pilih Jenis Kelamin -</option>
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Alamat :</label>
      <div class="col-sm-6">          
        <textarea type="text" class="form-control" id="" placeholder="Alamat" name="alamat" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">No Telp :</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control" id="" placeholder="No Telp" name="no_tlp" required>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-default" href="datapelanggan.php">Batal</a>
      </div>
    </div>
  </form>
  </div>
</div>
</div>
<?php 
include 'nav_admin/footer.php';
  ?>