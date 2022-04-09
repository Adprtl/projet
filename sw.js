
  //Initialisation du cache
  var cacheName = 'geeks-cache-v1';
  var cacheAssets = [
    'index.php',
    'logo-32x32.png',
    'logo-192x192.png',
    'logo-512x512.png',
    'style.css'
    
  ];
    
  // Installation 
  self.addEventListener('install', e => {
      
      e.waitUntil(
          caches.open(cacheName)
          .then(cache => {
              console.log(`Service Worker: Caching Files: ${cache}`);
              cache.addAll(cacheAssets)
                  
                  .then(() => self.skipWaiting())
          })
      );
  })
//Enregistre le cache
self.addEventListener('activate', e => {
    console.log('Service Worker: Activated');
    e.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(
                    cache => {
                        if (cache !== cacheName) {
                            console.log('Service Worker: Clearing Old Cache');
                            return caches.delete(cache);
                        }
                    }
                )
            )
        })
    );
})
var cacheName = 'geeks-cache-v1';
  
// Mettre à jour le cache
self.addEventListener('fetch', e => {
    console.log('Service Worker: Fetching');
    e.respondWith(
        fetch(e.request)
        .then(res => {

            const resClone = res.clone();
 
            caches.open(cacheName)
                .then(cache => {
                    cache.put(e.request, resClone);
                });
            return res;
        }).catch(
            err => caches.match(e.request)
            .then(res => res)
        )
    );
});