<?php 
?>

<section class="vh-100">
    <div class="container text-black">

        <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
            <span class="h1 fw-bold mb-0">Chào mừng bạn</span>
        </div>

        <div class="align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form method="POST" action="modules/xulytaikhoan.php" enctype="multipart/form-data">

                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng ký tài khoản</h3>
                <div class="row">

                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" />
                            <label class="form-label">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input name="phone" class="form-control form-control-lg" />
                            <label class="form-label">Số điện thoại</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password" class="form-control form-control-lg" />
                            <label class="form-label">Mật khẩu</label>
                        </div>
                        <div class="pt-1 mb-4">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block"
                                type="submit" name="dangky">Đăng ký</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <input type="file" name="hinhanh" class="form-control form-control-lg" />
                            <label class="form-label">Ảnh đại diện</label>
                        </div>
                        <div class="avt">
                        <img src="pages/main_content/avatar.jpg" class="rounded-circle"
                            style="width: 180px;" alt="" />
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</section>