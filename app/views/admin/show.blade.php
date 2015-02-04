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
                    <p class="lead">{{$cover->type}} - {{$cover->title}}</p>

                    <div class="clearfix">
                        {{ link_to_route('admin.create-content', '上传版面到该期刊', array('id' => $cover->id), array('class' => 'pull-left', 'style' => 'line-height: 34px')) }}

                        {{Form::open(array('route' => array('issues.destroy', $cover->id), 'class' => 'form-inline', 'method' => 'DELETE'))}}
                        {{Form::submit('删除', array('class' => 'text-danger btn btn-link pull-right', 'onClick' => 'javascript:if(!confirm("该操作会将其下所有版面全部删除，你确定删除吗？")) return false;'))}}
                        {{Form::close()}}
                    </div>
                    @if(!$cover->contents->count())
                        <p class="text-center lead text-danger">抱歉，没有找到相关的记录</p>
                    @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>标题</th>
                                    <th>创建日期</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($cover->contents as $content)
                                    <tr>
                                        <td>{{$content->id}}</td>
                                        <td>{{$content->title}}</td>
                                        <td>{{$content->created_at}}</td>
                                        <td>{{ link_to_route('admin.show', '删除', array('id' => $content->id)) }} | {{ link_to_asset($content->thumbnail, '预览版面', array('class' => 'fancybox-media')) }} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="divide20"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop