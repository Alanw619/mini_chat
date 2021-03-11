const sendBtn = document.querySelector('#sendButton')
const pseudo = document.querySelector('#pseudo')
const message = document.querySelector('#message')

sendBtn.addEventListener('click', function(e){
    e.preventDefault()
    console.log('stop formulaire !');
    let formData = new FormData()
    formData.append("pseudo", pseudo.value  )
    formData.append("message", message.value)

    
    fetch('app/new_message.php',{
        method:'post',
        body: formData
    }).then(()=>{
        refreshMessage()
     })

})

function refreshMessage(){
    fetch('app/get_messages.php').then((response)=>{
       return response.text()
    }).then((data)=>{
        document.querySelector(".boxMsg").innerHTML=data;
        message.value = "";
    })
}
