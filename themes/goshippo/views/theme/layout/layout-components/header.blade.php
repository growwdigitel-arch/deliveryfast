@php
    $header_setting = theme_setting('header.header');
    if(!$header_setting) $header_setting = array();
@endphp

<div class="bdaia-header-default">
<header id="main-header" class="active {{ array_key_exists('header_style', $header_setting) && $header_setting['header_style'] == 'dark_style' ? "dark_style" :  'light_style'  }}">

    <nav id="navigation" class="navbar dropdown-light" aria-label="primary" >
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo site--logo">
                    <a href="{{ url('/') }}" rel="home" title="DeliveryFast" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
                        <div style="background-color: #2563eb; padding: 10px; border-radius: 12px; color: #ffffff; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);">
                            <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div style="display: flex; flex-direction: column; line-height: 1.1;">
                            <span style="font-weight: 800; font-size: 20px; letter-spacing: -0.02em; color: #1e293b;">Delivery<span style="color: #2563eb;">Fast</span></span>
                            <span style="font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.15em; margin-top: 1px;">Premium Logistics</span>
                        </div>
                    </a>
                </div>

           
            </div>

            <div class="mobile-items">
                
                <!-- dropdowns -->
                <ul class="nav-components bd-components">
                    @if (Auth::check()) 
                        <li class="components-item">
                            <a href="{{ fr_route('admin.dashboard') }}" @if(env('DEMO_MODE') == 'On') target="_blank" @endif>
                                <span class="bdaia-ns-btn mr-3" style="display: inline-block; height: 42px; line-height: 42px; border-radius: 12px; padding: 0 20px; background-color: #2563eb; color: #fff; font-weight: bold; font-size:14px; transition: all 0.3s ease; box-shadow: 0 8px 20px -5px rgba(37, 99, 235, 0.4);"> 
                                    Portal
                                </span>
                            </a>
                        </li>
                    @else
                        @if (array_key_exists('display_sign_in', $header_setting) && $header_setting['display_sign_in'])
                            <li class="components-item">
                                <a href="{{ fr_route('login') }}">
                                    <span class="bdaia-ns-btn mr-3" style="display: inline-block; height: 42px; line-height: 42px; border-radius: 12px; padding: 0 20px; background-color: #2563eb; color: #fff; font-weight: bold; font-size:14px; transition: all 0.3s ease; box-shadow: 0 8px 20px -5px rgba(37, 99, 235, 0.4);"> 
                                        Sign In
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
                


                @if (array_key_exists('display_language_switcher', $header_setting) && $header_setting['display_language_switcher'])
                    @if(check_module('Localization'))
                    <div class="dropdowns">
                        <div class="position-relative">
                            <span class="" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="{{ array_key_exists('header_text_color', $header_setting) && $header_setting['header_text_color'] ? "color: {$header_setting['header_text_color']};" :  ''  }}">

                                <svg height="22" viewBox="0 0 22 22" style="width:auto" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor" transform=""><path d="m11 22c-6.06517241 0-11-4.9348276-11-11 0-6.06517241 4.93482759-11 11-11 6.0651724 0 11 4.93482759 11 11 0 6.0651724-4.9348276 11-11 11zm0-21.24137931c-5.64717241 0-10.24137931 4.5942069-10.24137931 10.24137931 0 5.6471724 4.5942069 10.2413793 10.24137931 10.2413793 5.6471724 0 10.2413793-4.5942069 10.2413793-10.2413793 0-5.64717241-4.5942069-10.24137931-10.2413793-10.24137931z"/><path d="m11 22c-3.40317241 0-6.17289655-4.9348276-6.17289655-11 0-6.06517241 2.76972414-11 6.17289655-11 3.4031724 0 6.1728966 4.93482759 6.1728966 11 0 6.0651724-2.7697242 11-6.1728966 11zm0-21.24137931c-2.98593103 0-5.41427586 4.5942069-5.41427586 10.24137931 0 5.6471724 2.42834483 10.2413793 5.41427586 10.2413793 2.985931 0 5.4142759-4.5942069 5.4142759-10.2413793 0-5.64717241-2.4283449-10.24137931-5.4142759-10.24137931z"/><path d="m21.6206897 11.3793103h-21.24137935c-.20937932 0-.37931035-.169931-.37931035-.3793103s.16993103-.3793103.37931035-.3793103h21.24137935c.2093793 0 .3793103.169931.3793103.3793103s-.169931.3793103-.3793103.3793103z"/><path d="m20.1944828 6.06896552h-18.38896556c-.20937931 0-.37931034-.16993104-.37931034-.37931035s.16993103-.37931034.37931034-.37931034h18.38896556c.2093793 0 .3793103.16993103.3793103.37931034s-.169931.37931035-.3793103.37931035z"/><path d="m20.1944828 16.6896552h-18.38896556c-.20937931 0-.37931034-.1699311-.37931034-.3793104s.16993103-.3793103.37931034-.3793103h18.38896556c.2093793 0 .3793103.169931.3793103.3793103s-.169931.3793104-.3793103.3793104z"/><path d="m11 22c-.2093793 0-.3793103-.169931-.3793103-.3793103v-21.24137935c0-.20937932.169931-.37931035.3793103-.37931035s.3793103.16993103.3793103.37931035v21.24137935c0 .2093793-.169931.3793103-.3793103.3793103z"/></g></svg>

                                &nbsp;

                                {{LaravelLocalization::getCurrentLocaleName()}}
                            </span>
                            <div class="dropdown-menu" style="margin-top: 15px">
                                @foreach(Modules\Localization\Entities\Language::all() as $key => $language)
                                    <a @if($language->name == LaravelLocalization::getCurrentLocaleName()) class="dropdown-item active" @else class="dropdown-item" @endif  href="{{ LaravelLocalization::getLocalizedURL($language->code) }}" >{{$language->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                @endif

                <button id="nav-open" class="btn btn-sm px-3 bars d-lg-none stop-propagation" aria-label="navbar toggle" style="{{ array_key_exists('header_text_color', $header_setting) && $header_setting['header_text_color'] ? "color: {$header_setting['header_text_color']};" :  ''  }}">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </nav>
</header>
</div>

<!-- Mobile Menu -->
<nav aria-label="primary mobile" class="drawer d-lg-none">
    <header class="header d-lg-none d-flex justify-content-between align-items-center" style="padding: 15px 20px; border-bottom: 1px solid #f1f5f9;">
      <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
          <div style="background-color: #2563eb; padding: 8px; border-radius: 10px; color: #ffffff; display: flex; align-items: center; justify-content: center;">
              <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
          </div>
          <span style="font-weight: 700; font-size: 18px; color: #1e293b;">DeliveryFast</span>
      </a>
      <button id="nav-close" class="btn p-0 stop-propagation">
        <i data-feather="x"></i>
      </button>
    </header>

    <div class="body">
      <ul class="nav-list list-unstyled mb-0">
        @if (array_key_exists('display_home_icon', $header_setting) && $header_setting['display_home_icon'])
            <li class="nav-item">
            </li>
        @endif
        {!! get_menu_header() !!}
      </ul>
    </div>
</nav>
