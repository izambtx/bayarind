<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="icon" type="img/x-icon" href="/img/favicon.ico">

    <!-- Custom fonts for this template-->
    <link href="<?php base_url(); ?>/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link type="text/css" href="<?php base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="card mt-5 align-items-center justify-content-center p-5 rounded-lg">
                <div class="card-body">
                    <form action="" method="post" class="mx-auto text-center mb-5">
                        <h1 class="text-center">Masukan Jumlah Belanja</h1>
                        <div class="d-flex justify-content-center mx-5">
                            <input class="form-control my-3 mr-5" type="number" name="totalBelanja" id="totalBelanja" required placeholder=" Jumlah Uang…" autofocus>
                            <button type="submit" class="btn btn-primary px-5 my-3 ml-5">Hitung</button>
                        </div>
                    </form>
                    <div class="mx-auto text-center mt-5">
                        <p>Kemungkinan Pembayaran <?php if (!empty($totalBelanja)) : ?> dari <b class="text-primary"> <?= "Rp" . number_format($totalBelanja, 2, ',', '.'); ?></b><?php endif; ?></p>
                        <button data-toggle="modal" data-target="#modalUangPas" class="btn btn-primary mx-3 my-3 rounded px-5 py-3">UANG PAS</button>
                        <?php if (!empty($kemungkinanPembayaran)) : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($kemungkinanPembayaran as $combination) : ?>
                                <button style="opacity: 0.5;" data-toggle="modal" data-target="#modal<?= $i; ?>" class="btn btn-secondary mx-3 my-3 rounded px-5 py-3"><?= "Rp" . number_format($combination, 2, ',', '.'); ?></button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Jumlah Kembalian dari Total Belanja</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                $kembalian = $combination - $totalBelanja;
                                                ?>
                                                <p class="my-auto">Kembalian Anda Adalah : <b class="text-primary"><?= "Rp" . number_format($kembalian, 2, ',', '.'); ?></b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Ok</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                            <!-- Modal -->
                            <div class="modal fade" id="modalUangPas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jumlah Kembalian dari Total Belanja</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="my-auto">Anda Memasukan Uang Pas : <b class="text-primary"><?= "Rp" . number_format($totalBelanja, 2, ',', '.'); ?></b></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="<?php base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src="<?php base_url(); ?>/js/scripts.js"></script>

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="<?php base_url(); ?>/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php base_url(); ?>/js/sweetalert2.min.css">

    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php base_url(); ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php base_url(); ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php base_url(); ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?php base_url(); ?>/js/demo/chart-pie-demo.js"></script>
    <script src="<?php base_url(); ?>/js/demo/chart-bar-demo.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.js"></script> -->

    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/g/filesaver.js"></script>
    <!-- SMOOTH SCROLL -->
    <script src="<?php base_url(); ?>/js/smooth-scroll.js"></script>
</body>

</html>