setCart();
let cart;

function setCart(){
    if(!localStorage.cart){
        localStorage.cart = [];
    }
    cart = JSON.parse(localStorage.cart);
}

function updateCart(){
    localStorage.cart = JSON.stringify(cart);
}
// id quant 
function updateItem(id, type, limit){
    let index = cart.findIndex(obj => obj.id === id);
    console.log(index);
    return;

    let val = res.quant
    if(type == 0){
        if(val < 2){
            delete cart[`i${id}`];
        } else {
            if(val < limit){
                Object.assign(cart.find(obj => obj.id === id), {quant: val - 1})
            }
        }
    } else {
        Object.assign(cart.find(obj => obj.id === id), {quant: val + 1})
    }
    updateCart();
    setCart();
}

function sendCart(){
    
}