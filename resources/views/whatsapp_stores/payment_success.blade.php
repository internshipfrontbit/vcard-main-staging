<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .status-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; max-width: 450px; width: 100%; }
        .icon-box { font-size: 80px; margin-bottom: 20px; }
        .text-success { color: #28a745 !important; }
        .text-danger { color: #dc3545 !important; }
        .btn-home { background-color: #0d6efd; color: white; padding: 10px 30px; border-radius: 50px; text-decoration: none; margin-top: 20px; display: inline-block; }
        
#paymentModal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.6);
  justify-content: center;
  align-items: center;
  z-index: 9999;
}


.send-msg-button {
    align-items: center;
    justify-content: center;
    background: #111827;
    color: #fff;
    border-radius: 6px;
    padding: 5px 0px;
    font-weight: bold;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    border: none;
}

.pay .open-btn {
  padding: 12px 20px;
  background: #111827;
  color: #fff;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
}
.pay .open-btn:hover {
  background: #374151;
}

.pay .modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.pay .modal-content {
  background: #fff;
  padding: 25px;
  border-radius: 10px;
  width: 350px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  text-align: center;
  position: relative;
}

.pay .close-icon {
  position: absolute;
  top: 12px;
  right: 12px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 5px;
}
.pay .close-icon svg {
  width: 20px;
  height: 20px;
  stroke: #666;
}
.pay .close-icon:hover svg {
  stroke: #000;
}

.pay .success-icon {
  width: 60px;
  height: 60px;
  margin: 0 auto 15px;
}

.pay h2 {
  margin: 0;
  font-size: 22px;
  color: #333;
}
.pay p {
  color: #666;
  font-size: 14px;
  margin-bottom: 20px;
}

.pay .details {
  text-align: left;
  font-size: 14px;
  margin: 15px 0;
}
.pay .details div {
  margin: 8px 0;
  display: flex;
  justify-content: space-between;
}
.pay .details span {
  color: #444;
}

/* Button */
.pay .btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: #111827;
  color: #fff;
  padding: 10px 18px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
  cursor: pointer;
  border: none;
}
.pay .btn:hover {
  background: #374151;
}

/* Spinner inside button */
.btn .spinner {
  border: 2px solid #f3f3f3;
  border-top: 2px solid #fff;
  border-radius: 50%;
  width: 14px;
  height: 14px;
  margin-left: 8px;
  animation: spin 1s linear infinite;
  display: none;
}
@keyframes spin {
  100% { transform: rotate(360deg); }
}        

/* Text-only button style */
.pay .btn-text {
    background: transparent !important;
    color: #6b7280 !important; /* Muted Gray */
    border: none;
    box-shadow: none;
    padding: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: block; /* Ensures it takes width for centering */
    width: 100%;
    text-align: center;
    cursor: pointer;
}

.pay .btn-text:hover {
    color: #111827 !important; /* Darker/Black on hover */
    background: transparent !important;
    text-decoration: underline; /* Optional: adds underline on hover */
}

    </style>
</head>
<body>

    <div id="paymentstate" class="status-card">
        <div id="loadingState">
            <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h3 class="mt-4">Verifying Payment</h3>
            <p class="text-muted">Please wait while we confirm your order...</p>
        </div>

        <div id="successState" style="display: none;">
            <div class="icon-box text-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3>Payment Successful!</h3>
            <p class="text-muted">Your order has been placed successfully.</p>
            <p><strong>Order ID: <span id="orderIdDisplay"></span></strong></p>
            <a href="#" id="backBtn" class="btn-home">Back to Store</a>
        </div>

        <div id="failedState" style="display: none;">
            <div class="icon-box text-danger">
                <i class="fas fa-times-circle"></i>
            </div>
            <h3>Payment Failed</h3>
            <p class="text-muted" id="failReason">The transaction could not be completed.</p>
            <a href="#" id="retryBtns" class="btn-home" style="background-color: #6c757d;">Try Again</a>
        </div>
    </div>


<!-- Modal Wrapper -->
<div class="pay">
  <div class="modal" id="paymentModal" style="background: white;">
    <div class="modal-content">

      <!-- Close Icon -->
      <button class="close-icon" id="closeModal">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <path d="M6 6l12 12M6 18L18 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>

      <div class="success-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
          <circle cx="12" cy="12" r="10" stroke="#22c55e" stroke-width="2"/>
          <path d="M9 12l2 2 4-4" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h2>Payment Successful</h2>
      <p>Thank you for your payment. Your order is being processed.</p>

      <div class="details"> 
        <div><strong>Order Id:</strong> <span id="orderId"></span></div>         
        <div><strong>Amount Paid:</strong> <span id="paidAmount"></span></div> 
        <div><strong>Payment Id:</strong> <span id="paymentId"></span></div> 
        <div><strong>Order Date:</strong> <span id="paymentDate"></span></div> 
      </div>

      <a href="#" class="btn" id="downloadBtn">
        Download Receipt
        <span class="spinner"></span>
      </a>
      
                                        <button id="sendMesgNew" 
                                            class="send-msg-button btn-primary d-flex justify-content-center align-items-center mx-auto gap-2 w-100" style="background: #25d366 !important; color: #ffffff !important;border: 1px solid #25d366 !important; margin-top: 8px;">
                                                <span>
                                                    <svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="height: 25px;width: 25px;">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path>
                                                        <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path>
                                                        <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path>
                                                        <defs>
                                                        <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5BD066"></stop>
                                                        <stop offset="1" stop-color="#27B43E"></stop>
                                                        </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </span>
                                               Send Order
                                                <div class="cart">
                                                    <svg viewBox="0 0 36 26">
                                                        <polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5">
                                                        </polyline>
                                                        <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                                    </svg>
                                                </div>
                                        </button>        
                                        
<a href="#" id="backBtnNew" class="btn-text" style=" margin-top: 8px;">Back to Store</a>                                        
      
      

    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
// ✅ Date formatter
function formatDateTime(dateInput) {
  const date = new Date(dateInput);
  const day = String(date.getDate()).padStart(2, "0");
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const year = date.getFullYear();

  let hours = date.getHours();
  const minutes = String(date.getMinutes()).padStart(2, "0");
  const ampm = hours >= 12 ? "PM" : "AM";
  hours = hours % 12 || 12; // ✅ convert 0 -> 12 for 12-hour format

  return `${day}/${month}/${year}, ${String(hours).padStart(2, "0")}:${minutes} ${ampm}`;
}

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("paymentModal");
  const downloadBtn = document.getElementById("downloadBtn");

  

  // ✅ Example: set payment details dynamically
  const now = new Date();
  const formattedDate = formatDateTime(now);

  // ✅ Update modal view with AM/PM format
  document.getElementById("paymentDate").innerText = formattedDate;


  // ✅ Download PDF
  downloadBtn.addEventListener("click", function (e) {
    e.preventDefault();


    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF("p", "mm", "a4");

    const pageWidth = pdf.internal.pageSize.getWidth();
    let y = 25;

// Green Circle (smaller radius)
pdf.setDrawColor(34, 197, 94);
pdf.setLineWidth(2);
pdf.circle(pageWidth / 2, y, 10, "S"); // radius reduced from 15 → 10

// Check mark (scaled down)
pdf.setLineWidth(2); // thinner line since it's smaller
let centerX = pageWidth / 2;
let centerY = y;
pdf.line(centerX - 4, centerY, centerX - 1.5, centerY + 4); // shorter stroke
pdf.line(centerX - 1.5, centerY + 4, centerX + 5, centerY - 4);


    y += 30;

    // Title
    pdf.setFontSize(18).setFont("helvetica", "bold").setTextColor(33, 33, 33);
    pdf.text("Payment Successful", pageWidth / 2, y, { align: "center" });

    y += 10;

    pdf.setFontSize(12).setFont("helvetica", "normal").setTextColor(100);
    pdf.text("Thank you for your payment. Your order is being processed.", pageWidth / 2, y, { align: "center" });

    y += 20;

    // ✅ Details Section
    pdf.setFontSize(13).setTextColor(20);

    let details = [
      ["Order Id:", document.getElementById("orderId").innerText],
      ["Amount Paid:", document.getElementById("paidAmount").innerText],
      ["Payment Id:", document.getElementById("paymentId").innerText],
      ["Order Date:", formattedDate], // ✅ formatted with AM/PM
    ];

    details.forEach(([label, value]) => {
      pdf.setFont("helvetica", "bold");
      pdf.text(label, 30, y);
      pdf.setFont("helvetica", "normal");
      pdf.text(value, pageWidth - 30, y, { align: "right" });
      y += 12;
    });

    y += 25;

    // Footer
    pdf.setFontSize(11).setTextColor(120);
    pdf.text("This is a system generated receipt.", pageWidth / 2, y, { align: "center" });

    // ✅ Save with Order ID
    const orderId = document.getElementById("orderId").innerText || "receipt";
    pdf.save(orderId + ".pdf");

    spinner.style.display = "none";
    downloadBtn.style.pointerEvents = "auto";
    closeBtn.style.display = "block";
    downloadBtn.style.display = "inline-flex";
  });
});

</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/whatsapp_store_template.js') }}?v={{ time() }}"></script>
<script>
var finalizedOrderData = null;
var pId = null;


function getdomain() {
    let hostname = window.location.hostname;

    // Remove "www." if it exists at the beginning
    if (hostname.startsWith('www.')) {
        hostname = hostname.slice(4);
    }

    return hostname;
}

    $(document).ready(function() {
        // ----------------------------------------------------------------
        // 1. EXTRACT DATA (Handle POST, Session, or URL "tr_id")
        // ----------------------------------------------------------------
        var paymentPayload = {!! json_encode($paymentData ?? []) !!};
        var code = paymentPayload.code || '';
        
        // Check for Transaction ID in this order: 
        // 1. Payload (POST) -> 2. Payload Data (Nested) -> 3. URL Parameter (The Fix)
        var transactionId = paymentPayload.merchantTransactionId || 
                            (paymentPayload.data ? paymentPayload.data.merchantTransactionId : '') || 
                            new URLSearchParams(window.location.search).get('tr_id') || 
                            '';



                            
        // Get Cart Data from LocalStorage (Same as your Razorpay logic)
        var storeAlias = localStorage.getItem('active_store_alias') || $("#storeAlias").val(); 
        var products = localStorage.getItem('cart_products'); // Assuming you saved this before redirect
        

        
        
        // If 'cart_products' is missing, try to fallback to 'cart' object logic if needed
        // For now, we assume you saved 'cart_products' string in localStorage before redirecting.

        // ----------------------------------------------------------------
        // 2. DECIDE ACTION
        // ----------------------------------------------------------------
        if (transactionId) {
            // We verify even if code is PENDING, because the Redirect URL might not have the status yet
            verifyAndPlaceOrder(transactionId, storeAlias, products);
        } 
        else if (code === 'PAYMENT_ERROR') {
            showFailed('Payment Failed', 'The bank declined the transaction.');
        } 
        else {
            showFailed('Status Unknown', 'Could not verify payment status. ID missing.');
        }


        var savedFormData = JSON.parse(localStorage.getItem('orderFormData') || '{}');
         var storeInfo = JSON.parse(localStorage.getItem('storeInfo') || '{}');
        


        var baseUrl = savedFormData.baseUrl;
        var alias = savedFormData.url_alias;
        baseUrl = baseUrl.replace(/\/$/, ""); 

         var backUrl;

        if (getdomain() != "staging.vcardking.com") {
            storeAlias = `https://${getdomain()}`;
                backUrl = `https://${getdomain()}`;
        }else{
         backUrl = baseUrl + "/store/" + alias;
        }        
                    
                        // Construct the full URL: Base + /store/ + Alias 
          $('#retryBtns').attr('href', backUrl);
        if(storeAlias){
            $('#backBtn').attr('href', '/s/' + storeAlias);
            $('#retryBtn').attr('href', '/s/' + storeAlias);
        }
        
        $('#sendMesgNew').on('click', function(e) {
            e.preventDefault();


            // Check if we have the data
            if (finalizedOrderData) {
                // Call your function and pass the data
                prepareAndSendWpMessageForPhonepe(finalizedOrderData, pId, storeInfo);
            } else {
                console.error("Order data is not ready yet.");
            }
        });        
        
    });

    // ----------------------------------------------------------------
    // 3. STEP 1: VERIFY PAYMENT STATUS (Server-to-Server)
    // ----------------------------------------------------------------
    function verifyAndPlaceOrder(trxId, alias, productsJson) {
        $('#loadingState p').text('Step 1/2: Verifying with Bank...');

        $.ajax({
            url: '/whatsapp-store/verify-phonepe-payment', // 🔥 New Endpoint (See PHP below)
            type: 'POST',
            data: {
                transaction_id: trxId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success && response.status === 'PAYMENT_SUCCESS') {
                    
                    // Payment is REAL. Now save the order.
                    finalizePhonePeOrder(trxId, alias, productsJson, response.amount);

                } else if (response.status === 'PAYMENT_PENDING') {
                    showFailed('Payment Pending', 'Your payment is still processing. Please check back later.');
                } else {
                    showFailed('Payment Failed', 'Bank status: ' + response.status);
                }
            },
            error: function(xhr) {
                console.error(xhr);
                showFailed('Verification Error', 'Could not check payment status. Please contact support.');
            }
        });
    }

    // ----------------------------------------------------------------
    // 4. STEP 2: FINALIZE ORDER (Save to Database)
    // ----------------------------------------------------------------
    function finalizePhonePeOrder(trxId, alias, productsJson, amount) {
        $('#loadingState p').text('Step 2/2: Saving your Order...');

        // Parse products to calculate total if needed, or use the verified amount
        // You usually need to send the full form data. 
        // Since we are on a new page, we construct a minimal valid order object.
        
        // Note: For best results, you should have saved the 'orderFormData' in localStorage 
        // before redirecting, just like you saved 'cart'.
        var savedFormData = JSON.parse(localStorage.getItem('orderFormData') || '{}');
        


var baseUrl = savedFormData.baseUrl;
var alias = savedFormData.url_alias;
      
        

        var finalOrderData = {
            ...savedFormData, // Spread the saved form inputs (name, address, etc.)
            razorpay_payment_id: trxId,
            razorpay_order_id: trxId,
            products: productsJson, // Send the products JSON string
            razorpay_signature: 'phonepe-payment',
            _token: '{{ csrf_token() }}',
        };

        $.ajax({
            url: '/whatsapp-store/finalize-order', // Reusing your existing endpoint
            type: 'POST',
            data: finalOrderData,
            success: function(response) {
                if (response.success) {
                    // SUCCESS!
                    $('#loadingState').hide();
                    $('#successState').show();
                    $('#orderIdDisplay').text(response.data.order_id);
                    
                        finalizedOrderData =   response.data;                  
                        pId =         trxId;    
                        baseUrl = baseUrl.replace(/\/$/, ""); 
                    
                        // Construct the full URL: Base + /store/ + Alias

                        var backUrl;

                        if (getdomain() != "staging.vcardking.com") {
                                backUrl = `https://${getdomain()}`;
                        }else{
                         backUrl = baseUrl + "/store/" + alias;
                        }
                      
                    
                        // 3. Update the button
                        $('#backBtnNew').attr('href', backUrl);
                        

                        document.getElementById("orderId").innerText = response.data.order_id;
                        document.getElementById("paidAmount").innerText = savedFormData.grand_total + "/-";

                        document.getElementById("paymentId").innerText = trxId;


                        document.getElementById("paymentDate").innerText = new Date().toLocaleString();

                        // Show modal safely
                        const modal = document.getElementById("paymentModal");
                        
                        const paymentstate = document.getElementById("paymentstate");



                      const closeBtn = document.getElementById("closeModal");  
                       // Close icon click → hide modal
                      closeBtn.addEventListener("click", function () {
                        window.location.href = backUrl;
                      });


                        if (modal) {
                           
                           modal.style.display = "flex";  // for custom modal
                           paymentstate.style.display = "none";  // for custom modal
                      
                           
                            
                        } else {
                         
                        }                    

                    // Clear Cart
                    localStorage.removeItem('cart');
                    localStorage.removeItem('cart_products');
                    localStorage.removeItem('orderFormData');
                } else {
                    showFailed('Order Save Failed', response.message || 'Payment success, but order save failed.');
                }
            },
            error: function(xhr) {
                console.error(xhr);
                showFailed('System Error', 'Payment was successful, but we could not save the order.');
            }
        });
    }

    function showFailed(title, message) {
        $('#loadingState').hide();
        $('#failedState').show();
        $('#failedState h3').text(title);
        $('#failReason').text(message);
    }
</script>
</body>
</html>