if ("serviceWorker" in navigator) {
    console.log('admite este navegador PWA/serviceworker');
    if (navigator.serviceWorker.controller) {
        console.log("Ya existe el serviceWorker, no se vuelve a registrar");
    } else {
        //registrar el serviceworker
        navigator.serviceWorker.register("pwa_sw.js", {scope: "./"}).then(function (reg) {
            console.log("SW registrado")
        }).catch(function (err) {
                console.log("No se ha podido registrar el SW")
            }
        );
    }


}