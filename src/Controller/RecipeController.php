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
                <li>Pour l\'apéritif : calibre N° 4</li>
                <li>10 à 12 huîtres Marennes Oléron</li>
                <li>3 tranches de poitrine fumée</li>
                <li>2 poivrons rouge</li>
                </ul>'

            ],
            [
                'name' => 'Eclade de moules',
                'image1' => 'éclade.jpg',
                'content' => '<ul>
                <li>2 litres de moules</li>
                <li>Aiguilles de pin séchées</li>

                </ul>'
            ],
            [
                'name' => 'Huître, kiwi, gingembre
                et lait de coco',
                'image1' => 'assietehuitre.jpg',
                'image2' => null,
                'content' => '<ul>
                <li>Pour l\'apéritif : calibre N° 4</li>
                <li>Pour un plat : calibre N° 3</li>
                <li>1 brique de lait ou crème de coco</li>
                <li>50 g de gingembre frais râpé</li>
                <li>3 kiwis</li>
                </ul>'
            ],

            [
                'name' => 'Huître, cacahuète, miel
                et sauce soja',
                'image1' => 'huitrevin.png',
                'image2' => 'cacahouete.jpg',
                'content' => '<ul>
                <li>Pour un plat : calibre N° 3 ou N°2</li>
                <li>Pour l\'apéritif : calibre N° 4</li>
                <li>10 à 12 Huîtres Marennes Oléron</li>
                <li>Cuillères a soupe de sauce soja par Huître Marennes Oléron servie</li>
                <li>1/2 cuillère à café de miel par Huître Marennes Oléron servie</li>
                </ul>'
            ],
        ];
        return $this->twig->render('Recipe/index.html.twig', [
            'recipes' => $recipes
        ]);
    }
}
