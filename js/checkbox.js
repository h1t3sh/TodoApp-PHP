let checkboxes = document.querySelectorAll('.checkbox');

for(let checkbox of checkboxes){
    checkbox.addEventListener('click', function(){
        checkbox.nextElementSibling.classList.toggle('strikeText')
    })
}