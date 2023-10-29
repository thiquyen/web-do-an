//Hiển thị nhanh sản phẩm:
const quickview = document.querySelectorAll('.quick-view');
quickview.forEach(element => {
    element.addEventListener('click', (e) => {
        getProductDetail(element.dataset.productId);
    });
});

function formatNumber(a, b, c, d) {
    var e = isNaN(b = Math.abs(b)) ? 2 : b;
    b = void 0 == c ? "," : c;
    d = void 0 == d ? "," : d;
    c = 0 > a ? "-" : "";
    var g = parseInt(a = Math.abs(+a || 0).toFixed(e)) + "",
        n = 3 < (n = g.length) ? n % 3 : 0;
    return c + (n ? g.substr(0, n) + d : "") + g.substr(n).replace(/(\d{3})(?=\d)/g, "$1" + d) + (e ? b + Math.abs(a - g).toFixed(e).slice(2) : "")
}

 async function getProductDetail(productId) {
     const url = '/api/product/' + productId;
     const response = await fetch(url);
     //B2: Nhận và đọc kết quả:
     const result = await response.json();
     //B3: xuất kết quả:
     const divResult = document.querySelector(".modal-body");
     divResult.innerHTML = `
    <div class="row">
        <div class="col-6">
        <img src="/img/${result.image}" alt="" class="img-fluid">
        </div>
        <div class="col-6">
            <h1>${result.product_name}</h1>
            <p class="product-price">
               Giá sản phẩm:${ formatNumber(result.sale_price, 0, ",", ".")}  VND
            </p>
            <p class="product-price">
               Hạn sử dụng:  <span class="badge bg-primary"><strong> ${result.expiry} Ngày</strong></span>
            </p>
        </div>
        <p class="product-description pt-4">
         ${result.description}
      </p>`;
      
}

// Tìm sản phẩm theo từ khóa
async function searchProduct(keyword) {
    const divResult = document.querySelector("#search-result");
    if (keyword != '') {
        //B1: Gửi request:
        const url = "/api/searchProduct/"+keyword;
        const response = await fetch(url);
        //B2: Nhận và đọc kết quả:
        const result = await response.json();
        //B3: xuất kết quả:
        divResult.classList.add('border-search');
        divResult.innerHTML = '';
        result.forEach(el => {
            let regexProductName = new RegExp('(' + keyword + ')', 'gi');
            const productName = el.product_name.replace(regexProductName, '<b>$1</b>');
            link = '/thongtinsp/' + el.id;
            divResult.innerHTML += `
            <div class="row border-item-search" >
                <div class="col-3 ">
                    <img src="../img/${el.image}" class="img-fluid m-3">
                </div>
                <div class="col-9 mt-3">
                    <a href="${link}">${productName}</a>
                    <p>${el.sale_price} VND</p>
                </div>
            </div>`;
        });
    }
    else {
        divResult.innerHTML = '';
        divResult.classList.remove('border-search');
    }
}

let ratingBox = document.querySelector("#rating-container");
let ratings = document.querySelectorAll('.rating');
// console.log(ratings.length);

for (var i = 0; i < ratings.length; i++) {
  ratings[i].addEventListener("mouseenter", (e) => { activateRating(Array.from(ratings).indexOf(e.target));});
  ratings[i].addEventListener("mouseleave", (e) => { deactivateRating(Array.from(ratings).indexOf(e.target));});
}

function activateRating(idx) {
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.add("active");
  }
}

function deactivateRating(idx) {
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.remove("active");
  }
}

var ratinggg = 0;

function rate(num) {
  console.log("Rating Selected: " + num);
  ratinggg = num;
  var idx = parseInt(num) - 1;
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.add("selected");
  }
  for (var i = idx + 1; i < ratings.length; i++) {
    ratings[i].classList.remove("selected");
  }
  return ratinggg = num;
}

const btnComment = document.querySelector('#btn-comment');
btnComment.addEventListener('click', function () {
    addComment(this.dataset.productId, this.dataset.url);
});

async function addComment(productId, url) {
    const customer_Id = document.querySelector('#customer_id').value;
    const customer_Name = document.querySelector('#customer_name').value;
    const commentContent = document.querySelector('#comment_content').value;
    const rating = ratinggg;
    const data = {
        customer_id: customer_Id,
        customer_name: customer_Name,
        comment_content: commentContent,
        product_id: productId,
        rating: rating
    };
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();
    const divComment = document.querySelector("#show-comment");
    divComment.innerHTML = '';
    result.forEach(element => {
        divComment.innerHTML += `
        <div class="testimonial-item text-white border-inner p-4" style="background-color:#905ddc !important">
            <div class="d-flex align-items-center mb-3">
                <img class="img-fluid flex-shrink-0" src="/img/smile.png" style="width: 60px; height: 60px;">
                <div class="ps-3">
                    <h4 class="text-white text-uppercase mb-1" >${element.customer_name}</h4>
                    <span>${element.rating} Sao</span>
                </div>
            </div>
            <p class="mb-0">${element.comment_content}</p>
        </div>`
    });
}




