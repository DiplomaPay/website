let cart = [];
setCart();

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
    
    if(index === -1 && type == 1){
        cart.push({id: 0, quant: 1})
    } else {
        let val = cart[index].quant

        if(type == 0){
            if(val < 2){
                delete cart[index];
            } else {
                if(val < limit){
                    cart[index].quant += 1;
                }
            }
        } else {
            cart[index].quant += 1;
        }
    }
    updateCart();
    setCart();
}

function sendCart(){
    console.log(cart)
}