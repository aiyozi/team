<form action="{{url('/friendship/update/'.$res->frie_id)}}" method="post" enctype="multipart/form-data">
@csrf
<table>
    <tr>
        <td>文章标题</td>
        <td><input type="text"name="frie_name" value="{{$res->frie_name}}"><font color="red">{{$errors->first("frie_name")}}</font></td>
        
    </tr>
    <tr>
        <td>文章分类</td>
        <td>
        <select name="cate_id" id="">
        <option value="">--请选择--</option>
        @foreach($cate as $v)
            <option value="{{$v->cate_id}}"{{$res->cate_id==$v->cate_id?"selected":""}}>{{$v->cate_name}}</option>
        @endforeach
        </select>
        </td>
    </tr>
    <tr>
        <td>文章重要性</td>
        <td>
        <input type="radio" name="is_show" value="1"{{$res->is_show==1?"checked":""}}>普通
        <input type="radio" name="is_show" value="2"{{$res->is_show==2?"checked":""}}>置顶
        </td>
    </tr>
    <tr>
        <td>是否显示</td>
        <td>
        <input type="radio" name="is_new" value="1"{{$res->is_new==1?"checked":""}}>显示
        <input type="radio" name="is_new" value="2"{{$res->is_new==2?"checked":""}}>不显示
        </td>
    </tr>
    <tr>
        <td>文章作者</td>
        <td>
            <input type="text"name="frie_names"value="{{$res->frie_names}}">
            <font color="red">{{$errors->first("frie_names")}}</font>
        </td>
    </tr>
    <tr>
        <td>作者邮箱</td>
        <td><input type="text"name="frie_email"value="{{$res->frie_email}}">
        <font color="red">{{$errors->first("frie_email")}}</font>
        </td>
    </tr>
    <tr>
        <td>关键字</td>
        <td>
            <input type="text"name="frie_guan"value="{{$res->frie_guan}}">
            <font color="red">{{$errors->first("frie_guan")}}</font>
        </td>
    </tr>
    <tr>
        <td>网页描述</td>
        <td>
        <textarea name="frie_desc" id="" cols="30" rows="10">{{$res->frie_desc}}</textarea>
        <font color="red">{{$errors->first("frie_desc")}}</font>
        </td>
    </tr>
    <tr>
        <td>上传文件</td>
        <td>
        <input type="file"name="frie_logo">
        </td>
    </tr>
    <tr>
        <td><input type="submit"value="修改"></td>
        <td></td>
    </tr>
</table>
</form>