<?php

header('Access-Control-Allow-Origin: *');
//Ejercicio 1: Añadir nuevos campos al JSON (`img` y `categoria`)
$productos = [
    // Producto 1
    [
        "id" => 1,
        "nombre" => "Camiseta básica",
        "descripcion" => "Camiseta de algodón 100% en varios colores.",
        "precio" => 12.99,
        "img" => "https://mivestidorazul.es/15075-large_default/camiseta-mujer-vipima-blanco.jpg",
        "categoria" => "Camisetas"
    ],
    // Producto 2
    [
        "id" => 2,
        "nombre" => "Pantalón vaquero",
        "descripcion" => "Pantalón de mezclilla azul clásico.",
        "precio" => 29.95,
        "img" => "https://img01.ztat.net/article/spp-media-p1/48bae36d30983b98a3cfe7db1cf6ea17/01dc4c003a2a42c9beeb21cde014bf2d.jpg",
        "categoria" => "Pantalones"
    ],
    // Producto 3
    [
        "id" => 3,
        "nombre" => "Zapatillas deportivas",
        "descripcion" => "Zapatillas ligeras y cómodas para el día a día.",
        "precio" => 45.50,
        "img" => "https://jeanpierre.com.mx/cdn/shop/files/01372N-1_1.jpg",
        "categoria" => "Calzado"
    ],
    // Producto 4 (añadido para el ejercicio 2)
    [
        "id" => 4,
        "nombre" => "Chaqueta impermeable",
        "descripcion" => "Chaqueta resistente al agua para días lluviosos.",
        "precio" => 59.99,
        "img" => "https://img.cdn.mountainwarehouse.com/product/053044/053044_nav_fell_ii_3_in_1_jacket_redone_ecom_lifestyle_aw23_02.jpg",
        "categoria" => "Chaquetas"
    ],
    // Producto 5
    [
        "id" => 5,
        "nombre" => "Gorra",
        "descripcion" => "Gorra ajustable con visera curva.",
        "precio" => 15.00,
        "img" => "https://bordadosbarcelona.com/media/2018/03/beechfield_b65_bright-royal-zoom.jpg",
        "categoria" => "Accesorios"
    ],
    // Producto 6
    [
        "id" => 6,
        "nombre" => "Vestido de verano",
        "descripcion" => "Vestido ligero y fresco para el verano.",
        "precio" => 39.90,
        "img" => "https://m.media-amazon.com/images/I/71XqboEzyNL._UY1000_.jpg",
        "categoria" => "Vestidos"
    ],
    // Producto 7
    [
        "id" => 7,
        "nombre" => "Reloj de pulsera",
        "descripcion" => "Reloj elegante con correa de cuero.",
        "precio" => 89.99,
        "img" => "https://m.media-amazon.com/images/I/71vWGHchFqL._UF894,1000_QL80_.jpg",
        "categoria" => "Accesorios"
    ],
    // Producto 8
    [
        "id" => 8,
        "nombre" => "Bolso de mano",
        "descripcion" => "Bolso espacioso con múltiples compartimentos.",
        "precio" => 49.95,
        "img" => "https://cdn.palbincdn.com/users/43947/images/bolso-mano-rafia-colores-2-1719213464.jpeg",
        "categoria" => "Bolsos"
    ],
    // Producto 9
    [
        "id" => 9,
        "nombre" => "Bufanda de lana",
        "descripcion" => "Bufanda cálida y suave para el invierno.",
        "precio" => 19.99,
        "img" => "https://cdn.sombreroshop.es/tf/629/10/Bufanda-Alpaca-Lana-Mohair-Lurex-by-Seeberger.51823a.jpg",
        "categoria" => "Accesorios"
    ],
    // Producto 10
    [
        "id" => 10,
        "nombre" => "Sandalias de playa",
        "descripcion" => "Sandalias cómodas para usar en la playa.",
        "precio" => 22.50,
        "img" => "https://www.lunacalzados.es/34749-large_default/ipanema-82842-negro-sandalia-playa-suela-plana.jpg",
        "categoria" => "Calzado"
    ]
];

if (isset($_GET['id'])) {
    header('Content-Type: application/json');
    $id = intval($_GET['id']);
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            echo json_encode($p);
            exit;
        }
    }
    echo json_encode(["error" => "Producto no encontrado"]);
 }else if (isset($_GET['modo']) && $_GET['modo'] === 'texto') {
    header('Content-Type: text/html; charset=UTF-8');
    mostrarProductosJSON($productos);
} 
else {
    echo json_encode($productos);
}


///Función que muestra por pantalla un listado de productos.
//http://localhost/ra1clienteservidorexmamen/servidor/api.php?modo=texto
function mostrarProductosJSON($productos) {
    echo "--- Lista de productos ---<br>";
    $json = json_encode($productos);
    $array = json_decode($json, true);
    //Crear un foreach para recorrerlo  y pintar por pantalla, el id, nombre, precio del producto, img, categoria
    foreach ($array as $producto) {
        echo "ID: " . $producto['id'] . "<br>";
        echo "Nombre: " . $producto['nombre'] . "<br>";
        echo "Precio: €" . $producto['precio'] . "<br>";
        echo "Imagen: <img src='" . $producto['img'] . "' alt='" . $producto['nombre'] . "' width='100'><br>";
        echo "Categoría: " . $producto['categoria'] . "<br>";
    }
//Fin función
}
