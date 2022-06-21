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
                <h3 class="card-title">Add Reservation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url().'backend/dashboard/booking_add_act'; ?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">User</label>
                      <div class="col-sm-10">
                          <select name="user" class="form-control">
                              <option value="" disabled selected>Choose User</option>
                              <?php foreach($user as $u){ ?>
                              <option value="<?php echo $u->user_id ?>"><?php echo $u->user_nama ?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <?php echo form_error('user'); ?>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Hotel</label>
                      <div class="col-sm-10">
                          <select name="hotel" class="form-control">
                              <option value="" disabled selected>Choose a hotel</option>
                              <?php foreach($hotel as $h){ ?>
                              <option value="<?php echo $h->hotel_id ?>"><?php echo $h->hotel_nama ?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <?php echo form_error('hotel'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nama Tamu</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nama"></div>
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="email"></div>
                    <?php echo form_error('email'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="hp"></div>
                    <?php echo form_error('hp'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Tanggal Checkin</label>
                    <div class="col-sm-10"><input type="date" class="form-control" name="tglcheckin"></div>
                  </div>
                  <?php echo form_error('tglcheckin'); ?>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Tanggal Checkout</label>
                    <div class="col-sm-10"><input type="date" class="form-control" name="tglcheckout"></div>
                  </div>
                  <?php echo form_error('tglcheckout'); ?>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">jumlah kamar</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="jmlkamar"></div>
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