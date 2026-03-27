<div class="col-lg-6 mb-4">
    <!-- About Us -->
    <div class="col-md-12">
        <div class="form-group">
            <label style="margin-bottom: 10px;">About Us:</label>
            <div id="wpStoreAboutUsQuill" class="editor-height" style="height: 150px;"></div>
            <input type="hidden" name="about_us" id="wpStoreAboutUsData" value="{{ $whatsappStore->about_us }}">
        </div>
    </div>

    <!-- Privacy Policy -->
    <div class="col-md-12 mt-4">
        <div class="form-group">
            <label style="margin-bottom: 10px;">Privacy Policy:</label>
            <div id="wpStorePrivacyPolicyQuill" class="editor-height" style="height: 150px;"></div>
            <input type="hidden" name="privacy_policy" id="wpStorePrivacyPolicyData" value="{{ $whatsappStore->privacy_policy }}">
        </div>
    </div>

    <!-- Terms & Conditions -->
    <div class="col-md-12 mt-4">
        <div class="form-group">
            <label style="margin-bottom: 10px;">Terms & Conditions:</label>
            <div id="wpStoreTermsConditionsQuill" class="editor-height" style="height: 150px;"></div>
            <input type="hidden" name="terms_conditions" id="wpStoreTermsConditionsData" value="{{ $whatsappStore->terms_conditions }}">
        </div>
    </div>

    <!-- Shipping & Payment Policy -->
    <div class="col-md-12 mt-4">
        <div class="form-group">
            <label style="margin-bottom: 10px;">Shipping & Payment Policy:</label>
            <div id="wpStoreShippingPolicyQuill" class="editor-height" style="height: 150px;"></div>
            <input type="hidden" name="shipping_payment_policy" id="wpStoreShippingPolicyData" value="{{ $whatsappStore->shipping_payment_policy }}">
        </div>
    </div>

    <!-- Refunds & Cancellation -->
    <div class="col-md-12 mt-4">
        <div class="form-group">
            <label style="margin-bottom: 10px;">Refunds & Cancellation:</label>
            <div id="wpStoreRefundPolicyQuill" class="editor-height" style="height: 150px;"></div>
            <input type="hidden" name="refund_cancellation_policy" id="wpStoreRefundPolicyData" value="{{ $whatsappStore->refunds_cancellation }}">
        </div>
    </div>
    
        <!-- contact_us Text -->
    <label for="contect-us" style="margin-bottom: 10px; margin-top: 10px;">Contect Us:</label>
    <div class="youtube-link-input-group">
        <input type="text" id="contect-us" class="form-control" placeholder="Enter Embed a Map"
            value="{{ $whatsappStore->contact_us }}">
    </div>

    <button class="btn btn-primary mt-4" onclick="saveWPPages({{ $whatsappStore->id }})">Save</button>
</div>



<script>
    function decodeHtml(html) {
        const txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }

    $(document).ready(function () {
        const fields = [
            { id: "AboutUs", label: "About us..." },
            { id: "PrivacyPolicy", label: "Privacy policy..." },
            { id: "TermsConditions", label: "Terms & conditions..." },
            { id: "ShippingPolicy", label: "Shipping & payment policy..." },
            { id: "RefundPolicy", label: "Refunds & cancellation..." },
        ];

        fields.forEach(field => {
            const editorEl = document.querySelector(`#wpStore${field.id}Quill`);
            const inputEl = document.querySelector(`#wpStore${field.id}Data`);
            if (editorEl && inputEl) {
                const quillInstance = new Quill(editorEl, {
                    modules: {
                        toolbar: [
                            ["bold", "italic", "underline", "strike"],
                            ["blockquote", "code-block"],
                            [{ header: [1, 2, 3, 4, 5, 6, false] }],
                            [{ color: [] }, { background: [] }],
                        ],
                    },
                    theme: "snow",
                    placeholder: field.label,
                });

                quillInstance.on("text-change", function () {
                    inputEl.value = quillInstance.root.innerHTML;
                });

                const savedContent = inputEl.value.trim();
                if (savedContent !== "") {
                    quillInstance.root.innerHTML = decodeHtml(savedContent);
                }
            }
        });
    });
</script>
