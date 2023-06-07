<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="shortcut icon" href="<?= base_url() ?>/assets/img/api_icon.jpg" type="image/x-icon"> -->
  <title><?= $title ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.bootstrap4.min.css">


  <!-- Select2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
  <style>
    @keyframes pulse {
      0% {
        transform: scale(0.9);
      }

      100% {
        transform: scale(0.5);
      }
    }

    .pulse {
      width: 15px;
      height: 15px;
      background-color: red;
      border-radius: 10px;
      animation: 1s pulse infinite;
    }

    #table1 tr.selected,
    #table2 tr.selected,
    #example tr.selected,
    #example1 tr.selected,
    #example2 tr.selected,
    #example4 tr.selected,
    #table tr.selected {
      /* background-color: blue; */
      color: #fff;
      font-weight: bold;
      background: #007bff;
    }

    table.table-bordered.dataTable th,
    table.table-bordered.dataTable td {
      padding: 5px;
      padding-left: 10px;
      font-size: 20px;
    }

    table.dataTable thead>tr>th.sorting_asc,
    table.dataTable thead>tr>th.sorting_desc,
    table.dataTable thead>tr>th.sorting,
    table.dataTable thead>tr>td.sorting_asc,
    table.dataTable thead>tr>td.sorting_desc,
    table.dataTable thead>tr>td.sorting {
      font-size: 12px;
    }

    table.table-bordered.dataTable th,
    table.table-bordered.dataTable td {
      font-size: 12px;
    }

    .btn,
    .dataTables_info {
      font-size: 14px;
    }

    ::selection {
      background-color: red;
      color: #fff;
    }

    .form-control {
      font-size: 14px;
      padding: 3px 10px;
      height: max-content;
    }

    .select2-selection__rendered,
    div.dataTables_wrapper div.dataTables_filter label {
      font-size: 14px;
    }

    div.dt-button-collection .dt-button {
      min-width: 100px;
      font-size: 14px;
    }

    .form-control .select2 .select2-hidden-accessible option {
      font-size: 14px;
    }

    .custom-control-label:hover {
      cursor: pointer;
    }

    .red {
      color: red;
    }

    .nilai {
      text-align: right;
    }

    .animasi-warning {
      border: 2px solid red;
      border-radius: 10px;
      animation: 0.5s animasi-warning infinite;
    }

    @keyframes animasi-warning {
      0% {
        box-shadow: 0px 0px 2px red;
      }

      100% {
        box-shadow: 0px 0px 20px red;
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <input type="hidden" class="sts" value="<?= session()->getFlashdata('sts') ?>">
  <!-- Flashdata -->
  <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
  <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
  <div class="wrapper">
    <?= $this->include('layout/navbar') ?>
    <?= $this->include('layout/sidebar') ?>
    <?= $this->renderSection('content') ?>
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        SIPPOLSUB
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; <?= gettime()->getYear(); ?></strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
  </script>
  <!-- DataTables  & Plugins -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-select/js/dataTables.select.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url() ?>/adminlte/plugins/select2/js/select2.full.min.js"></script>
  <!-- Summernote -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/moment/moment.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?= base_url() ?>/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url() ?>/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- My script -->
  <script src="<?= base_url() ?>/assets/js/dashboard.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap.min.js"></script>
  <script>
    const showLoading = function() {
      Swal.fire({
        title: 'Loading......',
        showConfirmButton: false,
        allowEscapeKey: false,
        allowOutsideClick: false,
        timer: 2000
      })
    };
    const hideLoading = function() {
      Swal.close();
    };

    $('.select2').select2({
      placeholder: "-- Pilih --",
      allowClear: true
    });


    const sts = document.querySelector('.sts').value;
    if (sts == 1) {
      let audio = new Audio("<?= base_url() ?>/assets/audio/success.mp3");
      audio.play();
    }

    function previewImg() {
      const foto = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');
      const fileFoto = new FileReader();
      fileFoto.readAsDataURL(foto.files[0]);

      fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
      }
      const inputs = document.querySelectorAll('.form-control');

      for (const input of inputs) {
        if (input.value != '') {
          input.classList.add('is-valid');
        } else {
          input.classList.remove('is-valid');
        }
      }
    }

   
  </script>

</body>

</html>
