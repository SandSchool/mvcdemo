<?php
include_once __DIR__ . "/../Layout/header.php";


// var_dump($productList);

?>

<div class="panel panel-default">
    <div class="panel-heading">Danh sách sản phẩm</div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productList as $item) {
                ?>
                    <tr>
                        <td><?= $item['Id'] ?></td>
                        <td><?= $item['Name'] ?></td>
                        <td><?= $item['Price'] ?></td>
                        <td><?= $item['Image'] ?></td>
                        <td>
                        <form action="delete" method="POST">
                            <input type="hidden" 
                            name="ProductID" 
                            value="<?= $item['Id'] ?>" />
                            <button type="submit"                                 
                                style="border: none; background: none; 
                                        cursor: pointer;">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<?php
include_once __DIR__ . "/../Layout/footer.php";
