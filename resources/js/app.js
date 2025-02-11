import './bootstrap';
import Alpine from 'alpinejs';
import { homeComponent } from './components/home';

window.Alpine = Alpine;
Alpine.data('homeComponent', homeComponent);
Alpine.start();
