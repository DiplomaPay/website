isActive = false;
function addNewData(local, data){
    if(isActive) return;
    isActive = true;
    fetch(`/mkt/sys/api/${local}`,{
        method: "POST",
        body: JSON.stringify(data)
    })
    .then(e=>e.json())
    .then(e=>{
        isActive = false;
        newMsg(e);
    })
    .catch(e=>newMsg({
        mensagem: "Ocorreu algum erro, contate o administrador",
        response: false
    }))
}

async function newMsg(e){
    let msg = document.createElement("div");
    let color = defineColor(e.response);

    msg.classList.add(`msg-add`);
    msg.classList.add(color);
    msg.innerText = e.mensagem;
    document.body.appendChild(msg);
    if(e.response === true || e.response == 'ag'){
        if(e.response == 'ag'){
            await sleep(2000);
        }
        window.location.reload()
    }
    setTimeout(()=>{
        msg.remove();
    },2000)
}

const getBase64 = (e) => {
    return new Promise((res) => {
        const reader = new FileReader();
        reader.onload = () => res(reader.result);
        reader.readAsDataURL(e);
    });
}

function sleep(milliseconds) {
    return new Promise(resolve => setTimeout(resolve, milliseconds))
}