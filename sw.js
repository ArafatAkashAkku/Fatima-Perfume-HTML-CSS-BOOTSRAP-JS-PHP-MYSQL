// //Setting cache name & each update should have different cache name
const cacheName = 'firstVersion';

// service-worker.js (register this as a service worker)
self.addEventListener('install', event => event.waitUntil(onInstall(event)));
self.addEventListener('activate', event => event.waitUntil(onActivate(event)));
self.addEventListener('fetch', () => { });

// Installing the application from service worker 
async function onInstall(event) {
  // Telling the service worker to activate right away when an update is pickedup.
  // In main JavaScript this will trigger 'controllerchange', which we can use to trigger an page reload.
  event.waitUntil(
    caches.open(cacheName)
      .then(cache => cache.addAll([
        "/", "/AppPicture192.png", "/AppPicture512.png"
      ]))
  );
  self.skipWaiting();
}

async function onActivate(event) { }