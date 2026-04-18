@php
    // Decode settings to populate values
    $settings = json_decode($whatsappStore->theme_settings, true) ?? [];
@endphp

<form action="{{ route('admin.store.theme.update', $whatsappStore->id) }}" method="POST">
 @csrf
    <div class="col-lg-6 mb-4">

        
            {{-- Full Screen Toggle --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-check-label mb-0">Full Screen Mode</label>
                <div class="form-check form-switch m-0">
                    {{-- Added name="is_full_screen" --}}
                    <input class="form-check-input" type="checkbox" name="is_full_screen" 
                           {{ $whatsappStore->is_full_screen == 1 ? 'checked' : '' }}>
                </div>
            </div>

            {{-- Auto Slide Toggle --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-check-label mb-0">Auto Slide Banner</label>
                <div class="form-check form-switch m-0">
                    {{-- Added name="is_auto_scroll" --}}
                    <input class="form-check-input" type="checkbox" name="is_auto_scroll" 
                           {{ $whatsappStore->is_auto_scroll == "true" ? 'checked' : '' }}>
                </div>
            </div>    
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-check-label mb-0" for="isAutoScrollBannerSwitch">
                   Show 2 Product in one Row
                </label>
            
                <div class="form-check form-switch m-0">
                    <input class="form-check-input" type="checkbox" name="product_gride" id="product_gride"
                           value="1"
                           {{ $whatsappStore->product_gride == "1" ? 'checked' : '' }}>
                </div>
            </div>
            
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-check-label mb-0" for="isAutoScrollBannerSwitch">
                    Show Full Image
                </label>
            
                <div class="form-check form-switch m-0">
                    <input class="form-check-input" type="checkbox" name="image_show" id="image_show"
                           value="1"
                           {{ $whatsappStore->image_show == "1" ? 'checked' : '' }}>
                </div>
            </div>            
            
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-check-label mb-0">Whatsapp button show user form</label>
                <div class="form-check form-switch m-0">
                    <input class="form-check-input" type="checkbox" name="wp_show_order_form" 
                           {{ isset($settings['wp_show_order_form']) && $settings['wp_show_order_form'] == "on" ? 'checked' : '' }}>
                </div>
            </div>
            
            <fieldset class="mt-4">
                <legend style="font-size: 16px;font-weight: 600;">Mobile Based Discounts:</legend>
                <a class="btn btn-primary mb-3" onclick="addRow()">Add</a>

                <input type="hidden" name="mobile_discount_settings" id="dataInput" value="{{ $whatsappStore->mobile_discount_settings }}">

                <div id="rowsContainer"></div>
            </fieldset>

            <script>

                document.addEventListener("DOMContentLoaded", function () {
                    const input = document.getElementById('dataInput');

                    if (input.value) {
                        try {
                            // Convert HTML entities to normal JSON string
                            const decoded = input.value.replace(/&quot;/g, '"');

                            const data = JSON.parse(decoded);

                            if (Array.isArray(data)) {
                                data.forEach(item => addRow(item));
                            }
                        } catch (e) {
                            console.error('Invalid JSON in hidden input', e);
                        }
                    }
                });
                let records = [];

                function syncHidden() {
                    // remove blank rows before saving
                    const filtered = records.filter(r => r.mobile && r.discount);
                    document.getElementById('dataInput').value = JSON.stringify(filtered);
                }

                function addRow(data = {}) {
                    const index = records.length;

                    records.push({
                        mobile: data.mobile || '',
                        discount: data.discount || ''
                    });

                    const row = document.createElement('div');
                    row.className = "row mb-2 align-items-center";
                    row.setAttribute("data-index", index);

                    row.innerHTML = `
                        <div class="col-md-5">
                            <input type="text" class="form-control mobile" placeholder="Mobile Number" value="${data.mobile || ''}" oninput="updateRow(this)">
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control discount" placeholder="Discount %" value="${data.discount || ''}" oninput="updateRow(this)">
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-danger w-100" onclick="deleteRow(this)"><i class="fas fa-trash"></i></a>
                        </div>
                    `;

                    document.getElementById('rowsContainer').appendChild(row);
                }

                function updateRow(input) {
                    const row = input.closest('.row');
                    const index = row.getAttribute('data-index');

                    const mobile = row.querySelector('.mobile').value.trim();
                    const discount = row.querySelector('.discount').value.trim();

                    records[index] = { mobile, discount };

                    syncHidden();
                }

                function deleteRow(btn) {
                    const row = btn.closest('.row');
                    const index = row.getAttribute('data-index');

                    records[index] = null; // mark deleted
                    row.remove();

                    refreshIndexes();
                    syncHidden();
                }

                function refreshIndexes() {
                    const rows = document.querySelectorAll('#rowsContainer .row');

                    rows.forEach((row, i) => {
                        row.setAttribute('data-index', i);
                    });
                }
            </script>

    </div>

    {{-- Single Save Button --}}
    <button type="submit" class="btn btn-primary mt-3">Save Theme</button>
</form>



@if($whatsappStore->id == 1201)

    @php
        // MANUALLY DECODE TEXT TO ARRAY
        $rawSettings = json_decode($whatsappStore->dropdown_settings, true);
        
        // Ensure arrays exist to prevent errors
        $materials = $rawSettings['materials'] ?? [];
        $brands = $rawSettings['brands'] ?? []; 
    @endphp
    
<style>

    @media(max-width: 1557px) {
        
    
         .col-lg-new {
            flex: 0 0 auto;
            width: 95% !important;
            background-color: #eff3f666 !important;
            margin-left: 0px !important ;
            margin-right: 0px !important ;
            padding-left: 20px !important ;
        }
    }
    
           .col-lg-new {
            flex: 0 0 auto;
            width: 48% ;
            background-color: #eff3f666 !important;
        }
   
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }        

    
</style>    
    
 
<div class=" border-top mt-5 pt-4">
    <h5 class="mb-3 text-primary">Manage Dropdown Options</h5>            
    <div class="row">
        <div class="col-lg-new mb-4  p-3 rounded" style="margin-left: 13px; margin-right:6.5px">
            <label class="fw-bold">1. Cover Materials</label>
            <form action="{{ route('admin.store.dropdown.update', $whatsappStore->id) }}" method="POST" class="d-flex gap-2 mb-2">
                @csrf
                <input type="hidden" name="action_type" value="add_material">
                <input type="text" name="value" class="form-control form-control-sm" placeholder="e.g. Leather" required>
                <button type="submit" class="btn btn-sm btn-primary">Add</button>
            </form>
            
            <ul class="list-group list-group-flush hide-scrollbar" style="max-height: 100px; overflow-y:auto;">
                @foreach($materials as $mat)
                <li class="list-group-item bg-transparent d-flex justify-content-between py-1 px-0">
                    <span>{{ $mat }}</span>
                    <a href="{{ route('admin.store.dropdown.delete', ['id' => $whatsappStore->id, 'type' => 'material', 'value' => $mat]) }}" class="text-danger fw-bold text-decoration-none" style="font-size: 22px;">&times;</a>
                </li>
                @endforeach
            </ul>
        </div>
    
        <div class="col-lg-new mb-4 p-3 rounded" style="margin-left: 6.5px; margin-right: 13px">
            <label class="fw-bold">2. Phone Brands</label>
            <form action="{{ route('admin.store.dropdown.update', $whatsappStore->id) }}" method="POST" class="d-flex gap-2 mb-2">
                @csrf
                <input type="hidden" name="action_type" value="add_brand">
                <input type="text" name="value" class="form-control form-control-sm" placeholder="e.g. Apple" required>
                <button type="submit" class="btn btn-sm btn-primary">Add</button>
            </form>
            
            <ul class="list-group list-group-flush hide-scrollbar" style="max-height: 100px; overflow-y:auto;">
                @foreach(array_keys($brands) as $brandName)
                <li class="list-group-item bg-transparent d-flex justify-content-between py-1 px-0">
                    <span>{{ $brandName }}</span>
                    <a href="{{ route('admin.store.dropdown.delete', ['id' => $whatsappStore->id, 'type' => 'brand', 'value' => $brandName]) }}" class="text-danger fw-bold text-decoration-none" style="font-size: 22px;">&times;</a>
                </li>
                @endforeach
            </ul>
        </div>
    
        <div class="col-lg-new mb-2  p-3 rounded" style="margin-left: 13px; margin-right:6.5px">
            <label class="fw-bold">3. Phone Models</label>
            <form action="{{ route('admin.store.dropdown.update', $whatsappStore->id) }}" method="POST" class="mb-2">
                @csrf
                <input type="hidden" name="action_type" value="add_model">
                <div class="input-group mb-2">
                    <select name="parent_value" class="form-select form-select-sm" required style="max-width: 40%;">
                        <option value="">Select Brand</option>
                        @foreach(array_keys($brands) as $brandName)
                            <option value="{{ $brandName }}">{{ $brandName }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="value" class="form-control form-control-sm" placeholder="Model (e.g. iPhone 15)" required>
                    <button type="submit" class="btn btn-sm btn-primary">Add</button>
                </div>
            </form>
    
            <ul class="list-group list-group-flush hide-scrollbar" style="max-height: 150px; overflow-y:auto;">
                @foreach($brands as $brandName => $models)
                    @foreach($models as $modelName)
                    <li class="list-group-item bg-transparent d-flex justify-content-between py-1 px-0">
                        <div><small class="badge bg-secondary me-1">{{ $brandName }}</small> {{ $modelName }}</div>
                        <a href="{{ route('admin.store.dropdown.delete', ['id' => $whatsappStore->id, 'type' => 'model', 'value' => $modelName, 'parent' => $brandName]) }}" class="text-danger fw-bold text-decoration-none" style="font-size: 22px;">&times;</a>
                    </li>
                    @endforeach
                @endforeach
            </ul>
        </div>    
    </div>
</div>

@endif