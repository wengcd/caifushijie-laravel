@extends('layouts.default')
@section('content')
    <div class="light-wrapper">
        <div class="container inner">
            <h3 class="section-title">
                @if($issue->type == '报刊')
                    國際商會聯合報
                @elseif($issue->type == '杂志')
                    财富世界杂志
                @endif
                {{ $issue->title }}
                - 版面浏览
            </h3>

            <div class="owl-gallery">
                @foreach($issue->contents as $content)
                    <div class="item">
                        <figure>
                            <a href="{{ route('pages.show', array('id' => $content->id)) }}">
                                <div class="text-overlay">
                                    <div class="info"><span>{{ $content->title }}</span></div>
                                </div>
                                <img src="{{ asset($content->thumbnail) }}" alt=""/>
                            </a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="divide20"></div>
            <h3 class="section-title text-center">Let's make something great together</h3>

            <div class="text-center"><a href="#" class="btn btn-large fixed-width">查看更多報刊</a> <a
                        href="#"
                        class="btn btn-large btn-maroon fixed-width">訂閱報刊</a>
            </div>
        </div>
    </div>
@stop