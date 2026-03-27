<div class="modal fade" id="delcaperModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="z-index: 1050;"> 
        <div class="modal-content">
            <div class="modal-header bg-light" style="padding: 14px !important;">
                <h3 class="modal-title">Assign Order To Courier Partner</h3>
                <button type="button" class="btn-close" style="margin-right:10px" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form id="delcaperForm">
                    @csrf
                    <input type="hidden" id="modal_order_id" name="order_id">

                    <h3 class="text-primary mb-3">1. Pickup Location</h3>
                    <div class="form-group" style="margin-bottom: 14px">
                        <select class="form-control" name="pickup_location_id">
                            <option value="1">MAHENDRA (Lajamni Chowk)</option>
                            <option value="2">RAJ (Sai Krupa Society)</option>
                        </select>
                    </div>

                    <hr>

                    <h3 class="text-primary mb-3">2. Shipping Information</h3>
                    <div class="row">
                        <div class="col-md-6 form-group" style="margin-bottom: 14px">
                            <label>Full Name</label>
                            <input type="text" class="form-control" id="ship_name" name="shipping_name">
                        </div>
                        <div class="col-md-6 form-group" style="margin-bottom: 14px">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" id="ship_phone" name="shipping_phone">
                        </div>
                        <div class="col-md-6 form-group" style="margin-bottom: 14px">
                            <label>Email</label>
                            <input type="email" class="form-control" id="ship_email" name="shipping_email">
                        </div>

                        <div class="col-md-6 form-group" style="margin-bottom: 14px">
                            <label>Zip Code</label>
                            <input type="text" class="form-control addr-input" id="ship_zip" name="shipping_zip">
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 14px">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control addr-input" id="ship_address1" name="shipping_address1">
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 14px">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control addr-input" id="ship_address2" name="shipping_address2">
                        </div>
                        <div class="col-md-4 form-group" style="margin-bottom: 14px">
                            <label>City</label>
                            <input type="text" class="form-control addr-input" id="ship_city" name="shipping_city">
                        </div>
                        <div class="col-md-4 form-group" style="margin-bottom: 14px">
                            <label>State</label>
                            <input type="text" class="form-control addr-input" id="ship_state" name="shipping_state">
                        </div>
                        <div class="col-md-4 form-group" style="margin-bottom: 14px">
                            <label>Country</label>
                            <input type="text" class="form-control addr-input" id="ship_country" name="shipping_country" value="India">
                        </div>

                        <div class="col-md-6 form-group" style="margin-bottom: 14px">
                            <label>Latitude</label>
                            <input type="text" class="form-control" id="ship_lat" name="shipping_latitude" placeholder="0.0000">
                        </div>
                        
                        <div class="col-md-6 form-group" style="margin-bottom: 14px">
                            <label>Longitude</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="ship_lng" name="shipping_longitude" placeholder="0.0000">
                                <div class="input-group-append" style="margin-left: 10px">
                                    <button class="btn btn-secondary" type="button" id="btn-refetch" onclick="fetchCoordinates()" title="Refresh Coordinates">
                                        <svg id="refetch-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h3 class="text-primary mb-3">3. Package Details</h3>
                    <div class="row">
                        <div class="col-6 col-md-3 form-group">
                            <label>Length (cm)</label>
                            <input type="number" class="form-control" name="length" value="10">
                        </div>
                        <div class="col-6 col-md-3 form-group">
                            <label>Width (cm)</label>
                            <input type="number" class="form-control" name="width" value="10">
                        </div>
                        <div class="col-6 col-md-3 form-group">
                            <label>Height (cm)</label>
                            <input type="number" class="form-control" name="height" value="10">
                        </div>
                        <div class="col-6 col-md-3 form-group">
                            <label>Weight (gm)</label>
                            <input type="number" class="form-control" name="weight" value="500">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="pushOrderApi()">Confirm & Push</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="orderStatusModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">
      
      <!-- Header -->
      <div class="modal-header bg-dark text-white rounded-top-4">
        <h5 class="modal-title fw-bold">
          🧾 Order Status Details
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body p-4">
        
        <!-- Order Summary -->
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3">
              <div class="card-body">
                <h6 class="text-muted">Order ID</h6>
                <h5 id="originalOrderId" class="fw-bold"></h5>
                
                <h6 class="text-muted mt-3">Amount</h6>
                <h5 class="fw-bold text-success">₹ <span id="amount"></span></h5>
                
                <h6 class="text-muted mt-3">Payment</h6>
                <span id="paymentType" class="badge bg-primary"></span>
                <span id="paymentStatus" class="badge bg-success"></span>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3">
              <div class="card-body">
                <h6 class="text-muted">Current Order Status</h6>
                <h4>
                  <span id="orderStatusBadge" class="badge fs-6"></span>
                </h4>

                <h6 class="text-muted mt-3">Type</h6>
                <span id="orderType" class="badge bg-info text-dark"></span>

                <h6 class="text-muted mt-3">Weight</h6>
                <span id="weight" class="fw-bold"></span> gm
              </div>
            </div>
          </div>
        </div>

        <!-- Timeline -->
        <h5 class="fw-bold mb-3">📍 Order Timeline</h5>
        <div class="timeline" id="timelineContainer"></div>

      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <button class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
          Close
        </button>
      </div>

    </div>
  </div>
</div>



<style>
    .svg-spin { animation: spin 1s linear infinite; }
    @keyframes spin { 100% { transform: rotate(360deg); } }

    /* Timeline Styling */
.timeline {
  position: relative;
  padding-left: 30px;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 12px;
  top: 0;
  width: 3px;
  height: 100%;
  background: #dee2e6;
}

.timeline-item {
  position: relative;
  margin-bottom: 25px;
}

.timeline-item::before {
  content: '';
  position: absolute;
  left: -18px;
  top: 5px;
  width: 14px;
  height: 14px;
  border-radius: 50%;
  background: #0d6efd;
}

.timeline-date {
  font-size: 12px;
  color: #6c757d;
}

.timeline-state {
  font-weight: 600;
  font-size: 16px;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Moment (required for daterangepicker) -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

<!-- DateRangePicker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    function openTrackModal(id) {
        let url = route("whatsapp.stores.track.shipping", id);
        fetch(url)
            .then(response => response.json())
            .then(data => {
                data = data.data;
                 // Basic Info
                document.getElementById("originalOrderId").textContent = data.originalOrderId;
                document.getElementById("amount").textContent = data.amount;
                document.getElementById("paymentType").textContent = data.paymentType;
                document.getElementById("paymentStatus").textContent = data.paymentStatus;
                document.getElementById("orderType").textContent = data.type;
                document.getElementById("weight").textContent = data.weight;

                // Status Badge Color Logic
                const statusBadge = document.getElementById("orderStatusBadge");
                statusBadge.textContent = data.orderStatus;

                if (data.orderStatus.includes("CANCELLED")) {
                    statusBadge.className = "badge bg-danger fs-6";
                } else if (data.orderStatus.includes("DELIVERED")) {
                    statusBadge.className = "badge bg-success fs-6";
                } else {
                    statusBadge.className = "badge bg-warning text-dark fs-6";
                }

                // Timeline
                const timeline = document.getElementById("timelineContainer");
                timeline.innerHTML = "";

                data.orderStateInfo.forEach(item => {
                    const date = new Date(item.createdAt).toLocaleString();

                    timeline.innerHTML += `
                        <div class="timeline-item">
                            <div class="timeline-state">${item.state}</div>
                            <div class="timeline-date">${date}</div>
                        </div>
                    `;
                });

                $("#orderStatusModal").modal("show");
                
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
<script>
    // --- NEW: Auto-Fetch Logic (Debounce) ---
    var searchTimer;
    var orderId;
    
    $(document).ready(function() {
        // Listen to any input with class 'addr-input'
        $('.addr-input').on('input', function() {
            clearTimeout(searchTimer); // Stop previous timer
            
            // Show user we are waiting
            $('#ship_lat').attr('placeholder', 'Typing...');
            $('#ship_lng').attr('placeholder', 'Typing...');

            // Start new timer (1 second delay)
            searchTimer = setTimeout(function() {
                fetchCoordinates();
            }, 1000);
        });
    });

    // 1. Function to Fill Data & Auto-Trigger
    function fillDelcaperData(element) {
        $("#delcaperModal").modal("show"); // Clear previous data
        var btn = $(element); 
        var rawPhone = String(btn.data('phone'));
        var cleanPhone = rawPhone.replace('+91', '').trim(); 

        $('#modal_order_id').val(btn.data('id'));
        $('#ship_name').val(btn.data('name'));
        $('#ship_phone').val(cleanPhone);
        $('#ship_email').val(btn.data('email'));
        $('#ship_address1').val(btn.data('address1'));
        $('#ship_zip').val(btn.data('zip'));
        $('#ship_city').val(btn.data('city'));
        $('#ship_state').val('Gujarat');
        
        
        // --- NEW CODE: Calculate Weight in Script ---
        var orderDetails = btn.data('order-details');
        var totalWeight = Number(btn.data('order-details'));

        // If total calculated is 0, keep the default 500, otherwise update input
        if (totalWeight > 0) {
            $('input[name="weight"]').val(totalWeight);
        } else {
            $('input[name="weight"]').val(500); // Fallback default
        }        
        
        // Clear fields visually so user knows they are updating
        $('#ship_lat').val('');
        $('#ship_lng').val('');

        // Trigger Auto-Search immediately on open (no delay needed here)
        fetchCoordinates();
    }

    // 2. Fetch Coordinates
    function fetchCoordinates() {
        var addr1 = $('#ship_address1').val();
        var addr2 = $('#ship_address2').val() || ''; 
        var city = $('#ship_city').val();
        var zip = $('#ship_zip').val();
        var state = $('#ship_state').val() || '';
        var country = $('#ship_country').val() || 'India';

        // Prevent useless API calls if critical info is missing
        if(!addr1 || !city) {
            console.log("Skipping fetch: Address/City missing");
            return;
        }

        var fullQuery = addr1 + " " + addr2 + ", " + city + " " + state + " " + zip + " " + country;
        
        // --- ANIMATION START ---
        var btn = $('#btn-refetch');
        var icon = $('#refetch-icon'); 
        
        btn.prop('disabled', true);
        icon.addClass('svg-spin');
        // -----------------------

        $('#ship_lat').attr('placeholder', 'Searching...');
        $('#ship_lng').attr('placeholder', 'Searching...');

        $.ajax({
            url: "https://nominatim.openstreetmap.org/search",
            type: "GET",
            headers: { "accept-language": "en-US" },
            data: { q: fullQuery, format: "json", limit: 1, addressdetails: 1 },
            success: function(data) {
                if(data.length > 0) {
                    $('#ship_lat').val(data[0].lat);
                    $('#ship_lng').val(data[0].lon);
                } else {
                    // Try fallback (City + Zip only) if exact address fails
                    fetchCityFallback(city, zip);
                }
            },
            error: function() {
                fetchCityFallback(city, zip);
            },
            complete: function() {
                // --- ANIMATION STOP ---
                btn.prop('disabled', false);
                icon.removeClass('svg-spin');
                
                $('#ship_lat').attr('placeholder', '');
                $('#ship_lng').attr('placeholder', '');
            }
        });
    }

    // Fallback Logic
    function fetchCityFallback(city, zip) {
        var shortQuery = city + " " + zip;
        $.ajax({
            url: "https://nominatim.openstreetmap.org/search",
            type: "GET",
            data: { q: shortQuery, format: "json", limit: 1 },
            success: function(data) {
                if(data.length > 0) {
                    $('#ship_lat').val(data[0].lat);
                    $('#ship_lng').val(data[0].lon);
                } else {
                    $('#ship_lat').val('0');
                    $('#ship_lng').val('0');
                }
            },
            error: function() {
                 $('#ship_lat').val('0');
                 $('#ship_lng').val('0');
            }
        });
    }

    //3. Push Order API
    function pushOrderApi() {
        var form = $('#delcaperForm');
        
        if(!$('#ship_name').val()) { alert('Name is required'); return; }

        let url = route("whatsapp.stores.update.shipping", $('#modal_order_id').val());

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            beforeSend: function() {
                $('.modal-footer .btn-success').text('Processing...').prop('disabled', true);
            },
            success: function(response) {
                if(response.success) {
                    if(typeof toastMagic !== 'undefined') { 
                        toastMagic.success("Order Assigned successfully"); 
                        
                    }
                   
                   setTimeout(function() {
                        location.reload();
                    }, 1500);
                   
                } else {
                    // Clean Error Message Logic
                    var finalMsg = response.message; 
                    if (response.message.includes('API Failed:')) {
                        try {
                            var jsonPart = response.message.replace('API Failed: ', '');
                            var errorObj = JSON.parse(jsonPart);
                            if (errorObj && errorObj.message) {
                                finalMsg = errorObj.message;
                            }
                        } catch (e) { console.log("JSON Parse Error"); }
                    }

                    if(typeof toastMagic !== 'undefined') { toastMagic.error(finalMsg); }
                    
                }
            },
            error: function(xhr) {
                if(typeof toastMagic !== 'undefined') { toastMagic.error('Something went wrong. Check console.'); }
            
            },
            complete: function() {
                $('.modal-footer .btn-success').text('Confirm & Push').prop('disabled', false);
            }
        });
    }

    
</script>