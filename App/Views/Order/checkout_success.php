<?php include './App/Views/Layout/homeHeader.php'; ?>

<div class="container mt-5 mb-5 text-center">
    <h2 class="text-success mb-4">🎉 Đặt hàng thành công!</h2>
    <p>Mã đơn hàng của bạn là: <strong>#<?= $orderId ?></strong></p>
    <a href="<?= $baseURL ?>home/index" class="btn btn-primary mt-3">🏠 Quay về trang chủ</a>

</div>

<?php include './App/Views/Layout/homeFooter.php'; ?>
