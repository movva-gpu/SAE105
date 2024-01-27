const animationDuration = 1_000;
const animationsTimingFunction = 'cubic-bezier(.19, 1, .22, 1)';

$(document).ready(async function () {
    $(window).on({
        scroll: updateStyles,
        resize: updateStyles,
    });

    updateStyles();

    if ($('#video')[0]) {
        var promise = $('#video')[0].play();

        if (promise !== undefined) {
            await promise
                .then((_) => {
                    console.log('Browser supports autoplay.');
                    setTimeout(function () {
                        videoClose();
                    }, 11_500 - animationDuration);
                })
                .catch((err) => {
                    console.log('Error while trying to play video.');
                    unmute();
                    $('#play').css({
                        display: 'block',
                        animation:
                            'fadeIn 1s ' +
                            animationsTimingFunction +
                            ' forwards',
                    });
                    $('#video').on('play', function () {
                        setTimeout(function () {
                            videoClose();
                        }, 11_500 - animationDuration);
                    });
                });
        }

        $('#video').css({
            animation: 'fadeIn 1s ' + animationsTimingFunction + ' forwards',
        });
        $('#unmute').css({
            animation: 'fadeIn 1s ' + animationsTimingFunction + ' forwards',
        });
        $('#close').css({
            animation: 'fadeIn 1s ' + animationsTimingFunction + ' forwards',
        });
    }

    if ($('#datatable')[0]) {
        $('#datatable').DataTable({
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.13.1/i18n/fr-FR.json',
            },
            columnDefs: [
                { type: 'date-euro', targets: 1 },
                { type: 'any-number', targets: 2 },
                { type: 'any-number', targets: 4 },
            ],
            scrollCollapse: false,
            scrollY: '60svh',
            paging: false,
        });
    }
});

function updateStyles() {
    let scrollY = window.scrollY;
    let header = $('header');
    let navLinks = $('nav a');
    let RTD = $('header h2');

    if (scrollY == 0) {
        header.css({
            backgroundColor: 'white',
            color: 'black',
        });

        navLinks.css({
            color: 'black',
            borderColor: 'black',
        });

        RTD.css({
            color: 'black',
        });

        $('nav a.active').toggleClass('changed', false);
    } else {
        header.css({
            backgroundColor: '#00000085',
            color: 'white',
        });

        navLinks.css({
            color: 'white',
            borderColor: 'white',
        });

        RTD.css({
            color: 'white',
        });

        $('nav a.active').toggleClass('changed', true);
    }
}

function videoClose() {
    $('#video').css({
        animation: 'fadeOut 1s ' + animationsTimingFunction + ' forwards',
    });
    $('#unmute').css({
        animation: 'fadeOut 1s ' + animationsTimingFunction + ' forwards',
    });
    $('#close').css({
        animation: 'fadeOut 1s ' + animationsTimingFunction + ' forwards',
    });
    $('#play').css({
        animation: 'fadeOut 1s ' + animationsTimingFunction + ' forwards',
    });
    $('#video').animate({ volume: 0 }, animationDuration + 750);

    setTimeout(function () {
        $('#video').remove();
        $('#unmute').remove();
        $('#close').remove();
        $('#play').remove();
    }, animationDuration + 750);
}
function unmute() {
    if ($('#video').prop('muted')) {
        $('#video').prop('muted', false);
        $('#unmute')[0].title = 'Désactiver le son';
        $('#unmute').html(`
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 640 640" style="enable-background:new 0 0 640 640;" xml:space="preserve">
                <path d="M551.3,133.8c54,44,88.6,111.1,88.6,186.2s-34.6,142.2-88.6,186.2c-12.9,10.5-31.7,8.5-42.2-4.4c-10.5-12.9-8.5-31.7,4.4-42.2c40.6-33,66.5-83.2,66.5-139.6s-25.9-106.6-66.5-139.7c-12.9-10.5-14.7-29.4-4.4-42.2c10.4-12.9,29.4-14.7,42.2-4.4L551.3,133.8z"/>
                <path d="M475.7,226.9c26.9,22,44.2,55.5,44.2,93.1s-17.4,71.1-44.2,93.1c-12.9,10.5-31.7,8.5-42.2-4.4c-10.5-12.9-8.5-31.7,4.4-42.2c13.5-11,22.1-27.7,22.1-46.5c0-18.7-8.6-35.5-22.1-46.6c-12.9-10.5-14.7-29.4-4.4-42.2s29.4-14.7,42.2-4.4L475.7,226.9z"/>
                <path d="M334.6,74.2c12.8,5.8,21,18.4,21,32.4v426.7c0,14-8.2,26.7-21,32.4s-27.8,3.4-38.2-5.9L146.4,426.7H71.1C31.9,426.7,0,394.8,0,355.6v-71.1c0-39.2,31.9-71.1,71.1-71.1h75.3L296.3,80.1C306.8,70.8,321.8,68.6,334.6,74.2z"/>
            </svg>`);
        return;
    }
    $('#unmute')[0].title = 'Activer le son';
    $('#video').prop('muted', true);
    $('#unmute').html(`
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 640 640" style="enable-background:new 0 0 640 640;" xml:space="preserve">
            <path d="M334.6,74.2c12.8,5.8,21,18.4,21,32.4v426.7c0,14-8.2,26.7-21,32.4s-27.8,3.4-38.2-5.9L146.4,426.7H71.1C31.9,426.7,0,394.8,0,355.6v-71.1c0-39.2,31.9-71.1,71.1-71.1h75.3L296.3,80.1C306.8,70.8,321.8,68.6,334.6,74.2z M472.2,221.1l61.1,61.1l61.1-61.1c10.4-10.4,27.3-10.4,37.7,0c10.3,10.4,10.4,27.3,0,37.7L571,319.9l61.1,61.1c10.4,10.4,10.4,27.3,0,37.7c-10.4,10.3-27.3,10.4-37.7,0l-61.1-61.1l-61.1,61.1c-10.4,10.4-27.3,10.4-37.7,0c-10.3-10.4-10.4-27.3,0-37.7l61.1-61.1l-61.1-61.1c-10.4-10.4-10.4-27.3,0-37.7C445,210.8,461.9,210.7,472.2,221.1z"/>
        </svg>`);
    return;
}

function videoPlay() {
    $('#video')[0].play();
    $('#play').css({
        animation: 'fadeOut 1s ' + animationsTimingFunction + ' forwards',
    });

    setTimeout(function () {
        $('#play').remove();
    }, 1000);
}

function myFunction() {
    fetch('../index.php')
        .then((response) => response.text())
        .then((data) => {
            // Handle the response from the PHP script
        });
}
