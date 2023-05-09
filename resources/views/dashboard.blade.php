<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
        <hr>
        
        <br>
        
        <body>
            <div style="background-color: #111827; border-radius: 30px; height: 600px;">
                <br>
                <h1 style="text-align: center; font-size: 50px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color: #44adea">Welcome!</h1>
                <hr style="margin-left: 300px; width:50%">
                <br>
                <br>
                <h2 style="text-align: center; font-family: console; font-size: 30px; color: rgb(135, 135, 255)"> Total balance:  </h2>
                <br>
                <h2 style="text-align: center; font-family: console; font-size: 30px; color: rgb(135, 135, 255)">{{ $sumaSaldo }}€</h2>
            </div>
        </body>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
