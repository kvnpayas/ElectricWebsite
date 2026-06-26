import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import intersect from '@alpinejs/intersect';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

Alpine.plugin(intersect);

window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// window.livewireScriptConfig is set by an inline <script> in _head.blade.php
// BEFORE this module loads. That prevents livewire.esm from registering its own
// DOMContentLoaded auto-starter, so this single call is the only Alpine.start().
Livewire.start();
