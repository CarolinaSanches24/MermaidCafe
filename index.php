<?php 
    $productsCoffe = [
        [
            'name'=>"Café Kiki",
            'description'=>"No Café da Kiki, a magia da infância se mistura 
            com o aroma encantador do café fresquinho. Inspirado pelo adorável
            anime 'Serviço de Entregas da Kiki', nosso café oferece um refúgio
            acolhedor onde você pode relaxar e sentir a leveza do vento em suas asas, assim como a jovem bruxinha Kiki",
            'price'=>"5.00",
            'image'=>"img/Coffe_Kiki.jpg"
        ],
        [
            'name'=>"Café Goku",
            'description'=>"Inspirado no icônico Goku, este café é revigora
            suas forças e compartilhar momentos especiais. Pois é um café intenso,
            energizante e irresistível, perfeitos para recarregar suas energias
            antes da próxima aventura",
            'price'=>"8.00",
            'image'=>"img/Coffe_Goku.png"
        ],
        [
            'name'=>"Café da Guerreira Lunar",
            'description'=>"Feito com um toque de baunilha e canela, ou o 'Chá Mágico',
             uma mistura refrescante de ervas e frutas.",
            'price'=>"8.00",
            'image'=>"img/Cafe_Saylor.jpg"
        ]
    ];

    $productsFood = 
    [
        [
            'name'=>"Rolo de caranguejo creme de queijo gengibre wasabi",
            'description'=>"Descubra a explosão de sabores deste delicioso 
                rolo de caranguejo! Envolto em uma camada suave de creme de queijo cremoso,
                cada mordida traz a frescura do caranguejo, equilibrada com
                a picância sutil do gengibre e a intensidade do wasabi.",
            'price'=>"38.00",
            'image'=>"img/california-rolo-de-caranguejo-creme-de-queijo-gengibre-wasabi.jpg"
        ],
        [
            'name'=>"Ramen do Ichiraku",
            'description'=>"Um prato clássico que todo fã de Naruto ama! Um delicioso bowl de ramen
             com macarrão fresco, caldo saboroso e coberturas como chashu (carne de porco), ovos cozidos e cebolinhas.",
            'price'=>"28.00",
            'image'=>"img/naruto_ramen.jpg"
        ],
        [
            'name'=>"Onigiri",
            'description'=>" Bolinhos de arroz moldados em forma de triângulo, recheados com ingredientes como umeboshi (ameixa salgada) ou salmão. Comuns em Clannad e Your Name.",
            'price'=>"15.00",
            'image'=>"img/Onigiri.jpg"
        ],
        [
            'name'=>"Bento",
            'description'=>"Caixas de almoço compostas por arroz, carnes, legumes e frutas, muitas vezes decoradas de forma criativa. Aprecia-se muito em animes escolares.",
            'price'=>"35.00",
            'image'=>"img/Bento.jpg"
        ]
    ];
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach($productsCoffe as $product):?>
                <div class="container-produto">
                    <div class="container-foto">
                    <img src="<?= $product['image']?>">
                    </div>
                    <p><?= $product['name']?></p>
                    <p><?= $product['description']?></p>
                    <p><?= "R$ " .$product ['price']?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach ($productsFood as $food): ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= $food['image'] ?>">
                    </div>
                <p><?= $food['name'] ?></p>
                <p><?= $food['description'] ?></p>
                <p><?= "R$ " . $food['price'] ?></p>
                </div>
                 <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>