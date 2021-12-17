
let num;
let body = document.getElementById('body');
let form = document.getElementById('form');
let id = document.getElementById('id')
let delForm = document.getElementById('del-form');
let postTitle = document.getElementById('title').value

fetch('http://localhost/TEST/api/read.php').then(res=>res.json()).then(data=>{
    num = data.length
    for(i=0;i<num;i++){
        //document.writeln('<h3>'+data[i]['Post Name']+'</h3><p>'+data[i]['Post Text']+'</p><hr>')
        let div = document.createElement('div')
        let header3 = document.createElement('h3')
        let para = document.createElement('p')
        let p2 = document.createElement(('p'))
        para.appendChild(document.createTextNode(data[i]['Post Text']))
        header3.appendChild(document.createTextNode(`${data[i]['Post Name']}`))
        p2.appendChild(document.createTextNode('Post Number: '+data[i]['id']))
        div.appendChild(header3)
        div.appendChild(para)
        div.appendChild(p2)
        div.classList.add('div-style')
        body.appendChild(div)
    }
})

form.addEventListener("submit", (e)=>{
    e.preventDefault();
    fetch('http://localhost/TEST/api/read-single.php?id='+id.value).then(res=>res.json()).then(data=>{
        alert(data['Post Name']+'\n'+data['Post Text'])
    })
        

    
})

delForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    fetch('http://localhost/TEST/api/delete.php?name='+postTitle, {
        method: 'delete'
    }).then(res=>res.json()).then(data=>console.log(data))
    
})
