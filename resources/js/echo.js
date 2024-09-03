import Echo from 'laravel-echo';

import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: import.meta.env.VITE_PUSHER_APP_KEY,
  cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
  forceTLS: true,
});

if (window.Echo) {
  console.log('Echo is working');
}

window.Echo.channel('my-channel').listen('.my-event', (data) => {
  alert(data.message);
});
