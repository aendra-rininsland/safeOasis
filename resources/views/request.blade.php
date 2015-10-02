@extends('layouts.master')

@section('title', 'Request A Kit | SleepSpace')

@section('content')
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2>Fill in the short form below to request a SleepSpace kit.</h2>
                <br /><br />
                
                <form action="/refuge/request-location" id="requestForm" method="post" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Location</label>
                            <input type="text" class="form-control" placeholder="Location" id="location" name="location_plaintext" required data-validation-required-message="Please enter your number">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone number</label>
                            <input type="text" class="form-control" placeholder="Phone Number" id="phone-number" name="contact_number" required data-validation-required-message="Please enter your number">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Number of women</label>
                            <input type="number" class="form-control" placeholder="Number of women in your group (optional)" id="num-women" name="num_women">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Number of children</label>
                            <input type="number" class="form-control" placeholder="Number of children in your group (optional)" id="num-children" name="num_children">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    {!! csrf_field() !!}
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <input type="submit" class="btn btn-default" value="Request SleepSpace Kit">
                        </div>
                    </div>
                </form>

            </div>
        </div>
 @stop