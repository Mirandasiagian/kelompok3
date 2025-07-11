<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="row justify-content-lg-center">
        <div class="col-lg-5 mb-4">
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian</h1>
            </div>
          </div>

          <div class="card border-0 shadow-sm">
            <div class="card-body text-center d-grid p-5">
              <select class="form-select mb-3" aria-label="Pilih Loket" name="loket">
                <option selected disabled>Pilih Loket</option>
                <option value="1">Loket 1</option>
                <option value="2">Loket 2</option>
                <option value="3">Loket 3</option>
                <!-- tambahkan opsi lain jika diperlukan -->
              </select>

              <select class="form-select mb-3" aria-label="Pilih Pelayanan" name="pelayanan">
                <option selected disabled>Pilih Pelayanan</option>
                <option value="Konsultasi">Konsultasi</option>
                <option value="pengaduan">Pengaduan</option>
                <option value="pembayaran">Pembayaran</option>
                <!-- tambahkan opsi lain jika diperlukan -->
              </select>
              <!-- button pengambilan nomor antrian -->
              <a id="insert" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2025 - <a href="" target="_blank" class="text-danger text-decoration-none">Kelompok 3</a>. Pemograman Web 2
      </div>
    </div>
  </footer>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // Tampilkan jumlah antrian
      $('#antrian').load('get_antrian.php');

      // Proses insert data
      $('#insert').on('click', function() {
        // Menonaktifkan tombol
        $(this).prop('disabled', true);

        // Mengambil data pelayanan dan loket yang dipilih
        var selectedLoket = $('select[name=loket]').val();
        var selectedPelayanan = $('select[name=pelayanan]').val();

        // Ajax request untuk mengirim data ke server
        $.ajax({
          type: 'POST',
          url: 'insert.php',
          data: {
            loket: selectedLoket,
            pelayanan: selectedPelayanan
          },
          success: function(result) {
            // Jika berhasil
            if (result === 'Sukses') {
              // Tampilkan jumlah antrian
              $('#antrian').load('get_antrian.php').fadeIn('slow');
              // Nonaktifkan handler klik setelah pengambilan antrian berhasil
              $('#insert').off('click');
              // Redirect ke halaman selanjutnya
              window.location.href = 'success.php';
            }
          },
        });
      });
    });
  </script>
</body>

</html>