<!-- Meta -->
<?php $this->load->view('frontend/template/meta') ?>

<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view('frontend/template/navbar') ?>  

  <!-- Main Sidebar Container -->
  <?php $this->load->view('frontend/template/sidebar') ?>  

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
                  <h6 class="card-title m-0 font-weight-bold text-danger">Daftar pinjam</h6>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>  
                          <th>Tanggal Transaksi</th>
                          <th>Nama User</th>
                          <th>Nama barang</th>
                          <th>Lama Pinjaman</th>
                          <th>Status</th>
                          <th>Harga</th>
                          <th>Invoice</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($pinjam as $b){ ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($b->pinjam_tgltransaksi)); ?></td>
                            <td><?php echo '<i class="fas fa-user"> </i> '.$b->user_nama; ?><br></td>
                            <td><?php echo '<i class="fas fa-bed"></i> '.$b->barang_nama; ?></td>
                            <td><?php echo $b->pinjam_hari; ?> hari</td>
                            <td><?php echo $b->pinjam_status; ?></td>
                            <td><?php echo 'Rp. '.number_format($b->pinjam_harga); ?></td>
                            <td>
                            <a class="btn btn-success btn-sm" href="<?php echo base_url().'laporan/cetak_invoice/'.$b->pinjam_id; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            </td>
                            <td>
                            <a class="btn btn-success btn-sm" href="<?php echo base_url().'frontend/dashboard/pinjam_edit/'.$b->pinjam_id; ?>">
                                <i class="fas fa-edit"></i>
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
  <?php $this->load->view('frontend/template/footer') ?>  

</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('frontend/template/js') ?>
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