<div class="grid grid-cols-2 gap-2">
    <div>
        <div class="flex">
            <img class="w-14 h-14" src="{{ $arcade_location->thumbnail }}">
            <div class="flex-1 ml-4">
                <h3 class="m-0">{{ $arcade->name }}</h3>
                <address>{{ $arcade_location->address }} {{ $arcade_location->city }},
                    {{ $arcade_location->state }}
                    {{ $arcade_location->zip }}</address>
            </div>
        </div>
        <div>
            <h5>Games</h5>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-2">Name</th>
                        <th class="px-2">Type</th>
                        <th class="px-2">{{ $arcade->currency }}</th>
                        <th class="px-2">Pay Min</th>
                        <th class="px-2">Pay Max</th>
                        <th class="px-2">Pay Mean</th>
                        <th class="px-2">Multi</th>
                    </tr>
                </thead>
                <tbody class="text-xs">
                    @foreach ($games as $loc_info)
                        <tr class="gameInfoTableRow" data-id="{{ $loc_info['id'] }}">
                            <td class="gameName px-2">{{ $loc_info['game']->name }}</td>
                            <td class="px-2">{{ $loc_info['game']->type }}</td>
                            <td class="px-2">{{ $loc_info['cost'] }}</td>
                            <td class="px-2 text-center">{{ $loc_info['payoutStats']['min'] }}</td>
                            <td class="px-2 text-center">{{ $loc_info['payoutStats']['max'] }}</td>
                            <td class="px-2 text-center">{{ $loc_info['payoutStats']['mean'] }}</td>
                            <td class="gameMultiSwipe px-2">
                                @if ($loc_info['game']->multi_swipe)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                <a class="text-xs rounded bg-purple-800 text-white px-3 py-1" href="{{ route('claimNotebookPayouts') }}">Claim Round 1 Notebook Payouts</a>
            </div>
        </div>
    </div>
    <div id="submitPlayRecords" class="hidden">
        <div class="selectedGameName mb-3">Select a Game</div>
        <div class="mb-10">
            Start to Finish Record
            <form method="POST" action="/addPlayLogs">
                @csrf
                <input type="hidden" name="arcade_location_game_id" />
                <input type="hidden" name="swipes" value=1 />
                <input type="hidden" id="startToFinishTickets" name="tickets" />
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <x-label for="startTickets" :value="__('Start Tickets')" />

                        <x-input id="startTickets" class="block mt-1 w-full" type="number" name="startTickets"
                            :value="old('startTickets')" required />
                    </div>
                    <div>
                        <x-label for="endTickets" :value="__('End Tickets')" />

                        <x-input id="endTickets" class="block mt-1 w-full" type="number" name="endTickets"
                            :value="old('endTickets')" required />
                    </div>
                    <div>
                        <x-label for="swipeCounts" :value="__('Swipes')" />

                        <x-input id="swipeCounts" class="block mt-1 w-full" type="number" name="swipeCounts"
                            :value="old('swipeCounts')" required />
                    </div>
                </div>
                <div id="calcMsgWrap">

                </div>
                <div class="mt-3">
                    <x-button id="calcStartToFinish" type="button">
                        {{ __('Calculate') }}
                    </x-button>
                    <x-button id="submitStarToFinish" disabled>
                        {{ __('Submit') }}
                    </x-button>
                </div>

            </form>
        </div>
        <div>
            Record Play
            <form method="POST" action="/addPlayLogs">
                @csrf
                <input type="hidden" name="arcade_location_game_id" />
                
                <div class="mb-2">
                    <x-label for="ticketCount" :value="__('Tickets Won')" />

                    <x-input id="ticketCount" class="block mt-1 w-full" type="text" name="tickets"
                        :value="old('tickets')" required />
                </div>
                <div>
                    <label for="swipe_count" class="multiSwipeInfo inline-flex items-center">
                        <input id="swipe_count" type="number"
                            class="w-20 rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="swipes" value="1">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Swipes') }}</span>
                    </label>
                    <label for="is_jackpot" class="ml-3 inline-flex items-center">
                        <input id="is_jackpot" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="jackpot">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Jackpot?') }}</span>
                    </label>
                </div>
                <x-button class="mt-3">
                    {{ __('Submit') }}
                </x-button>
            </form>
        </div>
    </div>
</div>
