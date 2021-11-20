<html>
<style>
    .name_error {
        color: red;
        margin-left: 12px;
    }

    .important {
        color: red;
    }
</style>
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php echo $message; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu người dùng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?php echo $info->EMAIL; ?>" aria-label="Disabled input example" disabled readonly>
                            </div>
                            <div class="name_error"><?php echo form_error('HOTEN'); ?> </div>
                        </div>

                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Họ và tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_HOTEN" value="<?php echo $info->HOTEN; ?>" name="HOTEN">
                            </div>
                            <div class="name_error"><?php echo form_error('HOTEN'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="USERNAME" value="<?php echo $info->USERNAME; ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('USERNAME'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_DATE" class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_DATE" name="NGAYSINH" value="<?php echo $info->NGAYSINH; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MAQUYEN" class="col-sm-2 col-form-label">Mã quyền</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_MAQUYEN" name="MAQUYEN" value="<?php echo $info->MAQUYEN; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_VAITRO" class="col-sm-2 col-form-label">Vai trò</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_VAITRO" name="VAITRO" value="<?php echo $info->VAITRO; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Xác nhận mật khẩu<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="param_PASSWORD" name="PASSWORD">
                            </div>
                        </div>

                        <div class="col text-center">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</html>