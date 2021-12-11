<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3">

                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            Add Arcade
                        </div>
                        <form method="POST" action="/addArcade">
                            @csrf
                            <div>
                                <x-label for="name" :value="__('Arcade Name')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <x-label for="type" :value="__('Currency Type')" />
                                <select id="type" name="type" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="Credits">Credits</option>
                                    <option value="USD">USD</option>
                                    <option value="Chips">Chips</option>
                                </select>
                            </div>
                            <x-button class="mt-2">
                                {{ __('Submit') }}
                            </x-button>
                        </form>
                    </div>
                    <!-- TODO: Uniqe Id -->
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            Add Arcade Address
                        </div>
                        <form method="POST" action="/addArcadeLocation">
                            @csrf
                            <div class="relative">
                                <x-label for="arcade_name" :value="__('Arcade Name')" />
                                <x-input id="arcade_name" class="searcherInput block mt-1 w-full" type="text" name="arcade_name" :value="old('arcade_name')" required autocomplete="off" data-search-url="/arcadeNameSearch" data-name-input="arcade_name" data-id-input="arcade_id" />
                                <input type="hidden" id="arcade_id" name="arcade_id">
                                
                                <x-searcher-list-wrapper></x-searcher-list-wrapper>
                            </div>
                            <div>
                                <x-label for="address" :value="__('Street Address')" />
                                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                            </div>
                            <div>
                                <x-label for="city" :value="__('City')" />
                                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                            </div>
                            <div>
                                <x-label for="state" :value="__('State')" />
                                <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
                            </div>
                            <div>
                                <x-label for="zip" :value="__('Zipcode')" />
                                <x-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" required />
                            </div>
                            <x-button class="mt-2">
                                {{ __('Submit') }}
                            </x-button>
                        </form>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            Add Game
                        </div>
                        <form method="POST" action="/addGame">
                            @csrf
                            <div>
                                <x-label for="game_name" :value="__('Game Name')" />
                                <x-input id="game_name" class="block mt-1 w-full" type="text" name="game_name" :value="old('game_name')" required autofocus />
                            </div>
                            <div>
                                <x-label for="type" :value="__('Game Type')" />
                                <select id="type" name="type" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="Skill">Skill</option>
                                    <option value="Wheel Spin">Wheel Spin</option>
                                    <option value="Claw">Claw</option>
                                    <option value="Random">Random</option>
                                </select>
                            </div>
                            <x-button class="mt-2">
                                {{ __('Submit') }}
                            </x-button>
                        </form>
                    </div>
                    
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            Add Info Game List
                        </div>
                        <form method="POST" action="/addArcadeLocationGame">
                            @csrf
                            <input type="hidden" name="added_by_id" value="{{ Auth::id() }}" />
                            <div class="relative">
                                <x-label for="arcade_name" :value="__('Arcade Name')" />
                                <x-input id="arcade_name" class="searcherInput block mt-1 w-full" type="text" name="arcade_name" :value="old('arcade_name')" required autocomplete="off" data-search-url="/arcadeNameSearch" data-name-input="arcade_name" data-id-input="arcade_id" data-list-locations="1" />
                                <input type="hidden" id="arcade_id" name="arcade_id">

                                <x-searcher-list-wrapper></x-searcher-list-wrapper>
                            </div>
                            <input type="hidden" id="arcade_location_id" name="arcade_location_id">
                            <div class="location_wrapper mt-1 mb-3"></div>
                            <div class="relative">
                                <x-label for="game_name" :value="__('Game Name')" />
                                <x-input id="game_name" class="searcherInput block mt-1 w-full" type="text" name="game_name" :value="old('game_name')" required autocomplete="off" data-search-url="/gameNameSearch" data-name-input="game_name" data-id-input="game_id" />
                                <input type="hidden" id="game_id" name="game_id">

                                <x-searcher-list-wrapper></x-searcher-list-wrapper>
                            </div>
                            <div>
                                <x-label for="cost" :value="__('Cost')" />
                                <x-input id="cost" class="block mt-1 w-full" type="number" name="cost" :value="old('cost')" required autofocus />
                            </div>
                            <div>
                            <label for="multiplay" class="inline-flex items-center">
                                <input id="multiplay" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Is Multiplay') }}</span>
                            </label>
                            </div>
                            <x-button class="mt-2">
                                {{ __('Submit') }}
                            </x-button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
