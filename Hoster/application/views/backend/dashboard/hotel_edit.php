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
                <h3 class="card-title">Edit Hotel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach($hotel as $h){ ?>
                <?php echo form_open_multipart(base_url().'/backend/dashboard/hotel_update');?>
                <input type="hidden" name="id" value="<?php echo $h->hotel_id; ?>">
                <input type="hidden" name="old_image" value="<?php echo $h->hotel_foto; ?>">
                <div class="card-body">
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nama" value="<?php echo $h->hotel_nama; ?>"></div>
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Bintang</label>
                    <div class="col-sm-10"><input type="number" class="form-control" name="bintang" value="<?php echo $h->hotel_bintang; ?>"></div>
                    <?php echo form_error('bintang'); ?>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kota</label>
                      <div class="col-sm-10 pt-2">
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kota" value="Jakarta" <?php echo ($h->hotel_kota=='Jakarta') ? ' checked':''; ?>>
                              <label class="form-check-label">Jakarta</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kota" value="Semarang" <?php echo ($h->hotel_kota=='Semarang') ? ' checked':''; ?>>
                              <label class="form-check-label">Semarang</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kota" value="Surabaya" <?php echo ($h->hotel_kota=='Surabaya') ? ' checked':''; ?>>
                              <label class="form-check-label">Surabaya</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kota" value="Bali" <?php echo ($h->hotel_kota=='Bali') ? ' checked':''; ?>>
                              <label class="form-check-label">Bali</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kota" value="Tangerang" <?php echo ($h->hotel_kota=='Tangerang') ? ' checked':''; ?>>
                              <label class="form-check-label">Tangerang</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kota" value="Other" <?php echo ($h->hotel_kota=='Other') ? ' checked':''; ?>>
                              <label class="form-check-label">Other</label>
                          </div>
                      </div>
                      <?php echo form_error('kota'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="lokasi" value="<?php echo $h->hotel_lokasi; ?>"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Kamar</label>
                    <div class="col-sm-10"><input type="number" class="form-control" name="kamar" value="<?php echo $h->hotel_kamar; ?>"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10"><input type="number" class="form-control" name="harga" value="<?php echo $h->hotel_harga; ?>"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="deskripsi" value="<?php echo $h->hotel_deskripsi; ?>"></div>
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