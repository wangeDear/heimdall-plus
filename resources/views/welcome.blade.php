@extends('layouts.app')

@section('content')
    <div class="toggleinput" style="position: relative;left: 34rem;">
        <label class="name" id="switch_url_label">内网地址</label>
        <label class="switch">
            <input type="checkbox" id="www_switch" name="www_switch" value="1" checked="checked">
            <span class="slider round"></span>
        </label>
    </div>


    @include('partials.search')

    @if($apps->first())
        @include('sortable')        
    @else
    <div class="message-container2">
            <div class="alert alert-danger">
                    <p>{!! __('app.dash.no_apps', 
                        [
                            'link1' => '<a href="'.route('items.create', []).'">'.__('app.dash.link1').'</a>', 
                            'link2' => '<a id="pin-item" href="">'.__('app.dash.link2').'</a>'
                        ]) !!}</p>
                    </div>
                    
    </div>
        <div id="sortable">
        @include('add')
        </div>
    @endif


@endsection