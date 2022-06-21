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
              <li class="breadcrumb-item">Home/li>
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
                <h3 class="card-title">Edit user</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach($user as $u){ ?>
                <?php echo form_open_multipart(base_url().'/backend/dashboard/user_update');?>
                <input type="hidden" name="id" value="<?php echo $u->user_id; ?>">
                <input type="hidden" name="old_image" value="<?php echo $u->user_foto; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="username" value="<?php echo $u->user_username; ?>"></div>
                    <?php echo form_error('username'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nama" value="<?php echo $u->user_nama; ?>"></div>
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="email" value="<?php echo $u->user_email; ?>"></div>
                    <?php echo form_error('email'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="alamat" value="<?php echo $u->user_alamat; ?>"></div>
                    <?php echo form_error('alamat'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="hp" value="<?php echo $u->user_hp; ?>"></div>
                    <?php echo form_error('hp'); ?>
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="userfile">
							    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" value="upload" class="btn btn-primary">Save Changes</button>
                </div>
                <?php echo form_close();?>
              <?php } ?>
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