@extends('layouts.web')

@section('content')

{{-- Feature --}}
@livewire('web.home.feature-content')

{{-- Menu --}}
@livewire('web.home.menu-content')


<!-- Blog section -->
@livewire('web.home.blog-content')

<!-- CTA Section -->
@livewire('web.home.cta-content')
@endsection
