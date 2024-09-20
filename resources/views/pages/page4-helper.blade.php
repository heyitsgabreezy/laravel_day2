@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Page Four Helper">
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="">
            @php
                $salary = 10000.125;
            @endphp

            <p>{{ Number::format($salary) }}</p>
            <p>{{ Number::format($salary, precision:2) }}</p>
            <p>{{ Number::format($salary, maxPrecision:2) }}</p>
            <p>{{ Number::ordinal(21) }} Century</p>
            <p>{{ Number::percentage(21) }}</p>
            <p>{{ Number::spell(21) }}</p>

            @php
                $firstName = "Gabriel";
                $middleName = "M.";
                $lastName = "Felipe";
                $suffix = "Sr.";
            @endphp

            <p>
                Full Name: {{ format_fullname($firstName, $middleName, $lastName, $suffix, true, true) }}
            </p>

            @php
                $date1 = "2024-09-17";
                $date2 = "2024-09-15";
            @endphp

            <p>
                {{ compare_dates($date1, $date2) }}
            </p>

            @php
                $date = "2024-09-17";
            @endphp
            
            <p>
                {{ format_report_date($date, 1) }}
            </p>
            <p>
                {{ format_report_date($date, 2) }}
            </p>
            <p>
                {{ format_report_date($date, 3) }}
            </p>
            <p>
                {{ format_report_date($date, 4) }}
            </p>
        </div>
    </div>
@endsection