<!-- Banner star-->
<section class="bg-light py-2">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active position-relative" data-bs-interval="10000">
                <img src="../public/upload/banners/slider_1.webp" class="d-block w-100" alt="...">
                <div class="d-none d-md-block position-absolute top-50 start-0 translate-middle-y">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item position-relative" data-bs-interval="2000">
                <img src="../public/upload/banners/slider_2.webp" class="d-block w-100" alt="...">
                <div class="d-none d-md-block position-absolute top-50 start-0 translate-middle-y">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item position-relative">
                <img src="../public/upload/banners/slider_1.webp" class="d-block w-100" alt="...">
                <div class="d-none d-md-block position-absolute top-50 start-0 translate-middle-y">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Banner end-->

<!-- Category start -->
<section class="cate-list bg-light py-2">
    <div class="container text-center">
        <div class="row my-4">
            <div class="col-lg-6 col-md-12">
                <div class="card text-bg-dark">
                    <img src="../public/upload/category/cate_1_img.webp" class="card-img" width="300" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Sản phẩm bán chạy</h5>
                        <p class="card-text">Tiện ích cho nhu cầu sinh hoạt hàng ngày. Giải pháp An toàn - Tiết kiệm
                        </p>
                        <p class="card-text"><small>Xem thêm</small></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6">
                <div class="card text-bg-dark">
                    <img src="../public/upload/category/cate_2_img.webp" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Đèn trang trí</h5>
                        <p class="card-text">Thẩm mỹ độc đáo</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6">
                <div class="card text-bg-dark">
                    <img src="../public/upload/category/cate_3_img.webp" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Đồ trang trí</h5>
                        <p class="card-text">Không gian nghệ thuật</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6">
                <div class="card text-bg-dark">
                    <img src="../public/upload/category/cate_4_img.webp" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Thiết bị vệ sinh</h5>
                        <p class="card-text">Đa dạng mẫu mã</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category end -->

<!-- promotion start -->
<section class="products bg-light py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Khuyến mãi đặc biệt</h2>
            <a href="" class="text-body">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="row">
            <?php foreach ($listItems as $item): ?>
                <div class="col-12 col-sm-6 col-lg-3 p-2 mb-2">
                    <div class="card position-relative" style="width: 100%;">
                        <div
                            class="position-absolute top-0 start-0 bg-sale fw-medium <?= $item['GiamGia'] > 0 ? '' : 'd-none' ?>">
                            <?= $item['GiamGia'] ?>%
                        </div>
                        <img src="<?= APPURL ?>public/upload/products/<?= $item['Anh'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="<?= APPURL ?>product/detail?id=<?= $item['Id'] ?>"
                                class="card-title h5 text-decoration-none overflow-auto" style="height: 3.5em;">
                                <?= $item['TenSanPham'] ?>
                            </a>
                            <p class="card-text"><strong>
                                    <?= $item['GiamGia'] > 0 ? number_format($item['DonGia'] * (1 - $item['GiamGia'] / 100), 0, ',', '.') : number_format($item['DonGia'], 0, ',', '.') ?>
                                    ₫
                                </strong> <span
                                    class="text-secondary text-decoration-line-through fw-normal <?= $item['GiamGia'] > 0 ? '' : 'd-none' ?>">
                                    <?= number_format($item['DonGia'], 0, ',', '.') ?> ₫
                                </span></p>
                            <a href="<?= APPURL ?>cart/add?id=<?= $item['Id'] ?>"
                                class="btn btn-primary container-fluid">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- promotion end -->

<!-- News start -->
<section class="news bg-light py-2">
    <div class="container">
        <div class="d-flex flex-column justify-content-between align-items-center">
            <h2>Tin tức mới nhất</h2>
            <span>Cập nhật những tin tức nội thất mới nhất hiện nay</span>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-4 px-4 mb-2">
                <div class="card" style="width: 100%;">
                    <img src="../public/upload/news/ban-lam-viec-xoay-360-do-13-min.webp" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <a href="" class="text-decoration-none text-body">
                            <h5 class="card-title">5+ Mẫu Bàn Làm Việc Xoay 360 Độ Linh Hoạt Thông Minh Nhất</h5>
                        </a>
                        <p class="day">20/09/2023</p>
                        <p class="card-text">Sự tiện dụng, thoải mái và thông minh luôn được đặt lên hàng đầu trong
                            xã hội ngày nay. Vì vậy, những món đồ nội thất mang lại sự tiện nghi và không quá đắt đỏ
                            luôn</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 px-4 mb-2">
                <div class="card" style="width: 100%;">
                    <img src="../public/upload/news/ban-lam-viec-xoay-360-do-13-min.webp" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <a href="" class="text-decoration-none text-body">
                            <h5 class="card-title">5+ Mẫu Bàn Làm Việc Xoay 360 Độ Linh Hoạt Thông Minh Nhất</h5>
                        </a>
                        <p class="day">20/09/2023</p>
                        <p class="card-text">Sự tiện dụng, thoải mái và thông minh luôn được đặt lên hàng đầu trong
                            xã hội ngày nay. Vì vậy, những món đồ nội thất mang lại sự tiện nghi và không quá đắt đỏ
                            luôn</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 px-4 mb-2">
                <div class="card" style="width: 100%;">
                    <img src="../public/upload/news/ban-lam-viec-xoay-360-do-13-min.webp" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <a href="" class="text-decoration-none text-body">
                            <h5 class="card-title">5+ Mẫu Bàn Làm Việc Xoay 360 Độ Linh Hoạt Thông Minh Nhất</h5>
                        </a>
                        <p class="day">20/09/2023</p>
                        <p class="card-text">Sự tiện dụng, thoải mái và thông minh luôn được đặt lên hàng đầu trong
                            xã hội ngày nay. Vì vậy, những món đồ nội thất mang lại sự tiện nghi và không quá đắt đỏ
                            luôn</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- News end -->