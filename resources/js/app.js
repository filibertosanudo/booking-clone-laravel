import './bootstrap';

import Alpine from 'alpinejs';
import profileStore from './profile';
import headerDropdowns from './header';


Alpine.store('user', profileStore());
Alpine.data('headerDropdowns', headerDropdowns);

Alpine.start();
