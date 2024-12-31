</main>
<!--   Core JS Files   -->
<script src="<?= base_url('assets/dashboard/') ?>js/core/popper.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/core/bootstrap.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/plugins/chartjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/dashboard/') ?>js/plugins/swiper-bundle.min.js" type="text/javascript"></script>
<script>
    if (document.getElementsByClassName('mySwiper')) {
        var swiper = new Swiper(".mySwiper", {
            effect: "cards",
            grabCursor: true,
            initialSlide: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    };

    $(document).ready(function() {

        $('#select-tgl').change(function() {
            if (this.value == 0) {
                $('#formCetak').attr('action', "<?= base_url('cetak/cetak') ?>");
                $('input').attr('disabled', 'disabled');
            } else {
                $('#formCetak').attr('action', "<?= base_url('cetak/costumize') ?>");
                $('input').removeAttr('disabled');

            }
        })

        $('#select-bulan').change(function() {

            let tahun = $('#select-tahun').val();
            $.get("<?= base_url('cetak/getDay/') ?>" + this.value + "/" + tahun, function(val) {
                let data = JSON.parse(val);
                $('#select-tgl').html('');
                $('#select-tgl').append(`<option value="0">Tidak ada&emsp;</option>`);
                $.each(data, function(i, val_tgl) {
                    $('#select-tgl').append(`<option value="${val_tgl}">${val_tgl}&emsp;</option>`);

                })
            })

        })


    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/dashboard/') ?>js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>