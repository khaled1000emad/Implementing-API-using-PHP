let form = document.getElementById('add-form')
let pname = document.getElementById('pname')
let ptext = document.getElementById('ptext')


form.addEventListener('submit', (e)=>{
    e.preventDefault()
     fetch('http://localhost/TEST/api/add.php', {
         method: 'POST',
         headers: {
             'Content-Type': 'application/json'
         },
         body: JSON.stringify({
             "postName": pname.value,
             "postText": ptext.value
         })
     }).then(res=>res.json()).then(data=>console.log(data))
    document.location = 'index.html';
})