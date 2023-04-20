<?php

namespace App\Controller;
use App\Model\ProductManager;

class ProductController extends AbstractController
{
    public function index()
    {
        $productManager = new ProductManager();
        $product = $productManager->selectAll();
        ;
        return $this->twig->render('Product/product.html.twig', [
            'product' => $product
        ]);


        // $hoysterProducts = [
        //     [
        //         'image' => 'huitre1.png',
        //         'name' => 'Fine de Claires',
        //         'description' => 'Les huîtres de type fine de claire sont cultivées dans des bassins
        //          d\'eau salée appelés claires. Elles peuvent être de couleur
        //         blanche ou verte et sont affinées hors de la mer pendant un à deux mois,
        //          avec un maximum de 20 coquillages par mètre carré. La chair de la fine de claire
        //          est plus ferme que celle
        //          des huîtres de parc et a un léger goût de noisette. Bien que leur teneur en chair
        //           soit la même que celle des huîtres de parc, les fine de claire ont une forme arrondie et bombée.',
        //         'maturing' => 'Du 1/04 au 31/10 : 14 jours <br> Du 1/11 au 31/03 : 28 jours'
        //     ],
        //     [
        //         'image' => 'huitre2.png',
        //         'name' => 'Spéciale de Claires',
        //         'description' => "La spéciale de claire est une variété d'huîtres élevée dans des bassins
        //          d'eau salée appelés
        //          claires. Ce type d'huître a été engraissé pendant une période plus longue allant de deux
        //           à quatre mois, avec une densité d'élevage très réduite de seulement deux à six
        //           individus par mètre carré. Les spéciales de claire sont connues pour être particulièrement
        //            dodues et délicieuses.
        //         La faible densité d'élevage est intentionnelle pour obtenir une huître plus
        //         charnue avec une saveur plus prononcée. Les spéciales de claire ont une coquille
        //         creuse et arrondie et sont moins salées que les fines de claire.",
        //         'maturing' => 'Du 1/04 au 31/10 : 14 jours<br> Du 1/11 au 31/03 : 28 jours'
        //     ],
        //     [
        //         'image' => 'huitre3.png',
        //         'name' => 'Pousse en clair',
        //         'description' => "La variété d'huîtres nommée fine de claire verte Label Rouge
        //         est connue pour sa texture peu charnue et sa forme homogène. Les branchies
        //         de ces huîtres sont d'une teinte verte appréciée des consommateurs, et leur
        //          manteau est translucide voire blanc, sans présence de laitance. Leur saveur est équilibrée,
        //          avec un goût salé suivi d'une note sucrée et un arôme de terroir de claires.
        //           La consistance de ces huîtres peut aller de molle à un peu ferme, et leur longueur en
        //            bouche est moyenne.",
        //         'maturing' => '4 mois minimum'
        //     ],
        //     [
        //         'image' => 'huitre4.png',
        //         'name' => 'Label Rouge (verdissement)',
        //         'description' => 'Les ostréiculteurs sont fiers de produire cette huître exceptionnelle.
        //          Elle est élevée à très
        //         faible densité, avec un maximum de 5 individus par mètre carré dans une claire, et ce
        //          pendant une période de 4 à 8 mois,
        //          en fonction de la saison. Au cours de sa croissance, l\'huître forme des
        //           lignes de pousses en dentelle sur sa coquille. Dans les claires,
        //          elle développe une chair ferme et croquante avec un taux de chair élevé.
        //           Lors de la dégustation, cette huître offre une saveur douce et charnue avec une note de noisette,
        //           et sa longueur en bouche est soutenue.',
        //         'maturing' => 'Du 1/04 au 31/10 : 14 jours <br> Du 1/11 au 31/03 : 28 jours'
        //     ]


        // ];
        // $mussleProducts = [
        //     [
        //         'image' => 'moule1.png',
        //         'name' => 'Moule de bouchot',
        //         'description' => 'La moule de bouchot est une variété de moule cultivée sur
        //          des pieux en bois, appelés bouchots, qui sont plantés dans la mer.
        //         Cette technique d\'élevage permet de produire des moules de haute qualité,
        //         car elles sont nourries par les nutriments présents dans l\'eau de mer
        //          et protégées des prédateurs terrestres. Les bouchots sont placés dans des
        //           zones de faible profondeur, où les moules peuvent se développer dans un environnement protégé.
        //          Elles sont appréciées pour leur chair ferme et savoureuse, ainsi que pour
        //           leur faible teneur en sable et en algues. ',

        //     ],
        //     [
        //         'image' => 'moule2.png',
        //         'name' => 'Moule d\'Irlande',
        //         'description' => 'La moule d\'Irlande est une variété de moule cultivée dans
        //          les eaux froides et cristallines
        //          de l\'Atlantique Nord. Elle est appréciée pour sa chair ferme et son goût
        //          délicat, qui rappelle celui des fruits de mer frais.
        //          La moule d\'Irlande est élevée sur des cordes qui sont suspendues à des
        //          bouées en mer, où elles se nourrissent de phytoplancton et
        //          de nutriments marins. Ce mode d\'élevage permet de produire des moules
        //           de grande qualité, car elles sont constamment baignées dans l\'eau de mer
        //           pure et riche en nutriments.',

        //     ],
        // ];
        // return $this->twig->render('Product/product.html.twig', [
        //     'hoysterProducts' => $hoysterProducts,
        //     'mussleProducts' => $mussleProducts
        // ]);
    }
}
