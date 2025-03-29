<script src="<?= asset('public/admin/assets/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?= asset('public/admin/assets/js/popper.js') ?>"></script>
<script src="<?= asset('public/admin/assets/js/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?= asset('public/admin/assets/js/grid.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-date.min.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-datepicker.min.js') ?>"></script>
<script src="<?= asset('public/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= asset('public/select2/js/select2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        CKEDITOR.replace('body')
        CKEDITOR.replace('introduction')
        $("#published_at_view").persianDatepicker({
            observer: true,
            format: "YYYY/MM/DD HH:mm:ss",
            toolbox: {
                calendarSwitch: {
                    enabled: true
                }
            },
            altField: '#published_at'
        })
    });
</script>

