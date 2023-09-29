<div>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{$allKeysProvider['contests']}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            @if($updateMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['edit']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                            @elseif($formMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['add']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                            @elseif($viewMode)
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['view_blog']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                                </div>
                            </div>
                            @else
                            <h4 class="card-title mb-0 flex-grow-1">{{$allKeysProvider['list']}}</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <button wire:click.prevent="create" type="button" class="btn btn-success add-btn"><i class="ri-add-line"></i> {{$allKeysProvider['add']}}</button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            @if ($formMode)
                            @include('livewire.admin.trading-contest.form', ['languageId' => $languageId])
                            @elseif($viewMode)
                            @livewire('admin.trading-contest.show', ['contest_id' => $contest_id])
                            @else
                            <div class="listjs-table" id="customerList">

                                <!-- tabs-->
                                <div class="row">
                                    <div class="col-md-8 getlanguage">
                                        @if($languagedata->count()>0)
                                        @foreach($languagedata as $language)
                                        <li wire:click="switchTab({{$language->id}})" class="btn {{ $activeTab === $language->id ? 'active' : '' }}" data-lang="{{$language->id}}">
                                            {{ __('cruds.' . $language->name) }}
                                        </li>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- show and search -->
                                <div class="row pt-4">
                                    <div class="col-md-8">
                                        <label>{{__('cruds.show')}}
                                            <select wire:change="updatePaginationLength($event.target.value)">
                                                @foreach(config('constants.datatable_paginations') as $length)
                                                <option value="{{ $length }}">{{ $length }}</option>
                                                @endforeach
                                            </select>
                                            {{__('cruds.entries')}}</label>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control" placeholder="{{$allKeysProvider['search']}}" wire:model.live="search">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- eng tab start-->
                                <div class="table-responsive mt-3 my-team-details table-record">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ $allKeysProvider['sno'] }}</th>
                                                <th>{{$allKeysProvider['title']}}</th>
                                                <th>{{$allKeysProvider['start_date']}}</th>
                                                <th>{{$allKeysProvider['end_date']}}</th>
                                                <th>{{ $allKeysProvider['status'] }}</th>
                                                <th>{{ $allKeysProvider['createdat'] }}
                                                    <span wire:click="sortBy('created_at')" class="float-right text-sm" style="cursor: pointer;">
                                                        <i class="ri-arrow-up-line {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                        <i class="ri-arrow-down-line {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                                    </span>
                                                </th>
                                                <th> {{ $allKeysProvider['action'] }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($allContest->count() > 0)
                                            @foreach($allContest as $contest)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($contest->title)}}</td>
                                                <td>{{ $contest->start_date_time}}</td>
                                                <td>{{ $contest->end_date_time}}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input wire:click.prevent="toggle({{ $contest->id }},{{$loop->iteration}})" id="switch-input-{{$activeTab}}-{{$loop->iteration}}" class="switch-input" type="checkbox" {{ $contest->status == 1 ? 'checked' : '' }} />
                                                        <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                                <td>{{ convertDateTimeFormat($contest->created_at,'date') }}</td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="view">
                                                            <button type="button" wire:click="show({{$contest->id}})" class="btn btn-sm btn-primary view-item-btn" title="View Contest"><i class="ri-eye-fill"></i></button>
                                                        </div>

                                                        <div class="edit">
                                                            <button type="button" wire:click="edit({{$contest->id}})" class="btn btn-sm btn-success edit-item-btn" title="Edit Contest"><i class="ri-edit-box-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <button type="button" wire:click.prevent="delete({{$contest->id}})" class="btn btn-sm btn-danger remove-item-btn" title="Delete Contest"><i class="ri-delete-bin-line"></i></button>
                                                        </div>

                                                        <div class="remove">
                                                            <a type="button" href="{{ route('auth.contest-rules', $contest->id) }}" class="btn btn-sm btn-primary remove-item-btn" title="Add Rules"><i class="ri-pencil-line"></i></a>
                                                        </div>

                                                        <div class="remove">
                                                            <a type="button" href="{{ route('auth.contest-contestants', $contest->id) }}" class="btn btn-sm btn-success remove-item-btn" title="View Contestants"><i class="ri-group-fill"></i></a>
                                                        </div>

                                                        <div class="remove">
                                                            <a type="button" href="{{ route('auth.contest-winner-places', $contest->id) }}" class="btn btn-sm btn-primary remove-item-btn" title="Add Winner Places"><i class="ri-numbers-line"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="6">{{ __('messages.no_record_found')}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $allContest->links('vendor.pagination.bootstrap-5') }}
                                <!-- eng tab end -->
                            </div>
                            @endif
                        </div>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">




<!-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/date-time-picker/css/date-time-picker.css') }}" /> -->
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>





<!-- <script type="text/javascript" src="{{ asset('admin/plugins/moment-with-locales.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/date-time-picker/js/date-time-picker.js') }}"></script> -->

<script type="text/javascript">
    document.addEventListener('changeToggleStatus', function(event) {
        var status = event.detail[0]['status'];
        var alertIndex = event.detail[0]['index'];
        var activeTab = event.detail[0]['activeTab'];

        $("#switch-input-" + activeTab + "-" + alertIndex).prop("checked", status);
    });


    document.addEventListener('loadPlugins', function(event) {
        $(document).ready(function() {

            // $.datetimepicker.setDateFormatter('moment');
            // $('.from_date').datetimepicker({
            //     format: 'DD-MMM-YYYY hh:mm A',
            //     formatTime: 'hh:mm A',
            //     formatDate: 'YYYY-MM-DD',
            //     minDate: 0,
            //     // disabledDates: disableDates,
            //     step: 5,
            //     // value: frmDate,
            //     // closeOnWithoutClick: false,
            //     // roundTime: 'ceil',
            //     minTime: 0,
            //     yearStart: new Date().getFullYear(),
            //     maxTime: moment.utc('06:00 PM', 'hh:mm A').add(1, 'minutes').format('hh:mm A'),
            //     onChange: function(selectedDates, dateStr, instance) {
            //         @this.set('start_date_time', dateStr);
            //     },
            //     // onSelectDate: function(selectedDate) {
            //     //     setFromDateChange(selectedDate, 'date');
            //     // },
            //     // onSelectTime: function(selectedDate) {
            //     //     setFromDateChange(selectedDate, 'time');
            //     // },
            //     // onShow: function() {
            //     //     var selectedDate = '';
            //     //     setFromDateChange(selectedDate, 'show');
            //     // },
            //     // onChangeMonth: function(date) {
            //     //     changeMonthYearHidePicker(date, '.from_date');
            //     // },

            //     // onChangeYear: function(date) {
            //     //     changeMonthYearHidePicker(date, '.from_date');
            //     // },
            // });










            // $(function() {
            //     alert($('.datetimepicker').datetimepicker())
            //     $('.datetimepicker').datetimepicker();
            // });
            // alert('loadPlugins')

            // console.log('timezone', "{{ config('constants.country_timezone')[$activeTab] }}");
            // var userLocale = navigator.language || navigator.userLanguage;

            // var getLanguageDiv = document.getElementsByClassName('.getlanguage');
            // var activeElement = getLanguageDiv.querySelector('.active[data-lang]');
            // console.log(getLanguageDiv, activeElement);


            // if (activeElement) {
            //     var dataLangValue = activeElement.getAttribute('data-lang');
            //     console.log('data-lang value:', dataLangValue);
            // }

            // document.addEventListener('changelangStatus', function(event) {
            //     // alert('changelangStatus')
            //     var activeTab = event.detail[0]['activeTab'];
            // });

            // console.log('timezone', "{{ config('constants.country_timezone')[$activeTab] }}");


            // $.datetimepicker.setDateFormatter('moment');
            // $(function() {
            //     // const date = new Date();
            //     // const utcDate = date.toUTCString();
            //     // var $j = jQuery.noConflict();
            //     // $j("#datepicker").datepicker();
            //     // Initialize datepicker
            //     $(".from_date").datetimepicker({
            //         dateFormat: "Y-m-d H:i:S",
            //         onSelect: function(dateText, inst) {
            //             console.log(dateText);
            //             // Get selected date and time zone
            //             var selectedDate = new Date(dateText);
            //             var selectedTimeZone = "UTC";

            //             // Create a moment.js object with the selected date and time zone
            //             var momentDate = moment.tz(selectedDate, selectedTimeZone);

            //             // Display the selected date and time zone in the input field
            //             $("#datepicker").val(momentDate.format("Y-m-d H:i:S"));
            //         }
            //     });
            // });











            const date = new Date();
            const utcDate = date.toUTCString();
            // var utc = moment.tz("2023-09-29 03:10", "UTC");
            console.log('date', date);
            console.log('utcDate', utcDate);

            flatpickr("#startDateTime", {
                enableTime: true,
                minDate: utcDate,
                dateFormat: "Y-m-d H:i:S",
                minTime: utcDate,
                utc: true,
                onChange: function(selectedDates, dateStr, instance) {
                    @this.set('start_date_time', dateStr);
                }
            });

            flatpickr("#endDateTime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                utc: true,
                // dateFormat: "Z",
                minDate: utcDate,
                onChange: function(selectedDates, dateStr, instance) {
                    @this.set('end_date_time', dateStr);
                }
            });

        });
    });


    // utc: true,
    // minDate: '2023-09-29 06:48',
    // dateFormat: "Z",
    // time_24hr: true,
    // defaultDate: utcDate,
    // defaultDate: "2023-09-29 11:00",
    // minDate: utcDate,
    // altInput: true,


    // flatpickr("#datetimepicker").setDate(new Date(2023, 9, 30));
    // flatpickr("#datetimepicker").setHours(10);

    // const picker = flatpickr('#startDateTime');
    // Set the current UTC time in the flatpicker calendar
    // console.log(picker, picker.setDate(new Date()));

    // document.getElementById('startDateTime').value = utcDate;

    // dateFormat: "Z",
    // dateFormat: "Y-m-d H:i:S",
    // time_24hr: false,
    // minDate: "today",
    // minDate: new Date(),
    // minDate: Date.now(),
    // timeZone: "{{ config('constants.country_timezone')[$activeTab] }}", // Set timezone
</script>

@endpush