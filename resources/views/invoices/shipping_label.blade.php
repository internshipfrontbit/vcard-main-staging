<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Label</title>
    <style>
        @page { margin: 0; }
        
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            padding: 20px;
            color: #333;
        }

        .label-container {
            padding: 0px;
            width: 100%;
        }

        /* Use this for the top row to force left/right alignment */
        .header-table {
            width: 100%;
            border: none;
            margin-bottom: 0px;
        }

        .label-title {
            font-size: 21px;
            font-weight: bold;
            color: #000;
        }

        .order-id-box {
            border: 1px solid #000;
            padding: 5px;
            font-weight: bold;
             font-size: 19px;
            display: inline-block;
        }

        .footer-section {
            border-top: 2px solid #000;
            padding-top: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="label-container">
        <table class="header-table">
            <tr>
                <td class="label-title" style="text-align: left; font-size:16px">
                    TO,
                </td>
                <td style="text-align: right;">
                    <span class="order-id-box">
                        #{{ $wpOrder->order_id }}
                    </span>
                </td>
            </tr>
        </table>

        <div class="label-title">
             <span style="font-size: 16px; color: #5e5d5d;">Name :</span>
             {{ $wpOrder->name }} 
        </div>

        <div class="label-title" style="margin-top: 5px;">
            <span style="font-size: 16px; color: #5e5d5d;">Address :</span>
            {{ $wpOrder->address }}
        </div>

        <div class="label-title" style="margin-top: 5px;">
            <span style="font-size: 16px; color: #5e5d5d;">Phone :</span>
            +{{ $wpOrder->region_code }} {{ $wpOrder->phone }}
        </div>

        <div class="footer-section" style="font-size: 18px;
            font-weight: bold;
            color: #000;">
            <div >
                <span >
                        {{ 'From: ' }}
                </span>
              {{ 'Jaynamkeen - Surat | 9033042120' }}
            </div>
        </div>
    </div>

</body>
</html>