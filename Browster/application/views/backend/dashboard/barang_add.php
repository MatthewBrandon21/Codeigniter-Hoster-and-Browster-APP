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
        <div class="row">
          <div class="col-lg-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url().'backend/dashboard/barang_add_act'; ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nama"></div>
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10"><input type="number" class="form-control" name="jumlah"></div>
                    <?php echo form_error('jumlah'); ?>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10 pt-2">
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kategori" value="Console">
                              <label class="form-check-label">Console</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kategori" value="Mainan">
                              <label class="form-check-label">Mainan</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kategori" value="Pakaian">
                              <label class="form-check-label">Pakaian</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kategori" value="Other">
                              <label class="form-check-label">Other</label>
                          </div>
                      </div>
                      <?php echo form_error('kategori'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10"><input type="number" class="form-control" name="harga"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="deskripsi"></div>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Barang</button>
                </div>
              </form>
            </div>
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