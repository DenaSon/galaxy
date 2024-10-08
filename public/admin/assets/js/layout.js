

(function () {

    'use strict';

    if (sessionStorage.getItem('defaultAttribute')) {
        var attributesValue = document.documentElement.attributes;
        var CurrentLayoutAttributes = {};
        for (var i = 0; i < attributesValue.length; i++) {
            var attribute = attributesValue[i];
            if (attribute.nodeName && attribute.nodeName != "undefined") {
                var nodeKey = attribute.nodeName;
                CurrentLayoutAttributes[nodeKey] = attribute.nodeValue;
            }
        }
        if (JSON.stringify(CurrentLayoutAttributes) !== sessionStorage.getItem('defaultAttribute')) {
            // sessionStorage.clear();
            // location.reload();
        } else {
            var isLayoutAttributes = {
                'data-layout': sessionStorage.getItem('data-layout'),
                'data-skin': sessionStorage.getItem('data-skin'),
                'data-mode': sessionStorage.getItem('data-mode'),
                'dir': sessionStorage.getItem('dir'),
                'data-content': sessionStorage.getItem('data-content'),
                'data-sidebar-size': sessionStorage.getItem('data-sidebar-size'),
                'data-navbar': sessionStorage.getItem('data-navbar'),
                'data-sidebar': sessionStorage.getItem('data-sidebar'),
                'data-topbar': sessionStorage.getItem('data-topbar'),
            };

            for (var x in isLayoutAttributes) {
                if (isLayoutAttributes[x] && isLayoutAttributes[x]) {
                    document.documentElement.setAttribute(x, isLayoutAttributes[x]);
                }
            }
        }
    }
})();
