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
          <h1 class="m-0 text-dark">Welcome, <?php echo $this->session->userdata('nama'); ?>!</h1>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $this->m_booking->get_data('booking')->num_rows(); ?></h3>

                <p>Total Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url().'backend/dashboard/booking'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->m_booking->get_data('hotel')->num_rows(); ?></h3>

                <p>Total Hotel</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url().'backend/dashboard/hotel'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $this->m_booking->get_data('user')->num_rows(); ?></h3>

                <p>Total User Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url().'backend/dashboard/user'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $this->m_booking->edit_data(array('hotel_kamar'=>0),'hotel')->num_rows(); ?>/<?php echo $this->m_booking->get_data('hotel')->num_rows(); ?></h3>

                <p>Jumlah Kamar kosong</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url().'backend/dashboard/hotel'; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
              <div class="col-6">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">Hotel yang baru saja ditambahkan</h6>
                  </div>
                  <!-- Card Body -->
                  <ul class="list-group list-group-flush">
                  <?php foreach($hotel as $h){ ?>
                      <a href="backend/dashboard/hotel" class="list-group-item list-group-item-action">
                          <i class="fas fa-bed"></i> <?php echo $h->hotel_nama; ?>
                          <?php 
                              if($h->hotel_kamar >= 0){ 
                                  echo '<span class="badge badge-pill badge-success">Available</span>';
                              } else { 
                                  echo '<span class="badge badge-pill badge-danger">Not Available</span>'; 
                              } 
                          ?>
                      </a>
                  <?php } ?>
                  </ul>
                </div>
              </div>
          <!-- right col -->
          <div class="col-6">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">User yang baru saja ditambahkan</h6>
                  </div>
                  <!-- Card Body -->
                  <ul class="list-group list-group-flush">
                  <?php foreach($user as $u){ ?>
                      <a href="backend/dashboard/user" class="list-group-item list-group-item-action">
                          <i class="fas fa-users"></i> <?php echo $u->user_nama; ?>
                      </a>
                  <?php } ?>
                  </ul>
                </div>
              </div>
        </div>
        <div class="row">
          <div class="col">
          <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="card-title m-0 font-weight-bold text-danger">Recent Transactions</h6>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Transaction Date</th>
                          <th>Nama</th>
                          <th>Nomor HP</th>
                          <th>Tanggal Check In</th>
                          <th>Tanggal Check In</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($booking as $b){ ?>
                          <tr>
                            <td><?php echo date('d/m/Y',strtotime($b->booking_tgltransaksi)); ?></td>
                            <td><?php echo $b->booking_nama; ?></td>
                            <td><?php echo $b->booking_hp; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($b->booking_tglcheckin)); ?></td>
                            <td><?php echo date('d/m/Y',strtotime($b->booking_tglcheckout)); ?></td>
                            <td><?php echo 'Rp. '.number_format($b->booking_harga); ?></td>
                          </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
      </div>
      <script src="<?php echo base_url().'assets/'; ?>js/demo/chart-area-demo.js"></script>
      <!-- <script src="<?php echo base_url().'assets/'; ?>js/demo/chart-pie-demo.js"></script> -->
        <!-- /.row (main row) -->
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
