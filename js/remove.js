let spans = document.querySelectorAll('.remove-to-do');

for(let i=0; i<spans.length; i++){
    spans[i].addEventListener('click', function(){
        // alert(this.id);
        fetch('app/remove.php', {
            method: 'POST',
            body: `id=${this.id}`
        }).then(response => response.text())
        .then(result => {

            console.log(result);
            this.parentElement.parentElement.style.display = 'none';
        });
        
    })
}