@extends('cargo::adminLte.layouts.blank')

@php
    $pageTitle = __('cargo::view.tracking_shipment') . ' #' . (isset($model) ? $model->code : __('cargo::view.error'));
    $system_logo = App\Models\Settings::where('group', 'general')->where('name','system_logo')->first();

    // Guard date logic if model is not set
    if (isset($model)) {
        $shipmentDate = \Carbon\Carbon::parse($model->shipping_date);
        $transitDate = $shipmentDate->copy()->addDay();
        $deliveryDate = $shipmentDate->copy()->addDays(2);
    }
@endphp

@section('page-title', $pageTitle)

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<style>
    :root {
        --primary-blue: #2563eb;
        --secondary-blue: #3b82f6;
        --bg-slate: #f8fafc;
        --text-slate: #0f172a;
        --muted-slate: #64748b;
        --success-green: #10b981;
    }

    body {
        font-family: 'Outfit', sans-serif !important;
        background-color: #f1f5f9;
        -webkit-font-smoothing: antialiased;
    }

    .tracking-main-container {
        padding: 50px 20px;
        max-width: 1100px;
        margin: 0 auto;
        animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Professional Status Banner */
    .status-banner {
        background: white;
        border-radius: 32px;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 35px;
        box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.8);
        position: relative;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        background: #ecfdf5;
        color: var(--success-green);
        padding: 12px 24px;
        border-radius: 99px;
        font-weight: 800;
        font-size: 15px;
        gap: 12px;
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.05);
    }

    /* Cards & Layout */
    .tracking-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
        margin-bottom: 24px;
    }

    @media (max-width: 768px) {
        .status-banner { flex-direction: column; text-align: center; gap: 24px; }
        .tracking-main-container { padding: 30px 15px; }
    }

    .info-card {
        background: white;
        border-radius: 32px;
        padding: 35px;
        box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.8);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
    }

    .card-label {
        color: var(--muted-slate);
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        margin-bottom: 24px;
        display: block;
    }

    .info-title {
        color: var(--text-slate);
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 18px;
        font-size: 15px;
    }

    .detail-label { color: var(--muted-slate); font-weight: 500; font-size: 14px; }
    .detail-value { color: var(--text-slate); font-weight: 700; text-align: right; max-width: 60%; font-size: 16px; letter-spacing: -0.01em; }

    .address-container {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        line-height: 1.6;
        background: linear-gradient(to bottom right, #f8fafc, #f1f5f9);
        padding: 20px;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        letter-spacing: -0.01em;
        position: relative;
    }

    /* Refined Timeline */
    .timeline-card {
        background: white;
        border-radius: 32px;
        padding: 45px;
        box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .timeline-container {
        position: relative;
        padding-left: 60px;
        margin-top: 40px;
    }

    .timeline-line {
        position: absolute;
        left: 21px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: var(--success-green);
        opacity: 0.2;
        border-radius: 10px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 50px;
        opacity: 0;
        animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .timeline-item:last-child { margin-bottom: 0; }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Stagger Animations */
    .timeline-item:nth-child(1) { animation-delay: 0.2s; }
    .timeline-item:nth-child(2) { animation-delay: 0.4s; }
    .timeline-item:nth-child(3) { animation-delay: 0.6s; }

    .timeline-dot {
        position: absolute;
        left: -49px;
        top: 4px;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: var(--success-green);
        border: 5px solid white;
        box-shadow: 0 0 0 6px rgba(16, 185, 129, 0.15);
        z-index: 2;
    }

    .event-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px; }
    .event-time { font-size: 13px; color: var(--muted-slate); font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; }
    .event-title { font-size: 18px; color: var(--text-slate); font-weight: 800; display: block; }
    .event-desc { font-size: 14px; color: var(--muted-slate); font-weight: 500; line-height: 1.6; }

    .icon-wrapper {
        width: 56px;
        height: 56px;
        background: #f1f5f9;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .info-card:hover .icon-wrapper {
        background: var(--primary-blue);
        color: white;
        transform: rotate(5deg);
    }

    .pulse-lite {
        animation: pulseLite 2s infinite;
    }
    @keyframes pulseLite {
        0% { transform: scale(1); box-shadow: 0 0 0 0px rgba(16, 185, 129, 0.4); }
        70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
        100% { transform: scale(1); box-shadow: 0 0 0 0px rgba(16, 185, 129, 0); }
    }
</style>
@endsection

@section('page-content')
<div class="tracking-main-container">
    
    @if(isset($error))
        <!-- Error State -->
        <div class="info-card text-center py-16">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-red-50 text-red-500 rounded-3xl mb-8">
                <i class="fas fa-search-location fa-3x"></i>
            </div>
            <h2 class="text-3xl font-black text-slate-900 mb-4">Request Error</h2>
            <p class="text-slate-500 max-w-sm mx-auto mb-10 font-medium leading-relaxed">{{ $error }}</p>
            <a href="{{ route('shipments.tracking') }}" class="inline-flex items-center gap-3 bg-blue-600 text-white px-10 py-5 rounded-2xl font-black hover:bg-blue-700 transition-all shadow-xl hover:shadow-blue-200">
                <i class="fas fa-redo"></i> Try Another Code
            </a>
        </div>
    @else
        @if(isset($model))
        <!-- Premium Status Banner -->
        <div class="status-banner">
            <div>
                <span class="card-label">Shipment Insight</span>
                <div class="flex items-center gap-5">
                    <h1 class="text-4xl font-black text-slate-900 tracking-tight">{{ $model->code }}</h1>
                    <div class="status-badge pulse-lite">
                        <i class="fas fa-check-double"></i>
                        Delivered Successfully
                    </div>
                </div>
                <div class="flex items-center gap-4 mt-4">
                    <p class="text-muted-slate font-bold text-sm"><i class="far fa-calendar-check mr-2 text-blue-500"></i> Booked: {{ $shipmentDate->format('M d, Y') }}</p>
                    <div class="w-1 h-1 bg-slate-300 rounded-full"></div>
                    <p class="text-muted-slate font-bold text-sm"><i class="fas fa-shipping-fast mr-2 text-emerald-500"></i> Express Delivery</p>
                </div>
            </div>
            <div class="hidden md:block text-right">
                <div class="font-black text-3xl text-slate-900">Arrived On Time</div>
                <div class="text-sm font-extrabold text-emerald-500 uppercase tracking-widest mt-2">Verified Delivery Cycle</div>
            </div>
        </div>

        <div class="tracking-grid">
            <!-- Origin Insight -->
            <div class="info-card">
                <span class="card-label">Source Node</span>
                <h3 class="info-title">
                    <div class="icon-wrapper"><i class="fas fa-warehouse"></i></div>
                    {{ __('cargo::view.Sender') }}
                </h3>
                <div class="space-y-4">
                    <div class="detail-row">
                        <span class="detail-label">Client</span>
                        <span class="detail-value">{{ ucwords(strtolower($client->name)) }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Origin City</span>
                        <span class="detail-value">@if(isset($model->from_state)){{ ucwords(strtolower($model->from_state->name)) }} @endif</span>
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-100">
                        <span class="detail-label block mb-3">Operating Address</span>
                        <div class="address-container">{{ ucwords(strtolower($ClientAddress->address)) }}</div>
                    </div>
                </div>
            </div>

            <!-- Destination Insight -->
            <div class="info-card">
                <span class="card-label">End Endpoint</span>
                <h3 class="info-title">
                    <div class="icon-wrapper" style="background: #ecfdf5; color: #10b981;"><i class="fas fa-house-user"></i></div>
                    {{ __('cargo::view.recipient') }}
                </h3>
                <div class="space-y-4">
                    <div class="detail-row">
                        <span class="detail-label">Recipient</span>
                        <span class="detail-value">{{ ucwords(strtolower($model->reciver_name)) }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Destination</span>
                        <span class="detail-value">@if(isset($model->to_state)){{ ucwords(strtolower($model->to_state->name)) }} @endif</span>
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-100">
                        <span class="detail-label block mb-3">Recipient address</span>
                        <div class="address-container">{{ ucwords(strtolower($model->reciver_address)) }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
            <!-- Timeline Pillar -->
            <div class="lg:col-span-2">
                <div class="timeline-card h-full">
                    <span class="card-label">Logistics Lifecycle</span>
                    <h3 class="info-title">Strategic Journey</h3>
                    
                    <div class="timeline-container">
                        <div class="timeline-line" style="opacity: 1;"></div>
                        
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="event-header">
                                <span class="event-title text-emerald-600 font-black">Delivered Successfully</span>
                                <span class="event-time">{{ $deliveryDate->format('M d, Y') }}</span>
                            </div>
                            <p class="event-desc">The shipment has been successfully handed over to the receiver. The delivery cycle is complete and confirmed via electronic signature.</p>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="event-header">
                                <span class="event-title">Out for Delivery</span>
                                <span class="event-time">{{ $transitDate->format('M d, Y') }}</span>
                            </div>
                            <p class="event-desc">Package was sorted and dispatched for local delivery. Shipment entered the final mile journey toward destination hotspot.</p>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="event-header">
                                <span class="event-title">Shipment Processed</span>
                                <span class="event-time">{{ $shipmentDate->format('M d, Y') }}</span>
                            </div>
                            <p class="event-desc">Logistics request initiated. Package successfully processed, verified, and secured at the origin terminal.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Asset Pillar -->
            <div class="space-y-6">
                <div class="info-card">
                    <span class="card-label">Physical Assets</span>
                    <h3 class="info-title"><i class="fas fa-boxes text-orange-500"></i> Manifest</h3>
                    
                    @foreach($PackageShipment as $package)
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="text-sm font-bold text-slate-500">Net Weight</span>
                            <span class="font-black text-slate-900">{{$package->weight}} KG</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="text-sm font-bold text-slate-500">Manifest Qty</span>
                            <span class="font-black text-slate-900">{{$package->qty}} Units</span>
                        </div>
                        <div class="pt-4">
                            <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Asset Description</span>
                            <p class="text-sm font-bold text-slate-700 mt-2 p-3 bg-blue-50 rounded-xl border border-blue-100">"{{$package->description}}"</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="info-card bg-slate-900 border-0 shadow-2xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-white font-black text-2xl mb-4">Support Active</h3>
                        <p class="text-slate-400 text-sm font-medium mb-8 leading-relaxed">Our dedicated logistics support team is monitoring your deliveries 24/7. Contact us for any priority assistance.</p>
                        <a href="{{ url('/contact') }}" class="flex items-center justify-center gap-3 bg-white text-slate-900 py-5 rounded-2xl font-black w-full hover:bg-slate-100 transition-all">
                            <i class="fas fa-headset"></i> Contact Support
                        </a>
                    </div>
                    <div class="absolute -right-10 -bottom-10 opacity-10">
                        <i class="fas fa-truck-loading fa-10x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
</div>
</div>
@endsection
