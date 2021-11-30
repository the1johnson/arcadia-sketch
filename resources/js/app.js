const { list } = require('postcss');

require('./bootstrap');

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

$(function () {
    const searcherElems = $('.searcherInput');
    // const searchWrapperElem = arcadeSearchElem.parent().find('.completer-wrapper');
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    var arcadeHolder = undefined;

    if (searcherElems.length) {
        searcherElems.on('keyup', function () {
            let searchInput = $(this);
            let searchUrl = searchInput.data('search-url');
            let nameInput = searchInput.data('name-input');
            let idInput = searchInput.data('id-input');
            let listLocationsAttribute = searchInput.data('list-locations') ? ' data-list-locations="1"' : '';
            let curVal = searchInput.val();

            if (curVal) {
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': csrfToken
                //     }
                // });
                $.ajax({
                    method: "GET",
                    url: searchUrl,
                    data: { name: curVal }
                })
                    .done(function (data) {
                        let newHtml = '<ul>';
                        if (data.length) {
                            if (listLocationsAttribute) {
                                arcadeHolder = data;
                            }
                            $.each(data, function (index, value) {
                                newHtml += '<li class="found-search cursor-pointer" data-id="' + value.id + '" data-id-input="' + idInput + '" data-name-input="' + nameInput + '"' + listLocationsAttribute + '>' + value.name + '</li>';
                            });
                        } else {
                            newHtml += '<li>No Arcades</li>';
                        }
                        newHtml += '</ul>';
                        searchInput.parent().find('.searcher-list-wrapper').removeClass('hidden').html(newHtml);
                    });
            }
        });
    }

    $('.searcher-list-wrapper').on('click', '.found-search', function () {
        let closestForm = $(this).closest('form');
        let idInupt = $(this).data('id-input');
        let nameInput = $(this).data('name-input');
        let listLocations = parseInt($(this).data('list-locations'), 10);
        closestForm.find('input[name="' + idInupt + '"]').val($(this).data('id'));
        closestForm.find('input[name="' + nameInput + '"]').val($(this).html());
        closestForm.find('.searcher-list-wrapper').addClass('hidden');

        if (listLocations && arcadeHolder[0].locations) {
            let locWrapper = closestForm.find('.location_wrapper');
            let locHtml = '';
            $.each(arcadeHolder[0].locations, function (index, value) {
                console.log('meee', value)
                locHtml += '<div class="arcade-location-selector text-xs border border-gray-200 p-1 rounded cursor-pointer" data-id="' + value.id + '">' + value.address + ' ' + value.city + ' ' + value.state + ', ' + value.zip + '</div>';
            });

            locWrapper.html(locHtml);
        }
    });

    $('.location_wrapper').on('click', '.arcade-location-selector', function () {
        $(this).addClass('bg-blue-300 border-blue-600').removeClass('border-gray-200');
        $('#arcade_location_id').val($(this).data('id'));
    });

    const $submitPlayRecordsElem = $('#submitPlayRecords');
    if ($submitPlayRecordsElem.length) {
        const $calcStartToFinishBtn = $('#calcStartToFinish');
        const $gameInfoTableRowElems = $('.gameInfoTableRow')
        $gameInfoTableRowElems.on('click', function () {
            var $elem = $(this);
            let activeClasses = 'bg-blue-500 text-white';
            let multiSwipeHtmlString = $elem.find('.gameMultiSwipe').html().replaceAll(/\s/g, '');
            let isMultiSwipe = multiSwipeHtmlString === 'Yes' ? true : false;
            
            $gameInfoTableRowElems.removeClass(activeClasses);
            $elem.addClass(activeClasses);
            $submitPlayRecordsElem.removeClass('hidden');

            $submitPlayRecordsElem.find('input[name="arcade_location_game_id"]').val($elem.data('id'));
            $submitPlayRecordsElem.find('.selectedGameName').html($elem.find('.gameName').html());
            if(isMultiSwipe){
                $submitPlayRecordsElem.find('.multiSwipeInfo').removeClass('hidden');
            }else{
                $submitPlayRecordsElem.find('.multiSwipeInfo').addClass('hidden');
            }
        });

        const $startTicketsInput = $('#startTickets');
        const $endTicketsInput = $('#endTickets');
        const $swipeCountsInput = $('#swipeCounts');
        const $calcMsgWrap = $('#calcMsgWrap');
        $calcStartToFinishBtn.on('click', function(){
            let startTicketCount = parseInt($startTicketsInput.val(), 10);
            let endTicketCount = parseInt($endTicketsInput.val(), 10);
            let swipeCount = parseInt($swipeCountsInput.val(), 10);
            // console.log('clicked', startTicketCount, endTicketCount, swipeCount);
            if( (startTicketCount && endTicketCount && swipeCount) && (endTicketCount > startTicketCount) ){
                let ticketsMade = endTicketCount - startTicketCount;
                let ticketsPerSwipe = Math.floor(ticketsMade/swipeCount);
                $calcMsgWrap.html('You made a total of: ' + ticketsMade + ' this comes out to: ' + ticketsPerSwipe + ' per swipe.');
                // console.log(ticketsMade, ticketsMade/swipeCount);
                $('#submitStarToFinish').prop('disabled', false);
                let ticketStr = '';
                for (let index = 0; index < swipeCount; index++) {
                    ticketStr += ticketsPerSwipe+',';
                }
                ticketStr = ticketStr.slice(0, -1);
                $('#startToFinishTickets').val(ticketStr);
                // console.log(ticketStr);

            }
        });
    }
});