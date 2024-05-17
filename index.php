<?php
require_once __DIR__ . '/Models/Category.php';
require_once __DIR__ . '/Models/Product.php';
require_once __DIR__ . '/Models/Food.php';
require_once __DIR__ . '/Models/Games.php';

$dogs = new Category('Cani', 'https://picsum.photos/200/300');
$cats = new Category('Gatti', 'https://picsum.photos/200/300');

$collare = new Product('Collare', 5, $dogs);
$crocchette = new Food('Crocchette', 6, $dogs, ['carne', 'carote']);
$pallina = new Games('Pallina', 7, $cats, 'Pallina');

$crocchette->setAge("1 mese");

$products = [
    $collare,
    $crocchette,
    $pallina,
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- BOOTSTRAP -->
</head>
<body>
    <header class="bg-primary">
        <h1 class="h1 text-center fw-bold">PET STORE</h1>
    </header>

    <main>
        <div class="container">
        <div class="row row-cols-3">
                <?php foreach ($products as $product) { ?>
                    <?php
                        $className = get_class($product);
                        $productType = 'Prodotto generico';
                        if($className === 'Food') {
                            $productType = 'Cibo';
                        } elseif($className === 'Game') {
                            $productType = 'Gioco';
                        } elseif($className === 'Kennel') {
                            $productType = 'Cuccia';
                        }
                    ?>

                    <div class="col">
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product->name; ?></h5>
                                <div class="card-text">Prezzo: <?php echo $product->price; ?> Euro</div>
                                <div class="card-text">Tipo di prodotto: <?php echo $productType ?></div>
                                <div class="card-text">Categoria: <?php echo $product->category->name; ?>
                                    <br> 
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJfOlE8_L828X2TQN9GGcwjIgAtTVQ_8spUA&usqp=CAU">
                                </div>
                                <?php if($className === 'Food') { ?>
                                    <div>Ingredienti: <?php echo implode(', ', $product->ingredients); ?> </div>
                                    <div class="card-text">Età: <?php echo $product->getAge(); ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>


    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
</body>
</html>