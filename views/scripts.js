document.addEventListener('DOMContentLoaded', () => {
    const fighters = document.querySelectorAll('.fighter');

    fighters.forEach((fighter, index) => {
        fighter.style.opacity = 0;
        setTimeout(() => {
            fighter.style.transition = 'opacity 0.5s ease';
            fighter.style.opacity = 1;
        }, index * 300); // Van apareciendo en cadena
    });
});
