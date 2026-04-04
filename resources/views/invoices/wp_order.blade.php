<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Invoice</title>
  @if($wpOrder->wp_store_id == 584)
  <style>
    /* Make all text bold */
    body, body * {
      font-weight: bold !important;
    }
  </style> 
  @endif

</head>
<body>
    @php
    $statusMap = [
        0 => 'Pending',
        1 => 'Dispatched',
        2 => 'Delivered',
        3 => 'Cancelled',
    ];
@endphp
  <div style="font-family: Arial, sans-serif; margin: 5px; border: 1px solid #ddd; padding: 25px; border-radius: 10px;">
    <table style="width: 100%; border-collapse: collapse; font-size: 14px; margin-bottom: 20px;">
      <tr>
        <td style="width: 50%; padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Order ID:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->order_id }}</span>
        </td>
        <td style="width: 50%; padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Name:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->name }}</span>
        </td>
      </tr>
      <tr>
        @if($wpOrder->wp_store_id != 208 && $wpOrder->wp_store_id != 424)
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Phone:</strong><br>
          <span style="color: #494949df;">+{{ $wpOrder->region_code }} {{ $wpOrder->phone }}</span>
        </td>
        @endif
        
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Address:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->address }}</span>
            @if(!empty($wpOrder->pincode))
                - {{ $wpOrder->pincode }}
            @endif
        </td> 
        
      </tr>

      @if($wpOrder->razorpay_payment_id)
      <tr>
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Payment Mode:</strong><br>
          <span style="color: #494949df;">Online</span>
        </td>
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Payment ID:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->razorpay_payment_id }}</span>
        </td>
          
        
      </tr> 
      @endif

      <tr>
          <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Status:</strong><br>
          <span style="color: #494949df;">{{ $statusMap[$wpOrder->status] ?? 'Unknown' }}</span>
        </td>
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Payment Status:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->payment_status == "PAID" ? 'Paid' : 'Unpaid' }}</span>
        </td>
      </tr>
      <tr>
          <td style="padding: 8px; vertical-align: top;">
            <strong style="color: #474747;">Order Date:</strong><br>
            <span style="color: #494949df;">{{ $wpOrder->created_at->format('d-m-Y h:i A') }}</span>
          </td>
          @if($wpOrder->wp_store_id == 208 || $wpOrder->wp_store_id == 1488 || $wpOrder->wp_store_id == 676 || $wpOrder->wp_store_id == 424)
          <td>
            <strong style="color: #474747;">Order Note:</strong><br>
            <span style="color: #494949df;">{{ $wpOrder->notes }}</span>
          </td>
          @else
          <td></td>
          @endif
        </tr>
        @if($wpOrder->wp_store_id == 208 || $wpOrder->wp_store_id == 1488 || $wpOrder->wp_store_id == 676 || $wpOrder->wp_store_id == 424)
        <tr>
          <td style="padding: 8px; vertical-align: top;">
            <strong style="color: #474747;">Advance Payment:</strong><br>
            <span style="color: #494949df;">{{ $wpOrder->advance_payment }}</span>
          </td>
          <td>
          </td>
        </tr>
        @endif

        @if($wpOrder->wp_store_id == 1065)
      <tr>
          <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;"> Email Addess:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->email_address }}</span>
        </td>
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Unit Number:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->unit_number }}</span>
        </td>
      </tr>
      
      <tr>
          <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Order City:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->city }}</span>
        </td>
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Postal Code:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->postal_code }}</span>
        </td>
      </tr>
      
      <tr>
          <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Delivery StartDate:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->delivery_start_date }}</span>
        </td>        

        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Upstairs Delivery:</strong><br>
          <span style="color: #494949df;">
            
    @if (strtolower($wpOrder->upstairs_delivery) == 'yes')
      Yes ($2.25 additional per upstairs delivery only Otw no delivery charges)
    @else
      No
    @endif
          </span>
        </td>
      </tr>
      
      <tr>

        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Delivery Instructions:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->delivery_instructions }}</span>
        </td>
        <td style="padding: 8px; vertical-align: top;">
          <strong style="color: #474747;">Extra Notes:</strong><br>
          <span style="color: #494949df;">{{ $wpOrder->extra_notes }}</span>
        </td>
      </tr>
@endif
 @if($wpOrder->wp_store_id == 1201)
        <tr>
          <td style="padding: 8px; vertical-align: top;">
            <strong style="color: #474747;">Cover Type:</strong><br>
            <span style="color: #494949df;">{{ $wpOrder->dropdown_settings_order }}</span>
          </td>
        </tr> 
@endif        

    </table>

    <h2 style="margin-bottom: 10px; color: #2e2e2e;">Order Items</h2>
    <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
      <thead>
        <tr style="background-color: #f8f9fa;">
          <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">#</th>
           @if($wpOrder->wp_store_id == 584)
          <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">IMAGE</th>
           @endif          
          <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">PRODUCT NAME</th>
          @if($wpOrder->wp_store_id == 171 || $wpOrder->wp_store_id == 344 || $wpOrder->wp_store_id == 77 || $wpOrder->wp_store_id == 1323 || $wpOrder->wp_store_id == 364 || $wpOrder->wp_store_id == 1502)
            <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">PRODUCT SIZE</th>
          @endif
          @if($wpOrder->wp_store_id == 364 || $wpOrder->wp_store_id == 77 || $wpOrder->wp_store_id == 1502)
            <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">PRODUCT COLOR</th>
          @endif
          <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">QUANTITY</th>
          <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">PRICE</th>
          <th style="border: 1px solid #ddd; padding: 8px; color: #474747;">TOTAL PRICE</th>
        </tr>
      </thead>
      <tbody>
        @foreach($wpOrder->products as $index => $item)
          <tr>
            <td style="border: 1px solid #ddd; padding: 8px; color: #494949df;">{{ $index + 1 }}</td>
          @if($wpOrder->wp_store_id == 584)  
           <td style="border: 1px solid #ddd; padding: 8px; color: #494949df;">
                @php
                
                    $imageUrl = is_array($item->product->images_url) && count($item->product->images_url) > 0
                        ? $item->product->images_url[0]
                        : null;
                
                    $base64Image = null;
                
                    if ($imageUrl) {
                
                        $imageContent = @file_get_contents($imageUrl); 
                
                        if ($imageContent !== false) {
                            $finfo = finfo_open(FILEINFO_MIME_TYPE);
                            $mimeType = finfo_buffer($finfo, $imageContent);
                            finfo_close($finfo);
                
                            $base64Data = base64_encode($imageContent);
                
                            $base64Image = "data:{$mimeType};base64,{$base64Data}";
                        }
                    }
                @endphp
                
                @if($base64Image)
                    {{-- Use the Base64 string directly in the src attribute --}}
                    <img src="{{ $base64Image }}" style="max-width: 50px; height: auto;">
                @endif
           </td> 
        @endif            
            <td style="border: 1px solid #ddd; padding: 8px; color: #494949df; word-wrap: break-word; word-break: break-word; white-space: normal;">
              @if( $item->product->p_code)
              #{{ $item->product->p_code }}
              @endif              
            {{ $item->product->name ?? 'N/A' }}
              @if($item->attribute)
              ({{ $item->attribute }})
              @endif
              @if($wpOrder->wp_store_id == 1209 && $item->offer_text)
                    <br/><small style="color: #770101;font-weight: 600;font-size: 13px;">Offer Applied: {{$item->offer_text}}</small>
              @endif
            </td>
            @if($wpOrder->wp_store_id == 236 || $wpOrder->wp_store_id == 344 || $wpOrder->wp_store_id == 364 || $wpOrder->wp_store_id == 1502)
                <td style="border: 1px solid #ddd; padding: 8px; color: #494949df;">{{ $item->size }}</td>
            @endif
            @if($wpOrder->wp_store_id == 191 || $wpOrder->wp_store_id == 1502)
                <td style="border: 1px solid #ddd; padding: 8px; color: #494949df;">{{ $item->color }}</td>
            @endif
            <td style="border: 1px solid #ddd; padding: 8px; color: #494949df;">{{ $item->qty }}</td>
            <td style="border: 1px solid #ddd; padding: 8px; color: #494949df;">{{ $item->price }}</td>
            <td style="border: 1px solid #ddd; padding: 8px; color: #494949df;">{{ number_format($item->total_price, 2) }}</td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        @if($wpOrder->wp_store_id == 721 || $wpOrder->wp_store_id == 41 || $wpOrder->wp_store_id == 1238)
        <tr style="border-top: 2px solid #676767;">
                <td colspan="4" style="text-align: right; border: 1px solid #ddd; padding: 8px;">Courier Charges:</td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">{{ number_format($wpOrder->courier_charges, 2) }}</strong>
                </td>
            </tr>
        @endif
        @if($wpOrder->wp_store_id == 208 || $wpOrder->wp_store_id == 1488)
            <tr style="border-top: 2px solid #676767;">
                <td colspan="4" style="text-align: right; border: 1px solid #ddd; padding: 8px;">Auto Charges:</td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">{{ number_format($wpOrder->auto_charges, 2) }}</strong>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right; border: 1px solid #ddd; padding: 8px;">Courier Charges:</td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">{{ number_format($wpOrder->courier_charges, 2) }}</strong>
                </td>
            </tr>
        @endif
        @if($wpOrder->dis_amt != 0)
        <tr style="border-top: 2px solid #676767;">
            @if($wpOrder->wp_store_id == 584)
                <td colspan="5" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Grand Total:</strong>
                </td>
            @elseif($wpOrder->wp_store_id == 236 || $wpOrder->wp_store_id == 344 || $wpOrder->wp_store_id == 364)
                <td colspan="5" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Discount:</strong>
                </td>
            @elseif($wpOrder->wp_store_id == 191)
            <td colspan="6" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Discount:</strong>
                </td>
            @else
              @if($wpOrder->coupon_code)
                <td colspan="4" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Discount(Coupon: {{ $wpOrder->coupon_code }}):</strong>
                </td>
              @else
                <td colspan="4" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Discount:</strong>
                </td>
              @endif  
            @endif
          <td style="border: 1px solid #ddd; padding: 8px;">
            <strong style="color: #474747;">{{ number_format($wpOrder->dis_amt, 2) }}</strong>
          </td>
        </tr>
        @endif
        <tr style="border-top: 2px solid #676767;">
           @if($wpOrder->wp_store_id == 584)
                <td colspan="5" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Grand Total:</strong>
                </td>
            @elseif($wpOrder->wp_store_id == 236 || $wpOrder->wp_store_id == 344 || $wpOrder->wp_store_id == 364 || $wpOrder->wp_store_id == 1502)
                <td colspan="5" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Grand Total:</strong>
                </td>
            @elseif($wpOrder->wp_store_id == 191)
            <td colspan="6" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Grand Total:</strong>
                </td>
            @else
                <td colspan="4" style="text-align: right; border: 1px solid #ddd; padding: 8px;">
                    <strong style="color: #474747;">Grand Total:</strong>
                </td>
            @endif
          <td style="border: 1px solid #ddd; padding: 8px;">
            <strong style="color: #474747;">{{ number_format($wpOrder->grand_total, 2) }}</strong>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</body>
</html>
