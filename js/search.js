document.getElementById('search-input').addEventListener('input', function() {
    const query = this.value.toLowerCase();
    const boxes = document.querySelectorAll('.box');
    
    boxes.forEach(box => {
        const title = box.querySelector('h3').innerText.toLowerCase();
        if (title.includes(query)) {
            box.style.display = 'block';
        } else {
            box.style.display = 'none';
        }
    });
});