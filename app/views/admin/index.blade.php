@extends('layouts.default')
@section('content')

    <div class="light-wrapper">
        <div class="container inner tp40 bp0">
            <div class="tp-banner-container">
                <div class="tp-banne">
                    @if (Session::has('message'))
                        <div class="alert alert-info" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (Session::has('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('warning') }}
                        </div>
                    @endif

                    <p class="text-center">{{ link_to_route('admin.create', '添加杂志/报刊') }}</p>
                    @if(!$covers->count())
                        <p class="text-center lead text-danger">抱歉，没有找到相关的记录</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>类型</th>
                                    <th>标题</th>
                                    <th>创建日期</th>
                                    <th>版面数</th>
                                    <th>操作</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($covers as $issue)
                                <tr>
                                    <td>{{$issue->id}}</td>
                                    <td>{{$issue->type}}</td>
                                    <td>{{$issue->title}}</td>
                                    <td>{{$issue->created_at}}</td>
                                    <td>{{count($issue->contents)}}</td>
                                    <td>{{ link_to_route('admin.show', '编辑', array('id' => $issue->id)) }} | {{ link_to_asset($issue->thumbnail, '预览封面', array('class' => 'fancybox-media')) }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $covers->links() }}
                    @endif
                </div>
            </div>

        </div>

    </div>
@stop