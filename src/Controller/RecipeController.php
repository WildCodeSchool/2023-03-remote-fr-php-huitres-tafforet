<?php

namespace App\Controller;

class RecipeController extends AbstractController
{
    public function index(): string
    {
        $recipes =  [
            [
                'name' => 'Huîtres, poivron confit et lard',

                'image1' => 'pleindhuitre.png',
                'image2' => 'huitrecitron.png',
                'content' => '<ul>
                <li>Pour un plat : calibre N° 2 ou N°3</li>
                <li>Pour l’apéritif : calibre N° 4</li>
                <li>10 à 12 huîtres Marennes Oléron</li>
                <li>3 tranches de poitrine fumée</li>
                <li>2 poivrons rouge</li>
                </ul>',
                'back_content' => '<ul>
                <li>Préparation : 30min | Cuisson : 20min</li>
                <li>Laver puis éplucher les poivrons, les émincer et les faire revenir doucement
                 dans une casserole avec un filet d’huile d’olive.
                 Faire revenir à feux doux dans une poêle la poitrine fumée.</li>
                <li>Juste avant de servir sortir les tranches de poitrine fumée et les laisser reposer
                 sur un papier absorbant. Couper la tranche en morceaux carrés.</li>
                <li>Prenez vos huîtres Marennes Oléron, décrochez juste le petit muscle et laisser les
                 en coquille. Au moment de servir vider l’eau de l’huitre Marennes Oléron.
                Ajouter le poivron confit et les carrés de poitrine fumée encore tiède.</li>
                </ul>'
            ],
            [
                'name' => 'Eclade de moules',
                'image1' => 'eclade.jpg',
                'content' => '<ul>
                <li>2 litres de moules</li>
                <li>Aiguilles de pin séchées</li>
                </ul>',
                'back_content' => '<ul>
                <li>Préparation : 15min | Cuisson : 5min</li>
                <li>Posez les moules sur une planche en bois. La fente d’ouverture des
                 moules doit être mis côté planche (important pour la cuisson).</li>
                <li>Posez les planches dehors, dans un endroit sécurisé et couvrez-les d’une bonne
                 couche d’aiguilles de pin séchées (au moins 10 cm).</li>
                <li>Mettez le feu aux aiguillettes de pin pour faire cuire les moules.
                 La cuisson dure environ 5 min. Les coquilles doivent être noires ou blanches
                (si elles sont marrons elles manquent de cuisson et on peut couvrir à nouveau
                 d’aiguilles de pin et remettre le feu).</li>
                <li>Retirez la braise et dégustez les moules avec un bon vin blanc de pays charentais.</li>
                </ul>'
            ],
            [
                'name' => 'Huître, kiwi, gingembre
                et lait de coco',
                'image1' => 'assietehuitre.jpg',
                'image2' => null,
                'content' => '<ul>
                <li>Pour l’apéritif : calibre N° 4</li>
                <li>Pour un plat : calibre N° 3</li>
                <li>1 brique de lait ou crème de coco</li>
                <li>50 g de gingembre frais râpé</li>
                <li>3 kiwis</li>
                </ul>',
                'back_content' => '<ul>
                <li>Préparation : 20min | Attente : 30min</li>
                <li>Eplucher puis tailler le kiwi en petits dés. Râper le gingembre dans le lait/crème de coco.
                 Laisser infuser au réfrigérateur au moins 30 minutes recouvert
                 d’un film transparent.</li>
                <li>Prenez vos huîtres Marennes Oléron, décrochez juste le petit muscle et laisser les en coquille.
                 Au moment de servir vider l’eau de l’huitre.</li>
                <li>Ajouter les dés de kiwi et verser une cuillère à café d’infusion coco et gingembre par huître.</li>
                </ul>'
            ],

            [
                'name' => 'Huître, cacahuète, miel
                et sauce soja',
                'image1' => 'huitrevin.png',
                'image2' => 'cacahouete.jpg',
                'content' => '<ul>
                <li>Pour un plat : calibre N° 3 ou N°2</li>
                <li>Pour l’apéritif : calibre N° 4</li>
                <li>10 à 12 Huîtres Marennes Oléron</li>
                <li>Cuillères a soupe de sauce soja par Huître Marennes Oléron servie</li>
                <li>1/2 cuillère à café de miel par Huître Marennes Oléron servie</li>
                </ul>',
                'back_content' => '<ul>
                <li>Préparation : 20min</li>
                <li>Mixer les cacahuètes, ajouter le miel et la sauce soja.
                 Le sirop ainsi obtenu doit être liquide mais pas trop pour napper l’huître et ne pas s’y noyer.
                 Rectifier au besoin le rapport miel/sauce soja.</li>
                <li>Prenez vos huitres Marennes Oléron, décrochez juste le petit muscle et laisser les en coquille.
                 Au moment de servir vider l’eau de l’huître Marennes Oléron.
                 Ajouter en nappage le mélange cacahuète, miel et sauce soja.</li>
                </ul>'
            ],
        ];
        return $this->twig->render('Recipe/index.html.twig', [
            'recipes' => $recipes
        ]);
    }
}
