
<input type="hidden" id="newWhatsappStoreId" value="{{$whatsappStore->id}}">
<style>
  .table-container {
    background: white;
    border-radius: 10px;
  }
  .table-container table th {
    background-color: #f8f9fa;
    font-weight: 400;
    text-transform: uppercase;
    white-space: nowrap;
    border-bottom-color: #e9ecef;
    padding: .75rem .25rem .75rem 1.875rem !important;
  }
  .table-container table td {
    vertical-align: middle;
  }
  /* Shimmer effect */
  .table-container .shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e4e4e4 37%, #f0f0f0 63%);
    background-size: 400% 100%;
    animation: shimmer 1.4s ease infinite;
    height: 20px;
    border-radius: 4px;
  }
  @keyframes shimmer {
    0% { background-position: -400px 0; }
    100% { background-position: 400px 0; }
  }
   .dropdown-icon{
    position: absolute;
    right: 12px;
    top: 12px;
  }
</style>


<div class="">
  <div class="d-flex justify-content-between align-items-center mb-3">
  <input type="text" id="search" class="form-control w-25" placeholder="🔍 Search">
  <div style="width: 50%;text-align: end" class="d-flex justify-content-end">
    <div style="position: relative;margin-right: 10px;">
         <span class="dropdown-icon">
           <i class="fa fa-chevron-down"></i>  
         </span> 
      <select class="form-control" style="width: 200px;display: inline-block;" id="filterSearch">
                <option value="">All</option>
                <option value="0">Pending</option>
                <option value="4">Confirmed</option>
                <option value="1">Dispatched</option>
                <option value="2">Delivered</option>
                <option value="3">Cancelled</option>
              </select>
</div>
              <button class="btn btn-danger" onclick="resetSearch()">Reset</button>
  </div>
</div>



<div class="table-container">
  <table class="table table-hover align-middle">
    <thead>
      <tr>
        <th>ORDER ID</th>
        <th>NAME</th>
        <th>PHONE</th>
        <th>STATUS</th>
        <th>PAYMENT STATUS</th>
        <th>CREATED AT</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody id="table-body"></tbody>
  </table>
  <nav class="d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <label class="me-3 text-gray-600 fs-4 fs-xl-6">Show</label>
        <div style="position: relative;margin-right: 10px;">
             <span class="dropdown-icon">
               <i class="fa fa-chevron-down"></i>  
             </span> 
        <select id="records-per-page" class="form-control w-auto" style="    width: 71px !important;">
          <option value="10">10</option>
          <option value="15" selected>15</option>
          <option value="25">25</option>
          <option value="50">50</option>
        </select>
        </div>
        <div id="table-info" class="fs-4 fs-xl-6 ms-lg-3 text-gray-600"></div>
      </div>  
    <ul class="pagination justify-content-end mb-0 align-items-center" id="pagination"></ul>
  </nav>
</div>
</div>

@include('whatsapp_stores.product_orders.view_order')
@if($whatsappStore->id == 1488)
  @include('whatsapp_stores.product_orders.custom_shimpemnt')
@endif  

 

<script>
let currentPage = 1;
let limit = 15; // default
let searchTerm = "";
let totalRecords = 0;
let orderStatus = "";

let wpStoreId = $("#newWhatsappStoreId").val();

document.getElementById("records-per-page").addEventListener("change", e => {
  limit = parseInt(e.target.value);
  loadPage(1);
});

async function fetchData(page) {
  try {
    const response = await fetch(`/admin/api-orders?wp_store_id=${wpStoreId}&page=${page}&per_page=${limit}&search=${encodeURIComponent(searchTerm)}&status=${encodeURIComponent(orderStatus)}`);
    const json = await response.json();
    totalRecords = json.total;
    renderTable(json.data);
    renderPagination(json.total, page);
    updateTableInfo();
  } catch (err) {
    console.error("Error fetching data", err);
  }
}

function updateTableInfo() {
  const start = (currentPage - 1) * limit + 1;
  const end = Math.min(currentPage * limit, totalRecords);
  document.getElementById("table-info").innerHTML =
    `Showing <b>${start}</b> to <b>${end}</b> of <b>${totalRecords}</b> results`;
}

function renderTable(data) {
  
  const tbody = document.getElementById("table-body");
  tbody.innerHTML = "";
  data.forEach(item => {
      let urlDownload = route("whatsapp.orders.invoice.download", item.id);
      let urlShippingLabel = route("whatsapp.orders.shipping.label", item.id);
      
    tbody.innerHTML += `
      <tr>
        <td>${item.order_id}</td>
        <td>${item.name}</td>
        <td>${item.phone}</td>
        <td>
          ${item.status == 2 ? `<span class="text-success">Delivered</span>` : ``}
          ${item.status == 3 ? `<span class="text-danger">Cancelled</span>` : ``}
          ${item.status != 3 && item.status != 2  ? `
          <div style="position: relative;margin-right: 10px;">
             <span class="dropdown-icon">
               <i class="fa fa-chevron-down"></i>  
             </span> 
             <select class="form-control product-order-status-new" data-id="${item.id}">
                <option value="0" ${item.status === 0 ? "selected" : ""}>Pending</option>
                <option value="4" ${item.status === 4 ? "selected" : ""}>Confirmed</option>
                <option value="1" ${item.status === 1 ? "selected" : ""}>Dispatched</option>
                <option value="2" ${item.status === 2 ? "selected" : ""}>Delivered</option>
                <option value="3" ${item.status === 3 ? "selected" : ""}>Cancelled</option>
              </select>
              </div>
          ` : ``}
        </td>
        <td>
          ${item.payment_status === "PAID" ? `<span class="text-success">Paid ${
          item.razorpay_payment_id ? "(Online)" : ""
        } </span>` : `
          <div style="position: relative;margin-right: 10px;">
             <span class="dropdown-icon">
               <i class="fa fa-chevron-down"></i>  
             </span> 
            <select class="form-control product-order-payment-status-new" data-id="${item.id}">
            <option value="PAID" ${item.payment_status === "PAID" ? "selected" : ""}>Paid</option>
            <option value="UNPAID" ${item.payment_status === "UNPAID" ? "selected" : ""}>Unpaid</option>
          </select> 
          </div>
          `}
          
        </td>
        <td>${new Date(item.created_at).toLocaleDateString()}</td>
        <td>
        <div class="justify-content-center d-flex">
            <a class="btn px-1 text-info wp-product-order-view-btn-new fs-3" type="button" data-id="${item.id}">
                <i class="fa-solid fa-eye"></i>
            </a>
            <button class="wp-product-order-view-btn" style="display:none;"></button>
            <a href="${urlDownload}" title="Print Invoice" class="btn px-1 text-info wp-product-order-print-btn fs-3" type="button" data-id="${item.id}">
                <i class="fa-solid fa-print"></i>
            </a>
            ${item.wp_store_id == 1488 ? `<a href="${urlShippingLabel}" title="Print Shipping Label" class="btn px-1 text-info wp-product-order-print-btn fs-3" type="button" data-id="${item.id}">
                <i class="fa-solid fa-tags"></i>
            </a>
            ${item.shipping_tracking_id ? `
            <a class="btn px-1 text-info fs-3" type="button" onclick="openTrackModal(${item.shipping_tracking_id})">
                <i class="fa-solid fa-truck-fast"></i>            
            </a>
            ` : ``}
            
            ` : ``}
            
        </div>
        </td>
      </tr>
    `;
  });

  tbody.querySelectorAll("select").forEach(select => {
    select.addEventListener("change", e => {
      const id = e.target.dataset.id;
      const field = e.target.dataset.field;
      const value = e.target.value;
      updateOrder(id, { [field]: value });
    });
  });
}

function renderPagination(total, current) {
  const totalPages = Math.ceil(total / limit);
  const pagination = document.getElementById("pagination");
  pagination.innerHTML = "";

  const createPageItem = (label, page, disabled = false, active = false) => {
    const li = document.createElement("li");
    li.className = `page-item ${disabled ? "disabled" : ""} ${active ? "active" : ""}`;
    li.innerHTML = `<a class="page-link" href="#">${label}</a>`;
    li.addEventListener("click", e => {
      e.preventDefault();
      if (!disabled && page !== currentPage) loadPage(page);
    });
    return li;
  };

  pagination.appendChild(createPageItem("«", current - 1, current === 1));
  for (let i = 1; i <= totalPages; i++) {
    if (i <= 3 || i > totalPages - 3 || (i >= current - 1 && i <= current + 1)) {
      pagination.appendChild(createPageItem(i, i, false, i === current));
    } else if (i === 4 && current > 4) {
      pagination.appendChild(createPageItem("...", current, true));
    }
  }
  pagination.appendChild(createPageItem("»", current + 1, current === totalPages));
}

function loadPage(page) {
  currentPage = page;
  fetchData(page);
}

listenChange(".product-order-payment-status-new", function () {
    let orderId = $(this).data("id");
    let status = $(this).val();
    if (status == 0) return;
    console.log("changes");
    let url = route("wp.stores.update.order.paymentstatus", orderId);
    $.ajax({
        url: url,
        type: "POST",
        data: { status: status },
        success: function (response) {
            loadPage(currentPage);
            displaySuccessMessage(response.message);
        },
        error: function (response) {
            displayErrorMessage(response.responseJSON.message);
        },
    });
});

listenChange(".product-order-status-new", function () {
    let orderId = $(this).data("id");
    let status = $(this).val();
    if (status == 0) return;
    console.log("changes");
    let url = route("wp.stores.update.order.status", orderId);
    $.ajax({
        url: url,
        type: "POST",
        data: { status: status },
        success: function (response) {
            loadPage(currentPage);
            prepareAndSendWpMessageNew(response.data[0], response.data[1]);
            displaySuccessMessage(response.message);
        },
        error: function (response) {
            displayErrorMessage(response.responseJSON.message);
        },
    });
});

function prepareAndSendWpMessageNew(order, base_url) {
    let baseUrl = base_url;
    let storeAlias = order.wp_store.url_alias;
    let regionCode = order.region_code;
    let whatsappNumber = order.phone;
    let message = "";

    if (order.wp_store_id == 530){
            return;
    }  

    if (order.status == 1) {
        message = 'Order Dispatched' + `:\n\n`;
    } else if (order.status == 2) {
        message = 'Order Delivered' + `:\n\n`;
    } else if (order.status == 3) {
        message = 'Order Canceled' + `:\n\n`;
    } else {
        return;
    }

    message = 'Customer Details' + `:\n`;
    message += `------------------------------\n`;
    message += 'Name' + `: ${order.name}\n`;
    message +=
        'Phone' + `: +${order.region_code} ${order.phone}\n`;
    message += 'Address' + `: ${order.address}\n\n`;
    message += 'Order Id' + `: ${order.order_id}\n`;
    message += `------------------------------\n`;
    message += 'Product Details' + `:\n`;
    message += `------------------------------\n`;

    order.products.forEach((product, index) => {
        let productUrl = `${baseUrl}/whatsapp-store/${storeAlias}/${product.product_id}/product-details`;

        message += `${index + 1}.\n`;
        message +=
            'Product Name' +
            `: ${product.product ? product.product.name : "Unknown"}\n`;
        message += 'Product URL' + ` : ${productUrl}\n`;
        message +=
            'Price' +
            ` : ${product.product.currency.currency_icon} ${product.price}\n`;
        message += 'Quantity' + ` : ${product.qty}\n`;
        message +=
            'Total Price' +
            ` : ${product.product.currency.currency_icon} ${product.total_price}\n`;
        message += `------------------------------\n`;
    });

    message += `\n${'Grand Total'}: ${order.grand_total}\n`;

    let encodedMessage = encodeURIComponent(message);
    let recipientPhone = `+${regionCode}${whatsappNumber}`;

    let whatsappUrl = `https://wa.me/${recipientPhone}?text=${encodedMessage}`;

    window.open(whatsappUrl);
}

let searchTimeout;

document.getElementById("search").addEventListener("input", e => {
  clearTimeout(searchTimeout); // Clear previous timer
  searchTerm = e.target.value.trim();

  searchTimeout = setTimeout(() => {
    loadPage(1);
  }, 800); // Wait 800ms after last input
});

document.getElementById("filterSearch").addEventListener("change", e => {
  orderStatus = e.target.value.trim();
  loadPage(1);
});

function resetSearch(){
    orderStatus = '';
    searchTerm = '';
    loadPage(1);
    document.getElementById("filterSearch").value = "";
    document.getElementById("search").value = "";
}

loadPage(currentPage);
</script>
