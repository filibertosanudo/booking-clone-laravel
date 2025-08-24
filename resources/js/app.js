import './bootstrap';

import Alpine from 'alpinejs';
import profileStore from './profile';

window.Alpine = Alpine;

Alpine.start();

Alpine.store('user', profileStore());
