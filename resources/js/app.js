import './bootstrap';
import 'flowbite'
import '../../vendor/masmerise/livewire-toaster/resources/js'; // 👈

// other app stuff...

import { initFlowbite } from 'flowbite';

document.addEventListener("livewire:navigating", () => {
    initFlowbite();
});

document.addEventListener("livewire:navigated", () => {
    initFlowbite();
});