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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url().'backend/dashboard/user_add_act'; ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="username"></div>
                    <?php echo form_error('username'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nama"></div>
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="email"></div>
                    <?php echo form_error('email'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="alamat"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="hp"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
                    <?php echo form_error('password'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Retype Password</label>
                    <div class="col-sm-10"><input type="password" class="form-control" name="ulang_pass"></div>
                    <?php echo form_error('ulang_pass'); ?>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
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