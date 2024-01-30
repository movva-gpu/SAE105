const videAnimationDuration = 1_000; // milliseconds
const videoAnimationsTimingFunction = 'cubic-bezier(.17,.66,.24,1)';

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
                    }, 11_500 - videAnimationDuration);
                })
                .catch((err) => {
                    console.log('Error while trying to play video.');
                    unmute();
                    $('#play').css({
                        display: 'block',
                        animation:
                            'fadeIn 1s ' +
                            videoAnimationsTimingFunction +
                            ' forwards',
                    });
                    $('#video').on('play', function () {
                        setTimeout(function () {
                            videoClose();
                        }, 11_500 - videAnimationDuration);
                    });
                });
        }

        $('#video').css({
            animation: 'fadeIn 1s ' + videoAnimationsTimingFunction + ' forwards',
        });
        $('#unmute').css({
            animation: 'fadeIn 1s ' + videoAnimationsTimingFunction + ' forwards',
        });
        $('#close').css({
            animation: 'fadeIn 1s ' + videoAnimationsTimingFunction + ' forwards',
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

    if ($('#contact')[0]) {
        $('#info').on('change', function () {
            $('#other-field').prop('hidden', true);
            $('#other-subject').prop('required', false);
        });
        $('#devis').on('change', function () {
            $('#other-field').prop('hidden', true);
            $('#other-subject').prop('required', false);
        });
        $('#reclam').on('change', function () {
            $('#other-field').prop('hidden', true);
            $('#other-subject').prop('required', false);
        });
        $('#other').on('change', function () {
            $('#other-field').prop('hidden', false);
            $('#other-subject').prop('required', true);
        });

        if ($('#other').prop('checked')) {
            $('#other-field').prop('hidden', false);
            $('#other-subject').prop('required', true);
        }
    }

    if ($('#gallery')[0]) {
        $('#gallery img').on('mousemove', function (e) {
            // $(this).css({ '--_mouseX': (((e.clientX - $(this).position().left) / $(this).innerWidth()) * 2) - 1.5, '--_mouseY': (((e.clientY - $(this).offset().top) / $(this).innerHeight()) * 2) - 1.5 });
            var mouseX = ((e.clientX - $(this).position().left) / $(this).innerWidth()) * 2 - 1;
            var mouseY = ((e.clientY + $(window).scrollTop() - $(this).offset().top) / $(this).innerHeight()) * 2 - 1;
    
            $(this).css('--_mouseX', mouseX).css('--_mouseY', mouseY);
        });

        $('#gallery img').on('mouseout', function () {
            $(this).css({ '--_mouseX': 0, '--_mouseY': 0 });
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
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards',
    });
    $('#unmute').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards',
    });
    $('#close').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards',
    });
    $('#play').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards',
    });
    $('#video').animate({ volume: 0 }, videAnimationDuration + 750);

    setTimeout(function () {
        $('#video').remove();
        $('#unmute').remove();
        $('#close').remove();
        $('#play').remove();
    }, videAnimationDuration + 750);
}
function unmute() {
    if ($('#video').prop('muted')) {
        $('#video').prop('muted', false);
        $('#unmute')[0].title = 'Désactiver le son';
        $('#unmute').html('<i class="fa-solid fa-volume-high"></i>');
        return;
    }
    $('#unmute')[0].title = 'Activer le son';
    $('#video').prop('muted', true);
    $('#unmute').html('<i class="fa-solid fa-volume-xmark"></i>');
    return;
}

function videoPlay() {
    $('#video')[0].play();
    $('#play').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards',
    });

    setTimeout(function () {
        $('#play').remove();
    }, 1000);
}
