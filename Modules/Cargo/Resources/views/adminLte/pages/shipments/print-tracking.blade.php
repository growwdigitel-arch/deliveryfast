@php
    use \Milon\Barcode\DNS1D;
    $d = new DNS1D();
     
    $admin  = 1;
    $code = filter_var($model->code, FILTER_SANITIZE_NUMBER_INT);
@endphp
 
@extends('cargo::adminLte.layouts.master')

@section('pageTitle')
    {{ __('cargo::view.shipment_tracking') }} - {{ $model->code }}
@endsection

@section('content')
<div class="p-8">
    <div class="mx-auto" style="max-width: 900px; background: white; border-radius: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); overflow: hidden; border: 1px solid #e2e8f0;">
        
        <!-- Premium Header -->
        <div style="padding: 30px; border-bottom: 1px solid #f1f5f9; background: #ffffff;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td valign="middle">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="middle">
                                    <div style="background-color: #2563eb; width: 42px; height: 42px; border-radius: 12px; color: #ffffff; text-align: center; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);">
                                        <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                </td>
                                <td valign="middle" style="padding-left: 14px;">
                                    <div style="line-height: 1.1;">
                                        <div style="font-weight: 800; font-size: 24px; color: #1e293b; font-family: 'Inter', sans-serif;">Delivery<span style="color: #2563eb;">Fast</span></div>
                                        <div style="font-size: 9px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.15em; margin-top: 1px;">Premium Logistics</div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="middle" align="right">
                        <div style="font-weight: 700; font-size: 16px; color: #64748b; font-family: 'Inter', sans-serif;">{{ __('cargo::view.shipment_tracking') }}</div>
                        <div style="font-weight: 900; font-size: 22px; color: #0f172a; font-family: 'Inter', sans-serif; margin-top: 2px;">#{{$model->code}}</div>
                    </td>
                </tr>
            </table>
        </div>

        <div style="padding: 40px;">
            <!-- Status Card -->
            <div style="background: #f0f7ff; border-radius: 16px; padding: 24px; border: 1px solid #dbeafe; margin-bottom: 30px; display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <div style="font-size: 13px; font-weight: 700; color: #1d4ed8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 8px;">Current Status</div>
                    <div style="font-size: 28px; font-weight: 900; color: #1e3a8a;">{{$model->getStatus()}}</div>
                </div>
                <div style="text-align: right;">
                    @if($model->barcode != null)
                        @php
                            echo '<img src="data:image/png;base64,' . $d->getBarcodePNG($model->code, "C128") . '" alt="barcode" style="height:50px;" />';
                        @endphp
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <!-- Journey Details -->
                    <div style="background: #ffffff; border-radius: 16px; padding: 24px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                        <h5 style="font-weight: 800; color: #0f172a; margin-bottom: 24px; display: flex; align-items: center;">
                            <span style="width: 8px; height: 8px; background: #2563eb; border-radius: 50%; margin-right: 12px;"></span>
                            Shipment Journey
                        </h5>
                        
                        <div style="position: relative; padding-left: 30px;">
                            <div style="position: absolute; left: 3px; top: 0; bottom: 0; width: 2px; background: #e2e8f0; border-radius: 1px;"></div>
                            
                            <!-- Sender -->
                            <div style="position: relative; margin-bottom: 30px;">
                                <div style="position: absolute; left: -31px; top: 0; width: 8px; height: 8px; background: #2563eb; border-radius: 50%; box-shadow: 0 0 0 4px #dbeafe;"></div>
                                <div style="font-size: 12px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">{{ __('sender') }}</div>
                                <div style="font-weight: 800; font-size: 16px; color: #0f172a; margin-top: 4px;">{{ $client->name }}</div>
                                <div style="font-size: 14px; color: #475569; line-height: 1.5; margin-top: 4px;">{{ $ClientAddress->address }}</div>
                            </div>

                            <!-- Receiver -->
                            <div style="position: relative;">
                                <div style="position: absolute; left: -31px; top: 0; width: 8px; height: 8px; background: #2563eb; border-radius: 50%; box-shadow: 0 0 0 4px #dbeafe;"></div>
                                <div style="font-size: 12px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em;">{{ __('receiver') }}</div>
                                <div style="font-weight: 800; font-size: 16px; color: #0f172a; margin-top: 4px;">{{ $model->reciver_name }}</div>
                                <div style="font-size: 14px; color: #475569; line-height: 1.5; margin-top: 4px;">{{ $model->reciver_address }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Package Summary -->
                    <div style="background: #ffffff; border-radius: 16px; padding: 24px; border: 1px solid #e2e8f0;">
                        <h5 style="font-weight: 800; color: #0f172a; margin-bottom: 20px;">Package Summary</h5>
                        @foreach($PackageShipment as $package)
                            <div style="padding: 15px; background: #f8fafc; border-radius: 12px; margin-bottom: 10px; border: 1px solid #f1f5f9;">
                                <div style="font-weight: 700; color: #1e293b; font-size: 14px;">{{$package->description}}</div>
                                <div style="font-size: 12px; color: #64748b; margin-top: 4px;">
                                    Qty: <b>{{$package->qty}}</b> <span style="margin: 0 8px; color: #cbd5e1;">|</span>
                                    Weight: <b>{{$package->weight}} KG</b>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-5">
                    <!-- Tracking History -->
                    <div style="background: #ffffff; border-radius: 16px; padding: 24px; border: 1px solid #e2e8f0; height: 100%;">
                        <h5 style="font-weight: 800; color: #0f172a; margin-bottom: 24px;">Tracking History</h5>
                        
                        <div style="position: relative; padding-left: 20px;">
                            <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 1px; background: #e2e8f0; border-left: 1px dashed #cbd5e1;"></div>
                            
                            @foreach($model->logs()->orderBy('id','desc')->get() as $log)
                                <div style="position: relative; margin-bottom: 25px; padding-left: 15px;">
                                    <div style="position: absolute; left: -24px; top: 5px; width: 9px; height: 9px; background: #fff; border: 2px solid #2563eb; border-radius: 50%;"></div>
                                    <div style="font-size: 11px; font-weight: 700; color: #94a3b8;">{{ $log->created_at->format('M d, Y • h:i A') }}</div>
                                    <div style="font-weight: 700; color: #1e293b; margin-top: 4px; font-size: 14px;">{{ Modules\Cargo\Entities\Shipment::getClientStatusByStatusId($log->to) }}</div>
                                    <div style="font-size: 12px; color: #64748b; margin-top: 2px;">{{ $log->created_at->diffForHumans() }}</div>
                                </div>
                            @endforeach

                            <div style="position: relative; padding-left: 15px;">
                                <div style="position: absolute; left: -24px; top: 5px; width: 9px; height: 9px; background: #fff; border: 2px solid #94a3b8; border-radius: 50%;"></div>
                                <div style="font-size: 11px; font-weight: 700; color: #94a3b8;">{{ $model->created_at->format('M d, Y • h:i A') }}</div>
                                <div style="font-weight: 700; color: #1e293b; margin-top: 4px; font-size: 14px;">Shipment Created</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div style="background: #f8fafc; color: #64748b; padding: 20px; text-align: center; font-size: 11px; border-top: 1px solid #e2e8f0;">
            <b>DeliveryFast Premium Logistics</b> • Professional Shipment Tracking Sheet
        </div>
    </div>

    <!-- Print Action -->
    <div class="mt-8 text-center no-print">
        <button type="button" class="btn btn-primary font-weight-bold btn-lg rounded-xl" onclick="window.print();" style="background-color: #2563eb; border: none; padding: 12px 30px; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);">
            <i class="mr-2 fas fa-print"></i> Print Tracking Sheet
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
        .no-print, #kt_header, #kt_footer, #kt_header_mobile, .header, .footer {
            display: none !important;
        }
        body { background: white !important; }
        .p-8 { padding: 0 !important; }
        .mx-auto { border: none !important; box-shadow: none !important; border-radius: 0 !important; max-width: 100% !important; }
    }
</style>
@endsection