<script src="../js/bootstrap.js"></script>
<script src="../js/jquery-2.2.4.min.js"></script>
<script src="../js/virtual-select.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>