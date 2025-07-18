@extends('layouts.app')

@section('title', 'Demo')

@section('content')
    <div class="p-10">
        <div class="mx-auto max-w-6xl">
            <livewire:blog-table/>
        </div>
    </div>
@endsection
