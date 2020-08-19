const staticCacheName = 'barcoding-cache-v1';
// const dynamicCacheName = 'site-dynamic-v1.935';
const assets = [
	'./offline/offline.html',
	'./offline/offline.png',
	'./assets/img/cpi.png',
	'./assets/vendor/fontawesome-free/css/all.min.css',
	'./assets/css/sb-admin-2.min.css',
	'./assets/vendor/jquery/jquery.min.js',
	'./assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
	'./assets/vendor/jquery-easing/jquery.easing.min.js',
	'./assets/dist/css/adminlte.min.css',
	'./assets/dist/js/adminlte.min.js',
	'./assets/js/sb-admin-2.min.js',
	'./assets/js/demo/jquery.dataTables.min.js',
	'./assets/js/demo/dataTables.bootstrap4.min.js',
	'./assets/js/demo/datatables-demo.js',
	'./assets/bootstrap-datepicker.min.js',
	'./assets/berhasil.mp3',
	'./assets/gagal.mp3',
	'./assets/js-cam-baru/jquery.js',
	'./assets/js-cam-baru/qrcodelib.js',
	'./assets/js-cam-baru/webcodecamjquery.min.js',
	'./assets/lib/jquery/jquery-migrate.min.js',
	'./assets/lib/easing/easing.min.js',
	'./assets/lib/wow/wow.min.js',
	'./assets/lib/waypoints/waypoints.min.js',
	'./assets/lib/counterup/counterup.min.js',
	'./assets/lib/superfish/hoverIntent.min.js',
	'./assets/lib/superfish/superfish.min.js',
	'./assets/contactform/contactform.min.js',
	'./assets/js/main.min.js',
	'./assets/css/bootstrap.min.css'
];

// self.addEventListener('install', function (event) {
// 	// Perform install steps
// 	event.waitUntil(
// 		caches.open(CACHE_NAME)
// 		.then(function (cache) {
// 			console.log('Opened cache');
// 			return cache.addAll(urlsToCache);
// 		})
// 	);
// });

//install SW
self.addEventListener('install', evt => {
	console.log('service worker has been installed');
	evt.waitUntil(
		caches.open(staticCacheName).then(cache => {
			console.log('caching shell assets');
			cache.addAll(assets);
		})
	);
});

//activate event
self.addEventListener('activate', evt => {
	// console.log('service worker has been activated');
	evt.waitUntil(
		caches.keys().then(keys => {
			return Promise.all(keys
				.filter(key => key !== staticCacheName)
				.map(key => caches.delete(key))
			)
		})
	);
});

//fetch event cache dinamis, CRUD dan scanner sudah bisa 
self.addEventListener('fetch', evt => {
	// console.log('fetch event', evt);
	evt.respondWith(
		caches.match(evt.request).then(cacheRes => {
			return cacheRes || fetch(evt.request)
		}).catch(() => caches.match('./offline/offline.html'))
	);
});

//fetch cache biasa statis saja, dinamis tidak
self.addEventListener('fetch', evt => {
	console.log('fetch event', evt);
});

// self.addEventListener('fetch', function (event) {
// 	event.respondWith(
// 		caches.match(event.request)
// 		.then(function (response) {
// 			// Cache hit - return response
// 			if (response) {
// 				return response;
// 			}

// 			return fetch(event.request).then(
// 				function (response) {
// 					// Check if we received a valid response
// 					if (!response || response.status !== 200 || response.type !== 'basic') {
// 						return response;
// 					}

// 					// IMPORTANT: Clone the response. A response is a stream
// 					// and because we want the browser to consume the response
// 					// as well as the cache consuming the response, we need
// 					// to clone it so we have two streams.
// 					var responseToCache = response.clone();

// 					caches.open(CACHE_NAME)
// 						.then(function (cache) {
// 							cache.put(event.request, responseToCache);
// 						});

// 					return response;
// 				}
// 			);
// 		}).catch(function () {
// 			// If both fail, show a generic fallback:
// 			return caches.match('./offline.html');
// 			// However, in reality you'd have many different
// 			// fallbacks, depending on URL & headers.
// 			// Eg, a fallback silhouette image for avatars.
// 		})

// 	);
// });

// self.addEventListener('fetch', function (e) {
// 	var request = e.request;
// 	e.respondWith(
// 		fetch(e.request).then(function (res) {
// 			return caches.open(DYNAMIC_CACHE).then(function (cache) {
// 				cache.put(e.request.url, res.clone());
// 				return res;
// 			})
// 		})
// 	);
// });

// self.addEventListener('activate', function (event) {

// 	var cacheAllowlist = CACHE_NAME;

// 	event.waitUntil(
// 		caches.keys().then(function (cacheNames) {
// 			return Promise.all(
// 				cacheNames.map(function (cacheName) {
// 					if (cacheAllowlist.indexOf(cacheName) === -1) {
// 						return caches.delete(cacheName);
// 					}
// 				})
// 			);
// 		})
// 	);
// });
