@extends('layouts.dashboard')
@section('title')
    {{'who am i?'}}
@endsection
@section('content')
    <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
               aria-controls="pills-home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
               aria-controls="pills-profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
               aria-controls="pills-contact" aria-selected="false">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
               aria-controls="pills-profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
               aria-controls="pills-contact" aria-selected="false">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
               aria-controls="pills-contact" aria-selected="false">Contact</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            core value
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            tab2
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            tab3
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            tab3
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            tab3
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            tab3
        </div>
    </div>

@endsection