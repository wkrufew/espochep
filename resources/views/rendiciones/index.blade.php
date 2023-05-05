<x-app-layout>
    <style>
        .fondo{
            background-color: #BD0000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23000' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%23BD0000' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23b7000e' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23b10018' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23a9001f' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23a10025' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23990029' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%238f002d' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23860030' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%237c0033' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23710034' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23670035' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%235c0035' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23510034' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23470032' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%233c0030' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%2332022c' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%23290228' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23210024' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <div class="max-w-7xl mx-auto">
        <div class="fondo max-w-6xl mx-4 md:mx-6 lg:mx-auto m-6 py-4 md:py-6 px-2 md:px-4 rounded-lg text-center text-white font-semibold text-xs md:text-base uppercase">
            {{ __('RENDICIÓN DE CUENTAS DE LA EMPRESA') }}
        </div>
    </div>
    <div class="max-w-7xl mx-auto py-2 px-6">
        @livewire('surrender-index',['surrender' => $surrender])
    </div>
</x-app-layout>