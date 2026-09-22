
const exploreButton = document.getElementById('explore-btn');
const introSection = document.getElementById('intro');

if (exploreButton && introSection) {
    exploreButton.addEventListener('click', () => {
        introSection.scrollIntoView({
            behavior: 'smooth'
        });
    });
}