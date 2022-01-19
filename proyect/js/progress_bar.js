const progress = document.querySelector('.progress-done');
setTimeout(() => {
    progress.style.width = progress.getAnimations('data-done') + '%';
    progress.style.opacity = 1;
}, 100);