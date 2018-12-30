@extends('layouts.master')

@section('content')
<div id="nenga">
    <div class="nenga-container">
        <div class="nenga-image-container">
            <img src="{{ asset('img/nenga_example.png') }}" alt="" class="nenga-image">
        </div>
        <div class="sp-only">
            <div class="nenga-create-button-container">
                <button id="nenga-create-button" class="btn btn-nenga">作成</button>
            </div>
        </div>
        <div class="pc-only nenga-form-container">
            @include('nenga.form')
        </div>
    </div>
    <div id="nenga-form-modal-container" class="d-none nenga-form-modal-container">
        <div class="nenga-form-modal">
            <div class="nenga-form-modal-close-button-container">
                <button><i id="nenga-form-modal-close-button" class="nenga-form-modal-close-button fa fa-times"></i></button>
            </div>
            <div class="nenga-form-modal-form-container">
                @include('nenga.form')
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function() {
        (function() {
            var $modalContainer = $('#nenga-form-modal-container')
            $('#nenga-create-button').click(function() {
                $modalContainer.removeClass('d-none').addClass('d-block')
            })
            $('#nenga-form-modal-close-button').click(function() {
                $modalContainer.removeClass('d-block').addClass('d-none')
            })
        }) ();
    })
</script>
@endsection