<form>
文章名称:   <input type="text"name="frie_name" value="{{$frie_name}}">  
<button>搜索</button>
</form>
<table border="1">
    <tr>
        <td>id</td>
        <td>文章名称</td>
        <td>分类名称</td>
        <td>是否显示</td>
        <td>文章重要性</td>
        <td>文章作者</td>
        <td>作者email</td>
        <td>关键字</td>
        <td>网页描述</td>
        <td>上传文件</td>
        <td>操作</td>
    </tr>
    @foreach($res as $v)
    <tr>
        <td>{{$v->frie_id}}</td>
        <td>{{$v->frie_name}}</td>
        <td>{{$v->cate_name}}</td>
        <td>{{$v->is_new}}</td>
        <td>{{$v->is_show}}</td>
        <td>{{$v->frie_names}}</td>
        <td>{{$v->frie_email}}</td>
        <td>{{$v->frie_guan}}</td>
        <td>{{$v->frie_desc}}</td>
        <td>@if($v->frie_logo)<img src="{{env('UPLOADS_URL')}}{{$v->frie_logo}}" width="20">@endif</td>
        <td>
        <a href="{{url('/friendship/edit/'.$v->frie_id)}}"id="aa">删除</a>
        <a href="{{url('/friendship/show/'.$v->frie_id)}}">修改</a>
        </td>
    </tr>
    @endforeach
    
		{{ $res->appends(['frie_name' =>$frie_name])->links() }}
		
</table>
<script src="/static/jquery.js"></script>
<script>
$(document).on("click","#aa",function(){
    var _this=$(this);
    var url=_this.attr("href");
    if(window.confirm("是否删除"))
    $.get(url,function(res){
        _this.parents("tr").remove();
    })
    return false;
})
</script>