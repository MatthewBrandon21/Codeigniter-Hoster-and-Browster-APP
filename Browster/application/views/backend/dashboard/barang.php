<!-- Meta -->
<?php $this->load->view('backend/template/meta') ?>

<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('backend/template/navbar') ?>  

  <!-- Main Sidebar Container -->
  <?php $this->load->view('backend/template/sidebar') ?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $page_title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active"><?php echo $page_title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="card-title m-0 font-weight-bold text-danger">barang yang terdatar</h6>
                  <a href="<?php echo base_url().'backend/dashboard/barang_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add barang</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>  
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Deskripsi | Foto</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($barang as $h){ ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $h->barang_nama; ?></td>
                            <td><?php echo $h->barang_kategori; ?></td>
                            <td><?php echo $h->barang_jumlah; ?></td>
                            <td><?php echo 'Rp.'.number_format($h->barang_harga); ?></td>
                            <td><?php echo $h->barang_deskripsi; ?><br><?php echo '<img src="'. base_url().'uploads/'.$h->barang_foto.'"height=100 width=100></img>'; ?></td>
                            <td>
                            <a class="btn btn-success btn-sm" href="<?php echo base_url().'backend/dashboard/barang_edit/'.$h->barang_id; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'backend/dashboard/barang_hapus/'.$h->barang_id; ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                          </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                </div>
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Footer -->
  <?php $this->load->view('backend/template/footer') ?>  

</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('backend/template/js') ?>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>    
</body>
</html>