import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

Alpine.plugin(intersect);
Alpine.start();

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
