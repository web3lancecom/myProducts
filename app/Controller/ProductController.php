<?php
namespace App\Controller;
use App\Model\Product;
use Core\Utils\Utils;
use Core\Auth\Auth;


class ProductController extends AppController {
    function export() {
        // if not logued redirect
        if (!Auth::isConnected()) {
            return Utils::redirect('login.html');
        }
        $products = Product::getAll();
        $products = array_map(function($item) {
            $toreturn = array(
                'Image' => $item['picturePath'],
                'Titre' => str_replace(';', ' ', $item['title']),
                'Catégorie' => str_replace( ';', '', $item['categoryTitle']),
                'Sous-catégorie' =>  str_replace(';', '', $item['subcategoryTitle']),
                'Prix' => $item['price'] . ' €', 
                'EAN' => $item['ean'],
                'Qte' => $item['quantity'],
                'MAJ' =>  date('d/m/Y', strtotime($item['updatedAt'])),
                'Disponible' => $item['isAvailable'] ? 'Oui' : 'Non'
            );
            return $toreturn;
        }, $products);
        Utils::download_send_headers("produits-" . date("Y-m-d-h-i-s") . ".csv");
        echo Utils::array2csv($products);
        die;
    }
}