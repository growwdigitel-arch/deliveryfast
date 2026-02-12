@php
    use \Milon\Barcode\DNS1D;
    $d = new DNS1D();
    $user_role = auth()->user()->role;
    $admin  = 1;
    $code = filter_var($shipment->code, FILTER_SANITIZE_NUMBER_INT);
@endphp

@extends('cargo::adminLte.layouts.master')

@section('pageTitle')
    {{ __('cargo::view.INVOICE') }} - {{ $shipment->code }}
@endsection

@section('content')
<div class="p-8">
    <div class="mx-auto" style="max-width: 900px; background: white; border-radius: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); overflow: hidden; border: 1px solid #e2e8f0;">
        
        <!-- Header Section -->
        <div style="padding: 40px; border-bottom: 2px solid #f1f5f9; background: #fafafa;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td valign="middle">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="middle">
                                    <div style="background-color: #2563eb; width: 48px; height: 48px; border-radius: 14px; color: #ffffff; text-align: center; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);">
                                        <svg style="width: 28px; height: 28px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                </td>
                                <td valign="middle" style="padding-left: 16px;">
                                    <div style="line-height: 1.1;">
                                        <div style="font-weight: 800; font-size: 32px; letter-spacing: -0.02em; color: #1e293b; font-family: 'Inter', sans-serif;">Delivery<span style="color: #2563eb;">Fast</span></div>
                                        <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.2em; margin-top: 2px;">Premium Logistics Solutions</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="middle" align="right">
                        <div style="text-align: right;">
                            <div style="font-weight: 900; font-size: 42px; color: #000; text-transform: uppercase; letter-spacing: -0.04em; line-height: 1;">{{ __('cargo::view.INVOICE') }}</div>
                            <div style="font-size: 16px; font-weight: 600; color: #2563eb; margin-top: 8px;">#{{$shipment->code}}</div>
                            @if($shipment->order_id)
                                <div style="font-size: 14px; font-weight: 600; color: #64748b; margin-top: 4px;">Order ID: {{$shipment->order_id}}</div>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Shipment Details -->
        <div style="padding: 40px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 40px;">
                <tr>
                    <td width="33%" valign="top">
                        <div style="font-size: 13px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 12px;">Created Date</div>
                        <div style="font-size: 16px; color: #0f172a; font-weight: 600;">{{ $shipment->created_at->format('d-m-Y') }}</div>
                    </td>
                    <td width="33%" valign="top" align="center">
                        <div style="font-size: 13px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 12px;">Status</div>
                        <div style="display: inline-block; padding: 6px 16px; background: #dcfce7; color: #166534; border-radius: 9999px; font-size: 14px; font-weight: 700;">{{ $shipment->getStatus() }}</div>
                    </td>
                    <td width="33%" valign="top" align="right">
                        <div style="font-size: 13px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 8px;">{{ __('cargo::view.SHIPMENT_CODE') }}</div>
                        @if($shipment->barcode != null)
                            @php
                                echo '<img src="data:image/png;base64,' . $d->getBarcodePNG($shipment->code, "C128") . '" alt="barcode" style="height:40px;" />';
                            @endphp
                        @endif
                    </td>
                </tr>
            </table>

            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 40px;">
                <tr>
                    <td width="50%" valign="top" style="padding-right: 20px;">
                        <div style="background: #f8fafc; border-radius: 16px; padding: 24px; border: 1px solid #f1f5f9; height: 100%;">
                            <div style="font-size: 13px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 16px;">{{ __('cargo::view.from') }}</div>
                            <div style="font-size: 18px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">{{$shipment->client->name}}</div>
                            <div style="font-size: 14px; color: #475569; line-height: 1.6; margin-bottom: 8px;">{{$shipment->from_address->address}}</div>
                            <div style="font-size: 14px; color: #64748b; font-weight: 600;">{{$shipment->client_phone}}</div>
                        </div>
                    </td>
                    <td width="50%" valign="top" style="padding-left: 20px;">
                        <div style="background: #f8fafc; border-radius: 16px; padding: 24px; border: 1px solid #f1f5f9; height: 100%;">
                            <div style="font-size: 13px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 16px;">{{ __('cargo::view.INVOICE_TO') }}</div>
                            <div style="font-size: 18px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">{{$shipment->reciver_name}}</div>
                            <div style="font-size: 14px; color: #475569; line-height: 1.6; margin-bottom: 8px;">{{$shipment->reciver_address}}</div>
                            <div style="font-size: 14px; color: #64748b; font-weight: 600;">{{$shipment->reciver_phone}}</div>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Items Table -->
            <div style="border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; margin-bottom: 40px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th align="left" style="padding: 16px 24px; font-size: 12px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">{{ __('cargo::view.package_items') }}</th>
                            <th align="center" style="padding: 16px 24px; font-size: 12px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">{{ __('cargo::view.qty') }}</th>
                            <th align="right" style="padding: 16px 24px; font-size: 12px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">{{ __('cargo::view.Weight_length_width_height_') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Modules\Cargo\Entities\PackageShipment::where('shipment_id',$shipment->id)->get() as $package)
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 20px 24px;">
                                    <div style="font-weight: 700; color: #1e293b; font-size: 15px;">{{$package->description}}</div>
                                    <div style="font-size: 13px; color: #94a3b8; margin-top: 4px;">@if(isset($package->package->name)){{json_decode($package->package->name, true)[app()->getLocale()]}} @endif</div>
                                </td>
                                <td align="center" style="padding: 20px 24px; font-weight: 600; color: #475569;">{{$package->qty}}</td>
                                <td align="right" style="padding: 20px 24px; font-weight: 600; color: #0f172a;">{{$package->weight}} KG <span style="color: #cbd5e1; margin: 0 8px;">•</span> {{ $package->length }}x{{ $package->width }}x{{ $package->height }} cm</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Totals Section -->
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="55%" valign="top">
                        <div style="background: #eff6ff; border-radius: 16px; padding: 24px; border: 1px solid #dbeafe;">
                            <div style="font-size: 13px; font-weight: 700; color: #1d4ed8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 16px;">{{ __('cargo::view.PAYMENT_INFO') }}</div>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding-bottom: 12px; color: #475569; font-size: 14px;">{{ __('cargo::view.PAYMENT_TYPE') }}</td>
                                    <td align="right" style="padding-bottom: 12px; color: #0f172a; font-weight: 700; font-size: 14px;">{{$shipment->getPaymentType()}}</td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 12px; color: #475569; font-size: 14px;">{{ __('cargo::view.PAYMENT_STATUS') }}</td>
                                    <td align="right" style="padding-bottom: 12px;">
                                        <span style="display: inline-block; padding: 4px 12px; border-radius: 6px; font-size: 12px; font-weight: 700; background: #dcfce7; color: #166534; border: 1px solid #15803d;">
                                            @if($shipment->paid == 1) {{__('cargo::view.paid')}} @else Completed @endif
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color: #475569; font-size: 14px;">Payment Method</td>
                                    <td align="right" style="color: #0f172a; font-weight: 700; font-size: 14px;">{{ $shipment->payment_method_id == 'cargo' ? 'DeliveryFast' : $shipment->payment_method_id }}</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td width="5%" valign="top"></td>
                    <td width="40%" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 12px 0; color: #64748b; font-size: 15px;">Subtotal</td>
                                        <td align="right" style="padding: 12px 0; color: #0f172a; font-weight: 600; font-size: 15px;">{{ format_price($shipment->shipping_cost) }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 12px 0; color: #64748b; font-size: 15px;">Tax & Fees</td>
                                        <td align="right" style="padding: 12px 0; color: #0f172a; font-weight: 600; font-size: 15px;">{{ format_price($shipment->tax + $shipment->insurance) }}</td>
                            </tr>
                            <tr style="border-top: 2px solid #f1f5f9;">
                                <td style="padding: 12px 0; color: #0f172a; font-weight: 800; font-size: 16px;">{{ __('cargo::view.amount_to_be_collected') }}</td>
                                <td align="right" style="padding: 12px 0; color: #0f172a; font-weight: 800; font-size: 16px;">{{ format_price($shipment->amount_to_be_collected) }}</td>
                            </tr>
                            <tr style="border-top: 2px solid #f1f5f9;">
                                <td style="padding: 24px 0; color: #0f172a; font-weight: 800; font-size: 18px;">{{ __('cargo::view.TOTAL_COST') }}</td>
                                <td align="right" style="padding: 24px 0; color: #2563eb; font-weight: 900; font-size: 24px;">{{ format_price($shipment->tax + $shipment->shipping_cost + $shipment->insurance + $shipment->amount_to_be_collected) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer Note -->
        <div style="padding: 24px 40px; background: #fafafa; border-top: 1px solid #f1f5f9; text-align: center;">
            <div style="font-size: 12px; color: #94a3b8; font-weight: 600;">Thank you for choosing DeliveryFast. For tracking and support, please visit our portal.</div>
        </div>
    </div>

    <!-- Print Action -->
    <div class="mt-8 text-center no-print">
        <button type="button" class="px-8 py-3 text-white transition-all transform btn btn-primary font-weight-bold btn-lg rounded-xl hover:scale-105" onclick="window.print();" style="background-color: #2563eb; border: none; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);">
            <i class="mr-2 fas fa-print"></i> {{ __('cargo::view.print_invoice') }}
        </button>
    </div>
</div>
@endsection

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
    
    body {
        font-family: 'Inter', sans-serif !important;
        background-color: #f8fafc;
    }

    @media print {
        .no-print, #kt_header, #kt_footer, #kt_header_mobile, .header, .footer, .main-footer {
            display: none !important;
        }
        body {
            background-color: white !important;
            padding: 0 !important;
        }
        .container {
            max-width: 100% !important;
            width: 100% !important;
            padding: 0 !important;
        }
        .p-8 {
            padding: 0 !important;
        }
        .mx-auto {
            margin: 0 !important;
            border: none !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    window.onload = function() {
        setTimeout(function () {
            // window.print();
        }, 500);
    };
</script>
@endsection