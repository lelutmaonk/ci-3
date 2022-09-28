<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <div>
                            <div class="text-muted">Copyright &copy; Your Website <?php echo date('Y')?></div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/vendor/js/scripts.js')?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/vendor/assets/demo/chart-area-demo.js')?>"></script>
        <script src="<?php echo base_url('assets/vendor/assets/demo/chart-bar-demo.js')?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/vendor/js/datatables-simple-demo.js')?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.form-check-input').on('click', function(){
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                    url: "<?php echo base_url('admin/changeccess')?>",
                    type: 'POST',
                    data: {
                        menuId: menuId,
                        roleId: roleId
                    },
                    success: function(){
                        document.location.href = "<?php echo base_url('admin/roleaccess/')?>" + roleId;
                    }
                });
            });
        </script>

    </body>
</html>