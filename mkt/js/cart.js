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

function updateItem(id, type, limit){
    let index = cart.findIndex(obj => obj.id === id);
    
    if(index === -1 && type == 1){
        cart.push({id: id, quant: 1})
    } else {
        let val = cart[index].quant;
        console.log(val);

        if(type == 0){
            if(val < 2){
                cart.splice(index, 1);
            } else {
                cart[index].quant -= 1;
            }
        } else {
            if(val < limit){
                cart[index].quant += 1;
            }
        }
    }
    updateCart();
    setCart();
}

function sendCart(){
    let local = 'orders/new.php';
    addNewData(local, { items: cart});
}