lightSchemeIcon = window.document.querySelector('#light-scheme-icon');
darkSchemeIcon = window.document.querySelector('#dark-scheme-icon');

matcher = window.document.querySelector('(prefers-color-scheme: dark)');
matcher.addListener(function(e) {
    if (matcher.matches) {
        lightSchemeIcon.remove();
        document.head.append(darkSchemeIcon);
    } else {
        document.head.append(lightSchemeIcon);
        darkSchemeIcon.remove();
    }
});