

    <style>
        /* --- Ready Rasoi Cart Theme --- */
        
        /* Scope Wrapper */
        .ready-rasoi-cart {
            --rr-magenta: #d50170;
            --rr-yellow: #feff03;
            --rr-yellow-dark: #eab308;
            --rr-cream: #f2e8de;
            --rr-dark: #1a1a1a;
            --rr-gray-text: #6b7280;
        }



        .ready-rrasoi .add-to-cart-btn {
    border: 2px solid #025d18 !important;
    background: #feff03 !important;
    background-color: #feff03 !important;
}

        /* Modal Structure */
        .ready-rasoi-cart .modal-content {
            border-radius: 1.5rem; /* 24px */
            border: none;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            padding: 0px !important
        }

        /* Header */
        .ready-rasoi-cart .modal-header {
            border-bottom: 1px solid #f3f4f6;
            padding: 1.25rem 1.5rem;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .ready-rasoi-cart .modal-title {
            font-weight: 700;
            color: var(--rr-dark);
            font-size: 1.125rem;
            margin: 0;
            line-height: 1.2;
        }
        .ready-rasoi-cart .modal-subtitle {
            font-size: 0.75rem;
            color: var(--rr-gray-text);
            margin: 0;
        }
        .ready-rasoi-cart .btn-close-custom {
            background: transparent;
            border: none;
            color: #9ca3af;
            font-size: 1.25rem;
            padding: 0.25rem;
            transition: color 0.2s;
        }
        .ready-rasoi-cart .btn-close-custom:hover {
            color: var(--rr-magenta);
        }

        /* Body */
        .ready-rasoi-cart .modal-body {
            background-color: rgba(242, 232, 222, 0.3); /* Cream tint */
            padding: 0.75rem;
            max-height: 55vh;
            overflow-y: auto;
        }
        /* Custom Scrollbar */
        .ready-rasoi-cart .modal-body::-webkit-scrollbar { width: 4px; }
        .ready-rasoi-cart .modal-body::-webkit-scrollbar-track { background: #f1f1f1; }
        .ready-rasoi-cart .modal-body::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 10px; }

        /* --- Cart Item Card --- */
        .ready-rasoi-cart .cart-item {
            background: #fff;
            border-radius: 1rem;
            padding: 0.75rem;
            border: 1px solid #f3f4f6;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
            position: relative;
            flex-direction: column;
        }

        /* Image */
        .ready-rasoi-cart .item-img-wrapper {
            width: 64px;
            height: 64px;
            flex-shrink: 0;
            border-radius: 0.75rem;
            overflow: hidden;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            margin-top: 4px;
        }
        .ready-rasoi-cart .item-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Text Details */
        .ready-rasoi-cart .item-details {
            flex-grow: 1;
            padding-right: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .ready-rasoi-cart .item-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--rr-dark);
            line-height: 1.2;
        }
        .ready-rasoi-cart .item-category {
            font-size: 0.6875rem;
            color: var(--rr-gray-text);
        }
        .ready-rasoi-cart .item-unit-price {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151; /* Classic Dark Gray */
            margin-top: 4px;
        }
        .ready-rasoi-cart .item-unit-label {
            font-size: 0.625rem;
            font-weight: 400;
            color: var(--rr-gray-text);
        }

        /* Right Side Controls */
        .ready-rasoi-cart .item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.5rem;
            min-width: 60px;
        }

        /* Delete Button */
        .ready-rasoi-cart .btn-delete {
            padding: 0;
            border: none;
            background: none;
            color: #ef4444;
            font-size: 0.875rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .ready-rasoi-cart .btn-delete:hover {
            color: #ef4444;
        }

        /* Quantity Selector */
        .ready-rasoi-cart .qty-selector {
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid #d1d5db;
            border-radius: 50px;
            padding: 2px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
        }
        .ready-rasoi-cart .qty-btn {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            font-size: 10px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .ready-rasoi-cart .qty-minus {
            background-color: #f3f4f6;
            color: var(--rr-dark);
        }
        .ready-rasoi-cart .qty-minus:hover { background-color: #e5e7eb; }
        
        .ready-rasoi-cart .qty-plus {
            background-color: #f3f4f6;
              border: 1px solid #aaaaab;
        }
        .ready-rasoi-cart .qty-plus:hover { background-color: #f3f4f6; }

        .ready-rasoi-cart .qty-input {
            width: 30px;
            text-align: center;
            border: none;
            background: transparent;
            font-weight: 700;
            font-size: 0.75rem;
            color: var(--rr-dark);
            padding: 0;
            -moz-appearance: textfield; /* Remove Firefox spinner */
        }
        .ready-rasoi-cart .qty-input::-webkit-outer-spin-button,
        .ready-rasoi-cart .qty-input::-webkit-inner-spin-button {
            -webkit-appearance: none; /* Remove Chrome spinner */
            margin: 0;
        }

        /* Item Total Display (Below Input) */
        .ready-rasoi-cart .item-total-display {
            text-align: right;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--rr-dark);
            width: 100%;
        }

        /* Footer */
        .ready-rasoi-cart .modal-footer {
            border-top: 1px solid #f3f4f6;
            padding: 1.25rem;
            background: #fff;
            display: block; /* Custom layout */
        }
        .ready-rasoi-cart .footer-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .ready-rasoi-cart .total-label {
            font-weight: 700;
            color: var(--rr-dark);
            font-size: 0.875rem;
        }
        .ready-rasoi-cart .grand-total {
            font-size: 1.25rem;
            font-weight: 900;
            color: var(--rr-dark);
        }
        
        /* Footer Buttons */
        .ready-rasoi-cart .btn-cancel {
            border: 1px solid #d1d5db;
            background: #fff;
            color: #4b5563;
            font-weight: 700;
            border-radius: 10px;
            padding: 0.6rem;
            font-size: 0.875rem;
            transition: all 0.2s;
        }
        .ready-rasoi-cart .btn-cancel:hover {
            background: #f9fafb;
            color: var(--rr-dark);
        }

        .ready-rasoi-cart .btn-order {
            background-color: var(--rr-magenta);
            border: none;
            color: #fff;
            font-weight: 700;
            border-radius: 10px;
            padding: 0.6rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            /* box-shadow: 0 4px 6px -1px rgba(213, 1, 112, 0.3); */
            transition: all 0.2s;
        }
        .ready-rasoi-cart .btn-order:hover {
            background-color: #be0062;
            color: #fff !important;
            transform: translateY(-1px);
        }

        @media(min-width: 600px){
            .product-card{
                padding: 22px !important;
            }
        }

        /* Coupon Section */
.coupon-section {
    background: #fff;
    border-radius: 12px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px dashed #d1d5db;
    margin-left: 12px;
    margin-right: 10px;
    margin-top: 10px;
}

/* Input */
.coupon-input-wrapper {
    display: flex;
    gap: 8px;
}
.coupon-input-wrapper input {
    flex: 1;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 6px 10px;
    font-size: 12px;
}
.coupon-input-wrapper button {
    background: #025d18;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 6px 12px;
    font-size: 12px;
    font-weight: 600;
}

/* Applied Coupon */
.coupon-applied {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #ecfdf5;
    border: 1px solid #10b981;
    border-radius: 10px;
    padding: 8px;
    margin-top: 6px;
}

.coupon-left {
    display: flex;
    gap: 8px;
    align-items: center;
}
.coupon-left i {
    color: #10b981;
}
.coupon-title {
    font-size: 12px;
    font-weight: 700;
}
.coupon-desc {
    font-size: 10px;
    color: #065f46;
}

.remove-coupon {
    border: none;
    background: none;
    color: #ef4444;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
}
.discount-row{
    display: flex;
    justify-content: space-between;
    font-weight: 700;
    font-size: 14px;
}
    </style>

    <div class="modal fade ready-rasoi-cart" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                        <p class="modal-subtitle">Items in your bag</p>
                    </div>
                    <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="modal-body" id="cartItemsReadyRasoi">
                    
                </div>
                <div class="coupon-section">
                    <div class="coupon-input-wrapper" id="couponInputWrapper">
                        <input type="text" id="couponCode" placeholder="Enter coupon code">
                        <button onclick="applyCoupon()">Apply</button>
                    </div>

                    <span id="errormessage" style="color: red;font-weight: 500;font-size: 12px;"></span>

                    <div class="coupon-applied d-none" id="couponAppliedBox">
                        <div class="coupon-left">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>
                                <div class="coupon-title" id="appliedCouponName">SAVE50 Applied</div>
                                <div class="coupon-desc">You saved ₹ <span id="discountAmount">0</span></div>
                            </div>
                        </div>
                        <button class="remove-coupon" onclick="removeCoupon()">Remove</button>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="discount-row d-none" id="discountRow">
                        <span>Discount</span>
                        <span class="text-success">- ₹ <span id="discountValue">0</span></span>
                    </div>
                    <div class="footer-summary">
                        <span class="total-label">Grand Total</span>
                        <span class="grand-total">₹ <span id="grandTotal">0</span></span>
                    </div>
                    
                    <div class="footer-buttons row gx-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-cancel w-100" data-bs-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="newWhatsappButton btn btn-order w-100 order-btn" style="background: #025d18 !important;" data-bs-toggle="modal" data-bs-target="#orderNowModal">
                                <i class="fa-brands fa-whatsapp ms-1"></i>
                                <span>Order Now</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>