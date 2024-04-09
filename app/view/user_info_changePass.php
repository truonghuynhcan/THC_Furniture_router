<!-- Breadcrumb star-->
<section class="position-relative">
    <img src="<?= APPURL ?>public/upload/banners/breadcrumb.webp" class="w-100" alt="">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb"
        class="position-absolute top-50 start-50 translate-middle d-flex flex-column align-items-center">
        <h1>Trang đổi mật khẩu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= APPURL ?>" class="text-primary">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Trang đổi mật khẩu</li>
        </ol>
    </nav>
</section>
<!-- Breadcrumb end-->

<!-- cart star -->
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-body-secondary">Xin chào</h6>
                        <h5 class="card-title">Trương Huỳnh Can</h5>
                        <div class="list-group list-group-flush mt-4">
                            <a href="<?= APPURL ?>user/info" class="list-group-item list-group-item-action "
                                aria-current="true">
                                Thông tin tài khoản
                            </a>
                            <a href="<?= APPURL ?>user/info_order"
                                class="list-group-item list-group-item-action ">Đơn hàng</a>
                            <a href="<?= APPURL ?>user/info_changePass"
                                class="list-group-item list-group-item-action active">Đổi mật
                                khẩu</a>
                            <a href="<?= APPURL ?>user/logout" class="list-group-item list-group-item-action">Đăng
                                xuất</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <h2>Đổi mật khẩu</h2>
                <p>Để đảm bảo tính bảo mật bạn vui lòng đặt lại mật khẩu với ít nhất 8 kí tự</p>
                <?php checkNoti();?>
                <form action="<?=APPURL?>user/info_changePass" method="post" class="login">
                    <div class="form-floating mb-3 border-bottom border-primary">
                        <input type="password" class="form-control" id="pwd_old" name="pwd_old">
                        <label for="pwd_old">Mật khẩu cũ *</label>
                    </div>
                    <div class="form-floating mb-3 border-bottom border-primary">
                        <input type="password" class="form-control" id="pwd_new" name="pwd_new">
                        <label for="pwd_new">Nhập khẩu mới *</label>
                    </div>
                    <div class="form-floating mb-3 border-bottom border-primary">
                        <input type="password" class="form-control" id="repwd_new" name="repwd_new">
                        <label for="repwd_new">Xác nhận lại mật khẩu *</label>
                    </div>
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- cart end -->