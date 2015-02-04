@extends('layouts.default')

@section('content')

    <div class="light-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="section-title">
                        @if($cover['type'] == '报刊')
                            國際商會聯合報
                        @elseif($cover['type'] == '杂志')
                            财富世界杂志
                        @endif
                        {{ $cover['title'] }}
                    </h3>
                    <div class="flex-container">
                        {{ HTML::image($cover['thumbnail']) }}
                        <p class="text-center">
                            <a class="btn btn-default" href="{{ route('issues.show', array('id' => $cover['id']), '即刻阅读') }}"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop