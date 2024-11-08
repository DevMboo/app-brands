import './bootstrap';

document.addEventListener('livewire:init', () => {
    Livewire.on('show-toast', function () {
        setTimeout(() => {
            Livewire.dispatch('close-toast');
        }, 1800);
    })
   
})
