@extends('cargo::adminLte.layouts.blank')

@php
    $pageTitle =  __('cargo::view.tracking');
@endphp

@section('page-title', $pageTitle )

@section('page-type', 'page')

@section('styles')

@endsection

@section('page-content')
<style>
    .tracking-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 400px;
        padding: 60px 20px;
        width: 100%;
    }
    .tracking-card {
        background: #ffffff;
        padding: 50px 40px;
        border-radius: 30px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 550px;
        text-align: center;
        border: 1px solid #f1f5f9;
    }
    .tracking-icon-box {
        display: inline-flex;
        background-color: #2563eb;
        padding: 20px;
        border-radius: 20px;
        color: white;
        margin-bottom: 25px;
        box-shadow: 0 15px 30px -5px rgba(37, 99, 235, 0.3);
    }
    .tracking-title {
        font-size: 28px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 8px;
        letter-spacing: -0.02em;
    }
    .tracking-subtitle {
        color: #64748b;
        font-weight: 500;
        font-size: 16px;
        margin-bottom: 40px;
    }
    .input-group-premium {
        position: relative;
        margin-bottom: 25px;
    }
    .input-premium {
        width: 100%;
        padding: 18px 25px 18px 60px;
        border-radius: 18px;
        background-color: #f8fafc;
        border: 2px solid #e2e8f0;
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        transition: all 0.3s ease;
        outline: none;
    }
    .input-premium:focus {
        border-color: #2563eb;
        background-color: #ffffff;
        box-shadow: 0 0 0 5px rgba(37, 99, 235, 0.08);
    }
    .input-icon {
        position: absolute;
        left: 22px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        transition: color 0.3s ease;
    }
    .input-premium:focus + .input-icon {
        color: #2563eb;
    }
    .btn-search-premium {
        width: 100%;
        padding: 18px;
        background-color: #2563eb;
        color: white;
        border-radius: 18px;
        font-weight: 700;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);
    }
    .btn-search-premium:hover {
        background-color: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 15px 25px -5px rgba(37, 99, 235, 0.3);
    }
    .label-premium {
        display: block;
        text-align: left;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #94a3b8;
        margin-bottom: 8px;
        margin-left: 5px;
    }
    .error-box {
        background-color: #fef2f2;
        border: 1px solid #fee2e2;
        color: #dc2626;
        padding: 12px 20px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 25px;
    }
</style>

<div class="tracking-wrapper">
    <div class="tracking-card">
        <div class="tracking-icon-box">
            <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <h2 class="tracking-title">Track Shipment</h2>
        <p class="tracking-subtitle">Stay updated on your delivery status</p>

        @if(isset($error))
            <div class="error-box">
                {{ $error }}
            </div>
        @endif

        <form action="{{route('shipments.tracking')}}" method="GET">
            <div class="input-group-premium">
                <label class="label-premium">{{ __('cargo::view.enter_your_tracking_code') }}</label>
                <div style="position: relative;">
                    <input type="text" name="code" required class="input-premium" placeholder="{{__('cargo::view.example_SH00001')}}">
                    <div class="input-icon">
                        <svg style="width: 22px; height: 22px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-search-premium">
                Track Package Now
            </button>
        </form>

        <div style="margin-top: 35px; padding-top: 25px; border-top: 1px solid #f1f5f9;">
            <p style="color: #64748b; font-size: 14px; font-weight: 500;">
                Need help with your shipment? <a href="{{ url('/contact') }}" style="color: #2563eb; font-weight: 700; text-decoration: none;">Support Center</a>
            </p>
        </div>
    </div>
</div>
@endsection
