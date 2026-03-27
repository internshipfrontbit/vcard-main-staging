@if($whatsappStore->id == 262)
<style>
    /*.navbar{*/
    /*    background: #000000 !important;*/
    /*}    */
    /*body{*/
    /*    background: #000000 !important;*/
    /*}*/
    /*.navbar .fw-6.fs-18 a{*/
    /*    color: #ffffff !important;*/
    /*}*/
    /*.language-dropdown .dropdown-btn{*/
    /*    color: #ffffff !important;*/
    /*}*/
    /*.dropdown-arrow path{*/
    /*    fill: #ffffff !important;*/
    /*}*/
    /*.category-section{*/
    /*    background: #000000 !important;*/
    /*    margin-bottom: 0px !important;*/
    /*}*/
    /*.section-heading h2{*/
    /*    color: #ffffff !important;*/
    /*}*/
    /*.product-section-new .ps-2.pe-3 svg path{*/
    /*    fill: #ffffff !important;*/
    /*}*/
    /*.category-section .category-item{*/
    /*    position: relative;*/
    /*    background: #1d1d1d;*/
    /*    color: #ffffff;*/
    /*    border: none !important;*/
    /*}*/
    /*.add-to-cart-btn svg path{*/
    /*    fill: #ffffff;*/
    /*}*/
    /*.add-to-cart-btn{*/
    /*    background: #1d1d1d !important;*/
    /*}*/
    /*.product-section-new.product-section{*/
    /*    background: #000000;*/
    /*    padding-top: 27px;*/
    /*    margin-bottom: 0px !important;*/
    /*    padding-bottom: 190px !important;*/
    /*}*/
    /*.product-section .product-card .product-details{*/
    /*    background: #1d1d1d;*/
    /*}*/
    /*.product-section .product-card .product-details h5{*/
    /*    color: #ffffff !important;*/
    /*}*/
    /*.product-section .product-card .product-details p{*/
    /*    color: #ffffff !important;*/
    /*}*/
    /*footer {*/
    /*    background-color: #1d1d1d;*/
    /*}*/
    /*.view-more-btn{*/
    /*    background: #1d1d1d !important;    */
    /*}*/
    /*.bg-vector.bg-vector-6 + div{*/
    /*    background: #000000 !important;*/
    /*}*/
</style>
@endif

<style>


    .title-size {
        font-size: 19px !important;
    }
    
    .category-name-size {
        font-size: 17px !important;
    }
    
    .product-name-size {
        font-size: 16px !important;
    }

    .footer-link-new {
        color: #000000;
        text-decoration: none;
        margin: 0 5px;
        font-size: 14px;
    }
    
    .footer-link-new:hover {
        text-decoration: underline;
        color: #000000;
    }


    .footer-link {
        color: #f1f1f1;
        text-decoration: none;
        margin: 0 5px;
        font-size: 14px;
    }
    
    .footer-link:hover {
        text-decoration: underline;
        color: #ffffff;
    }




    /*.product-section .product-card .product-img img{*/
    /*    aspect-ratio: unset !important;*/
    /*} */
    /*.items-section .item-card .item-img img {*/
    /*    aspect-ratio: unset !important;*/
    /*}*/
    .google-button {
  display: block;
  margin: 15px auto;
  width: 70%;
  max-width: 270px;
  padding: 10px 10px 10px 50px;
  border: 2px solid #00a0dc;
  border-radius: 50px;
  text-transform: uppercase;
  text-decoration: none;
  text-align: center;
  font-size: 13px;
  line-height: 20px;
  color: #00a0dc;
  background: url(https://cdn2.hubspot.net/hubfs/1961464/Support%20images/new-google-favicon-512.png) no-repeat left 20px center / 40px 40px, #ffffff;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
    -webkit-animation: wiggle 2s ease-in infinite;
    -moz-animation: wiggle 2s ease-in infinite;
    -o-animation: wiggle 2s ease-in infinite;
  animation: wiggle 2s ease-in infinite;
}

  .google-button:hover {
    color: #ffffff;
    background-color: #00a0dc;
    background-image: url(https://cdn2.hubspot.net/hubfs/1961464/Support%20images/new-google-favicon-512-white.png);
}

  .google-button strong {
    font-size: 18px;
    display: block;
  }


@-webkit-keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}

@-moz-keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}

@-o-keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}

@keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}
    @media (max-width: 575px) {
    .section-heading h2 {
        font-size: 20px !important;
    }
    }
    .share-button{
        position: absolute;
                                        top: 27%;
                                        right: -1px;
                                        font-size: 20px;
                                        background: #e6d5b7;
                                        padding: 10px 10px;
                                        border-radius: 50px;
                                        cursor: pointer;
                                        color: #000000;
    }
    .share-button-category{
        position: absolute;
        top: 14%;
        right: -18px;
        font-size: 17px;
        background: #e6d5b7;
        padding: 7px 7px;
        border-radius: 50px;
        cursor: pointer;
        color: #000000;
    }
    @media (max-width: 768px) {
        .share-button, .share-button-category{ 
            top: 14%;
        }
    }
    
     @media (max-width: 600px) {
        .share-button, .share-button-category{ 
            top: 23%;
            right: -9px;
            font-size: 16px;
            padding: 7px 7px;
        }
    }
    
    
    
    
</style>

@if($whatsappStore->id == 223)
<style>
    .items-section .item-card .item-img img{
        aspect-ratio: unset !important;
    }
    .product-section .product-card .product-img img {
        aspect-ratio: unset !important;
    }
</style>
@else
    <style>
        .product-section .product-card .product-img img {
     height: 282px !important;
     aspect-ratio: unset !important;
    }
    
    
    .items-section .item-card .item-img img {
    height: 282px !important;
    aspect-ratio: unset !important;
    }
    
    
    .recommended-product-section .product-slider .slick-slide .product-card .product-img img {
    height: 282px !important;
    aspect-ratio: unset !important;
    }
    </style>
@endif
@if($whatsappStore->id == 344)
<style>
    .items-section .item-card .item-img img {
        height: 191px !important;
        aspect-ratio: unset !important;
    }
    @media(max-width: 600px){
        .items-section .item-card .item-img img {
            height: 254px !important;
            aspect-ratio: unset !important;
        }
    }
</style>
@endif
@if($whatsappStore->id == 423)
<style>
    .product-section .product-card .product-img img {
        height: 374px !important;
        aspect-ratio: unset !important;
    }

    .recommended-product-section .product-slider .slick-slide .product-card .product-img img {
        height: 350px !important;
        aspect-ratio: unset !important;
    }
    @media (max-width: 600px){
        .product-section .product-card .product-img img {
            height: 461px !important;
            aspect-ratio: unset !important;
            object-fit: fill;
        }
            
        .items-section .item-card .item-img img {
    height: 430px !important;
    aspect-ratio: unset !important;
    object-fit: fill;
}

.recommended-product-section .product-slider .slick-slide .product-card .product-img img {
    height: 436px !important;
    aspect-ratio: unset !important;
}
    }
</style>
@endif
@if($whatsappStore->id == 423)
<style>
    .product-section-new {
        margin-bottom: 0px !important;
    }
    .product-category-jk-filtter {
        display: none !important;
    }
    
    .
</style>
@endif

@if($whatsappStore->id == 208 || $whatsappStore->id == 1488)
<style>
.items-section .item-card .item-img img {
    aspect-ratio: unset !important;
}
.addToCartBtn{
    background-color: #25d366 !important;
    background: #c29c77 !important;
    border: 1px solid #c29c77 !important;
}
.addToCartBtn:hover{
    color: #fff !important;
    border: 1px solid #25d366 !important;
}
.fs-17{
    font-size: 17px !important;
}


        .horizontal-videos {
            display: flex;
            overflow: hidden;
            gap: 10px;
            max-width: calc((210px * 8) + (10px * 7)) !important;
            margin: 40px auto 0;
            scroll-behavior: smooth;
        }

</style>
@endif
@if($whatsappStore->id == 208 || $whatsappStore->id == 1488 || $whatsappStore->id == 392)
    <style>
        .main-content{
            max-width: 100% !important;
        }
        .product-section .col-xl-3{
            width: 16.66% !important;
            max-width: 16.66% !important;
        }
        .products-section .col-xl-3{
             width: 20% !important;
            max-width: 20% !important;
        }
        .recommended-product-section .product-slider .slick-slide .product-card .product-img img {
            aspect-ratio: 1.25;
        }
        
         @media(max-width: 1250px){
            .product-section .col-xl-3{
                width: 25% !important;
                max-width: 25% !important;
            }
            .products-section .col-xl-3{
                width: 25% !important;
                max-width: 25% !important;
            }
        }
        
        @media(max-width: 768px){
            .product-section .col-xl-3{
                width: 33.33% !important;
                max-width: 33.33% !important;
            }
        }
        @media(max-width: 600px){
            .product-section .col-xl-3{
                width: 50% !important;
                max-width: 50% !important;
            }
            .products-section .col-xl-3{
                width: 50% !important;
                max-width: 50% !important;
            }
            .addToCartBtn{
                font-size: 13px !important;
            }
            .category-section .section-heading{
                
            }
        }
    </style>
@endif

@if($whatsappStore->id == 481)
<style>
.items-section .item-card .item-img img {
    height: 135px !important;
    aspect-ratio: unset !important;
}
.product-section .product-card .product-img img {
    height: 189px !important;
    aspect-ratio: unset !important;
}
.object-fit-cover {
    object-fit: fill;
}
   
    @media (max-width: 600px){
        .items-section .item-card .item-img img {
            height: 218px !important;
            aspect-ratio: unset !important;
        }
        
        .product-section .product-card .product-img img {
            height: 229px !important;
            aspect-ratio: unset !important;
        }
        
    }


</style>
@endif




