<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    @can('admin_dashboard')
    <x-sidebar.link title="{{ __('Dashboard') }}" href="{{ route('admin.dashboard') }}" :isActive="request()->routeIs('admin.dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Orders') }}" href="{{ route('admin.orders.index') }}" :isActive="request()->routeIs('admin.orders.index')">
        <x-slot name="icon">
            <x-heroicon-o-truck class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Payments') }}" href="{{ route('admin.payments.index') }}" :isActive="request()->routeIs('admin.payments.index')">
        <x-slot name="icon">
            <x-heroicon-o-cash class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Reports') }}" href="{{ route('admin.reports') }}" :isActive="request()->routeIs('admin.reports')">
        <x-slot name="icon">
            <x-heroicon-o-trending-up class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Subscriptions') }}" href="{{ route('admin.subscriptions.index') }}" :isActive="request()->routeIs('admin.subscriptions.index')">
        <x-slot name="icon">
            <x-heroicon-o-location-marker class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Users') }}" href="{{ route('admin.users.index') }}" :isActive="request()->routeIs('admin.users.index')">
        <x-slot name="icon">
            <x-heroicon-o-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('User Alerts') }}" href="{{ route('admin.user-alerts.index') }}" :isActive="request()->routeIs('admin.user-alerts.index')">
        <x-slot name="icon">
            <x-heroicon-o-speakerphone class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Contact') }}" href="{{ route('admin.contact') }}" :isActive="request()->routeIs('admin.contact')">
        <x-slot name="icon">
            <x-heroicon-o-mail class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Notifications') }}" href="{{ route('admin.notifications') }}" :isActive="request()->routeIs('admin.notifications')">
        <x-slot name="icon">
            <x-heroicon-o-bell class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.dropdown title="{{ __('Website') }}" :active="Str::startsWith(request()->route()->uri(), 'Website')">
        <x-slot name="icon">
            <x-heroicon-o-desktop-computer class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="{{ __('Sections') }}" href="{{ route('admin.sections.index') }}"
            :active="request()->routeIs('admin.sections.index')" />
        <x-sidebar.sublink title="{{ __('Pages') }}" href="{{ route('admin.pages.index') }}"
            :active="request()->routeIs('admin.pages.index')" />
        <x-sidebar.sublink title="{{ __('Posts') }}" href="{{ route('admin.posts.index') }}"
            :active="request()->routeIs('admin.posts.index')" />
    </x-sidebar.dropdown>
    <x-sidebar.dropdown title="{{ __('Settings') }}" :active="Str::startsWith(request()->route()->uri(), 'Settings')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="{{ __('Permission') }}" href="{{ route('admin.permissions.index') }}"
            :active="request()->routeIs('admin.permissions.index')" />
        <x-sidebar.sublink title="{{ __('Roles') }}" href="{{ route('admin.roles.index') }}"
            :active="request()->routeIs('admin.roles.index')" />
        <x-sidebar.sublink title="{{ __('Profile') }}" href="{{ route('admin.profile') }}"
            :active="request()->routeIs('admin.profile')" />
        <x-sidebar.sublink title="{{ __('General Settings') }}" href="{{ route('admin.settings') }}"
        :active="request()->routeIs('admin.settings')" />
        
        {{-- @if (config('settings.enableSMS') == 1)
        <x-sidebar.sublink title="{{ __('Sms Configuration') }}" href="{{ route('admin.smsgateway') }}"
        :active="request()->routeIs('admin.smsgateway')" />
        @endif --}}

        <x-sidebar.sublink title="{{ __('Email Configuration') }}" href="{{ route('admin.smpt') }}"
        :active="request()->routeIs('admin.smpt')" />
        <x-sidebar.sublink title="{{ __('Languages') }}" href="{{ route('admin.translations') }}"
        :active="request()->routeIs('admin.translations')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="{{ __('Logout') }}" onclick="event.preventDefault(); 
                    document.getElementById('logoutform').submit();" href="#">
        <x-slot name="icon">
            <x-heroicon-o-logout class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    @endcan
                
    @can('vendor_dashboard')
    <x-sidebar.link title="{{ __('Dashboard') }}" href="{{ route('vendor.home') }}" :isActive="request()->routeIs('vendor.home')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Products') }}" href="{{ route('vendor.products.index') }}" :isActive="request()->routeIs('vendor.products.index')">
        <x-slot name="icon">
            <x-heroicon-o-truck class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Orders') }}" href="{{ route('vendor.orders.index') }}" :isActive="request()->routeIs('vendor.orders.index')">
        <x-slot name="icon">
            <x-heroicon-o-truck class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Subscription') }}" href="{{ route('vendor.subscriptions.show') }}" :isActive="request()->routeIs('vendor.subscriptions.show')">
        <x-slot name="icon">
            <x-heroicon-o-location-marker class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="{{ __('Profile') }}" href="{{ route('vendor.profile.index') }}" :isActive="request()->routeIs('vendor.profile.index')">
        <x-slot name="icon">
            <x-heroicon-o-user class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan
       
</x-perfect-scrollbar>