<html>

<head>
    <?php $this->load->view('admin/head'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('admin/left'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('admin/header'); ?>
                <!-- content -->
                <?php $this->load->view($temp); ?>
                <!-- end content -->
                <?php $this->load->view('admin/footer'); ?>
            </div>

        </div>


    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo admin_url('login'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/js/demo/chart-pie-demo.js"></script>
     <!-- Page table level plugins -->
     <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page table level custom scripts -->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/js/demo/datatables-demo.js"></script>


</body>

</html>