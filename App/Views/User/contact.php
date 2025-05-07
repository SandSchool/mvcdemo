<?php
$config = require 'config.php';
$baseURL = $config['baseURL'];
?>

<?php include './App/Views/Layout/homeHeader.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Liên hệ với chúng tôi</h3>
                </div>
                <div class="card-body">

                    <?php if (!empty($_SESSION['contact_success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['contact_success'] ?></div>
                        <?php unset($_SESSION['contact_success']); ?>
                    <?php endif; ?>

                    <?php if (!empty($_SESSION['contact_error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['contact_error'] ?></div>
                        <?php unset($_SESSION['contact_error']); ?>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên của bạn</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Nhập tên của bạn">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email của bạn</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email của bạn">
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="subject" name="subject" required placeholder="Nhập tiêu đề">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Nhập nội dung liên hệ"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Gửi liên hệ</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include './App/Views/Layout/homeFooter.php'; ?>
