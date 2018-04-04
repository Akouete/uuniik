/*importScripts('http://127.0.0.1/site/uuniik_project/uuniik/node_modules/sw-toolbox/sw-toolbox.js');
toolbox.precache(['http://127.0.0.1/site/uuniik_project/uuniik/public/connexion', 'http://127.0.0.1/site/uuniik_project/uuniik/public/css/connexion.css'])
toolbox.router.get('/(.*)', toolbox.networkFirst, {networkTimeoutSeconds: 10 })*/

var PRECACHE = 'precache-v1';
var RUNTIME = 'runtime';

// list the files you want cached by the service worker
PRECACHE_URLS = [
  'http://127.0.0.1/site/uuniik_project/uuniik/public/connexion',
  'http://127.0.0.1/site/uuniik_project/uuniik/public/css/connexion.css',
  'http://127.0.0.1/site/uuniik_project/uuniik/public/js/connexion.js',
  'http://127.0.0.1/site/uuniik_project/uuniik/public/js/sw.js'
];


// the rest below handles the installing and caching
self.addEventListener('install', event => {
  event.waitUntil(
     caches.open(PRECACHE).then(cache => cache.addAll(PRECACHE_URLS)).then(self.skipWaiting())
  );
});

self.addEventListener('activate', event => {
  const currentCaches = [PRECACHE, RUNTIME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return cacheNames.filter(cacheName => !currentCaches.includes(cacheName));
    }).then(cachesToDelete => {
      return Promise.all(cachesToDelete.map(cacheToDelete => {
        return caches.delete(cacheToDelete);
      }));
    }).then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', event => {
  if (event.request.url.startsWith(self.location.origin)) {
    event.respondWith(
      caches.match(event.request).then(cachedResponse => {
        if (cachedResponse) {
          return cachedResponse;
        }

        return caches.open(RUNTIME).then(cache => {
          return fetch(event.request).then(response => {
            // Put a copy of the response in the runtime cache.
            return cache.put(event.request, response.clone()).then(() => {
              return response;
            });
          });
        });
      })
    );
  }
});
