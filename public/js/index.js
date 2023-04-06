let slide_index = 0
let slide_play = true
let slides = document.querySelectorAll('.slide')

hideAllSlide = () => {
    slides.forEach(e => {
        e.classList.remove('active')
    })
}

showSlide = () => {
    hideAllSlide()
    slides[slide_index].classList.add('active')
}

nextSlide = () => slide_index = slide_index + 1 === slides.length ? 0 : slide_index + 1

prevSlide = () => slide_index = slide_index - 1 < 0 ? slides.length - 1 : slide_index - 1

// pause slide when hover slider

document.querySelector('.slider').addEventListener('mouseover', () => slide_play = false)

// enable slide when mouse leave out slider
document.querySelector('.slider').addEventListener('mouseleave', () => slide_play = true)

// slider controll

document.querySelector('.slide-next').addEventListener('click', () => {
    nextSlide()
    showSlide()
})

document.querySelector('.slide-prev').addEventListener('click', () => {
    prevSlide()
    showSlide()
})

showSlide()

// setInterval(() => {
//     if (!slide_play) return
//     nextSlide()
//     showSlide()
// }, 3000);

// render products

let products = [
    {
        name: 'فلفل اسود/125غرام',
        image1: 'https://i0.wp.com/atarh.com/wp-content/uploads/2020/04/%D9%81%D9%84%D9%81%D9%84-%D8%A7%D8%B3%D9%88%D8%AF-%D8%A8%D8%B1%D8%A7%D8%B2%D9%8A%D9%84%D9%8A-%D9%85%D8%B7%D8%AD%D9%88%D9%86.jpeg?fit=309%2C309&ssl=1',
        image2: 'https://www.pngplay.com/wp-content/uploads/1/Spices-PNG-Download-Free-Image.png',
        old_price: 'JD 2.000',
        curr_price: 'JD 1.500'
    },
    {
        name: 'فلفل اسود/125غرام',
        image1: 'https://i0.wp.com/atarh.com/wp-content/uploads/2020/04/%D9%81%D9%84%D9%81%D9%84-%D8%A7%D8%B3%D9%88%D8%AF-%D8%A8%D8%B1%D8%A7%D8%B2%D9%8A%D9%84%D9%8A-%D9%85%D8%B7%D8%AD%D9%88%D9%86.jpeg?fit=309%2C309&ssl=1',
        image2: 'https://www.pngplay.com/wp-content/uploads/1/Spices-PNG-Download-Free-Image.png',
        old_price: 'JD 2.000',
        curr_price: 'JD 1.500'
    },
    {
        name: 'فلفل اسود/125غرام',
        image1: 'https://i0.wp.com/atarh.com/wp-content/uploads/2020/04/%D9%81%D9%84%D9%81%D9%84-%D8%A7%D8%B3%D9%88%D8%AF-%D8%A8%D8%B1%D8%A7%D8%B2%D9%8A%D9%84%D9%8A-%D9%85%D8%B7%D8%AD%D9%88%D9%86.jpeg?fit=309%2C309&ssl=1',
        image2: 'https://www.pngplay.com/wp-content/uploads/1/Spices-PNG-Download-Free-Image.png',
        old_price: 'JD 2.000',
        curr_price: 'JD 1.500'
    },
   
   
]

var swiper = new Swiper(".reviews-slider", {
    spaceBetween:9,
    grabCursor:true,
    loop:true,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: true,
    },
    breakpoints: {
    0: {
        slidesPerView: 1,
      },
    768:{
        slidesPerView:3,
      },
    1024:{
        slidesPerView:6,
    },
    },
    pagination: {
             el: ".swiper-pagination1",
             clickable:true,
           },
  });




// _____________________________
let product_list = document.querySelector('#latest-products')
let best_product_list = document.querySelector('#best-products')

products.forEach(e => {
    let prod = `
        <div class="col-3 col-md-6 col-sm-12">
            <div class="product-card">
                <div class="product-card-img">
                    <img src="${e.image1}" alt="">
                    <img src="${e.image2}" alt="">
                </div>
                <div class="product-card-info">
                    <div class="product-btn">
                        <button class="btn-flat btn-hover btn-shop-now">تفاصيل أكثر </button>
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
                    <span class="rating">
                        
                        <i class='bx bx-star'></i>
                        <i class='bx bx-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </span>
                    <div class="product-card-price">
                        <span><del>${e.old_price}</del></span>
                        <span class="curr-price">${e.curr_price}</span>
                    </div>
                </div>
            </div>
        </div>
    `

    product_list.insertAdjacentHTML("beforeend", prod)
    best_product_list.insertAdjacentHTML("afterbegin", prod)
})


