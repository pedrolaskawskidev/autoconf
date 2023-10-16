<x-app-layout>

    <div class="py-12">
        @yield('brand.index')
        @yield('brand.create')
        @yield('vehicle_model.index')
        @yield('vehicle_model.create')
        @yield('vehicle.index')
        @yield('vehicle.create')
    </div>
</x-app-layout>
