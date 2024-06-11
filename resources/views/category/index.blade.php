
    <style>

@import url("https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&family=Space+Grotesk:wght@500;700&display=swap");

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
html {
  font-size: 62.5%;
}
:root {
  --Orange: hsl(26, 100%, 55%);
  --Paleorange: hsl(25, 100%, 94%);
  --verydark: hsl(220, 13%, 13%);
  --Darkgrayish: hsl(219, 9%, 45%);
  --Grayish: hsl(220, 14%, 75%);
  --Lightgrayish: hsl(223, 64%, 98%);
  --White: hsl(0, 0%, 100%);
}
/* ============================Utality Classes=========================== */
body {
  font-family: "Kumbh Sans";
}
p {
  font-size: 1.6rem;
}
a {
  text-decoration: none;
}
.container {
  max-width: 1440px;
  width: 100%;
  margin: 0 auto;
  padding: 0 3rem;
}

/*=========================================================== */
/*===========================Navbar========================== */
/*=========================================================== */
header {
  margin-top: 4rem;
  position: relative;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
}
nav::before {
  content: "";
  position: absolute;
  width: 100%;
  bottom: -50px;
  height: 1.4px;
  background-color: var(--Grayish);
}
nav ul,
.cart_content {
  display: flex;
  align-items: center;
  justify-content: center;
}
nav ul .logo {
  cursor: pointer;
  margin-right: 6rem;
}
nav ul li {
  list-style-type: none;
}
nav ul li a {
  font-size: 1.6rem;
  color: var(--Grayish);
  padding: 0 2rem;
  position: relative;
}
nav ul li a:hover::after {
  position: absolute;
  content: "";
  width: 100%;
  bottom: -60px;
  background-color: var(--Orange);
  height: 3px;
  left: 0;
}
nav ul li a:hover {
  color: var(--verydark);
}
.cart_content {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.cart_content img {
  cursor: pointer;
  position: relative;
}
.user_icon img {
  display: block;
  width: 40%;
  margin-left: auto;
}
.qty_label {
  position: absolute;
  top: -2px;
  right: 95px;
  background-color: var(--Orange);
  color: var(--White);
  padding: 02px 7px;
  border-radius: 10px;
  display: none;
}
/*=========================================================== */
/*===========================Cart Details========================== */
/*=========================================================== */
.cart_box {
  position: absolute;
  top: 80px;
  right: 0px;
  background-color: var(--White);
  width: 380px;
  padding: 1.5rem;
  box-shadow: 0px 05px 10px var(--verydark);
  border-radius: 05px;
  display: none;
  z-index: 10;
}
.cart_box.displayBox {
  display: block;
}
.cart_box .box_header {
  font-size: 2rem;
  font-weight: 600;
  position: relative;
}
.cart_box .box_header::after {
  position: absolute;
  content: "";
  bottom: -30px;
  left: 0;
  width: 100%;
  height: 3px;
  background-color: var(--Lightgrayish);
}
.pro_content {
  margin-top: 6rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.pro_content > img {
  border-radius: 10px;
  width: 60px;
}
.total {
  font-weight: 600;
}
.cart_empty {
  text-align: center;
  font-weight: 600;
  padding: 3rem 0;
}
</style>
<!-- =================Navbar Start===================== -->
<header class="header" role="banner">
      <div class="container">
        <nav>
          <ul>
            <div class="logo">
              <img src="./images/logo.svg" alt="" />
            </div>
            <li><a href="#">Collections</a></li>
            <li><a href="#"> Men</a></li>
            <li><a href="#"> Women</a></li>
            <li><a href="#"> About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <div class="cart_content">
            <img src="./images/icon-cart.svg" alt="" />
            <span class="qty_label">3</span>
            <div class="user_icon">
              <img src="./images/image-avatar.png" alt="" />
            </div>
            <div class="cart_box">
              <p class="box_header">Cart</p>
              <div class="pro_content">
                <!-- <img src="/images/image-product-1-thumbnail.jpg" alt="" />
                <div class="p_details">
                  <p class="pro_txt">Fall Limited Edition Sneakers</p>
                  <p class="price">
                    $125.00 <span>x</span><span class="times"> 3</span>
                    <span class="total">$375</span>
                  </p>
                </div>
                <div class="trash">
                  <img src="/images/icon-delete.svg" alt="" class="trash_img" />
                </div> -->
              </div>
              <div class="cart_empty">
                <p>Your cart is empty :)</p>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- =================Navbar Close===================== -->
<main id="products">
      <div class="container">
        <div class="producat_wrapper">
          <div class="producat_image">
            <div class="img_thumbnail">
              <img src="./images/image-product-1.jpg" alt="" />
              <div class="img_small">
                <img
                  src="./images/image-product-1-thumbnail.jpg"
                  alt=""
                  class="active"
                />
                <img src="./images/image-product-2-thumbnail.jpg" alt="" />
                <img src="./images/image-product-3-thumbnail.jpg" alt="" />
                <img src="./images/image-product-4-thumbnail.jpg" alt="" />
              </div>
            </div>
          </div>
          <div class="producat_content">
            <p class="company_txt">Sneaker Company</p>
            <h2>Fall Limited Edition Sneakers</h2>
            <p class="producat_des">
              These low-profile sneakers are your perfect casual wear companion.
              Featuring a durable rubber outer sole, they’ll withstand
              everything the weather can offer.
            </p>
            <div class="price">
              <div class="dicscount_price">
                <p class="normal_price">$125.00</p>
                <p><span class="discount">50%</span></p>
              </div>
              <p class="total_price">$250.00</p>
            </div>
            <div class="qty">
              <div class="btns">
                <button type="button" class="decreament">-</button>
                <button type="input" class="qty_numbers">1</button>
                <button type="button" class="increament">+</button>
              </div>
              <button class="add_cart" type="button">
                <span
                  ><svg
                    width="22"
                    height="20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M20.925 3.641H3.863L3.61.816A.896.896 0 0 0 2.717 0H.897a.896.896 0 1 0 0 1.792h1l1.031 11.483c.073.828.52 1.726 1.291 2.336C2.83 17.385 4.099 20 6.359 20c1.875 0 3.197-1.87 2.554-3.642h4.905c-.642 1.77.677 3.642 2.555 3.642a2.72 2.72 0 0 0 2.717-2.717 2.72 2.72 0 0 0-2.717-2.717H6.365c-.681 0-1.274-.41-1.53-1.009l14.321-.842a.896.896 0 0 0 .817-.677l1.821-7.283a.897.897 0 0 0-.87-1.114ZM6.358 18.208a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm10.015 0a.926.926 0 0 1 0-1.85.926.926 0 0 1 0 1.85Zm2.021-7.243-13.8.81-.57-6.341h15.753l-1.383 5.53Z"
                      fill="#ffffff"
                      fill-rule="nonzero"/></svg></span>
                <p>Add to Cart</p>
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
<style>

/*=========================================================== */
/*===========================Producat Page========================== */
/*=========================================================== */
#products {
  margin-top: 15rem;
  position: relative;
  width: 100%;
}

.producat_wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 14rem;
  width: 90%;
}
.producat_image img {
  display: block;
  object-fit: cover;
  width: 90%;
  border-radius: 10px;
  cursor: pointer;
  margin-left: auto;
}
.img_small {
  display: flex;
  justify-content: space-between;
  margin-top: 3rem;
  width: 90%;
  margin-left: auto;
}
.img_small img {
  object-fit: cover;
  width: 22%;
}
.img_small img.active {
  border: 2px solid var(--Orange);
  opacity: 0.3;
}
.company_txt {
  color: var(--Orange);
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 2px;
  font-size: 1.2rem;
}
.producat_content {
  width: 100%;
  margin: 0 auto;
}
.producat_content h2 {
  font-size: 4rem;
  margin: 1rem 0;
  width: 60%;
}
.producat_des {
  margin: 2rem 0;
  width: 65%;
  font-size: 1.5rem;
  line-height: 1.56;
  color: var(--Darkgrayish);
}
.dicscount_price {
  display: flex;
  align-items: center;
}
.normal_price {
  font-size: 2.5rem;
  font-weight: 700;
}
.dicscount_price span {
  font-weight: normal;
  font-size: 1.5rem;
  background-color: #ffeee2;
  padding: 0 0.5rem;
  color: var(--Orange);
  font-weight: 700;
  margin-left: 1rem;
}
.total_price {
  text-decoration: line-through;
  color: var(--Grayish);
  margin: 1rem 0;
}
.qty {
  display: flex;
  align-items: center;
  margin-top: 3rem;
}
.btn {
  display: flex;
  justify-content: center;
  align-items: center;
}
.btns button {
  outline: none;
  border: none;
  background-color: var(--Lightgrayish);
  color: var(--Orange);
  padding: 0.7rem 1.2rem;
  font-size: 2rem;
  font-family: inherit;
  cursor: pointer;
}
.btns button:active {
  transform: scale(0.98);
}
.btns .qty_numbers {
  color: var(--Darkgrayish);
  font-weight: 600;
}
.add_cart {
  outline: none;
  border: none;
  background-color: var(--Orange);
  font-family: inherit;
  color: var(--White);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem 6rem;
  border-radius: 5px;
  margin-left: 4rem;
  cursor: pointer;
}
.add_cart:active {
  transform: scale(0.98);
}
.add_cart svg {
  margin-right: 1rem;
}
</style>
<div class="modal">
      <div class="modal_wrapper">
        <img src="./images/icon-close.svg" alt="" class="close_icon" />
        <div class="producat_image_modal">
          <div class="img_thumbnail_modal">
            <img src="./images/image-product-1.jpg" alt="" class="m_img" />
            <div class="img_small_modal">
              <img
                src="./images/image-product-1-thumbnail.jpg"
                alt=""
                class="active"
              />
              <img src="./images/image-product-2-thumbnail.jpg" alt="" />
              <img src="./images/image-product-3-thumbnail.jpg" alt="" />
              <img src="./images/image-product-4-thumbnail.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>

/*=========================================================== */
/*===========================Modal========================== */
/*=========================================================== */
.modal {
  width: 100%;
  height: 100%;
  display: none;
}

.modal::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
}
.modal_wrapper {
  width: 450px;
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.img_thumbnail_modal img {
  object-fit: cover;
  width: 100%;
  border-radius: 10px;
  cursor: pointer;
}
.img_small_modal {
  display: flex;
  justify-content: space-between;
  margin-top: 40px;
}
.img_small_modal img {
  object-fit: cover;
  width: 100px;
}
.img_small_modal img.active {
  border: 2px solid var(--Orange);
  opacity: 0.7;
}
.close_icon {
  position: absolute;
  top: -20px;
  right: 0;
  cursor: pointer;
}
.img_thumbnail_modal .next img,
.prev img {
  object-fit: cover;
  width: 10px;
}
.img_thumbnail_modal .next {
  position: absolute;
  right: -45px;
  top: 40%;
  transform: translate(-50%, -50%);
  background-color: var(--White);
  border-radius: 50%;
  padding: 1rem;
}
.img_thumbnail_modal .prev {
  position: absolute;
  left: -15px;
  top: 40%;
  transform: translate(-50%, -50%);
  background-color: var(--White);
  border-radius: 50%;
  padding: 1rem;
}
</style>
<script>
"use strict";

const cartIcon = document.querySelector(".cart_content img");
const cartbox = document.querySelector(".cart_box");
const qtyLable = document.querySelector(".qty_label");
const normalPrice = document.querySelector(".normal_price");
const proContainer = document.querySelector(".pro_content");
const cartEmpty = document.querySelector(".cart_empty");
//btns
const btnAddCart = document.querySelector(".add_cart");
const qty = document.querySelector(".qty_numbers");
const decr = document.querySelector(".decreament");
const increa = document.querySelector(".increament");
const trashCart = document.querySelector(".trash img");
//imgs
const thumImg = document.querySelectorAll(".img_small img");
const imgLarge = document.querySelector(".img_thumbnail img");
//modal
const modalEl = document.querySelector(".modal");
const closeModal = document.querySelector(".close_icon");
const nextImg = document.querySelector(".next img");
const prevImg = document.querySelector(".prev img");
const modalImgs = document.querySelectorAll(".img_small_modal img");
const modalLImg = document.querySelector(".m_img");
let proPrice = 125;
let totalQty = qty.innerHTML;
let totalPrice;
// shoping cart dispaly and hide
cartIcon.addEventListener("click", () => {
  cartbox.classList.toggle("displayBox");
});
//btn cart to increament number
decr.addEventListener("click", () => {
  if (totalQty == 1) {
    totalQty == 1;
  } else {
    totalQty--;
  }
  totalPrice = proPrice * totalQty;
  normalPrice.textContent = "$" + totalPrice + ".00";
  qty.textContent = totalQty;
});
//btn cart to increament number
increa.addEventListener("click", () => {
  totalQty++;
  totalPrice = proPrice * totalQty;
  normalPrice.textContent = "$" + totalPrice + ".00";
  qty.textContent = totalQty;
});
//add to carts
btnAddCart.addEventListener("click", () => {
  qtyLable.style.display = "block";
  qtyLable.innerHTML = totalQty;
  proContainer.innerHTML = "";
  let html = `<img src="./images/image-product-1-thumbnail.jpg" alt="" />
  <div class="p_details">
    <p class="pro_txt">Fall Limited Edition Sneakers</p>
    <p class="price">
      $125.00 <span>x</span><span class="times">${totalQty}</span>
      $<span class="total">${totalPrice}</span>
    </p>
  </div>
  <div class="trash">
    <img src="./images/icon-delete.svg" alt="" class="trash_img" />
  </div>`;
  proContainer.insertAdjacentHTML("afterbegin", html);
  cartEmpty.innerHTML = "";
  document.querySelector(".trash_img").addEventListener("click", () => {
    cartEmpty.innerHTML = "Your cart is empty :)";
    proContainer.innerHTML = "";
    qtyLable.style.display = "none";
  });
});
// display thumbnail images
thumImg.forEach((img, indx) => {
  indx++;
  img.addEventListener("click", (e) => {
    imgLarge.src = `images/image-product-${indx}.jpg`;
    thumImg.forEach((thumb) => thumb.classList.remove("active"));
    img.classList.add("active");
  });
});
// display modal
imgLarge.addEventListener("click", () => {
  modalEl.style.display = "block";
});
// hide modal modal
closeModal.addEventListener("click", () => {
  modalEl.style.display = "none";
});
// display images in the modal
modalImgs.forEach((mImg, indx) => {
  indx++;
  mImg.addEventListener("click", (e) => {
    modalLImg.src = `images/image-product-${indx}.jpg`;
    modalImgs.forEach((thuMImg) => thuMImg.classList.remove("active"));
    mImg.classList.add("active");
  });
});
</script>

<h1>Categories</h1>

<a href="" class="btn btn-primary">Create Category</a>



<h1 class="m-0 text-white display-4 text-center"><span class="text-danger">Categories</span></h1>
    
    <a href="" class="btn btn-primary btn-lg m-2">Add Category</a>

<div class="container">
    <div class="row">
    <div class="col-lg-10 m-auto py-2">
    <table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>taxonomy</th>
            <th>handle</th>
            <th>content</th>
            <th>published_at</th>
            <th>available</th>
            <th>Image</th>
            <th>sort_order</th>
            <th>template_suffix</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Created By</th>
            <th>Num of Products</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->taxonomy }}</td>
            <td>{{ $category->handle }}</td>
            <td>{{ $category->content }}</td>
            <td>{{ $category->published_at }}</td>
            <td>{{ $category->available }}</td>
            <td><img src="{{ $category->image }}" alt="Category Image" width="100" height="100"></td>
            <td>{{ $category->sort_order }}</td>
            <td>{{ $category->template_suffix }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>category->user->name</td> 
            <td>{{$category->product_count}}</td>
            <td>
                <!-- Action buttons --> 
                <a
            href=""
             class="btn btn-info">
              Details
            </a>
                        <a href="" class="btn btn-primary">Edit</a>
                <form action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div>
</div>
