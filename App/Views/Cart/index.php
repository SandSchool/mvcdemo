<?php
$config = require 'config.php';
$base = $config['base'];
$baseURL = $config['baseURL'];
$assets = $config['assets'];

include './App/Views/Layout/homeHeader.php';
?>

<!-- Section: Cart -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="mb-4 text-center">🛒 Giỏ hàng của bạn</h2>

        <?php if (empty($cartItems)): ?>
            <div class="alert alert-info text-center">
                Chưa có sản phẩm nào trong giỏ hàng.
            </div>
        <?php else: ?>
            <?php $grandTotal = 0; ?>

            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): 
                        $total = $item['Price'] * $item['quantity'];
                        $grandTotal += $total;
                    ?>
                        <tr>
                            <td><?= $item['Name'] ?></td>
                            <td><?= number_format($item['Price'], 0) ?> VNĐ</td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= number_format($total, 0) ?> VNĐ</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="table-secondary">
                        <th colspan="3" class="text-end">Tổng cộng:</th>
                        <th><?= number_format($grandTotal, 0) ?> VNĐ</th>
                    </tr>
                </tfoot>
            </table>

            <!-- Nút checkout -->
            <div class="text-end">
                <a href="<?= $baseURL ?>order/checkout" class="btn btn-success">🛍️ Tiến hành thanh toán</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include './App/Views/Layout/homeFooter.php'; ?>