(function() {
    let storeAlias = $("#storeAlias").val();
    let key = storeAlias + "sb_sc_id";
    let mainSessionKey = storeAlias + "sc_id";
    let productkey = storeAlias + "p_sc_id";
    let storeId = $("#whatsappStoreId").val();

    function sendHeartbeat() {
        
        let subSessionId = localStorage.getItem(key);
        let productSubSessionId = localStorage.getItem(productkey);
        let mainSessionId = localStorage.getItem(mainSessionKey);
        if (!subSessionId) return;
        if (!mainSessionId) return;
        if(productSubSessionId){
            let payload = new Blob([JSON.stringify({ sub_session_id: subSessionId, product_sub_session_id: productSubSessionId, main_session_id: mainSessionId, store_id: storeId })], { type: "application/json" });
            navigator.sendBeacon("/api/heartbeat", payload);    
        }else{
            let payload = new Blob([JSON.stringify({ sub_session_id: subSessionId, main_session_id: mainSessionId, store_id: storeId })], { type: "application/json" });
            navigator.sendBeacon("/api/heartbeat", payload);
        }
        
    }

    // Send heartbeat every 30 seconds
    setInterval(sendHeartbeat, 20000);
})();

async function startProductViewSession(productId){

    let storeAlias = $("#storeAlias").val();
    let storeId = $("#whatsappStoreId").val();
    let mainSessionId = localStorage.getItem(storeAlias + "sc_id");
    let subSessionId = localStorage.getItem(storeAlias + "sb_sc_id");
    
    if(mainSessionId && subSessionId){
        const payload = {
            product_id: productId,
            store_id: storeId,
            main_session_id: mainSessionId,
            sub_session_id: subSessionId
        };
        
        if(localStorage.getItem(storeAlias + "p_sc_id")){
            
            if(localStorage.getItem(storeAlias + "p_sc") == productId){
                payload.product_session_id = localStorage.getItem(storeAlias + "p_sc_id");
                
            }
        }
    
    const response = await fetch(`https://${getdomain()}/start-product-sub-session`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
            },
            body: JSON.stringify(payload)
        });    

        const result = await response.json();

        if (result.p_sc_id) {
            localStorage.setItem(storeAlias + "p_sc_id" , result.p_sc_id);
            localStorage.setItem(storeAlias + "p_sc" , productId);
            localStorage.setItem(storeAlias + "p_prod_id", productId);
        }
        }else{
            localStorage.removeItem(storeAlias + "p_prod_id", productId);
            localStorage.setItem(storeAlias + "n_add_ses", productId);
        }
    
        
        
}

async function startProductInquirySession(productId, quantity){

    let storeAlias = $("#storeAlias").val();
    let mainSessionId = localStorage.getItem(storeAlias + "sc_id");
    let subSessionId = localStorage.getItem(storeAlias + "sb_sc_id");
    
    
    const payload = {
            product_id: productId,
            main_session_id: mainSessionId,
            sub_session_id: subSessionId,
            quantity
        };
    
    const response = await fetch(`https://${getdomain()}/start-product-inq-sub-session`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
            },
            body: JSON.stringify(payload)
        });    

        const result = await response.json();

        if (result.p_sc_id) {
            setSubsessionInCart(productId, result.p_sc_id);
        }
        
}

async function updateProductInquirySession(session_id,productId, quantity){

    let storeAlias = $("#storeAlias").val();
    let mainSessionId = localStorage.getItem(storeAlias + "sc_id");
    let subSessionId = localStorage.getItem(storeAlias + "sb_sc_id");
    
    
    const payload = {
            product_id: productId,
            inq_session_id: session_id,
            quantity
        };
    ``
    const response = await fetch(`https://${getdomain()}/update-product-inquiry-session`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
            },
            body: JSON.stringify(payload)
        });    

        let result = await response.json();

        result = undefined;
        
}

async function endProductInquirySession(sessionId){

    
    const payload = {
            sub_session_id: sessionId
        };
    
    const response = await fetch(`https://${getdomain()}/end-product-inq-sub-session`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
            },
            body: JSON.stringify(payload)
        });    
        
        

        let result = await response.json();

        result = undefined;
        
}

async function fetchMainSession(storeId, mainSessionId = null) {
    
    try {
        
        let storeAlias = $("#storeAlias").val();
        
        const payload = {
            store_id: storeId
        };
        
        if(localStorage.getItem(storeAlias + "sc_id")){
            mainSessionId = localStorage.getItem(storeAlias + "sc_id");
        };
        
        let sub_session_id = storeAlias + "sb_sc_id";

        if (mainSessionId) {
            payload.main_session_id = mainSessionId;
        }

        const response = await fetch(`https://${getdomain()}/fetch-main-session`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
            },
            body: JSON.stringify(payload)
        });

        const result = await response.json();

        if (result.sc_id) {
            localStorage.setItem(storeAlias + "sc_id", result.sc_id);
        }

        if (result.userdetails) {
            localStorage.setItem(storeAlias + "user_d", JSON.stringify(result.userdetails));
            let userDetails = result.userdetails;
            if(userDetails.name){
                if(storeId != 1488){
                    $("#orderForm #name").val(userDetails.name);
                    $("#orderForm #phoneNumber").val(userDetails.phone);
                    $("#orderForm #address").val(userDetails.address);
                }
            }
        }
        
        
            
            const payload1 = {
                store_id: storeId
            };
            
            if(localStorage.getItem(storeAlias + "sc_id")){
                mainSessionId = localStorage.getItem(storeAlias + "sc_id");
            };
            
            if(localStorage.getItem(storeAlias + "sb_sc_id")){
                payload1.sub_session_id = localStorage.getItem(storeAlias + "sb_sc_id");
            };
            
            if (mainSessionId) {
                payload1.main_session_id = mainSessionId;
            }
    
            const responseNew = await fetch(`https://${getdomain()}/fetch-sub-session`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
                },
                body: JSON.stringify(payload1)
            });
    
            const result1 = await responseNew.json();
    
            if (result1.sb_sc_id) {
                localStorage.setItem(storeAlias + "sb_sc_id", result1.sb_sc_id);
                if(localStorage.getItem(storeAlias + "n_add_ses")){
                    startProductViewSession(Number(localStorage.getItem(storeAlias + "n_add_ses")));
                    localStorage.removeItem(storeAlias + "n_add_ses");
                }
            }

            if(result1.newactivities && result1.newactivities.length > 0){
                result1.newactivities.forEach(activity =>{
                    setSubsessionInCart(activity.product_id, activity.id);
                });
            }
    } catch (error) {
        console.error("Error fetching main session:", error);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    if(!localStorage.getItem("clear_session3")){
        localStorage.clear();
        localStorage.setItem("clear_session3", "true")
    }
    let storeId = $("#whatsappStoreId").val();
    fetchMainSession(storeId);
    loadPhoneInput();
    Lang.setLocale(lang);
    productCount(storeId);

    if(storeId == 4){
        if(isUserDetailsSet()){
            openUserModelForm();
        }
    }


    const urlParams = new URLSearchParams(window.location.search);

    const minPrice = urlParams.get("minPrice");
    const maxPrice = urlParams.get("maxPrice");

    if (minPrice !== null) {
        document.getElementById("minCustomPrice").value = minPrice;
    }

    if (maxPrice !== null) {
        document.getElementById("maxCustomPrice").value = maxPrice;
    }

    if (minPrice && maxPrice) {
        document.getElementById("customPriceApply");
    }


    const container = document.getElementById('videoContainer');
    if (!container || container.querySelectorAll('.video-wrapper').length === 0) return;
    const overlay = document.getElementById('videoOverlay');
    const overlayIframe = overlay.querySelector('iframe');
    const closeBtn = overlay.querySelector('.close-btn');

    const videoWrappers = container.querySelectorAll('.video-wrapper');
    let currentIndex = 0;
    let autoSlideInterval;
    let overlayOpen = false;


    function isMobile() {
        return window.innerWidth <= 767;
    }


    function getVisibleCount() {
        const containerWidth = container.offsetWidth;
        const videoWidth = videoWrappers[0].offsetWidth + 10;
        return Math.floor(containerWidth / videoWidth);
    }

    function autoSlide() {
        const visibleCount = getVisibleCount();
        const currentVideoWrapper = videoWrappers[currentIndex];
        const dynamicVideoWidth = currentVideoWrapper.offsetWidth + 10;

        currentIndex++;

        container.scrollTo({
            left: currentIndex * dynamicVideoWidth,
            behavior: 'smooth'
        });


        if (currentIndex > (videoWrappers.length - visibleCount)) {
            setTimeout(() => {
                container.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
                currentIndex = 0;
            }, 600);
        }
    }

    function startAutoSlide() {
        if (isMobile()) return;
        if (autoSlideInterval) return;
        autoSlideInterval = setInterval(autoSlide, 3000);
    }

    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = null;
        }
    }


    document.addEventListener("visibilitychange", function () {
        if (isMobile()) return;

        if (document.hidden) {
            stopAutoSlide();
        } else {
            startAutoSlide();
        }
    });


    const iframes = container.querySelectorAll('iframe');
    let loadedCount = 0;

    iframes.forEach(iframe => {
        const shimmer = document.createElement('div');
        shimmer.classList.add('shimmer');
        iframe.parentNode.appendChild(shimmer);

        iframe.addEventListener('load', () => {
            shimmer.style.display = 'none';
            loadedCount++;
            if (loadedCount === iframes.length && !isMobile()) {
                startAutoSlide();
            }
        });
    });


    container.addEventListener('click', function (e) {
        const overlayDiv = e.target.closest('.iframe-click-overlay');
        if (overlayDiv) {
            const iframe = overlayDiv.previousElementSibling;
            stopAutoSlide();

            let src = iframe.src;

            src = src.replace(/(autoplay=0|autoplay=1)/, '');
            src = src.replace(/(mute=0|mute=1)/, '');
            src = src.replace(/(controls=0|controls=1)/, '');

            src += (src.includes('?') ? '&' : '?') + 'autoplay=1&mute=0&controls=1';

            overlayIframe.src = src;
            overlay.classList.add('active');
            overlayOpen = true;

            if (!history.state || !history.state.overlayOpen) {
                history.pushState({ overlayOpen: true }, '');
            }
        }
    });

    closeBtn.addEventListener('click', function () {
        closeOverlay(true);
    });


    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) {
            closeOverlay(true);
        }
    });


    window.addEventListener('popstate', function (e) {
        if (overlayOpen) {
            closeOverlay(false);
        }
    });

    function closeOverlay(fromCloseBtn) {
        overlay.classList.remove('active');
        overlayIframe.src = '';
        overlayOpen = false;

        if (!isMobile()) {
            startAutoSlide();
        }


        if (fromCloseBtn) {
            if (history.state && history.state.overlayOpen) {
                history.back();
            }
        } else {
            if (history.state && history.state.overlayOpen) {
                history.replaceState(null, '');
            }
        }
    }


});



listenClick(".addToCartBtn", function (event) {
    event.preventDefault();
    let storeId = $("#whatsappStoreId").val();
    if(storeId == 4){
        if(isUserDetailsSet()){
            openUserModelForm();
            return;
        }
    }

    localStorage.removeItem("selectedProductId");

    let productId = $(this).attr("data-id");

    console.log(productId);

    let productCard = $(this).closest(
        ".item-card, .product-card, .details, .product-detail-content, .product-box-section"
    );

    let prodAttribute = $("#product_attr_attribu_" + productId).val();
    let prodAttribTitle = $("#product_attr_title_" + productId).val();

    if (prodAttribute && !$("#isFromProductDetails").val()) {
        if (!localStorage.getItem("isFromModelClick")) {
            if (JSON.parse(prodAttribute).length > 0) {
                openModelAndrenderAttributes(JSON.parse(prodAttribute), prodAttribTitle, productCard.find(".currency_icon").text().trim(), 'addToCart', productId);
                return;
            }
        }
    }

    localStorage.removeItem("isFromModelClick");

    let button = $(this);
    let originalContent = button.html();
    
    let isStore = $(this).attr("data-storebutton");
    if (!isStore && storeId != 208) {
        button.html(" ✓ ").addClass("animate-btn");
        button.prop("disabled", true);

        setTimeout(function () {
            button.removeClass("animate-btn");
            button.prop("disabled", false);
            button.html(originalContent);
        }, 2000);
    }

    console.log(productCard);

    let sizeValue = '';
    let colorValue = '';

    const selectedSize = document.querySelector('input[name="size"]:checked');
    const selectedcolor = document.querySelector('#selectedColor');

    if (selectedSize) {
        sizeValue = selectedSize.value;
        // You can use selectedSize.value wherever needed
    } else {
        const selectedSize2 = document.querySelector('input[name="popupSize"]:checked');
        if (selectedSize2) {
            sizeValue = selectedSize2.value;
        }
    }

    if (selectedcolor) {
        colorValue = selectedcolor.value;
    } else {
        const selectedColor2 = document.querySelector('#selectedColorNew');
        if (selectedColor2) {
            colorValue = selectedColor2.value;
        }
    }

    let sellingPrice = productCard.find(".selling_price").text().trim();

    let sizes = $(`#product_size_` + $(this).attr("data-id")).val();

    if (storeId == 530) {

        if (sizes) {
            let sizeValue = sizes.split(",").length;
            sellingPrice = Number(productCard.find(".selling_price").text().trim()) * sizeValue;
        }
    }

    let selectAttribute = $("#selectedAttribute").val();

    let order_qty = $("#product_order_qty_attribu_" + productId).val() || 0;
    let qty_price = $("#product_qty_price_attribu_" + productId).val() || 0;

    let product_qty = 1;

    if($("#orderNewAttQty") && $("#orderNewAttQty").val()){
        product_qty = $("#orderNewAttQty").val();
        setTimeout(() => {
            $("#orderNewAttQty").val("1");
        }, 500);
    }

    let product = {
        id: $(this).attr("data-id"),
        name: productCard.find(".product-name").text().trim(),
        available_stock: productCard.find(".available-stock").val(),
        image_url:
            productCard.find(".product-image").attr("src") ||
            productCard.find(".product-image").val(),
        currency_icon: productCard.find(".currency_icon").text().trim(),
        category_name:
            productCard.find(".product-category").text().trim() ||
            productCard.find(".product-category").val(),
        qty: Number(product_qty),
        sizes: sizes,
        sizeValue: sizeValue,
        colorValue: colorValue,
        price: productCard.find(".selling_price").text().trim(),
        total_price: sellingPrice,
        order_qty,
        qty_price
    };

    if (selectAttribute) {
        selectAttribute = JSON.parse(selectAttribute);
        product.name = product.name + `(${selectAttribute.name})`;
        product.price = Number(selectAttribute.price);
        product.total_price = Number(selectAttribute.price) * Number(product.qty),
            product.selectedAttribute = selectAttribute.name;
        
        const safeAttrName = selectAttribute.name
        .toLowerCase()
        .replace(/\s+/g, '_')        
        .replace(/[^a-z0-9_-]/g, '');    
        product.indexkey  = product.id + `_${safeAttrName}`;    
        product.selectAttribute = selectAttribute.name;
        product.dis_quantity = selectAttribute.discount_quantity;
    }else{
        if (storeId == 77 || storeId == 1502) {
            if(colorValue && sizeValue){
                product.indexkey  = product.id + `_${colorValue.replace(/\s+/g, '_')}` + `_${sizeValue.replace(/\s+/g, '_')}`;
            }
        }
    }

    if (selectedSize) {
        selectedSize.checked = false;
    }

    if (selectedcolor) {
        selectedcolor.value = "";
        if (document.querySelectorAll('.color-swatch')) {
            document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('selected'));
        }
    }

    if (storeId == 208) {
        $("#quantityModal").modal("show");
        $("#newWhatsappOrderButton").attr(
            "onclick",
            `sendAddToCart(${storeId}, decodeURIComponent('${encodeURIComponent(JSON.stringify(product))}'))`
        );
    } else {
        if (!isStore) {
            addToCart(storeId, product);
        } else {
            addToCart(storeId, product, true);
        }
    }
});


function sendAddToCart(storeId, productDetails) {
    let product = JSON.parse(productDetails);
    let qty = $("#quantityInput").val();
    if (qty == "" || qty == 0) {
        displayErrorMessage("Please add quantity for add to cart");
    } else {
        product.qty = Number(qty);
        product.total_price = Number(product.price) * Number(product.qty);
        addToCart(storeId, product);
        $("#quantityInput").val(1);
    }
}

function addToCart(storeId, product, isFromStore = false) {
    removeCoupon();
    let cart = JSON.parse(localStorage.getItem("cart")) || {};

    if (!cart[`store_${storeId}`]) {
        cart[`store_${storeId}`] = { grand_total: 0 };
    }

    let storeCart = cart[`store_${storeId}`];
    if (
        storeCart[product.id] &&
        storeCart[product.id].qty >= product.available_stock
        && storeId != 208
    ) {
        displayErrorMessage("No more quantity available for this product");
        return;
    }
    if (storeId == 208 || storeId == 1488) {
        if (storeCart[product.id] && (storeCart[product.id].qty + Number(product.qty)) >= product.available_stock) {
            displayErrorMessage("No more quantity available for this product");
            return;
        }
    }
    if (!isFromStore) {
        if (storeId == 208 || storeId == 1488) {
            $("#quantityModal").modal("hide");
        }
        displaySuccessMessage("Product has been added to your cart successfully!");
    }

    let productKey = product.id;
    if(product.indexkey){
        productKey = product.indexkey;
    }
    if (storeCart[productKey]) {
        storeCart[productKey].name = product.name;
        storeCart[productKey].price = product.price;
        storeCart[productKey].qty += storeId == 208 || storeId == 1488 || storeId == 1209 || storeId == 1238 ? Number(product.qty) : 1;
        storeCart[productKey].sizeValue = product.sizeValue;
        storeCart[productKey].selectAttribute = product.selectAttribute;
        storeCart[productKey].total_price =
            storeCart[productKey].price * storeCart[productKey].qty;
        storeCart[productKey].session_qty = storeCart[productKey].session_qty += 1;
        updateProductInquirySession(storeCart[productKey].session_id,productKey,storeCart[productKey].session_qty);
    } else {
        storeCart[productKey] = { ...product };
    }

    storeCart.grand_total = Object.values(storeCart)
        .filter((p) => typeof p === "object")
        .reduce((sum, p) => sum + Number(p.total_price), 0);

    storeCart[productKey].dis_offer = getOfferText(storeCart[productKey].dis_quantity, storeCart[productKey].qty, storeCart[productKey].id);

    localStorage.setItem("cart", JSON.stringify(cart));

    productCount(storeId);
    if (storeId == 692 || storeId == 860 || storeId == 1518 || storeId == 939 || storeId == 1065 || storeId == 1193) {
        setTimeout(function () {
            $(".order-btn").click();
        }, 100);
    }

    if (isFromStore) {
        $("#addToCartViewBtn").click();
    }

    if (storeId == 322 || storeId == 396) {
        $("#quantityModal").modal("show");
        $("#newWhatsappOrderButton").text("Update Quantity");
        $("#newWhatsappOrderButton").attr("onclick", `setQtyandClose(${product.id})`);
    }

    startProductInquirySession(product.id, storeCart[productKey].qty);

    
}

function setSubsessionInCart(product_id, session_id){
    let storeId = $("#whatsappStoreId").val();
    
    let cart = JSON.parse(localStorage.getItem("cart")) || {};

    if (!cart[`store_${storeId}`]) {
        cart[`store_${storeId}`] = { grand_total: 0 };
    }

    let storeCart = cart[`store_${storeId}`];
    
    storeCart[product_id].session_id = session_id;
    storeCart[product_id].session_qty = 1;
    
    localStorage.setItem("cart", JSON.stringify(cart));
}

function setQtyandClose(id) {
    removeCoupon();
    let storeId = $("#whatsappStoreId").val();

    let cart = JSON.parse(localStorage.getItem("cart")) || {};

    storeCart = cart[`store_${storeId}`];

    storeCart[id].qty = $("#quantityInput").val();

    storeCart[product_id].session_qty = storeCart[product_id].session_qty += $("#quantityInput").val();

    updateProductInquirySession(storeCart[product_id].session_id,product_id,storeCart[product_id].session_qty);

    storeCart[id].total_price = storeCart[id].price * storeCart[id].qty;

    storeCart.grand_total = Object.values(storeCart)
        .filter((p) => typeof p === "object")
        .reduce((sum, p) => sum + Number(p.total_price), 0);

    localStorage.setItem("cart", JSON.stringify(cart));

    $("#qty_" + id).val($("#quantityInput").val());
    $("#quantityInput").val(1);
    $("#newWhatsappOrderButton").text("Send Order on WhatsApp");
    $("#quantityModal").modal("hide");
    displaySuccessMessage("Quantity updated successfully!");
    
}

listenClick("#addToCartViewBtn", function () {
    
    let storeId = $("#whatsappStoreId").val();

    if(storeId == 4){
        if(isUserDetailsSet()){
            openUserModelForm();
            return;
        }
    }

    let cartData = JSON.parse(localStorage.getItem("cart")) || {};

    let cart = cartData[`store_${storeId}`] || {};

    let grandTotal = cart?.grand_total ?? 0;


   
    

    

    if(storeId == 1463){
        $("#subtotalnew").html(grandTotal ? grandTotal.toFixed(2) : 0);
        $("#finalTotal").html(grandTotal ? grandTotal.toFixed(2) : 0);
        $("#pincode").val("");
        $("#courierApplyCharge").html(0);
    }

    let cartArray = Object.values(cart).filter(
        (item) => item && item.id != null
    );

    let cartItems = $("#cartItems");
    cartItems.html("");
    const locale = Lang.getLocale();
    const rtlClass = locale == "ar" ? "rtl" : "";

    let totalDetails = $("#totalDetails");
    totalDetails.html("");

    let cartItemsCloth = $("#cartItemsCloth");
    cartItemsCloth.html("");

    let cartItemsReadyRasoi = $("#cartItemsReadyRasoi");
    cartItemsReadyRasoi.html("");

    if (cartArray.length === 0) {


        cartItemsReadyRasoi.html(
            `
            <div style="
                padding: 25px;
                text-align: center;
                color: #969ba5;
            ">Item not added to cart</div>
            `
        );

        cartItems.html(`
              <tr>
           <td colspan="5">
            <div class="d-flex py-3 justify-content-center align-items-center w-100" >
                    <h4 class="fs-18  text-muted mb-0">Item not added to cart</h4>
                </div>
           </td>
       </tr>
        `);

        cartItemsCloth.html(`
       <tr>
           <td colspan="5">
            <div class="d-flex py-3 justify-content-center align-items-center w-100" >
                    <h4 class="fs-18  text-muted mb-0">Item not added to cart</h4>
                </div>
           </td>
       </tr>
        `);

        totalDetails.html(`
            <div class="text-center py-3 w-100">
                <h4 class="fs-18 text-muted">Item not added to cart</h4>
            </div>
        `);
    } else {

        $.each(cartArray, function (index, item) {
            let price = item.price;
            if (storeId == 741) {
                if (Number(item.qty) >= (item.order_qty)) {
                    price = item.qty_price
                }
            }

            cartItemsReadyRasoi.append(`
            
                <div class="cart-item" id="item-row-41">

                        <div style="display: flex;align-items: flex-start;gap: 0.75rem;width: 100%">
                            <div class="item-img-wrapper">
                                <img src="${item.image_url}" alt="Product" class="item-img">
                            </div>

                            <div class="item-details">
                                <div class="item-title">${item.name}</div>
                                <div class="item-category">${item.category_name}</div>
                                <div class="item-unit-price" data-price="300">
                                    ${item.currency_icon} ${price}
                                </div>
                            </div>

                            <div class="item-actions">
                                <button type="button" class="btn-delete delete-btn" data-id="${item.indexkey ? item.indexkey : item.id}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <div class="qty-selector">
                                    <button type="button" class="qty-btn qty-minus minus-btn" data-id="${item.indexkey ? item.indexkey : item.id}">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    
                                    <input type="number" class="qty-input no-spinner" data-id="${item.indexkey ? item.indexkey : item.id}" 
                            oninput="validateQty(this);" 
                            onkeydown="blockInvalidInput(event);" 
                            value="${item.qty}" 
                            id="product-qty-${item.indexkey ? item.indexkey : item.id}"
                            step="1">
                                    
                                    <button type="button" class="qty-btn qty-plus plus-btn" data-id="${item.indexkey ? item.indexkey : item.id}">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="item-total-display">
                                    Total: <span id="total_${item.indexkey ? item.indexkey : item.id}">${item.currency_icon} ${item.total_price ? Number(item.total_price).toFixed(2) : item.total_price}</span>
                                </div>

                        
                    </div>
                
            `);

            cartItems.append(`
            <tr class="${rtlClass}">
                <td class="fw-6 fs-14">
                    <div class="d-flex gap-lg-4 gap-3 align-items-center">
                        ${storeId != 345 ? `<div class="product-img">
                            <img  src="${item.image_url}" alt="product" style="width: 50px ; height: 50px;    max-height: -webkit-fill-available;" class=" object-fit-cover rounded"  loading="lazy" />
                        </div>` : ``
                }
                        
                        <div>
                            <h5 class="fs-18 fw-6 mb-0">${item.name && item.name.length > 5 ? item.name.substring(0, 5) + '...' : item.name}</h5>
                            <p class="mb-0 fs-14 product-category-jk-filtter">${item.category_name && item.category_name.length > 5 ? item.category_name.substring(0, 5) + '...' : item.category_name}</p>
                            <p class="mb-0 fs-14 product-category-jk-filtter">${item.selectAttribute ? item.selectAttribute : ''}</p>
                        </div>
                    </div>
                </td>
                   ${storeId == 236 || storeId == 344 || storeId == 364 || storeId == 77 || storeId == 1323 || storeId == 1158 || storeId == 1502 || storeId == 348 || storeId == 1463 ? `
               <td class="fw-6 fs-14">
                      ${item.sizeValue}
                   </td>
            ` : ''}
            ${storeId == 364 || storeId == 7 || storeId == 396 || storeId == 77 || storeId == 1158 || storeId == 1502 ? `
               <td class="fw-6 fs-14">
                      ${item.colorValue}
                   </td>
            ` : ''}
                <td class="fw-6 fs-14" id="cart_price_${item.indexkey ? item.indexkey : item.id}" data-currency="${item.currency_icon}">${item.currency_icon} ${price}</td>
                <td class="text-center">
                ${storeId == 322 ? `
             <div class="btn-group gap-1 justify-content-center">
                 <input class="form-control qty-input" style="width: 129px;margin-left: 16px;" type="number" data-id="${item.indexkey ? item.indexkey : item.id}" id="qty_${item.indexkey ? item.indexkey : item.id}" value="${item.qty}" placeHolder="Enter Quantity">
              </div>
   `: `
            <div class="btn-group gap-1 justify-content-center">
                        <button type="button" class="btn minus-btn" data-id="${item.indexkey ? item.indexkey : item.id}">-</button>
                         <input 
                          type="number" 
                          style="width: 75px; margin: 0px 8px; -moz-appearance: textfield;" 
                          class="form-control qty-input no-spinner"
                          data-id="${item.indexkey ? item.indexkey : item.id}" 
                          oninput="validateQty(this);" 
                          onkeydown="blockInvalidInput(event);" 
                          value="${item.qty}" 
                          id="product-qty-${item.indexkey ? item.indexkey : item.id}"
                          step="1"
                        />
                        
                        <button type="button" class="btn plus-btn" data-id="${item.indexkey ? item.indexkey : item.id}">+</button>
                    </div>
   `
                }
                    
                </td>
                <td class="fw-6 fs-14 text-end" id="total_${item.indexkey ? item.indexkey : item.id}">${item.currency_icon} ${item.total_price ? Number(item.total_price).toFixed(2) : item.total_price}</td>
                 <td class="text-center">
                <button type="button" class="btn delete-btn" data-id="${item.indexkey ? item.indexkey : item.id}" style="padding:4px 8px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                              <g fill="#f00808" fill-rule="nonzero">
                    <g transform="scale(8.53333,8.53333)">
                 <path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z"></path>
                     </g>
                 </g>
                     </svg>
                </button>

                </td>
            </tr>
        `);

            cartItemsCloth.append(`
 <tr>
   <td class="text-center" style="padding: 0px !important;">
      <button type="button" class="btn delete-btn" data-id="${item.indexkey ? item.indexkey : item.id}" style="padding:4px 8px;">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
            <g fill="#f00808" fill-rule="nonzero">
               <g transform="scale(8.53333,8.53333)">
                  <path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z"></path>
               </g>
            </g>
         </svg>
      </button>
   </td>

   <td>
      <div class="product-card-box d-flex align-items-center gap-20">
         <div class="product-img">
            <img src="${item.image_url}" alt="images" style=" max-height: -webkit-fill-available;"
               class="h-100 w-100 object-fit-cover" loading="lazy" />
         </div>
         <div>
            <p class="fs-18 fw-5 mb-1 restaurant-white">${item.name}</p>
            <p class="fs-14 text-gray-200 fw-5 mb-0 restaurant-white">${item.category_name}</p>

         </div>
      </div>
   </td>
   ${storeId == 236 || storeId == 344 || storeId == 364 || storeId == 77 || storeId == 1323 || storeId == 1323 || storeId == 1158 || storeId == 348 || storeId == 1502 || storeId == 1463 ? `
               <td class="fs-16 fw-5 text-center text-nowrap restaurant-white">
                      ${item.sizeValue}
                   </td>
            ` : ''}
    ${storeId == 364 || storeId == 7 || storeId == 396 || storeId == 77 || storeId == 1158 || storeId == 1502? `
               <td class="fs-16 fw-5 text-center text-nowrap restaurant-white">
                      ${item.colorValue}
                   </td>
            ` : ''}        
   <td>
      <div class="d-flex count-btn w-100 mx-auto align-items-center">
         <button type="button" class="btn minus-btn count-modal-btn restaurant-white"  data-id="${item.indexkey ? item.indexkey : item.id}">-</button>
         <p class="fs-14 fw-5 mb-0 text-black w-100 text-center restaurant-white" id="qty_${item.indexkey ? item.indexkey : item.id}">${item.qty}</p>
         <button type="button" class="btn plus-btn count-modal-btn restaurant-white" data-id="${item.indexkey ? item.indexkey : item.id}">+</button>
      </div>
   </td>

    <td class="fs-16 fw-5 text-center text-nowrap restaurant-white">
      ${item.currency_icon} ${item.price}
   </td>
</tr>
            `);

            totalDetails.append(`
            <div class="d-flex justify-content-between total-details align-items-center gap-2 my-3" id="product_${item.indexkey ? item.indexkey : item.id}">
                                        <p class="fs-16 fw-5 text-black mb-0 restaurant-white">${item.name}</p>
                                        <p class="fs-16 fw-5 text-black mb-0 restaurant-white text-nowrap">${item.currency_icon} <span id="product_cart_${item.indexkey ? item.indexkey : item.id}">${item.total_price ? Number(item.total_price).toFixed(2) : item.total_price}</span></p>

                                    </div>
            `);
        });
    }

    $("#grandTotal").text(`${Number(grandTotal).toFixed(2)}`);



    if (storeId == 208 || storeId == 721 || storeId == 1488 || storeId == 584 || storeId == 796 || storeId == 1327) {
        let minimumamount = Number($("#minimum_order_amount").val());
        if (grandTotal >= minimumamount) {
            $("#hideOrderButton").hide();
            $("#showOrderButton").show();
        } else {
            $("#hideOrderButton").show();
            $("#showOrderButton").hide();
        }
    }
    updateCourierCharge();
    $("#cartModal").modal("show");

    if(cart.coupon){
        setCartCouponCode(cart.coupon, cart.coupon_discount);
    }
});

listenClick(".delete-btn", function () {
    let storeId = $("#whatsappStoreId").val();
    let productId = $(this).attr("data-id");

    $("#product_" + productId).remove();

    displaySuccessMessage("Product has been removed from your cart successfully!");

    let cart = JSON.parse(localStorage.getItem("cart")) || {};

    if (cart[`store_${storeId}`] && cart[`store_${storeId}`][productId]) {
        endProductInquirySession([cart[`store_${storeId}`][productId]["session_id"]]);
        delete cart[`store_${storeId}`][productId];

        cart[`store_${storeId}`].grand_total = Object.values(
            cart[`store_${storeId}`]
        )
            .filter((p) => typeof p === "object")
            .reduce((sum, p) => sum + Number(p?.total_price ?? 1), 0);

        if (Object.keys(cart[`store_${storeId}`]).length === 1) {
            delete cart[`store_${storeId}`];
        }

        localStorage.setItem("cart", JSON.stringify(cart));

        $(this).closest("tr").remove();

        if($(this).closest(".cart-item")){
            $(this).closest(".cart-item").remove();
        }

        productCount(storeId);

        $("#grandTotal").text(` ${Number(cart[`store_${storeId}`]?.grand_total ?? 0).toFixed(2)}`);


    }

    if (storeId == 208 || storeId == 721 || storeId == 584 || storeId == 1488 || storeId == 796 || storeId == 1327) {
        let minimumamount = Number($("#minimum_order_amount").val());
        if (Number(cart[`store_${storeId}`]?.grand_total) >= minimumamount) {
            $("#hideOrderButton").hide();
            $("#showOrderButton").show();
        } else {
            $("#hideOrderButton").show();
            $("#showOrderButton").hide();
        }
    }
    updateCourierCharge();
});

listenClick(".plus-btn", function () {
    removeCoupon();
    let storeId = $("#whatsappStoreId").val();
    let productId = $(this).attr("data-id");

    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    let storeCart = cart[`store_${storeId}`];
    if (storeCart[productId].qty >= storeCart[productId].available_stock) {
        displayErrorMessage("No more quantity available for this product");
        return;
    }

    if (storeCart && storeCart[productId]) {
        let price = storeCart[productId].price;
        if (storeId == 530) {
            let sizes = storeCart[productId].sizes;
            if (sizes) {
                let sizeValue = sizes.split(",").length;
                price = Number(price) * sizeValue;
            }
        }
        storeCart[productId].qty += 1;

        if (storeId == 741) {
            if (Number(storeCart[productId].qty) >= Number(storeCart[productId].order_qty)) {
                price = Number(storeCart[productId].qty_price)
            }
            let $priceElement = $('#cart_price_' + productId);

            // Get the currency symbol from data attribute
            let currency = $priceElement.data('currency'); // gives "₹"

            // Define new amount
            let newAmount = price;

            // Update the text content
            $priceElement.text(currency + ' ' + newAmount);
        }


        storeCart[productId].total_price =
            storeCart[productId].qty * price;
        storeCart.grand_total = Object.values(storeCart)
            .filter((p) => typeof p === "object")
            .reduce((sum, p) => sum + Number(p?.total_price ?? 1), 0);

        storeCart[productId].dis_offer = getOfferText(storeCart[productId].dis_quantity, storeCart[productId].qty, storeCart[productId].id);    

        storeCart[productId].session_qty = storeCart[productId].session_qty += 1;

        localStorage.setItem("cart", JSON.stringify(cart));

        productCount(storeId);
        $(`#qty_${productId}`).text(storeCart[productId].qty);
        $(`#product-qty-${productId}`).val(storeCart[productId].qty); // ✅ ADD THIS
        $(`#total_${productId}`).text(
            `${storeCart[productId].currency_icon} ${Number(storeCart[productId].total_price).toFixed(2)}`
        );
        $("#product_cart_" + productId).text(storeCart[productId].total_price);
        $("#grandTotal").text(`${Number(storeCart.grand_total).toFixed(2)}`);

        

        updateProductInquirySession(storeCart[productId].session_id,productId,storeCart[productId].session_qty);
        
    }

    if (storeId == 208 || storeId == 721 || storeId == 584 || storeId == 1488 || storeId == 796 || storeId == 1327) {
        let minimumamount = Number($("#minimum_order_amount").val());
        if (Number(storeCart.grand_total ?? 0) >= minimumamount) {
            $("#hideOrderButton").hide();
            $("#showOrderButton").show();
        } else {
            $("#hideOrderButton").show();
            $("#showOrderButton").hide();
        }
    }

    

    updateCourierCharge();
});

$(document).on('change', '.qty-input', function () {
    removeCoupon();
    let storeId = $("#whatsappStoreId").val();
    let productId = $(this).attr("data-id");
    let newQty = parseInt($(this).val());

    // Fetch the cart from localStorage
    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    let storeCart = cart[`store_${storeId}`];

    if (newQty <= 0) {
        displayErrorMessage("Quantity must be greater than 0");
        return;
    }

    if (storeCart && storeCart[productId]) {
        // Check if quantity exceeds available stock
        if (newQty > storeCart[productId].available_stock) {
            displayErrorMessage("No more quantity available for this product");
            return;
        }



        let price = storeCart[productId].price;

        if (storeId == 741) {
            if (Number(newQty) >= Number(storeCart[productId].order_qty)) {
                price = Number(storeCart[productId].qty_price)
            }
            let $priceElement = $('#cart_price_' + productId);

            // Get the currency symbol from data attribute
            let currency = $priceElement.data('currency'); // gives "₹"

            // Define new amount
            let newAmount = price;

            // Update the text content
            $priceElement.text(currency + ' ' + newAmount);
        }

        if (storeId == 530) {
            let sizes = storeCart[productId].sizes;
            if (sizes) {
                let sizeValue = sizes.split(",").length;
                price = Number(price) * sizeValue;
            }
        }

        // Update the quantity and total price
        storeCart[productId].qty = newQty;
        storeCart[productId].total_price = newQty * price;

        // Recalculate the grand total
        storeCart.grand_total = Object.values(storeCart)
            .filter((p) => typeof p === "object")
            .reduce((sum, p) => sum + Number(p?.total_price ?? 1), 0);
        
        storeCart[productId].dis_offer = getOfferText(storeCart[productId].dis_quantity, storeCart[productId].qty, storeCart[productId].id);

        storeCart[productId].session_qty = storeCart[productId].session_qty += newQty;

        // Update localStorage with the new cart
        localStorage.setItem("cart", JSON.stringify(cart));

        // Update the UI elements
        $(`#qty_${productId}`).text(newQty);
        $(`#product-qty-${productId}`).val(storeCart[productId].qty); // ✅ ADD THIS

        $(`#total_${productId}`).text(
            `${storeCart[productId].currency_icon} ${Number(storeCart[productId].total_price).toFixed(2)}`
        );
        $("#product_cart_" + productId).text(storeCart[productId].total_price);
        $("#grandTotal").text(`${Number(storeCart.grand_total).toFixed(2)}`);

        

        updateProductInquirySession(storeCart[productId].session_id,productId,storeCart[productId].session_qty);

        if (storeId == 208 || storeId == 721 || storeId == 584 || storeId == 1488 || storeId == 796 || storeId == 1327) {
            let minimumamount = Number($("#minimum_order_amount").val());
            if (Number(storeCart.grand_total ?? 0) >= minimumamount) {
                $("#hideOrderButton").hide();
                $("#showOrderButton").show();
            } else {
                $("#hideOrderButton").show();
                $("#showOrderButton").hide();
            }
        }

        getOfferText(storeCart[productId].dis_quantity, storeCart[productId].qty, storeCart[productId].id);
        
    }

    

    updateCourierCharge();
});


listenClick(".minus-btn", function () {
    removeCoupon();
    let storeId = $("#whatsappStoreId").val();
    let productId = $(this).attr("data-id");

    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    let storeCart = cart[`store_${storeId}`];

    if (storeCart && storeCart[productId]) {
        if (storeCart[productId].qty === 1) {
            return;
        }

        let price = storeCart[productId].price;
        storeCart[productId].qty -= 1;
        if (storeId == 741) {
            if (Number(storeCart[productId].qty) >= Number(storeCart[productId].order_qty)) {
                price = Number(storeCart[productId].qty_price)
            }
            let $priceElement = $('#cart_price_' + productId);

            // Get the currency symbol from data attribute
            let currency = $priceElement.data('currency'); // gives "₹"

            // Define new amount
            let newAmount = price;

            // Update the text content
            $priceElement.text(currency + ' ' + newAmount);
        }

        if (storeId == 530) {
            let sizes = storeCart[productId].sizes;
            if (sizes) {
                let sizeValue = sizes.split(",").length;
                price = Number(price) * sizeValue;
            }
        }


        storeCart[productId].total_price =
            storeCart[productId].qty * price;

        storeCart.grand_total = Object.values(storeCart)
            .filter((p) => typeof p === "object")
            .reduce((sum, p) => sum + Number(p?.total_price ?? 1), 0);
        
        storeCart[productId].dis_offer = getOfferText(storeCart[productId].dis_quantity, storeCart[productId].qty, storeCart[productId].id);

        storeCart[productId].session_qty = storeCart[productId].session_qty -= 1;

        localStorage.setItem("cart", JSON.stringify(cart));

        productCount(storeId);
        $(`#qty_${productId}`).text(storeCart[productId].qty);
        $(`#product-qty-${productId}`).val(storeCart[productId].qty);
        $(`#total_${productId}`).text(
            `${storeCart[productId].currency_icon} ${Number(storeCart[productId].total_price).toFixed(2)}`
        );
        $("#product_cart_" + productId).text(storeCart[productId].total_price);
        $("#grandTotal").text(`${Number(storeCart.grand_total).toFixed(2)}`);

        

        updateProductInquirySession(storeCart[productId].session_id,productId,storeCart[productId].session_qty);
        
    }

    if (storeId == 208 || storeId == 721 || storeId == 584 || storeId == 1488 || storeId == 796 || storeId == 1327) {
        let minimumamount = Number($("#minimum_order_amount").val());
        if (Number(storeCart.grand_total.toFixed(2) ?? 0) >= minimumamount) {
            $("#hideOrderButton").hide();
            $("#showOrderButton").show();
        } else {
            $("#hideOrderButton").show();
            $("#showOrderButton").hide();
        }
    }

    updateCourierCharge();
});


$(document).on("input", "input[type='number']", function () {
    removeCoupon();
    let storeId = $("#whatsappStoreId").val();
    let productId = $(this).attr("id").split("-")[2];
    let newQty = parseInt($(this).val());

    if (isNaN(newQty)) {
        newQty = 1;
        $(this).val("");
    }

    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    let storeCart = cart[`store_${storeId}`];
    if (!storeCart || !storeCart[productId]) return;

    if (newQty > storeCart[productId].available_stock) {
        displayErrorMessage("No more quantity available for this product");
        newQty = storeCart[productId].available_stock;
        $(this).val(newQty);
    }

    let price = storeCart[productId].price;

    if (storeId == 741) {
        if (Number(newQty) >= Number(storeCart[productId].order_qty)) {
            price = Number(storeCart[productId].qty_price)
        }
        let $priceElement = $('#cart_price_' + productId);

        let currency = $priceElement.data('currency');

        let newAmount = price;

        $priceElement.text(currency + ' ' + newAmount);
    }


    storeCart[productId].qty = newQty;
    storeCart[productId].total_price = newQty * price;

    // Recalculate grand total
    storeCart.grand_total = Object.values(storeCart)
        .filter((p) => typeof p === "object")
        .reduce((sum, p) => sum + Number(p.total_price), 0);
    
    storeCart[productId].dis_offer = getOfferText(storeCart[productId].dis_quantity, storeCart[productId].qty, storeCart[productId].id);

    storeCart[productId].session_qty += newQty;

    updateProductInquirySession(storeCart[productId].session_id,productId,storeCart[productId].qty);    

    localStorage.setItem("cart", JSON.stringify(cart));

    // Update UI accordingly
    $(`#qty_${productId}`).text(storeCart[productId].qty);
    $(`#total_${productId}`).text(
        `${storeCart[productId].currency_icon} ${Number(storeCart[productId].total_price).toFixed(2)}`
    );
    $("#product_cart_" + productId).text(storeCart[productId].total_price);
    $("#grandTotal").text(`${Number(storeCart.grand_total).toFixed(2)}`);

    updateCourierCharge();

    
});

// Prevent typing ., e, -, etc.
function blockInvalidInput(e) {
    if (["e", "E", "+", "-", "."].includes(e.key)) {
        e.preventDefault();
    }
}

// Clean input and default to 1 if empty or invalid
function validateQty(input) {
    let value = input.value.replace(/\D/g, ""); // Remove non-digits

    if (value === "" || parseInt(value, 10) < 1) {
        input.value = "";
    } else {
        input.value = parseInt(value, 10);
    }
}

function productCount(storeId) {

    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    let storeCart = cart[`store_${storeId}`] || {};
    let productCount = Object.values(storeCart).filter(
        (item) => item && item.id
    ).length;
    let count = productCount > 0 ? productCount : 0;

    if (count == 0) {

        let cartItems = $("#cartItems");
        cartItems.html("");

        let totalDetails = $("#totalDetails");
        totalDetails.html("");

        let cartItemsCloth = $("#cartItemsCloth");
        cartItemsCloth.html("");

        let cartItemsReadyRasoi = $("#cartItemsReadyRasoi");
        cartItemsReadyRasoi.html("");

        cartItemsReadyRasoi.html(
            `
            <div style="
                padding: 25px;
                text-align: center;
                color: #969ba5;
            ">Item not added to cart</div>
            `
        );

        cartItems.html(`
              <tr>
           <td colspan="5">
            <div class="d-flex py-3 justify-content-center align-items-center w-100" >
                    <h4 class="fs-18  text-muted mb-0">
                        "Item not added to cart"
                    </h4>
                </div>
           </td>
       </tr>
        `);

        cartItemsCloth.html(`
       <tr>
           <td colspan="5">
            <div class="d-flex py-3 justify-content-center align-items-center w-100" >
                    <h4 class="fs-18  text-muted mb-0">
                        "Item not added to cart"
                    </h4>
                </div>
           </td>
       </tr>
        `);

        totalDetails.html(`
            <div class="text-center py-3 w-100">
                <h4 class="fs-18 text-muted">
                    "Item not added to cart"
                </h4>
            </div>
        `);

        $(".order-btn").prop("disabled", true);

    } else {
        $(".order-btn").prop("disabled", false);
    }

    $(".product-count-badge").text(count);


    if (count === 0) {
        $("#addToCartBottomViewBtn").hide();  // ✅ directly hide the wrapper div
    } else {
        $("#addToCartBottomViewBtn").show();  // ✅ show it again
        $(".product-count-badge").text(count); // ✅ update badge text
    }

}

function loadPhoneInput() {
    let phoneInput = document.querySelector("#phoneNumber");
    let phoneInputNew = document.querySelector("#customphoneNumber");
    let regionCodeInput = document.querySelector("#prefix_code");
    let regionCodeInputNew = document.querySelector("#custom_prefix_code");

    if (phoneInput) {
        let iti = window.intlTelInput(phoneInput, {
            initialCountry: "in",
            preferredCountries: ["us", "gb", "in"],
            separateDialCode: true,
        });

        phoneInput.addEventListener("countrychange", function () {
            let countryData = iti.getSelectedCountryData();
            regionCodeInput.value = countryData.dialCode;
        });

        // phoneInput.addEventListener("blur", function () {
        //     if (iti.isValidNumber()) {

        //         document.getElementById("valid-msg").classList.remove("d-none");
        //         document.getElementById("error-msg").classList.add("d-none");
        //     } else {
        //         document.getElementById("valid-msg").classList.add("d-none");
        //         document.getElementById("error-msg").classList.remove("d-none");
        //     }
        // });
    }

    if (phoneInputNew) {
        let iti = window.intlTelInput(phoneInputNew, {
            initialCountry: "in",
            preferredCountries: ["us", "gb", "in"],
            separateDialCode: true,
        });

        phoneInputNew.addEventListener("countrychange", function () {
            let countryData = iti.getSelectedCountryData();
            regionCodeInputNew.value = countryData.dialCode;
        });

        // phoneInput.addEventListener("blur", function () {
        //     if (iti.isValidNumber()) {

        //         document.getElementById("valid-msg").classList.remove("d-none");
        //         document.getElementById("error-msg").classList.add("d-none");
        //     } else {
        //         document.getElementById("valid-msg").classList.add("d-none");
        //         document.getElementById("error-msg").classList.remove("d-none");
        //     }
        // });
    }
}



listenSubmit("#orderForm", function (event) {
    event.preventDefault();

    let selectedPayment = $("#paymentMethod").val() || "cash"; // 👈 get user dropdown selection

    let wpRazorpayEnabled = document.getElementById("wpRazorpayEnabled").value;

    if (wpRazorpayEnabled == "1" || wpRazorpayEnabled === "true") {
        selectedPayment = $("#paymentMethod").val() || "online";
    }


    if (selectedPayment == "cash") {

        if (localStorage.getItem("selectedProduct")) {
            let selectedProductItem = JSON.parse(localStorage.getItem("selectedProduct"));
            const params = new URLSearchParams($(this).serialize());

            const obj = {};
            for (const [key, value] of params.entries()) {
                obj[key] = value;
            }
            localStorage.removeItem("selectedProduct");
            prepareAndSendWpMessageDirect(selectedProductItem.productId, selectedProductItem.productName, selectedProductItem.currency_icon, selectedProductItem.productPrice, 0, false, obj);

        } else {


            $(this).find(".btn").prop("disabled", true);

            let storeId = $("#whatsappStoreId").val();
            let cart = JSON.parse(localStorage.getItem("cart")) || {};
            let storeCart = cart[`store_${storeId}`];
            let grandTotal = storeCart?.grand_total || 0;
            let products = [];

            if (storeCart) {

                products = Object.values(storeCart)
                    .filter((p) => typeof p === "object")
                    .filter((item) => item && item.id != null)
                    .map((p) => (
                        {
                            id: p.id,
                            price: storeId == 741 ? Number(p.qty) >= Number(p.order_qty) ? Number(p.qty_price) : p.price : p.price,
                            qty: p.qty,
                            total_price: p.total_price,
                            size: p.sizeValue,
                            color: p.colorValue,
                            attribute: p.selectedAttribute,
                            session_id: p.session_id,
                            offer_text: p.dis_offer ? p.dis_offer : ''
                        }));
            }

            let storeAlias = $("#storeAlias").val();

            let sc_id = localStorage.getItem(storeAlias + "sc_id");

            let orderDetails =
                $(this).serialize() +
                "&wp_store_id=" +
                storeId +
                "&sc_id=" +
                encodeURIComponent(sc_id) +
                "&grand_total=" +
                grandTotal +
                "&coupon_code=" +
                 storeCart.coupon+
                "&products=" +
                encodeURIComponent(JSON.stringify(products)) +
                "&language=" + lang;



            let url = $("#productBuyUrl").val();

            let previousVal = document.querySelector("#orderForm button").innerHTML;
            document.querySelector("#orderForm button").innerHTML = `Please wait<i class="fas fa-circle-notch fa-spin" style="margin-left: 10px;"></i>`;
            document.querySelector("#orderForm button").disabled = true;

            setTimeout(() => {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: orderDetails,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        if (response.success) {
                            if (storeId != 692) {

                                prepareAndSendWpMessage(response.data, null);
                            } else {
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1500);
                            }

                            localStorage.removeItem("cart");
                            productCount(storeId);
                            displaySuccessMessage("Your order has been placed successfully!");
                            document.querySelector("#orderForm button").innerHTML = previousVal;
                            document.querySelector("#orderForm button").disabled = false;
                            // setTimeout(() => {
                            //     window.location.reload();
                            // }, 3000);
                        }
                    },
                    error: function (response) {
                        displaySuccessMessage("Your order has been placed successfully!");
                        document.querySelector("#orderForm button").innerHTML = previousVal;
                        document.querySelector("#orderForm button").disabled = false;
                        $(this).find(".btn").prop("disabled", false);
                        displayErrorMessage(response.responseJSON.message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    },
                });
            }, 1000);
        }

    } else {

        $(this).find(".btn").prop("disabled", true);

        let storeId = $("#whatsappStoreId").val();
        let cart = JSON.parse(localStorage.getItem("cart")) || {};
        let storeCart = cart[`store_${storeId}`];
        let grandTotal = storeCart?.grand_total || 0;
        let products = [];

        if (storeCart) {
            products = Object.values(storeCart)
                .filter((p) => typeof p === "object")
                .filter((item) => item && item.id != null)
                .map((p) => ({
                    id: p.id,
                    price: p.price,
                    qty: p.qty,
                    total_price: p.total_price,
                    size: p.sizeValue,
                    color: p.colorValue
                }));
        }

        let orderDetails =
            $(this).serialize() +
            "&wp_store_id=" + storeId +
            "&grand_total=" + grandTotal +
            "&products=" + encodeURIComponent(JSON.stringify(products)) +
            "&language=" + lang;

        let url = $("#productBuyUrl").val();

        let previousVal = document.querySelector("#orderForm button").innerHTML;
        document.querySelector("#orderForm button").innerHTML = `Please wait<i class="fas fa-circle-notch fa-spin" style="margin-left: 10px;"></i>`;
        document.querySelector("#orderForm button").disabled = true;



        $.ajax({
            url: url,
            type: "POST",
            data: orderDetails,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    
                   if (response.gateway === 'phonepe') {
                        // SAVE FORM DATA BEFORE REDIRECTING
                        var formDataObj = {};
                         var storeInfo = {};
                        $.each($('#orderForm').serializeArray(), function(_, kv) {
                            formDataObj[kv.name] = kv.value;
                        });
                        formDataObj['wp_store_id'] = storeId;
                        formDataObj['grand_total'] = grandTotal;
                        formDataObj['language'] = lang;     
                        

                        storeInfo['storeId']= $("#whatsappStoreId").val();
                        storeInfo['baseUrl'] = $("#baseUrl").val();
                        storeInfo['storeAlias'] = $("#storeAlias").val();
                        storeInfo['wpRegionCode'] = $("#wpRegionCode").val();
                        storeInfo['whatsappNumber'] = $("#whatsappNo").val();
                        
                        
                        localStorage.setItem('orderFormData', JSON.stringify(formDataObj));
                        localStorage.setItem('storeInfo', JSON.stringify(storeInfo));
                        localStorage.setItem('cart_products', JSON.stringify(products)); // Ensure products are saved too
                        
                        localStorage.setItem('pending_order_products', JSON.stringify(formDataObj));
                        localStorage.setItem('pending_order_txn', response.phonepe.merchant_transaction_id);
                    
                        window.location.href = response.phonepe.redirect_url;
                        return;
                    }else if (response.gateway === 'razorpay') {


                    if (response.payment && response.razorpay) {

                        var options = {
                            "key": response.razorpay.key,
                            "amount": response.razorpay.amount,
                            "currency": response.razorpay.currency,
                            "name": response.razorpay.name,
                            "description": response.razorpay.description,
                            "order_id": response.razorpay.order_id,
                            "handler": function (rzrResponse) {
                                // On payment success → finalize order
                                // Finalize order in backend
                                document.querySelector("#orderForm button").innerHTML = previousVal;
                                document.querySelector("#orderForm button").disabled = false;

                                finalizeWpOrder(response.orderData, rzrResponse);

                            },
                            "prefill": {
                                "name": $("#customerName").val(),
                                "email": $("#customerEmail").val(),
                                "contact": $("#customerPhone").val()
                            },
                            "theme": {
                                "color": "#3399cc"
                            },
                            "modal": {
                                "ondismiss": function () {
                                    document.querySelector("#orderForm button").innerHTML = previousVal;
                                    document.querySelector("#orderForm button").disabled = false;
                                }
                            }

                        };
                        var rzp = new Razorpay(options);
                        rzp.on('payment.failed', function (response) {
                            displayErrorMessage("Payment has been failed please try again");
                            document.querySelector("#orderForm button").innerHTML = previousVal;
                            document.querySelector("#orderForm button").disabled = false;
                        });

                        rzp.open();

                    } else {
                        displayErrorMessage("Something went wrong, please try again");
                        document.querySelector("#orderForm button").innerHTML = previousVal;
                        document.querySelector("#orderForm button").disabled = false;
                    }
                }
                } else {
                    displayErrorMessage("Something went wrong, please try again");
                    document.querySelector("#orderForm button").innerHTML = previousVal;
                    document.querySelector("#orderForm button").disabled = false;
                }
            },
            error: function (response) {
                console.log(response.responseJSON.message);
                displayErrorMessage(response.responseJSON.message);
                document.querySelector("#orderForm button").innerHTML = previousVal;
                document.querySelector("#orderForm button").disabled = false;
                $(this).find(".btn").prop("disabled", false);
                // setTimeout(() => {
                //     window.location.reload();
                // }, 1500);
            },
        });

    }







});


function finalizeWpOrder(orderData, rzrResponse) {

    let orderJson = {};

    if (rzrResponse) {
        orderJson = {
            ...orderData, // serialized form + products
            razorpay_payment_id: rzrResponse.razorpay_payment_id,
            razorpay_order_id: rzrResponse.razorpay_order_id,
            razorpay_signature: rzrResponse.razorpay_signature,
            _token: $('meta[name="csrf-token"]').attr("content"),
        };
    } else {
        orderJson = {
            ...orderData, // serialized form + products
            razorpay_payment_id: null,
            razorpay_order_id: null,
            razorpay_signature: null,
            _token: $('meta[name="csrf-token"]').attr("content"),
        };
    }


    $.ajax({
        url: "/whatsapp-store/finalize-order",
        type: "POST",
        data: orderJson,
        success: function (res) {
            if (res.success) {
                let storeId = $("#whatsappStoreId").val();

                let payId = rzrResponse && rzrResponse.razorpay_payment_id ? rzrResponse.razorpay_payment_id : null;

                if (storeId != 4) {
                    prepareAndSendWpMessage(res.data, payId);
                }

                setTimeout(() => {
                    if (rzrResponse && rzrResponse.razorpay_payment_id) {

                        // window.location.reload();
                        $("#orderNowModal").modal("hide");
                        // Always show modal after success


                        document.getElementById("orderId").innerText = res.data.order_id;
                        document.getElementById("paidAmount").innerText = orderData.grand_total + "/-";

                        document.getElementById("paymentId").innerText = rzrResponse.razorpay_payment_id;


                        document.getElementById("paymentDate").innerText = new Date().toLocaleString();

                        // Show modal safely
                        const modal = document.getElementById("paymentModal");

                        if (modal) {
                            modal.style.display = "flex";  // for custom modal
                            // OR if using Bootstrap:
                            // new bootstrap.Modal(modal).show();
                        } else {
                            alert("Payment Successful! ID: " + rzrResponse.razorpay_payment_id);
                        }

                    } else {
                        setTimeout(() => {
                            window.location.reload();
                        }, 200);
                    }

                }, 0);

                localStorage.removeItem("cart");
                productCount(storeId);
                displaySuccessMessage("Payment & Order placed successfully!");
            } else {
                displayErrorMessage("Payment verified but order not saved.");
            }
        },
        error: function (err) {
            console.log(err);
            displayErrorMessage("Payment done but order not placed, please contact support.");
        }
    });
}



function getdomain() {
    let hostname = window.location.hostname;

    // Remove "www." if it exists at the beginning
    if (hostname.startsWith('www.')) {
        hostname = hostname.slice(4);
    }

    return hostname;
}

function prepareAndSendWpMessage(order, paymentId) {

    let storeId = $("#whatsappStoreId").val();
    let baseUrl = $("#baseUrl").val();
    let storeAlias = $("#storeAlias").val();
    let wpRegionCode = $("#wpRegionCode").val();
    let whatsappNumber = $("#whatsappNo").val();


    let sizeValue = '';
    let colorValue = '';
    const selectedSize = document.querySelector('input[name="size"]:checked');
    const selectedColor = document.querySelector('#selectedColor');
    if (selectedSize) {
        sizeValue = selectedSize.value;
        // You can use selectedSize.value wherever needed
    }
    if (selectedColor) {
        colorValue = selectedColor.value;
        // You can use selectedSize.value wherever needed
    }

    let message = "Customer Details" + `:\n`;
    message += `------------------------------\n`;
    message += 'Name' + `: ${order.name}\n`;
    message += 'Phone' + `: +${order.region_code} ${order.phone}\n`;
    message += 'Address' + `: ${order.address}\n\n`;

    if (order.pincode) {
        message += 'Pincode' + ` : ${order.pincode}\n`;
    }

    if (storeId == 1065) {
        message += 'Email Addess' + ` : ${order.email_address}\n`;
        message += 'Unit Number' + ` : ${order.unit_number}\n`;
        message += 'Order City' + ` : ${order.city}\n`;
        message += 'Postal Code' + ` : ${order.postal_code}\n`;
        message += 'Extra Notes' + ` : ${order.extra_notes}\n`;
        if (order.upstairs_delivery) {
            message += 'Upstairs Delivery' + ` : ${order.upstairs_delivery}\n`;
        } else {
            message += 'Upstairs Delivery' + ` : ${"No"}\n`;
        }

        message += 'Delivery StartDate' + ` : ${order.delivery_start_date}\n`;
        message += 'Delivery Instructions' + ` : ${order.delivery_instructions}\n`;
    }

    if (storeId == 1201) {
        message += `------------------------------\n`;
        message += `${order.dropdown_settings_order}\n`;
        message += `------------------------------\n`;
    }



    message += 'Order ID' + `: ${order.order_id}\n`;
    if (paymentId) {
        message += 'Payment ID' + `: ${paymentId}\n`;
    }
    message += `------------------------------\n`;
    message += 'Product Details' + `:\n`;
    message += `------------------------------\n`;

    const pathPrefix = window.location.href.includes('whatsapp-store') ? 'whatsapp-store' : 'store';

    order.products.forEach((product, index) => {

        let productUrl = `${baseUrl}/${pathPrefix}/${storeAlias}/${product.product_id}/product-details`;

        if (baseUrl != "https://staging.vcardking.com") {
            productUrl = `https://${getdomain()}/product-details/${product.product_id}`;
        }

        if (getdomain() != "staging.vcardking.com") {
            productUrl = `https://${getdomain()}/product-details/${product.product_id}`;
        }

        message += `${index + 1}.\n`;
        if (product.attribute) {
            message += 'Product Name' + `: ${(product.product ? product.product.name : "Unknown")
                }(${product.attribute})\n`;
        } else {
            message += 'Product Name' + `: ${product.product ? product.product.name : "Unknown"
                }\n`;
        }

        if (product.size) {
            message += 'Product Size' + ` : ${product.size}\n`;
        }
        if (product.cartoon_qty) {
            message += 'Cartoon Quantity' + ` : ${product.cartoon_qty}\n`;
        }

        if (product.color) {
            message += 'Product Color' + ` : ${product.color}\n`;
        }

        if (storeId != 345 && storeId != 1249 && storeId != 1488) {
            message += 'Product URL' + ` : ${productUrl}\n`;
        }

        if (storeId == 530) {
            message += 'Pcs Price' + ` : ${product.product.currency.currency_icon} ${product.price}\n`;
            message += 'Set Quantity' + ` : ${product.qty}\n`;
            message += `${product.qty} Set Price` + ` : ${product.product.currency.currency_icon} ${product.total_price}\n`;
        } else {
            message += 'Price' + ` : ${product.product.currency.currency_icon} ${product.price}\n`;
            message += 'Quantity' + ` : ${product.qty}\n`;
            message += 'Total Price' + ` : ${product.product.currency.currency_icon} ${product.total_price}\n`;
        }

        if(product.offer_text && product.offer_text != ''){
            message += 'Offer Applied' + ` : ${product.offer_text}\n`;
        }


        message += `------------------------------\n`;
    });

    if (storeId == 721 || storeId == 424 || storeId == 41 || storeId == 1238) {
        message += 'Courier Charge' + ` :  ${order.courier_charges}\n`;
        message += `------------------------------\n`;
    }

    if (order.dis_amt != 0) {

        message += 'Total' + ` :  ${order.dis_amt + order.grand_total}\n`;

        if(order.coupon_code != ""){
            message += `Discount(Coupon: ${order.coupon_code})` + ` :  ${Number(order.dis_amt).toFixed(2)}\n`;
        }else{
            message += 'Discount' + ` :  ${order.dis_amt}\n`;
        }
        message += `------------------------------\n`;
    }

    message += `\nGrand Total: ${Number(order.grand_total).toFixed(2)}\n`;
    let recipientPhone = `+${wpRegionCode}${whatsappNumber}`;
    let encodedMessage = encodeURIComponent(message);
    if(storeId == 1488){
        recipientPhone = `+${order.region_code}${order.phone}`
    }
    let whatsappUrl = `https://wa.me/${recipientPhone}?text=${encodedMessage}`;


    if ($("#whatsappUrlLink")) {

        if (paymentId) {

            $("#sendMesg").attr("onclick", "sendMessage('" + whatsappUrl + "', false)");

            // $("#closeModal").attr("onclick", "sendMessage('" + whatsappUrl + "',true)");

        } else {
            console.log("---=-=-=-=-=. ", isIOS());
            if (isIOS()) {
                window.location.href = whatsappUrl;

            } else {
                $("#whatsappUrlLink").attr("href", whatsappUrl);
                $("#whatsappUrlLink").attr("target", "_blank");
                document.getElementById("whatsappUrlLink").click();

                setTimeout(() => {
                    window.location.reload();
                }, 200);
            }
        }

    } else {

        // Create an anchor element
        const anchor = document.createElement('a');
        anchor.href = whatsappUrl;
        anchor.target = '_blank';
        anchor.rel = 'noopener noreferrer'; // For security
        anchor.style.display = 'none'; // Keep it hidden

        // Append it to the body
        document.body.appendChild(anchor);

        // Programmatically click it
        anchor.click();

        // Clean up
        document.body.removeChild(anchor);
    }
}

function sendMessage(whatsappUrl, isReload) {


    if (isIOS()) {
        window.location.href = whatsappUrl;
    } else {
        $("#whatsappUrlLink").attr("href", whatsappUrl);
        $("#whatsappUrlLink").attr("target", "_blank");
        document.getElementById("whatsappUrlLink").click();

        if (isReload == true) {
            setTimeout(() => {
                window.location.reload();
            }, 200);
        }
    }



}

async function isIOS() {
    if (navigator.userAgentData) {
        const brands = navigator.userAgentData.brands.map(b => b.brand).join(",");
        return /iPhone|iPad|iPod|iOS/i.test(brands);
    }
    return /iPhone|iPad|iPod/i.test(navigator.userAgent);
}

function openModelAndrenderAttributes(attributes, title, currency_icon, open_from, productId) {
    $("#attributeTitle").html(title);
    $("#AttributeModal").modal("show");

    const container = document.getElementById("attributeContainer");
    const hiddenInput = document.getElementById("selectedAttribute");

    container.innerHTML = "";
    $("#selectedAttribute").val("");

    // Create boxes dynamically
    attributes.forEach((attr, index) => {
        const div = document.createElement("div");
        div.className = "product-box";
        div.innerHTML = `
        <div class="attribute">${attr.name}</div>
        <div class="price">${currency_icon}${attr.price}</div>
      `;

        // Selectable functionality
        div.addEventListener("click", () => {
            document.querySelectorAll(".product-box").forEach(box => box.classList.remove("activeclass"));
            div.classList.add("activeclass");
            hiddenInput.value = JSON.stringify(attr); // Store selected attribute

            let storeId = $("#whatsappStoreId").val();
            if(storeId == 1209){
                
                    $(".details.d-flex .selling_price").html(`${attr.price}`);
                    $(".details.d-flex #mrpPrice").html(`${attr.mrp_price}`);
                if(attr.discount_quantity == 0){
                    $(".customize-label").hide();
                }else{
                    let offerText = $("#product_dis_free_"+productId).val();
                    let disText = $("#product_dis_text_"+productId).val();

                    $("#applyoffertext").html(` ${offerText} on order of ${attr.discount_quantity} ${attr.offer_unit})`);

                    $("#appOfferCount").html(`1`);

                    $(".customize-label").show();

                }

                if(attr.moq_note){
                        $("#moqNotes").show();
                        $("#moqNotes span").html(attr.moq_note);
                    }else{
                        $("#moqNotes").hide();
                    }
            }
        });

        // Default: select first
        if (index === 0) {
            div.classList.add("activeclass");
            hiddenInput.value = JSON.stringify(attr);
        }

        
        

        container.appendChild(div);
    });

    let storeId = $("#whatsappStoreId").val();
        if(storeId == 1209){
            
            if(attributes[0].discount_quantity == 0){
                $(".customize-label").hide();
            }else{
                let offerText = $("#product_dis_free_"+productId).val();
                let disText = $("#product_dis_text_"+productId).val();

                $("#applyoffertext").html(` ${offerText} on order of ${attributes[0].discount_quantity} ${attributes[0].offer_unit})`);

                $("#appOfferCount").html(`1`);

                $("#applyDisText").html(`${disText}`);
            }

            if(attributes[0].moq_note){
                        $("#moqNotes").show();
                        $("#moqNotes span").html(attributes[0].moq_note);
                    }else{
                        $("#moqNotes").hide();
                    }
        }

    $("#isOpenFrom").val(open_from);
    $("#attrProductId").val(productId);
}

function directWhatsappShare(){
    
    let storeId = $("#whatsappStoreId").val();
    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    let storeCart = cart[`store_${storeId}`];
    let grandTotal = storeCart?.grand_total || 0;
    let baseUrl = $("#baseUrl").val();
    let storeAlias = $("#storeAlias").val();
    let wpRegionCode = $("#wpRegionCode").val();
    let whatsappNumber = $("#whatsappNo").val();

    let message = `------------------------------\n`;
    message += 'Product Details' + `:\n`;
    message += `------------------------------\n`;

    const pathPrefix = window.location.href.includes('whatsapp-store') ? 'whatsapp-store' : 'store';

    products = Object.values(storeCart)
                    .filter((p) => typeof p === "object")
                    .filter((item) => item && item.id != null).forEach((product, index) => {

        let productUrl = `${baseUrl}/${pathPrefix}/${storeAlias}/${product.id}/product-details`;

        if (baseUrl != "https://staging.vcardking.com") {
            productUrl = `https://${getdomain()}/product-details/${product.id}`;
        }

        if (getdomain() != "staging.vcardking.com") {
            productUrl = `https://${getdomain()}/product-details/${product.id}`;
        }

        message += `${index + 1}.\n`;
        if (product.selectAttribute) {
            message += 'Product Name' + `: ${(product.name)
                }(${product.selectAttribute})\n`;
        } else {
            message += 'Product Name' + `: ${product.name
                }\n`;
        }

            
            message += 'Product URL' + ` : ${productUrl}\n`;
            message += 'Price' + ` : ${product.currency_icon} ${product.price}\n`;
            message += 'Quantity' + ` : ${product.qty}\n`;
            message += 'Total Price' + ` : ${product.currency_icon} ${product.total_price}\n`;
        

        if(product.dis_offer && product.dis_offer != ''){
            message += 'Offer Applied' + ` : ${product.dis_offer}\n`;
        }

        message += `------------------------------\n`;
    });

    message += `\nGrand Total: ${grandTotal}\n`;

    let encodedMessage = encodeURIComponent(message);
    let recipientPhone = `+${wpRegionCode}${whatsappNumber}`;
    let whatsappUrl = `https://wa.me/${recipientPhone}?text=${encodedMessage}`;

    localStorage.removeItem("cart");
    if ($("#whatsappUrlLink")) {

        
            console.log("---=-=-=-=-=. ", isIOS());
            if (isIOS()) {
                window.location.href = whatsappUrl;

            } else {
                $("#whatsappUrlLink").attr("href", whatsappUrl);
                $("#whatsappUrlLink").attr("target", "_blank");
                document.getElementById("whatsappUrlLink").click();

                setTimeout(() => {
                    window.location.reload();
                }, 200);
            }

    } else {

        // Create an anchor element
        const anchor = document.createElement('a');
        anchor.href = whatsappUrl;
        anchor.target = '_blank';
        anchor.rel = 'noopener noreferrer'; // For security
        anchor.style.display = 'none'; // Keep it hidden

        // Append it to the body
        document.body.appendChild(anchor);

        // Programmatically click it
        anchor.click();

        // Clean up
        document.body.removeChild(anchor);
    }
}

function attributeSelectButtonClick() {
    localStorage.setItem("isFromModelClick", "true");

    if ($("#isOpenFrom").val() == "direct") {
        let id = $("#attrProductId").val();
        let btn = $('button[data-id="' + id + '"][onclick]');  // target button by data-id
        if (!btn.length) return;                      // button not found

        let onclickAttr = btn.attr("onclick");

        if (onclickAttr) {
            eval(onclickAttr);
        } else {
            console.log("No onclick for data-id:", id);
        }
    } else {
        let id = $("#attrProductId").val();
        $('.addToCartBtn[data-id="' + id + '"]').trigger('click');
        $("#AttributeModal").modal("hide");
    }
}

function prepareAndSendWpMessageDirect(productId, productName, currency_icon, productPrice, cartoon_qty = 0, isAttributeAsk = false, addressFields = undefined, sizes = '', colors = '') {
    let storeId = $("#whatsappStoreId").val();


    let isEnableRezorpay = $("#wpRazorpayEnabled").val();

    let prodAttribute = $("#product_attr_attribu_" + productId).val();
    let prodAttribTitle = $("#product_attr_title_" + productId).val();

    if (prodAttribute && !$("#isFromProductDetails").val()) {
        if (!localStorage.getItem("isFromModelClick")) {
            if (JSON.parse(prodAttribute).length > 0) {
                openModelAndrenderAttributes(JSON.parse(prodAttribute), prodAttribTitle, currency_icon, 'direct', productId);
                return;
            }
        }
    }

    localStorage.removeItem("isFromModelClick");

    let isShowUserInfo = $("#wp_show_order_form").val();

    if (isEnableRezorpay == "1" || storeId == 860 || storeId == 1518 || storeId == 865 || storeId == 982 || storeId == 70 || storeId == 1065 || storeId == 1093 || storeId == 1151 || storeId == 1407 || storeId == 1591 || storeId == 1193 || storeId == 1201 || isShowUserInfo == "on") {
        

        if(!isAttributeAsk && !sizes){
            $('.addToCartBtn[data-id="' + productId + '"]').trigger('click');
            
            setTimeout(function () {
                $(".order-btn").click();
            }, 100);
        }else{
            $('.attributeAskButton[data-id="' + productId + '"]').trigger('click');
        }

        

        return;
    }



    if (isAttributeAsk && storeId != 322 && storeId != 396 && storeId != 1502 && storeId != 1463) {
        localStorage.removeItem("selectedProductId");
        localStorage.setItem("selectedProduct", JSON.stringify({
            productId,
            productName,
            currency_icon,
            productPrice
        }));
        if (sizes) {
            renderSizeOptions(sizes);
        }
        if (colors && colors.length != 0) {
            renderColorOptions(colors);
        }
        $("#SizeModal").modal("show");
        $("#sizeWhatsappClick").attr("onclick", `prepareAndSendWpMessageDirect(${productId},'${productName}','${currency_icon}','${productPrice}',0)`);

    } else {
        let storeId = $("#whatsappStoreId").val();
        if ((storeId == 322 || storeId == 396 || storeId == 171) && !isAttributeAsk) {
            $("#quantityModal").modal("show");
            $("#newWhatsappOrderButton").attr("onclick", `prepareAndSendWpMessageDirect(${productId},'${productName}','${currency_icon}','${productPrice}',0,true)`);
        } else {
            if ($("#SizeModal")) {
                $("#SizeModal").modal("hide");
            }
            let baseUrl = $("#baseUrl").val();
            let storeAlias = $("#storeAlias").val();
            let wpRegionCode = $("#wpRegionCode").val();
            let whatsappNumber = $("#whatsappNo").val();

            let storeId = $("#whatsappStoreId").val();
            let sizeValue = '';
            let colorValue = '';

            if (addressFields || storeId == 344) {

                const selectedSize = document.querySelector('input[name="popupSize"]:checked');

                if (selectedSize) {
                    sizeValue = selectedSize.value;
                    // You can use selectedSize.value wherever needed
                } else {
                    const selectedSize = document.querySelector('input[name="size"]:checked');

                    if (selectedSize) {
                        sizeValue = selectedSize.value;
                        // You can use selectedSize.value wherever needed
                    }
                }

                const selectedColor = document.querySelector('#popupSelectedColor');

                if (selectedColor) {
                    colorValue = selectedColor.value;
                    // You can use selectedSize.value wherever needed
                }


            } else {
                const selectedSize = document.querySelector('input[name="size"]:checked');

                if (selectedSize) {
                    sizeValue = selectedSize.value;
                    // You can use selectedSize.value wherever needed
                } else {
                    let selectedSize = document.querySelector('input[name="popupSize"]:checked');

                    if (selectedSize) {
                        sizeValue = selectedSize.value;
                    }
                }

                const selectedColor = document.querySelector('#selectedColor');

                if (selectedColor) {
                    colorValue = selectedColor.value;
                    // You can use selectedSize.value wherever needed
                } else {
                    let selectedColor = document.querySelector('#selectedColorNew');
                    if (selectedColor) {
                        colorValue = selectedColor.value;
                    }
                }

            }


            let pcsPrice = 0;

            if (storeId == 530) {
                let sizes = $(`#product_size_${productId}`).val();
                console.log(sizes);
                if (sizes) {
                    let sizeValue = sizes.split(",").length;
                    pcsPrice = productPrice;
                    productPrice = Number(productPrice) * sizeValue;
                }
            }

            let message = "";

            if (addressFields) {
                message = "Customer Details" + `:\n`;
                message += `------------------------------\n`;
                message += 'Name' + ` : ${addressFields.name}\n`;
                message += 'Mobile' + ` : +${addressFields.region_code}${addressFields.phone}\n`;
                message += 'Address' + ` : ${addressFields.address}\n`;
                message += 'Pincode' + ` : ${addressFields.pincode}\n`;
                message += `------------------------------\n`;
            }
            message += 'Product Details' + `:\n`;
            message += `------------------------------\n`;

            let quantity = 1;

            if (isAttributeAsk) {
                quantity = $("#quantityInput").val();
                $("#quantityModal").modal("hide");
                $("#quantityInput").val(1);
            }

            if($("#orderNewAttQty") && $("#orderNewAttQty").val()){
                quantity = Number($("#orderNewAttQty").val());
            }

            const pathPrefix = window.location.href.includes('whatsapp-store') ? 'whatsapp-store' : 'store';


            let productUrl = `${baseUrl}/${pathPrefix}/${storeAlias}/${productId}/product-details`;

            if (getdomain() != "staging.vcardking.com") {
                productUrl = `https://${getdomain()}/product-details/${productId}`;
            }

            let selectAttribute = $("#selectedAttribute").val();

            if (selectAttribute) {
                selectAttribute = JSON.parse($("#selectedAttribute").val());
                message += 'Product Name' + `: ${productName} (${selectAttribute.name})\n`;
                productPrice = selectAttribute.price;
            } else {
                message += 'Product Name' + `: ${productName}\n`;
            }

            if (sizeValue) {
                message += 'Product Size' + `: ${sizeValue}\n`;
            }

            if (colorValue) {
                message += 'Product Color' + `: ${colorValue}\n`;
            }

            if (storeId != 345 &&  storeId != 1249 && storeId != 1488) {
                message += 'Product URL' + ` : ${productUrl}\n`;
            }

            if (storeId == 530) {
                message += 'Pcs Price' + ` : ${currency_icon} ${pcsPrice}\n`;
                message += 'Set Quantity' + ` : ${quantity}\n`;
                message += `${quantity} Set Price` + ` : ${currency_icon} ${productPrice}\n`;
            } else {
                message += 'Price' + ` : ${currency_icon} ${productPrice}\n`;
                message += 'Quantity' + ` : ${quantity}\n`;
                message += 'Total Price' + ` : ${currency_icon} ${productPrice}\n`;
            }

             if (selectAttribute) {
                selectAttribute = JSON.parse($("#selectedAttribute").val());
                if(storeId == 1209){
                    let offerText = getOfferText(selectAttribute.discount_quantity, quantity, productId);
                    if(offerText != ''){
                        message += 'Offer Applied' + `: ${offerText}\n`;
                    }
                }
            }

            

            message += `------------------------------\n`;
            let dis = getDiscountPercentage() || 0;
            if (Number(dis) != 0) {
                dis = (((productPrice * quantity) * dis) / 100).toFixed();
                message += 'Discount' + ` : ${currency_icon} ${dis}\n`;
                message += `------------------------------\n`;
            }

            message += `\nGrand Total: ${currency_icon} ${((productPrice * quantity) - Number(dis))}\n`;

            let encodedMessage = encodeURIComponent(message);
            let recipientPhone = `+${wpRegionCode}${whatsappNumber}`;
            
            let whatsappUrl = `https://wa.me/${recipientPhone}?text=${encodedMessage}`;

            // Create an anchor element
            const anchor = document.createElement('a');
            anchor.href = whatsappUrl;
            anchor.target = '_blank';
            anchor.rel = 'noopener noreferrer'; // For security
            anchor.style.display = 'none'; // Keep it hidden

            // Append it to the body
            document.body.appendChild(anchor);

            // Programmatically click it
            anchor.click();

            // Clean up
            document.body.removeChild(anchor);

            setTimeout(() => {
                window.location.reload();
            }, 100);
        }
    }
}

function categoryShare(id) {
    const pathPrefix = window.location.href.includes('whatsapp-store') ? 'whatsapp-store' : 'store';

    let shareUrl = `https://staging.vcardking.com/${pathPrefix}/royal-fabric-bags/products?category=${id}`;

    if (getdomain() != "staging.vcardking.com") {
        shareUrl = `https://${getdomain()}/products?category=${id}`;
    }


    navigator.clipboard.writeText(shareUrl)
        .then(() => {
            displaySuccessMessage("Copied!");

            setTimeout(() => {
                let message = `I have Inquiry on this category: ${shareUrl}`;
                let encodedMessage = encodeURIComponent(message);
                let wpRegionCode = $("#wpRegionCode").val();
                let whatsappNumber = $("#whatsappNo").val();
                let recipientPhone = `+${wpRegionCode}${whatsappNumber}`;
                let whatsappUrl = `https://wa.me/${recipientPhone}?text=${encodedMessage}`;





                const anchor = document.createElement('a');
                anchor.href = whatsappUrl;
                anchor.target = '_blank';
                anchor.rel = 'noopener noreferrer'; // For security
                anchor.style.display = 'none'; // Keep it hidden

                // Append it to the body
                document.body.appendChild(anchor);

                // Programmatically click it
                anchor.click();

                // Clean up
                document.body.removeChild(anchor);
            }, 800);
        })
        .catch(err => console.error("Failed to copy: ", err));




}

listenClick("#languageName", function () {
    let languageName = $(this).attr("data-name");
    $.ajax({
        url: languageChange + "/" + languageName + "/" + vcardAlias,
        type: "GET",
        success: function (result) {
            location.reload();
        },
        error: function error(result) {
            alert(result.responseJSON.message);
        },
    });
});
window.displaySuccessMessage = function (message) {
    toastr.options = {
        positionClass: "toast-top-right",
        progressBar: true,
        closeButton: true,
        timeOut: 1000,
        extendedTimeOut: 1000,
    };
    toastr.success(message, "Successful");
};
window.displayErrorMessage = function (message) {
    toastr.options = {
        positionClass: "toast-top-right",
        progressBar: true,
        closeButton: true,
        timeOut: 1000,
        extendedTimeOut: 1000,
    };
    toastr.error(message, "Error");
};

listenClick(".drop-item-select", function () {
    $(".drop-item-select").removeClass("active");
    $(this).addClass("active");
});


listenClick(".custom-select-option", function () {
    $(".custom-select-option").removeClass("active");
    $(this).addClass("active");
});

listenClick(".pwa-close", function () {
    $(".pwa-support").addClass("d-none");
});

function openSizeModel(productId, sizes, colors = '') {
    if (sizes) {
        renderSizeOptions(sizes);
    }
    if (colors && colors.length != 0) {
        renderColorOptions(colors);
    }

    localStorage.setItem("selectedProductId", productId);
    $("#SizeModal").modal("show");
    $("#sizeWhatsappClick").attr("onclick", `orderNowButtonClick()`);
}

function orderNowButtonClick(isForWhatsapp = false) {
    if (localStorage.getItem("selectedProductId")) {
        $("#product-" + localStorage.getItem("selectedProductId")).click();
        $("#SizeModal").modal("hide");
    } else {
        if (isForWhatsapp) {
            $("#orderNowModal").modal("show");
        } else {

            $("#SizeModal").modal("hide");
            let selectedProductItem = JSON.parse(localStorage.getItem("selectedProduct"));
            prepareAndSendWpMessageDirect(selectedProductItem.productId, selectedProductItem.productName, selectedProductItem.currency_icon, selectedProductItem.productPrice);
        }

    }
}


function setMetaThumbnailImage(imgUrl) {
    const ogImage = document.querySelector('meta[property="og:image"]');
    const twitterImage = document.querySelector('meta[name="twitter:image"]');

    if (ogImage) {
        ogImage.setAttribute('content', imgUrl);
    }

    if (twitterImage) {
        twitterImage.setAttribute('content', imgUrl);
    }
}

function renderSizeOptions(sizeString) {
    const sizes = sizeString.split(',');
    const container = document.getElementById('sizeContainer');
    container.innerHTML = ''; // Clear previous content

    sizes.forEach((size, index) => {
        const formCheck = document.createElement('div');
        formCheck.className = 'form-check form-check-inline';

        const input = document.createElement('input');
        input.className = 'form-check-input';
        input.type = 'radio';
        input.name = 'popupSize';
        input.id = `size_${size}`;
        input.value = size;
        if (index === 0) input.checked = true;

        const label = document.createElement('label');
        label.className = 'form-check-label';
        label.htmlFor = `size_${size}`;
        label.textContent = size;

        formCheck.appendChild(input);
        formCheck.appendChild(label);
        container.appendChild(formCheck);
    });
}

function renderColorOptions(json) {
    const container = document.getElementById('colorContainer');
    container.innerHTML = '';

    json.forEach((color, index) => {

        // Outer wrapper (flex row)
        const wrapper = document.createElement('div');
        wrapper.style.display = 'flex';
        wrapper.style.flexDirection = 'row';
        wrapper.style.alignItems = 'center';
        wrapper.style.marginRight = '3px';

        // Color swatch
        const swatch = document.createElement('div');
        swatch.classList.add('color-swatch');

        if (index === 0) {
            swatch.classList.add('selected');
            document.getElementById('selectedColorNew').value = color.color_name;
        }

        swatch.style.backgroundColor = color.color_code;
        swatch.dataset.color = color.color_name;
        swatch.title = color.color_name;
        swatch.onclick = function () {
            selectColorNew(this);
        };

        // Color name
        const span = document.createElement('span');
        span.style.fontWeight = '500';
        span.innerText = color.color_name;

        // Append
        wrapper.appendChild(swatch);
        wrapper.appendChild(span);
        container.appendChild(wrapper);
    });
}


function selectColorNew(el) {
    // Remove previous selection
    document.querySelectorAll('#colorContainer .color-swatch').forEach(s => s.classList.remove('selected'));

    // Add new selection
    el.classList.add('selected');

    // Store selected value
    document.getElementById('selectedColorNew').value = el.dataset.color;
}

function getOfferCount(value, base) {
    let cnt = Math.floor(value / base);
  return cnt == 0 ? 1 : Math.floor(value / base);
}

function getOfferText(dis_qty, prod_qty, product_id) {
    let storeId = $("#whatsappStoreId").val();
    if(storeId == 1209){
        let offer_text = $(`#product_dis_free_`+product_id).val();
        if(Number(prod_qty) >= Number(dis_qty)){
            let cnt = getOfferCount(Number(prod_qty), Number(dis_qty));
            $("#appOfferCount").html(cnt);
            return cnt + " " + offer_text;
        }else{
            return '';
        }
    }else{
        return '';
    }
}

function updateCourierCharge() {
    let storeId = $("#whatsappStoreId").val();
    if (storeId == 721 || storeId == 424 || storeId == 41 || storeId == 1238) {
        if (storeId == 41 || storeId == 424 || storeId == 1238) {
            let grandTotal = $("#grandTotal").html();
            if (grandTotal == 0) {
                $(".courier-class").hide();
            } else {
                let minimum_order_amt = $("#minimum_order_amount").val();
                if (Number(grandTotal) < Number(minimum_order_amt)) {
                    let courierCharge = $("#courierCharge").html();
                    $(".courier-class").show();
                    $("#grandTotal").html(Number(grandTotal) + Number(courierCharge));
                } else {
                    $(".courier-class").hide();
                }
            }
        } else {
            let grandTotal = $("#grandTotal").html();
            if (grandTotal == 0) {
                $(".courier-class").hide();
            } else {
                let courierCharge = $("#courierCharge").html();
                $(".courier-class").show();
                $("#grandTotal").html(Number(grandTotal) + Number(courierCharge));
            }
        }
    }

    if ($("#grandTotal").html() != 0) {
        $(".discount-class").show();
        let discount = getDiscountPercentage();
        if (discount != 0 && discount) {
            let courierCharge = $("#courierCharge").html() || 0;
            let total = Number($("#grandTotal").html()) - Number(courierCharge) || 0;
            let perc = ((total * Number(discount)) / 100).toFixed(2);
            $("#discountAmount").html(perc);
            $("#grandTotal").html((total - Number(perc)) + Number(courierCharge));
        }
    } else {
        $(".discount-class").hide();
    }
}

function getDiscountPercentage() {
    let discount = $("#discount_percentage").val();
    // let storeAlias = $("#storeAlias").val();
    // let userDetails =  localStorage.getItem(storeAlias + "user_d") ? JSON.parse(localStorage.getItem(storeAlias + "user_d")) : null;

    // const input = document.getElementById('mobileDiscountSettings');

    // if (input.value) {
                
    //             // Convert HTML entities to normal JSON string
    //             const decoded = input.value.replace(/&quot;/g, '"');

    //             const data = JSON.parse(decoded);

    //             if (Array.isArray(data) && userDetails && userDetails.phone) {
    //                 if(data.length > 0){
    //                     let findMobile = data.find(item => item.mobile == userDetails.phone);
    //                     if(findMobile){
    //                         discount = findMobile.discount;
    //                     }
    //                 }
    //             }
    //         } 
    
    return discount;        
}

async function submitUserDetails() {
    let storeAlias = $("#storeAlias").val();
    let userdetails = {"name":null,"phone":null,"email":null,"address":null,"country_code":null};

    if ($("#customName").val()) {
        userdetails.name = $("#customName").val();
    }

    if ($("#customphoneNumber").val()) {
        userdetails.phone = $("#customphoneNumber").val();
    }

    if($("#custom_prefix_code").val()){
        userdetails.country_code = $("#custom_prefix_code").val();
    }

    let mainSessionId = localStorage.getItem(storeAlias + "sc_id");
    
    const payload = {
        name: userdetails.name,
        phone: userdetails.phone,
        region_code: userdetails.country_code,
        sc_id: mainSessionId,
    };
        
    const response = await fetch(`https://${getdomain()}/update-session-user-data`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
            },
            body: JSON.stringify(payload)
        });    

        const result = await response.json();

    $("#userFormModal").modal("hide");
    
    localStorage.setItem(storeAlias + "user_d", JSON.stringify(userdetails));
}

function isUserDetailsSet(){
    let storeAlias = $("#storeAlias").val();
    let userDetails =  localStorage.getItem(storeAlias + "user_d") ? JSON.parse(localStorage.getItem(storeAlias + "user_d")) : null;
    return (userDetails && userDetails.name == null) || !userDetails;
}

function openUserModelForm(){    
        $("#userFormModal").modal("show");
}


function checkFunctionEnableDisable(){
    let name = $("#customName").val();
    let phone = $("#customphoneNumber").val();

    if(name != '' && phone != ''){
        $("#saveUserDetails").removeAttr("disabled");
    } else {
        $("#saveUserDetails").attr("disabled", "disabled");
    }
}

function prepareAndSendWpMessageForPhonepe(order, paymentId,storeInfo) {



    let storeId = storeInfo.storeId;
    let baseUrl = storeInfo.baseUrl;
    let storeAlias = storeInfo.storeAlias;
    let wpRegionCode = storeInfo.wpRegionCode;
    let whatsappNumber = storeInfo.whatsappNumber;


    let sizeValue = '';
    let colorValue = '';
    const selectedSize = document.querySelector('input[name="size"]:checked');
    const selectedColor = document.querySelector('#selectedColor');
    if (selectedSize) {
        sizeValue = selectedSize.value;
        // You can use selectedSize.value wherever needed
    }
    if (selectedColor) {
        colorValue = selectedColor.value;
        // You can use selectedSize.value wherever needed
    }
   

    let message = "Customer Details" + `:\n`;
    message += `------------------------------\n`;
    message += 'Name' + `: ${order.name}\n`;
    message += 'Phone' + `: +${order.region_code} ${order.phone}\n`;
    message += 'Address' + `: ${order.address}\n\n`;

    if (order.pincode) {
        message += 'Pincode' + ` : ${order.pincode}\n`;
    }

    if (storeId == 1065) {
        message += 'Email Addess' + ` : ${order.email_address}\n`;
        message += 'Unit Number' + ` : ${order.unit_number}\n`;
        message += 'Order City' + ` : ${order.city}\n`;
        message += 'Postal Code' + ` : ${order.postal_code}\n`;
        message += 'Extra Notes' + ` : ${order.extra_notes}\n`;
        if (order.upstairs_delivery) {
            message += 'Upstairs Delivery' + ` : ${order.upstairs_delivery}\n`;
        } else {
            message += 'Upstairs Delivery' + ` : ${"No"}\n`;
        }

        message += 'Delivery StartDate' + ` : ${order.delivery_start_date}\n`;
        message += 'Delivery Instructions' + ` : ${order.delivery_instructions}\n`;
    }

    if (storeId == 1201) {
        message += `------------------------------\n`;
        message += `${order.dropdown_settings_order}\n`;
        message += `------------------------------\n`;
    }



    message += 'Order ID' + `: ${order.order_id}\n`;
    if (paymentId) {
        message += 'Payment ID' + `: ${paymentId}\n`;
    }
    message += `------------------------------\n`;
    message += 'Product Details' + `:\n`;
    message += `------------------------------\n`;

    const pathPrefix = window.location.href.includes('whatsapp-store') ? 'whatsapp-store' : 'store';

    order.products.forEach((product, index) => {

        let productUrl = `${baseUrl}/${pathPrefix}/${storeAlias}/${product.product_id}/product-details`;

        if (baseUrl != "https://vkingnew.parivarsetu.com") {
            productUrl = `https://${getdomain()}/product-details/${product.product_id}`;
        }

        if (getdomain() != "staging.vcardking.com") {
            productUrl = `https://${getdomain()}/product-details/${product.product_id}`;
        }

        message += `${index + 1}.\n`;
        if (product.attribute) {
            message += 'Product Name' + `: ${(product.product ? product.product.name : "Unknown")
                }(${product.attribute})\n`;
        } else {
            message += 'Product Name' + `: ${product.product ? product.product.name : "Unknown"
                }\n`;
        }

        if (product.size) {
            message += 'Product Size' + ` : ${product.size}\n`;
        }
        if (product.cartoon_qty) {
            message += 'Cartoon Quantity' + ` : ${product.cartoon_qty}\n`;
        }

        if (product.color) {
            message += 'Product Color' + ` : ${product.color}\n`;
        }

        if (storeId != 345 && storeId != 1249) {
            message += 'Product URL' + ` : ${productUrl}\n`;
        }

        if (storeId == 530) {
            message += 'Pcs Price' + ` : ${product.product.currency.currency_icon} ${product.price}\n`;
            message += 'Set Quantity' + ` : ${product.qty}\n`;
            message += `${product.qty} Set Price` + ` : ${product.product.currency.currency_icon} ${product.total_price}\n`;
        } else {
            message += 'Price' + ` : ${product.product.currency.currency_icon} ${product.price}\n`;
            message += 'Quantity' + ` : ${product.qty}\n`;
            message += 'Total Price' + ` : ${product.product.currency.currency_icon} ${product.total_price}\n`;
        }


        message += `------------------------------\n`;
    });

    if (storeId == 721 || storeId == 424 || storeId == 41 || storeId == 1238) {
        message += 'Courier Charge' + ` :  ${order.courier_charges}\n`;
        message += `------------------------------\n`;
    }

    if (order.dis_amt != 0) {

        message += 'Total' + ` :  ${order.dis_amt + order.grand_total}\n`;

        if(order.coupon_code != ""){
            message += `Discount(Coupon: ${order.coupon_code})` + ` :  ${order.dis_amt}\n`;
        }else{
            message += 'Discount' + ` :  ${order.dis_amt}\n`;
        }
        message += `------------------------------\n`;
    }

    message += `\nGrand Total: ${order.grand_total}\n`;

    let encodedMessage = encodeURIComponent(message);
    let recipientPhone = `+${wpRegionCode}${whatsappNumber}`;
    if(storeId == 1488){
        recipientPhone = `+${order.region_code}${order.phone}`
    }
    let whatsappUrl = `https://wa.me/${recipientPhone}?text=${encodedMessage}`;



        // Create an anchor element
        const anchor = document.createElement('a');
        anchor.href = whatsappUrl;
        anchor.target = '_blank';
        anchor.rel = 'noopener noreferrer'; // For security
        anchor.style.display = 'none'; // Keep it hidden

        // Append it to the body
        document.body.appendChild(anchor);

        // Programmatically click it
        anchor.click();

        // Clean up
        document.body.removeChild(anchor);
    
}

function handlePincodeInput(){
    let storeId = $("#whatsappStoreId").val();

    if(storeId == 1463){
        let cartData = JSON.parse(localStorage.getItem("cart")) || {};

                    let cart = cartData[`store_${storeId}`] || {};

                    let grandTotal = cart?.grand_total ?? 0;
        let pincode = $("#pincode").val();
        
        if(pincode.length === 6){
            getPincodeDetails(pincode).then(details => {
                if(details){
                    
                    if(details.state == 'Gujarat'){
                        $("#courierApplyCharge").html((50).toFixed(2));
                        $("#finalTotal").html((Number(grandTotal) + 50).toFixed(2));
                    }else{
                        $("#courierApplyCharge").html((70).toFixed(2));
                        $("#finalTotal").html((Number(grandTotal) + 70).toFixed(2));
                    }

                    $(".newWhatsappButton").removeAttr("disabled");
                }else{
                    $("#courierApplyCharge").html(0);
                    $("#finalTotal").html(Number(grandTotal).toFixed(2));
                    $(".newWhatsappButton").attr("disabled", true);
                }
            });
        }else{
            $("#courierApplyCharge").html(0);
            $("#finalTotal").html(Number(grandTotal).toFixed(2));
            $(".newWhatsappButton").attr("disabled", true);
        }
    }
}

async function getPincodeDetails(pincode) {
  const res = await fetch(`https://api.postalpincode.in/pincode/${pincode}`);
  const data = await res.json();

  if (data[0].Status === "Success") {
    return {
      state: data[0].PostOffice[0].State,
      district: data[0].PostOffice[0].District,
      city: data[0].PostOffice[0].Block
    };
  } else {
    return null;
  }
}

let discount = 0;

async function applyCoupon() {
    const code = document.getElementById('couponCode').value.trim();
    const storeId = $("#whatsappStoreId").val();
    if(!code){
        $("#errormessage").html("Please enter coupon code");
        return;
    }

     const response = await fetch("https://microvedaofficial.com/apply-coupon-code-store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // only if using web.php
            },
            body: JSON.stringify({
                "coupon_code": code,
                "order_amount": Number($("#grandTotal").html()),
                "store_id": storeId,
            })
        });

        const result = await response.json();

        let cart = JSON.parse(localStorage.getItem("cart")) || {};
        let storeCart = cart[`store_${storeId}`];
        
        if(result.final_amount){
            $("#errormessage").html("");
            

                discount = (Number($("#grandTotal").html()) - Number(result.final_amount)).toFixed(2);

                document.getElementById('couponInputWrapper').classList.add('d-none');
                document.getElementById('couponAppliedBox').classList.remove('d-none');

                document.getElementById('discountAmount').innerText = discount;
                document.getElementById('discountValue').innerText = discount;

                document.getElementById('discountRow').classList.remove('d-none');

                document.getElementById('appliedCouponName').innerHTML = code + " Applied";


                storeCart["coupon"] = code;
                storeCart["coupon_discount"] = discount;

                updateGrandTotal();

                document.getElementById('couponCode').value = "";

        }else{
            $("#errormessage").html(result.response.message);
        }

        localStorage.setItem("cart", JSON.stringify(cart));
}

function setCartCouponCode(code, discountAmount){

    document.getElementById('couponInputWrapper').classList.add('d-none');
    document.getElementById('couponAppliedBox').classList.remove('d-none');

    document.getElementById('discountAmount').innerText = discountAmount;
    document.getElementById('discountValue').innerText = discountAmount;

    document.getElementById('discountRow').classList.remove('d-none');

    document.getElementById('appliedCouponName').innerHTML = code + " Applied";

    discount = discountAmount;

    updateGrandTotal();
}

function removeCoupon() {
    if($(".coupon-applied").hasClass("d-none")) return;
    $("#errormessage").html("");
    if(document.getElementById('couponInputWrapper')){
        document.getElementById('couponInputWrapper').classList.remove('d-none');
    document.getElementById('couponAppliedBox').classList.add('d-none');
    document.getElementById('discountAmount').innerText = 0;
    document.getElementById('discountValue').innerText = 0;
    document.getElementById('discountRow').classList.add('d-none');
    let storeId = $("#whatsappStoreId").val();
    let cart = JSON.parse(localStorage.getItem("cart")) || {};
    let storeCart = cart[`store_${storeId}`];
    discount = storeCart.coupon_discount;

    if(storeCart){
        delete storeCart.coupon;
        delete storeCart.coupon_discount;
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    document.getElementById('couponCode').value = "";

    updateGrandTotal(true);
    }
    
}

function updateGrandTotal(isRemove = false) {
    let total = Number($("#grandTotal").html()); // replace with your actual total logic
    if(!isRemove){
        let finalTotal = Number(total - discount).toFixed(2);
        document.getElementById('grandTotal').innerText = finalTotal;
    } else{
        let finalTotal = (Number(total) + Number(discount)).toFixed(2);
        document.getElementById('grandTotal').innerText = finalTotal;
    }
    
}