let checkboxes = document.querySelectorAll('.checkbox');
const checkboxData = new FormData();

for(let checkbox of checkboxes){
    checkbox.addEventListener('click', function(){
        is_checked = checkbox.checked ? 1 : 0;
        // console.log(is_checked);
        todoId = checkbox.previousElementSibling.id;
        checkboxData.append('id', todoId);
        checkboxData.append('checked', is_checked);

        // alert(this.id);
        fetch('app/checkbox.php', {
            method: 'POST',
            body: checkboxData,
        })
        .then(response => response.text())
        .then(text => {
            if(text){
                checkbox.nextElementSibling.classList.toggle('strikeText');
            }
        });
    })
}