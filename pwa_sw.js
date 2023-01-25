/*Creamos la caché*/
const NOMBRE_CACHE = "cache_principal";
var urls = ['css/index.css',
    'iconosPWA/72.png',
    'offline.html',
    'imagenes/logo.png'];

//cargar archivos en la caché al registrar SW
self.addEventListener("install", function (event) {
    event.waitUntil(
        caches.open(NOMBRE_CACHE).then(function (cache) {
            console.log("cache abierta");
            return cache.addAll(urls);
        })
    );
});

//proxy para interceptar las peticiones y devolver desde la cache
self.addEventListener("fetch", function (evento) {
    evento.respondWith(
        caches.match(evento.request).then(function (response) {
            if (response) {
                console.log("cargando desd cache " + response)
                return response;
            }
            return fetch(evento.request);
        }).catch(function (error) {
            if (evento.request.mode == "navigate") {
                return cache.match("./offline.html")
            }
        })
    );
});