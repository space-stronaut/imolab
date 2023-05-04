let openShopping = document.querySelector('.icons');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');
let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a');

window.onscroll = () => {

    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    section.forEach(sec => {
        let top = window.scrollY;
        let height = sec.offsetHeight;
        let offset = sec.offsetTop - 150;
        let id = sec.getAttribute('id');

        if (top => offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header .navbar a[href*='+id+']').classList.add('active');
            });
        };

    });

}

document.querySelector('#search-icon').onclick = () => {
    document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () => {
    document.querySelector('#search-form').classList.remove('active');
}

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Cholesterol Total',
        image: 'Tes/kolesterol.jpg',
        price: 70200
    },
    {
        id: 2,
        name: 'Hs-CRP',
        image: 'Tes/crp.png',
        price: 370800
    },
    {
        id: 3,
        name: 'Hematologi Lengkap',
        image: 'Tes/hematologi.jpg',
        price: 145800
    },
    {
        id: 4,
        name: 'IMoLab PULS Cardiac Marker',
        image: 'Tes/cardiacmarker.jpg',
        price: 4100000
    },
    {
        id: 5,
        name: 'Analisa Sperma',
        image: 'Tes/analisasperma.jpg',
        price: 549000
    },
    {
        id: 6,
        name: 'Vitamin D 25-OH Total',
        image: 'Tes/vitd.jpg',
        price: 419000
    },
    {
        id: 7,
        name: 'HbA1c',
        image: 'Tes/hba1c.jpg',
        price: 227000
    },
    {
        id: 8,
        name: 'Glukosa Puasa',
        image: 'Tes/glukosa.jpg',
        price: 52000
    },
    {
        id: 9,
        name: 'Asam Urat',
        image: 'Tes/asamurat.jpeg',
        price: 89000
    },
    {
        id: 10,
        name: 'Cystatin-C',
        image: 'Tes/cystatinc.png',
        price: 476000
    },
    {
        id: 11,
        name: 'SARS-CoV-2 RNA',
        image: 'Tes/sarscov.jpg',
        price: 275000
    }
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="image/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">+ Keranjang</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        listCards[key] = products[key];
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="image/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    console.log(key, quantity);
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}