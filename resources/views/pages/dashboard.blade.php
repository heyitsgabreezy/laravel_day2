@extends('layouts.app')

@section('content')
    <x-page-header pagetitle="Dashboard">
    </x-page-header>

    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="row mb-4">
                <div class="col-4">
                    <x-widget class="bg-info" description="No. of successfully sent emails">
                        <x-slot name="icon">
                            <i class="fa fa-check-circle fa-3x"></i>
                        </x-slot>

                        <x-slot name="number">
                            <h1 class="font-bold">127</h1>
                        </x-slot>

                        <x-slot name="label">
                            <p>Successfull</p>
                        </x-slot>
                    </x-widget>
                </div>

                <div class="col-4">
                    <x-widget class="bg-danger" description="No. of deleted emails">
                        <x-slot name="icon">
                            <i class="fa fa-trash fa-3x"></i>
                        </x-slot>

                        <x-slot name="number">
                            <h1 class="font-bold">0</h1>
                        </x-slot>

                        <x-slot name="label">
                            <p>Deleted</p>
                        </x-slot>
                    </x-widget>
                </div>

                <div class="col-4">
                    <x-widget class="bg-warning" description="No. of returned emails">
                        <x-slot name="icon">
                            <i class="fa fa-reply fa-3x"></i>
                        </x-slot>

                        <x-slot name="number">
                            <h1 class="font-bold">1</h1>
                        </x-slot>

                        <x-slot name="label">
                            <p>Returned</p>
                        </x-slot>
                    </x-widget>
                </div>
            </div>

            <x-box>
                <x-slot name="title">   
                    <h3>Summary</h3>
                </x-slot>
                <x-slot name="content">   
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam beatae nemo magnam, accusamus reprehenderit temporibus, odit officia nobis soluta dolores nihil vero! Repellat tenetur odit consequatur explicabo, aliquam excepturi in!</p>
                </x-slot>
                <x-slot name="footer">   
                    <button class="btn btn-primary">Save</button>
                </x-slot>
            </x-box>
        </div>
    </div>
@endsection