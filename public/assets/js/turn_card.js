document.addEventListener('DOMContentLoaded', function () {
    const articles = document.querySelectorAll('article');
    const flipButtons = document.querySelectorAll('section.recipes-container > article a');

    flipButtons.forEach((button, index) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            articles[index].classList.toggle('article-flipped');

            // Mettre à jour le texte du bouton
            if (articles[index].classList.contains('article-flipped')) {
                button.textContent = 'Ingrédients : clique ici';
            } else {
                button.textContent = 'Préparation : clique ici';
            }
        });
    });
});
