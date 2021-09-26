<?php 
//mengecek session
 session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
include 'koneksi.php';
include 'template/header.php';

?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<nav class="navbar navbar-expand navbar-dark bg-dark" style="background-color:#181D33 !important;">
<div class="container">

  <div class="container font-weight-bold">
    <div class="navbar-nav mr-auto">
      <a target="_blank" class="nav-item nav-link" href="https://www.facebook.com/lsptd/" title="facebook"><i class="fab fa-facebook-f"></i></a>
        <a target="_blank" class="nav-item nav-link" href="https://www.instagram.com/lsp.td/" title="instagram"><i class="fab fa-instagram"></i></a>
        <a target="_blank" class="nav-item nav-link" href="https://www.youtube.com/channel/UCzzAznco5deIbDVZS4acb9w" title="youtube"><i class="fab fa-youtube"></i></a>
        <a class="nav-item nav-link lsp-bnsp-link" href="#" title="BNSP">BNSP-LSP-1565-ID</a>
      </div>
      <div class="navbar-nav ml-auto responsive">
        <a class="nav-item nav-link" href="pilih-login.php">Login</a>
        <a class="nav-item nav-link" href="registrasi.php">Registrasi</a>
      </div>
            </div>
          </div>
          </nav>

<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
  <div class="container">

  <a class="navbar-brand" href="#">LSP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto responsive">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PROFIL
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="visi_misi.php">VISI & MISI</a>
          <a class="dropdown-item" href="mitra.php">MITRA KERJA</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SERTIFIKASI
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="skema.php">SKEMA SERTIFIKASI</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          INFORMASI
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">ARTIKEL</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">CONTACT</a>
      </li>
      <?php if(isset($_SESSION['username'])){
        echo '<li class="nav-item active">
        <a class="nav-link" href="logout.php">LOGOUT</a>
      </li>';
      } ?>
      <!--  -->
    </ul>
  </div>
  </div>
</nav>



  <div class="container py-4">
<?php 
if (isset($_SESSION['username'])){
    echo '<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="fas fa-user"></i>' .  ucfirst($_SESSION['username']) .'</h5>
                  Selamat Datang.
                </div>';
    }
?>
    <div class="row mb-4 pt-4">
      <div class="col text-center">
        <h2>Daftar Peserta Sertifikasi</h2>
      </div>
    </div>
    <div class="row mb-4">
    <div class="col-sm-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Skema</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Ho HP</th>
            <th>Asal Sekolah / Perguruan Tinggi</th>
            <th>Aksi</th>
          </tr>
          <?php 
          $no=1;
          $sql=mysqli_query($koneksi,"SELECT * FROM peserta inner join skema on skema.id_skema=peserta.id_skema");
          while($d=mysqli_fetch_assoc($sql)){
          ?>
          <tbody>
            <td><?php echo $no++ ?></td>
            <td><?php echo $d['nama'] ?></td>
            <td><?php echo $d['nama_skema'] ?></td>
            <td><?php echo $d['email'] ?></td>
            <td><?php echo $d['alamat'] ?></td>
            <td><?php echo $d['nohp'] ?></td>
            <td><?php echo $d['asal_sekolah'] ?></td>
            <td>
              <a href="edit_peserta.php?id=<?php echo $d['id_peserta']?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="hapus_peserta.php?id=<?php echo $d['id_peserta']?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
            </td>
          </tbody>
          <?php } ?>
        </thead>
      </table>
    </div>
    </div>
  </div>

<!-- akhir bagian artikel -->

<footer class="bg-light">
  <div class="container pt-4">
    <div class="row">
      <div class="col-md-6 col-lg-2 pt-3">
        <h5 class="text-info">Mitra LSP</h5>
        <hr class="bg-secondary">
        <div class="navbar-nav">
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-2 pt-3">
        <h5 class="text-info">Link Popular</h5>
        <hr class="bg-secondary">
        <div class="navbar-nav">
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
          <a href="" class="text-secondary nav-item nav-link">LSP Migas</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 pt-3">
        <h5 class="text-info">Kontak</h5>
        <hr class="bg-secondary">
        <div>
          <p class="d-flex flex-row text-secondary">
            <span class="d-flex align-items-center h4">
              <i class="fas fa-map-marked-alt"></i>
            </span>
            <span class="pl-3">
              Jakarta : Pulogebang Indah Blok J11 No 34, Jakarta Timur, 021-22859837
            </span>
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 pt-3">
        <h5 class="text-info">Pesan</h5>
        <hr class="bg-secondary">
        <!-- email -->
        <form action="proses_pesan.php" method="POST">
          <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>
            </div>
            <div class="col-sm-12">
               <div class="form-group">
            <label for="">Pesan</label>
            <textarea type="text" name="pesan" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </div>
        </form>
      </div>
      </div>
      <hr class="bg-secondary">
      <div class="row">
        <div class="col-md-6">
          <p class="text-secondary">
            © Copyright 2021 - 
            <a href="">Indonesia</a>
          </p>
        </div>
        <div class="col-md-6 text-md-right mb-2">
          <p class="text-secondary">
            <a href="" target="_blan"></a>
            <img src="img/playstore.png" width="100px">
          </p>
        </div>
      </div>
  </div>
  
</footer>

</div>
<!-- ./wrapper -->
<?php 
include 'template/footer.php';
?>
</body>
</html>
