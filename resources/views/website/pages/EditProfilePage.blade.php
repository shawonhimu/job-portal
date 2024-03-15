@extends('website.layout.app')

@section('title', 'Job Pulse || About Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')

    @include('website.components.candidate-logged.EditProfile')

    {{-- Footer --}}
    @include('website.components.Footer')
    {{-- Education modals --}}
    @include('website.components.modals.Education.AddEducationModal')
    @include('website.components.modals.Education.DeleteEducationModal')
    @include('website.components.modals.Education.EditEducationModal')
    {{-- Experience modals --}}
    @include('website.components.modals.Experience.AddExperienceModal')
    @include('website.components.modals.Experience.DeleteExperienceModal')
    @include('website.components.modals.Experience.EditExperienceModal')
    {{-- Training modals --}}
    @include('website.components.modals.Training.AddTrainingModal')
    @include('website.components.modals.Training.DeleteTrainingModal')
    @include('website.components.modals.Training.EditTrainingModal')

@endsection

@section('script')
    <script src="{{ asset('js/profilePersonalData.js') }}"></script>
    <script src="{{ asset('js/profileEducation.js') }}"></script>
    <script src="{{ asset('js/profileExperience.js') }}"></script>
    <script src="{{ asset('js/profileTraining.js') }}"></script>
@endsection
