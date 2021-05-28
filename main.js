document.getElementById('submit').addEventListener('click',function(event){
   
    let password = document.getElementById('input-password').value;
    let confirmation = document.getElementById('input-confirmation').value;
   
    console.log(password);
    console.log(confirmation);

    if (password != confirmation ) {
        document.getElementById('error').innerHTML = 'les Mots de passes ne correnspondent pas';
        document.getElementById('error').style.color = 'red';
        event.preventDefault();

    } else {
       
    }
})
//to do : un nombre minimun de caractère, majuscule, et de caractères spéciaux