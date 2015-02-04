@extends('layouts.default')
@section('content')
    <div class="light-wrapper">
        <div class="container inner">
            <h1 class="intro text-center">歡迎來到財富世界！</h1>

            <p class="lead main text-left" style="text-indent: 2em">國際商會聯合報是香港國際商會聯合體主辦並發行的一份以商會動態、財經資訊、文化藝術等內容為主的報紙，其支持單位有國際商會聯合報社、世界商貿交友報社、世界品牌戰略委員會、世界華人華商華僑華裔聯合總會等。香港國際商會聯合體於2001年經香港特區政府批准註冊，並於2002年正式成立。目前本商會在全世界58個國家和地區設有代表處。</p>

            <h3 class="section-title">國際商會聯合報</h3>

            <div class="owl-gallery">
                @foreach($magazines as $magazine)
                    <div class="item">
                        <figure>
                            <a href="{{ route('issues.show', array('id' => $magazine->id)) }}">
                                <div class="text-overlay">
                                    <div class="info"><span>{{ $magazine->title }}</span></div>
                                </div>
                                <img src="{{ asset($magazine->thumbnail) }}" alt=""/>
                            </a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="divide20"></div>
            <div class="text-center">
                {{ $magazines->links() }}
            </div>
            {{--<h3 class="section-title text-center">Let's make something great together</h3>--}}

            {{--<div class="text-center"><a href="#" class="btn btn-large fixed-width">查看更多報刊</a> <a href="#"--}}
            {{--class="btn btn-large btn-maroon fixed-width">訂閱報刊</a>--}}
        </div>
    </div>
    </div>
@stop