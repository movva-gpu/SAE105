const videAnimationDuration = 1_000; // milliseconds
const videoAnimationsTimingFunction = 'cubic-bezier(.17,.66,.24,1)';

$(document).ready(async function () {
    $(window).on({scroll: updateStyles, resize: updateStyles});

    updateStyles();

    if ($('#video')[0]) {
        var promise = $('#video')[0].play();

        if (promise !== undefined) {
            await promise.then((_) => {
                console.log('Browser supports autoplay.');
                setTimeout(function () {
                    videoClose();
                }, 11_500 - videAnimationDuration);
            }).catch((err) => {
                console.log('Error while trying to play video.');
                unmute();
                $('#play').css({
                    display: 'block',
                    animation: 'fadeIn 1s ' + videoAnimationsTimingFunction + ' forwards'
                });
                $('#video').on('play', function () {
                    setTimeout(function () {
                        videoClose();
                    }, 11_500 - videAnimationDuration);
                });
            });
        }

        $('#video').css({
            animation: 'fadeIn 1s ' + videoAnimationsTimingFunction + ' forwards'
        });
        $('#unmute').css({
            animation: 'fadeIn 1s ' + videoAnimationsTimingFunction + ' forwards'
        });
        $('#close').css({
            animation: 'fadeIn 1s ' + videoAnimationsTimingFunction + ' forwards'
        });
    }

    if ($('#datatable')[0]) {
        $('#datatable').DataTable({
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.13.1/i18n/fr-FR.json'
            },
            columnDefs: [
                {
                    type: 'date-euro',
                    targets: 1
                }, {
                    type: 'any-number',
                    targets: 2
                }, {
                    type: 'any-number',
                    targets: 4
                }
            ],
            scrollCollapse: false,
            scrollY: '60svh',
            paging: false
        });
    }

    if ($('#contact')[0]) {
        $('#info')
            .on('change', function () {
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
        $('.gallery-div')
            .on('mousemove', function (e) {
                var mouseX = ((Math.round((e.clientX - $(this).offset().left) / $(this).width() / 1.05 * 100) / 100) * 2) - 1;
                var mouseY = ((Math.round((e.clientY + $(window).scrollTop() - $(this).offset().top) / $(this).height() / 1.05 * 100) / 100) * 2) - 1;

                var lightTop = (mouseY + 1) / 2 * $(this).height();
                var lightLeft = (mouseX + 1) / 2 * $(this).width();

                $(this).css({'--_mouseX': mouseX, '--_mouseY': mouseY, '--_lightTop': lightTop, '--_lightLeft': lightLeft});
            });

        $('.gallery-div').on('mouseout', function () {
            $(this).css({'--_mouseX': 0, '--_mouseY': 0, '--_lightTop': 0, '--_lightLeft': 0});
        });
    }

    if ($('nav details summary')[0]) {
        $('nav details summary').on('click', function (e) {
            e.preventDefault();
            console.log($(this).parent().prop('open'));
            if (!$(this).parent().prop('open')) {
                $(this).parent().prop('open', true)
                updateStyles();
                $('nav details ul li').css({
                    animation: 'fadeWiden .67s cubic-bezier(0,0,0,1) forwards',
                });
                $('nav').css({
                    transition: '.67s cubic-bezier(0,0,0,1)',
                    height: '100svh'
                });
                $('nav summary i').css({
                    rotate: '90deg',
                    marginBottom: '.5em',
                    transition: ''
                });
                $('nav details ul').css({
                    animation: ''
                });

                $('.svh-fixer').css({
                    bottom: '0',
                    transition: 'cubic-bezier(0, 0, 0, 1) 1.33s'
                });
            } else {
                $('nav details ul').css({
                    animation: 'fadeWiden forwards reverse .67s ease-out'
                });
                console.log($('nav details').height() - $(this).height());
                $('nav summary i').css({
                    rotate: '0',
                    marginBottom: '0',
                    transitionDuration: '.67s',
                    transform: `translateY(${($('nav details').height() - $(this).height()) / 2}px)`,
                    rotate: '0deg'
                });
                $('nav').css({
                    transition: '.67s cubic-bezier(0,0,0,1)',
                    height: ''
                });
                $('.svh-fixer').css({
                    bottom: '',
                    transition: 'cubic-bezier(0, 0, 0, 1) .67s'
                });
                setTimeout(function () {
                    document.querySelector('nav details').open = false;
                    updateStyles();
                    $('nav summary i').css({
                        transform: 'translateY(0)',
                        transition: ''
                    });
                }, 670);
            }
        });
    }
});

function updateStyles() {
    let scrollY = window.scrollY;
    let header = $('header');
    let navLinks = $('nav a');
    let RTD = $('header h2');

    console.log($('nav details').prop('open'));

    if (scrollY == 0 || $('nav details').prop('open')) {
        header.css({backgroundColor: 'white', color: 'black'});

        navLinks.css({color: 'black', borderColor: 'black'});

        RTD.css({color: 'black'});

        $('nav a.active').toggleClass('changed', false);
    } else {
        header.css({backgroundColor: '#00000085', color: 'white'});

        navLinks.css({color: 'white', borderColor: 'white'});

        RTD.css({color: 'white'});

        $('nav a.active').toggleClass('changed', true);
    }
}

function videoClose() {
    $('#video').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards'
    });
    $('#unmute').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards'
    });
    $('#close').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards'
    });
    $('#play').css({
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards'
    });
    $('#video').animate({
        volume: 0
    }, videAnimationDuration + 750);

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
        animation: 'fadeOut 1s ' + videoAnimationsTimingFunction + ' forwards'
    });

    setTimeout(function () {
        $('#play').remove();
    }, 1000);
}
