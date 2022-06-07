import './bootstrap';

import Alpine from 'alpinejs';

import 'tw-elements';
import { size } from 'lodash';

window.Alpine = Alpine;

Alpine.start();

const button = document.querySelector('#menu-button');
const menu = document.querySelector('#menu');

if(menu){
  button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
} 
