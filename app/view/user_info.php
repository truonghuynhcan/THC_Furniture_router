<!-- Breadcrumb star-->
<section class="position-relative">
    <img src="../public/upload/banners/breadcrumb.webp" class="w-100" alt="">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb"
        class="position-absolute top-50 start-50 translate-middle d-flex flex-column align-items-center">
        <h1>Trang khách hàng</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-primary">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Trang khách hàng</li>
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
                            <a href="<?=APPURL?>user/info" class="list-group-item list-group-item-action active" aria-current="true">
                                Thông tin tài khoản
                            </a>
                            <a href="<?=APPURL?>user/info_order" class="list-group-item list-group-item-action">Đơn hàng</a>
                            <a href="<?=APPURL?>user/info_changePass" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                            <a href="<?=APPURL?>user/logout" class="list-group-item list-group-item-action">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-9">
                <h2>Thông tin tài khoản</h2>
                <?php checkNoti();?>
                <form action="<?=APPURL?>user/info" method="post" class="row g-3">
                    <div class="col-md-12">
                        <label for="fullname" class="form-label">Họ và tên</label>
                        <input type="fullname" class="form-control" id="fullname" name="fullname"
                            value="<?= $user['HoVaTen'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="<?= $user['Email'] ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" value="" disabled> -->
                    </div>
                    <div class="col-md-3">
                        <label for="tel" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="tel" name="tel" value="<?= $user['SDT'] ?>">
                    </div>
                    <div class="col-9"></div>
                    <div class="col-md-9">
                        <label for="inputAddress" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="inputAddress" name="address"
                            value="<?= $user['DiaChi'] ?>">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </div>
                    <!-- <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div> -->

                </form>
            </div>
        </div>
    </div>
</section>
<!-- cart end -->