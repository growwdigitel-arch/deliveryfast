<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <title>@yield('page-title') | {{ \Str::title(get_general_setting('website_title', config('app.name'))) }} </title>
    <meta name="description" content="@yield('page-description', get_general_setting('website_description', config('app.description')))">
    <meta name="keywords" content="@yield('page-keywords',  get_general_setting('website_keywords'))">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%232563eb'%3E%3Cpath d='M13 10V3L4 14h7v7l9-11h-7z'/%3E%3C/svg%3E">
    @php 
        $model = App\Models\Settings::where('group', 'general')->where('name','system_logo')->first();
    @endphp
    <link rel="shortcut icon" href="{{ $model->getFirstMediaUrl('system_logo') ? $model->getFirstMediaUrl('system_logo') : asset('assets/lte/media/logos/favicon.ico') }}" />

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('page-title') | {{ get_general_setting('website_title', config('app.name')) }}">
    <meta property="og:description" content="@yield('page-description', get_general_setting('website_description', config('app.description')))">
    <meta property="og:type" content="@yield('page-type', 'website')">
    <meta property="og:image" content="@yield('page-image', get_general_setting('social_media_image'))">

    {{-- begin::styles --}}
    @include('theme.layout.layout-components.styles')
    {{-- end::styles --}}

    @yield('styles')

    <!-- Premium UI Dependencies -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Outfit', sans-serif; }</style>


    @stack('prepend-scripts')
</head>
<body
        class="home page-template-default page wp-embed-responsive has-lazy-load"
        itemscope="itemscope"
        itemtype="https://schema.org/WebPage"
>

{{-- begin::header --}}
@include('theme.layout.layout-components.header')
{{-- end::header --}}



@yield('before-page')


{{-- begin::content --}}
@yield('content')
{{-- end::content --}}


@yield('after-page')

{{-- begin::footer --}}
@include('theme.layout.layout-components.footer')
{{-- end::footer --}}



{{-- begin::scripts --}}
@include('theme.layout.layout-components.scripts')
{{-- end::scripts --}}


@yield('scripts')

@stack('push-scripts')

</body>
</html>