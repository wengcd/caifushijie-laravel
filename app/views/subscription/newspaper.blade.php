@extends('layouts.default')

@section('content')

    <div class="light-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="section-title">即可订阅</h3>

                    <p>每当有新的报刊杂志发表，我们将把它推送到您的邮箱。以便你能即时的阅读到我们的内容。</p>

                    <div class="divide20"></div>
                    <div class="form-container">
                        @if (Session::has('error'))
                            <div class="alert alert-success alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span
                                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span
                                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                {{ Session::get('success') }}
                            </div>
                        @endif
                        {{ Form::open(array('route' => 'subscription.subscribe', 'method' => 'POST', 'class' => '')) }}
                        {{ Form::hidden('type', '杂志') }}
                        <div class="input-group input-group-lg">
                            <input type="text" name="email" class="form-control" placeholder="输入您的邮箱地址">
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">订阅</button>
                                </span>
                        </div>
                        <!-- /input-group -->
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dark-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="section-title">随机推荐</h3>

                    <div class="owl-gallery">
                        @foreach($newspapers as $newspaper)
                            <div class="item">
                                <figure>
                                    <a href="{{ route('issues.show', array('id' => $newspaper->id)) }}">
                                        <div class="text-overlay">
                                            <div class="info"><span>{{ $newspaper->title }}</span></div>
                                        </div>
                                        <img src="{{ asset($newspaper->thumbnail) }}" alt=""/>
                                    </a>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                    <div class="divide20"></div>
                </div>
            </div>
        </div>
    </div>
@stop