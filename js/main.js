$(document).ready(function () {
    $(window).on({
        scroll: updateStyles,
        resize: updateStyles,
    });

    updateStyles();

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
});
