<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    'form' => ['FormController', 'add',],
    '' => ['HomeController', 'index',],
    'skills' => ['SkillsController', 'index'],
    'recipe' => ['RecipeController', 'index'],
    'recipe/index' => ['AdminRecipeController', 'index'],
    'recipe/edit' => ['AdminRecipeController', 'edit', ['id']],
    'recipe/show' => ['AdminRecipeController', 'show', ['id']],
    'recipe/add' => ['AdminRecipeController', 'add'],
    'recipe/delete' => ['AdminRecipeController', 'delete', ['id']],
    'product' => ['ProductController', 'index'],
    'advice' => ['AdviceController', 'index',],
    'success' => ['FormController', 'add'],
    'event/index' => ['AdminEventController', 'index'],
    'event/edit' => ['AdminEventController', 'edit', ['id']],
    'event/add' => ['AdminEventController', 'add'],
    'event/delete' => ['AdminEventController', 'delete', ['id']],
    'product/index' => ['AdminProductController', 'index'],
    'product/edit' => ['AdminProductController', 'edit', ['id']],
    'product/add' => ['AdminProductController', 'add'],
    'product/delete' => ['AdminProductController', 'delete', ['id']],
    'admin' => ['AdminController', 'index'],
    'login' => ['AdminController', 'login'],
    'logout' => ['AdminController', 'logout'],
    'testimonial/index' => ['AdminTestimonialController', 'index'],
    'testimonial/edit' => ['AdminTestimonialController', 'edit', ['id']],
    'testimonial/add' => ['AdminTestimonialController', 'add'],
    'testimonial/delete' => ['AdminTestimonialController', 'delete', ['id']],
    'admin/delete' => ['AdminController', 'delete', ['id']],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
];
