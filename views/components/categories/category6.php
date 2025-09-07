<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '/../../components/header.php'; ?>

<body>

    <!-- navbar -->
    <?php include __DIR__ . '/../../components/navbar.php'; ?>


    <!-- Category items -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php include __DIR__ . '/../../components/shop_item_constructor.php'; ?>
    </div>  


    <!-- Footer -->
    <?php include __DIR__ . '/../../components/footer.php'; ?>

</body>
</html>