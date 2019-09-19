document.addEventListener("DOMContentLoaded", function (event) {
    if (window.location.href.indexOf('?q=') != -1) {
        var val = window.location.href.slice(window.location.href.indexOf('?') + 3);
        document.getElementById('agent').value = decodeURIComponent(val);

        setTimeout(function () {
            window.livewire.emit('result', val);
        }, 1);
    }

    window.livewire.beforeDomUpdate(() => {
        //
    });

    window.livewire.afterDomUpdate(() => {
        history.pushState(null, null, '?q=' + document.getElementById('agent').value);
    });
});