<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '/../../components/header.php'; ?>

<body>

    <!-- navbar -->
    <?php include __DIR__ . '/../../components/navbar.php'; ?>

    <!-- Back button -->
    <div class="container mx-auto px-1 mt-8">
        <a href="shop" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            &larr; Back to Shop
        </a>
    </div>


    <!-- Category items -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php include __DIR__ . '/../../components/shop_item_constructor.php'; ?>
    </div>  


    <!-- Footer -->
    <?php include __DIR__ . '/../../components/footer.php'; ?>

</body>
</html>