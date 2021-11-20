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
        <h1 class="h3 mb-2 text-gray-800">Thêm mới người dùng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Họ và tên<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_HOTEN" value="<?php echo set_value('HOTEN'); ?>" name="HOTEN">
                            </div>
                            <div class="name_error"><?php echo form_error('HOTEN'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Username<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="USERNAME" value="<?php echo set_value('USERNAME'); ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('USERNAME'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Password<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="param_PASSWORD" name="PASSWORD">
                            </div>
                            <div class="name_error"><?php echo form_error('PASSWORD'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Nhập lại mật khẩu<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="param_PASSCONF" name="PASSCONF">
                            </div>
                            <div class="name_error"><?php echo form_error('PASSCONF'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_DATE" class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_DATE" name="NGAYSINH">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_EMAIL" class="col-sm-2 col-form-label">Email<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_EMAIL" name="EMAIL" value="<?php echo set_value('EMAIL'); ?>">
                            </div>
                            <div class="name_error"><?php echo form_error('EMAIL'); ?></div>
                        </div>


                        <div class="mb-3 row">
                            <label for="param_NGAYTAO" class="col-sm-2 col-form-label">Ngày tạo</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_NGAYTAO" name="NGAYTAO">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_NGAYSUA" class="col-sm-2 col-form-label">Ngày sửa</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_NGAYSUA" name="NGAYSUA">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MAQUYEN" class="col-sm-2 col-form-label">Mã quyền<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_MAQUYEN" name="MAQUYEN">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_VAITRO" class="col-sm-2 col-form-label">Vai trò<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_VAITRO" name="VAITRO">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TRANGTHAI" name="TRANGTHAI">
                            </div>
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</html>