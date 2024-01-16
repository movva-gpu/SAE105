window.addEventListener('scroll', function() {
    updateStyles();
});

window.addEventListener('load', function() {
    updateStyles();
});

window.addEventListener('resize', function() {
    updateStyles();
});

function updateStyles() {
    let scrollY = window.scrollY;
    let header = window.document.querySelector('header');
    if (scrollY == 0) {
        header.style.backgroundColor = 'white';
        for (let i = 0; i < header.children.length; i++) {
            if (header.children.item(i).tagName === 'NAV') {
                for (let j = 0; j < header.children.item(i).children.item(0).children.length; j++) {
                    header.children.item(i).children.item(0).children.item(j).children.item(0).style.color = 'black';
                    header.children.item(i).children.item(0).children.item(j).children.item(0).style.borderColor = 'black';
                }
            }
            header.children.item(i).style.color = 'black';
        }
    } else {
        header.style.backgroundColor = '#00000085';
        for (let i = 0; i < header.children.length; i++) {
            if (header.children.item(i).tagName === 'NAV') {
                for (let j = 0; j < header.children.item(i).children.item(0).children.length; j++) {
                    header.children.item(i).children.item(0).children.item(j).children.item(0).style.color = 'white';
                    header.children.item(i).children.item(0).children.item(j).children.item(0).style.borderColor = 'white';
                }
            }
            header.children.item(i).style.color = 'white';
        }
    }
}