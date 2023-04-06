
let products = [
    {
        name: 'ورق السدر',
        image1: 'https://cdn.salla.sa/obKl/6D3IuYQDneNgqqxRHF2HLF0D6DVHP5sgX9GYAMze.jpg',
        image2: 'https://cdn.salla.sa/obKl/6D3IuYQDneNgqqxRHF2HLF0D6DVHP5sgX9GYAMze.jpg',
        old_price: 'JD 4.00',
        curr_price: 'JD 3.50'
    },
    {
        name: 'قسط هندي',
        image1: 'https://cdn.salla.sa/fHfCdpt6alNXizEqgIQjnohbHxt74M7XPTFuJpqy.jpeg',
        image2: 'https://cdn.salla.sa/fHfCdpt6alNXizEqgIQjnohbHxt74M7XPTFuJpqy.jpeg',
        old_price: 'JD 5.00',
        curr_price: 'JD 3.50'
    },
    {
        name: 'ورد محمدي',
        image1: 'https://cdn.salla.sa/1Teo2s8rZUO9vKn6io2nnNqIFNcVqI8xoDjyKyaK.jpeg',
        image2: 'https://cdn.salla.sa/1Teo2s8rZUO9vKn6io2nnNqIFNcVqI8xoDjyKyaK.jpeg',
        old_price: 'JD 5.00',
        curr_price: 'JD 4.50'
    },
  
   
]

let product_list = document.querySelector('#related-products')

renderProducts = (products) => {
    products.forEach(e => {
        let prod = `
            <div class="col-4 col-md-6 col-sm-12">
                <div class="product-card">
                    <div class="product-card-img">
                        <img src="${e.image1}" alt="">
                        <img src="${e.image2}" alt="">
                    </div>
                    <div class="product-card-info">
                        <div class="product-btn">
                            <a href="./product-detail.html" class="btn-flat btn-hover btn-shop-now">تفاصيل أكثر</a>
                            <button class="btn-flat btn-hover btn-cart-add">
                                <i class='bx bxs-cart-add'></i>
                            </button>
                            <button class="btn-flat btn-hover btn-cart-add">
                                <i class='bx bxs-heart'></i>
                            </button>
                        </div>
                        <div class="product-card-name">
                            ${e.name}
                        </div>
                        <div class="product-card-price">
                            <span><del>${e.old_price}</del></span>
                            <span class="curr-price">${e.curr_price}</span>
                        </div>
                    </div>
                </div>
            </div>
        `
        product_list.insertAdjacentHTML("beforeend", prod)
    })
}

renderProducts(products)