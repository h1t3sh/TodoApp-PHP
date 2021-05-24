let spans = document.querySelectorAll('.remove-to-do');
const formData = new FormData();

for(let i=0; i<spans.length; i++){
    spans[i].addEventListener('click', function(){
        formData.append('id', this.id);
        // alert(this.id);
        fetch('app/remove.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(text => {

            if(text){
                console.log(text);
                this.parentElement.parentElement.style.display = 'none';
            }
        });
    })
}