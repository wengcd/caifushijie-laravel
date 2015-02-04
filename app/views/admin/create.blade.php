@extends('layouts.default')
@section('content')

    <div class="light-wrapper">
        <div class="container inner tp40 bp0">
            <div class="tp-banner-container">
                <div class="tp-banne">
                    {{ Form::open(array('route' => 'admin.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">期刊标题</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="输入期刊标题，比如：第4期 2014/5/14"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">期刊类型</label>

                        <div class="col-sm-10">
                            <select id="type" name="type" class="form-control" required>
                                <option value="">请选择期刊类型</option>
                                <option value="报刊">报刊</option>
                                <option value="杂志">杂志</option>
                            </select></div>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail" class="col-sm-2 control-label">杂志封面</label>

                        <div class="col-sm-10">
                            <input type="file" id="thumbnail" name="thumbnail" required onchange="PreviewImage();"
                                   accept="image/*,capture=camera"/>

                            <p class="help-block">请选择杂志封面的缩略图并上传</p>
                            <img id="uploadPreview" style="max-width: 100%"/>
                            <script type="text/javascript">

                                function PreviewImage() {
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("thumbnail").files[0]);

                                    oFReader.onload = function (oFREvent) {
                                        document.getElementById("uploadPreview").src = oFREvent.target.result;
                                    };
                                }
                                ;

                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">简介</label>

                        <div class="col-sm-10">
            <textarea name="description" id="description" class="form-control" placeholder="给该期刊添加一句简单描述或介绍"
                      required></textarea>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-10 col-sm-offset-2">
                            {{ Form::submit('添加', array('class' => 'btn btn-success')) }}
                        </div>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@stop