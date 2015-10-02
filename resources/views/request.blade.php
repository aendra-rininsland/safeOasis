@extends('layouts.master')

@section('title', 'Request A Kit | SleepSpace')

@section('content')
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Fill in the short form below to request a SleepSpace kit.</p>
                
                <form name="/refuge/request-starterpack" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone number</label>
                            <input type="text" class="form-control" placeholder="Phone Number" id="phone-number" name="phone-number" required data-validation-required-message="Please enter your number">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Number of women in your group <i>(optional)</i></label>
                            <input type="number" class="form-control" placeholder="Number of women" id="num-women" name="num-women">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Number of childrenin your group <i>(optional)</i></label>
                            <input type="number" class="form-control" placeholder="Number of children" id="num-children" name="num-children">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
 @stop