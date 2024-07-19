<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pasar Tani - Verifikasi Kode OTP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Pasar Tani Kediri</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Verifikasi Kode OTP</h5>
                                        <p class="text-center small">Masukkan kode OTP yang telah dikirim ke email anda
                                        </p>
                                    </div>

                                    {{-- <form class="row g-3 needs-validation" novalidate method="POST"
                                        action="{{ route('verifikasikodeotp') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="otp" class="form-label">Kode OTP</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">#</span>
                                                <input type="text" name="otp"
                                                    class="form-control @error('otp') is-invalid @enderror"
                                                    id="otp" value="{{ old('otp') }}" required>
                                                <div class="invalid-feedback">Masukkan kode OTP Anda.</div>
                                            </div>
                                            @error('otp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Verifikasi</button>
                                        </div>
                                    </form> --}}
                                    <form id="otpForm" method="POST" action="{{ route('verifikasikodeotp') }}"
                                        class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="otp" class="form-label">Kode OTP</label>
                                            <div class="d-flex justify-content-center">
                                                <div class="otp-inputs">
                                                    @for ($i = 1; $i <= 4; $i++)
                                                        <input type="text" class="form-control otp-input"
                                                            id="otp{{ $i }}" name="otp[]" maxlength="1"
                                                            required>
                                                    @endfor
                                                </div>
                                                @error('otp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">Masukkan kode OTP Anda.</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                    <style>
                                        .otp-inputs {
                                            display: flex;
                                            justify-content: center;
                                            gap: 10px;
                                        }

                                        .otp-input {
                                            text-align: center;
                                            font-size: 1.5rem;
                                            width: 50px;
                                            height: 50px;
                                            border: 2px solid #ced4da;
                                            border-radius: 5px;
                                            transition: border-color 0.3s ease;
                                        }

                                        .otp-input:focus {
                                            border-color: #80bdff;
                                            outline: none;
                                        }
                                    </style>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const otpInputs = document.querySelectorAll('.otp-input');
                                            const otpForm = document.getElementById('otpForm');

                                            otpInputs.forEach((input, index) => {
                                                input.addEventListener('input', function() {
                                                    // Hapus spasi tambahan jika ada
                                                    this.value = this.value.replace(/\s/g, '');

                                                    // Jika ada nilai, pindah ke input berikutnya
                                                    if (this.value.length === 1 && index < otpInputs.length - 1) {
                                                        otpInputs[index + 1].focus();
                                                    }

                                                    // Jika semua input sudah terisi, kirim form
                                                    if (Array.from(otpInputs).every(input => input.value.length === 1)) {
                                                        otpForm.submit();
                                                    }
                                                });

                                                input.addEventListener('keydown', function(event) {
                                                    // Jika tombol Backspace ditekan dan input kosong, pindah ke input sebelumnya
                                                    if (event.key === 'Backspace' && this.value === '' && index > 0) {
                                                        otpInputs[index - 1].focus();
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Cek jika ada pesan error untuk login
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('daftarLink').addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Daftar sebagai?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Kelompok Tani',
                    cancelButtonText: 'Masyarakat'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to daftar-tani route
                        window.location.href = "{{ route('daftar-tani') }}";
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Redirect to daftar route
                        window.location.href = "{{ route('daftar') }}";
                    }
                });
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

</body>

</html>
