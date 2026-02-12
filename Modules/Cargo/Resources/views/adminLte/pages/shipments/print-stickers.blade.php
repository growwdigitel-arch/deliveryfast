@php
$n = 0;
use \Milon\Barcode\DNS1D;
$d = new DNS1D();
$cash_payment = 'cash_payment';
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
    
    .print-label-container {
        font-family: 'Inter', sans-serif !important;
        color: #0f172a;
        width: 450px;
        margin: 20px auto;
        border: 2px solid #000;
        padding: 0;
        background: #fff;
        page-break-after: always;
    }
    
    .label-header {
        border-bottom: 2px solid #000;
        padding: 15px;
    }
    
    .label-section {
        border-bottom: 2px solid #000;
        padding: 15px;
    }
    
    .label-section:last-child {
        border-bottom: none;
    }

    @media print {
        body { margin: 0; padding: 0; }
        .no-print { display: none !important; }
        .print-label-container { margin: 0 auto; border-color: #000; }
    }
</style>

@foreach ($shipments as $shipment)
@php
    $n++;
@endphp
<div class="page" style="padding: 20px;">
    <div class="print-label-container">
        <!-- Brand Header -->
        <div class="label-header">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td valign="middle">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="middle">
                                    <div style="background-color: #2563eb; width: 36px; height: 36px; border-radius: 10px; color: #ffffff; text-align: center; display: flex; align-items: center; justify-content: center;">
                                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                </td>
                                <td valign="middle" style="padding-left: 10px;">
                                    <div style="line-height: 1.1;">
                                        <div style="font-weight: 800; font-size: 20px; color: #1e293b;">Delivery<span style="color: #2563eb;">Fast</span></div>
                                        <div style="font-size: 8px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.15em;">Premium Logistics</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="middle" align="right">
                        <div style="font-weight: 900; font-size: 24px; color: #000;">{{$shipment->code}}</div>
                        @if($shipment->order_id)
                            <div style="font-weight: 700; font-size: 14px; color: #64748b; margin-top: 2px;">Order #: {{$shipment->order_id}}</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <!-- Addresses -->
        <div class="label-section">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%" valign="top" style="border-right: 1px dashed #ccc; padding-right: 15px;">
                        <div style="font-size: 10px; font-weight: 800; color: #2563eb; text-transform: uppercase; margin-bottom: 5px;">FROM (SENDER)</div>
                        <div style="font-weight: 700; font-size: 13px;">{{$shipment->client->name}}</div>
                        <div style="font-size: 11px; line-height: 1.4; margin-top: 3px;">{{$shipment->from_address->address}}</div>
                        <div style="font-size: 11px; font-weight: 600; margin-top: 3px;">Ph: {{$shipment->client_phone}}</div>
                    </td>
                    <td width="50%" valign="top" style="padding-left: 15px;">
                        <div style="font-size: 10px; font-weight: 800; color: #2563eb; text-transform: uppercase; margin-bottom: 5px;">TO (RECEIVER)</div>
                        <div style="font-weight: 700; font-size: 15px;">{{$shipment->reciver_name}}</div>
                        <div style="font-size: 12px; line-height: 1.4; margin-top: 3px; font-weight: 600;">{{$shipment->reciver_address}}</div>
                        <div style="font-size: 11px; font-weight: 700; margin-top: 5px;">Ph: {{$shipment->reciver_phone}}</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Shipment Info & Barcode -->
        <div class="label-section" style="background: #f8fafc;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="60%" valign="top">
                        <div style="margin-bottom: 10px;">
                            <span style="font-size: 10px; font-weight: 700; color: #64748b; text-transform: uppercase;">Payment:</span>
                            <span style="font-weight: 800; font-size: 13px; margin-left: 5px;">{{$shipment->getPaymentType()}}</span>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <span style="font-size: 10px; font-weight: 700; color: #64748b; text-transform: uppercase;">Amount to Collect:</span>
                            <span style="font-weight: 900; font-size: 18px; color: #2563eb; margin-left: 5px;">{{ format_price($shipment->amount_to_be_collected) }}</span>
                        </div>
                        <div>
                            <span style="font-size: 10px; font-weight: 700; color: #64748b; text-transform: uppercase;">Weight:</span>
                            <span style="font-weight: 700; font-size: 12px; margin-left: 5px;">{{$shipment->total_weight}} KG</span>
                        </div>
                    </td>
                    <td width="40%" align="right" valign="middle">
                        @if($shipment->barcode != null)
                            @php
                                echo '<img src="data:image/png;base64,' . $d->getBarcodePNG($shipment->code, "C128") . '" alt="barcode" style="width: 100%; height: 60px;" />';
                            @endphp
                        @endif
                        <div style="font-size: 10px; font-weight: 700; text-align: center; margin-top: 5px;">{{$shipment->code}}</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Content Details -->
        <div class="label-section">
            <div style="font-size: 10px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 5px;">Package Content</div>
            <div style="font-size: 11px; color: #1e293b; font-weight: 600;">
                @php $i=0; @endphp
                @foreach(Modules\Cargo\Entities\PackageShipment::where('shipment_id',$shipment->id)->get() as $package)
                    @if ($i != 0 ), @endif{{$package->description}} (qty: {{$package->qty}})
                    @php $i++; @endphp
                @endforeach
            </div>
        </div>

        <!-- Footer -->
        <div style="background: #000; color: #fff; padding: 10px; text-align: center; font-size: 9px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
            DeliveryFast Premium Logistics
        </div>
    </div>
</div>
@endforeach

<div class="no-print" style="text-align: center; margin-top: 20px; padding-bottom: 50px;">
    <button onclick="window.print()" style="padding: 12px 24px; background: #2563eb; color: #fff; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);">Print All Stickers</button>
</div>

<script>
    window.onload = function() {
        // window.print();
    };
</script>
