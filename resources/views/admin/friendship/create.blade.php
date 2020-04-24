<form action="{{url('/friendship/store')}}" method="post" enctype="multipart/form-data">
@csrf
<table>
    <tr>
        <td>文章标题</td>
        <td><input type="text"name="frie_name"><font color="red">{{$errors->first("frie_name")}}</font></td>
        
    </tr>
    <tr>
        <td>文章分类</td>
        <td>
        <select name="cate_id" id="">
        <option value="">--请选择--</option>
        @foreach($res as $v)
            <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
        @endforeach
        </select>
        </td>
    </tr>
    <tr>
        <td>文章重要性</td>
        <td>
        <input type="radio" name="is_show" value="1">普通
        <input type="radio" name="is_show" value="2">置顶
        </td>
    </tr>
    <tr>
        <td>是否显示</td>
        <td>
        <input type="radio" name="is_new" value="1">显示
        <input type="radio" name="is_new" value="2">不显示
        </td>
    </tr>
    <tr>
        <td>文章作者</td>
        <td>
            <input type="text"name="frie_names">
            <font color="red">{{$errors->first("frie_names")}}</font>
        </td>
    </tr>
    <tr>
        <td>作者邮箱</td>
        <td><input type="text"name="frie_email">
        <font color="red">{{$errors->first("frie_email")}}</font>
        </td>
    </tr>
    <tr>
        <td>关键字</td>
        <td>
            <input type="text"name="frie_guan">
            <font color="red">{{$errors->first("frie_guan")}}</font>
        </td>
    </tr>
    <tr>
        <td>网页描述</td>
        <td>
        <textarea name="frie_desc" id="" cols="30" rows="10"></textarea>
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
        <td><input type="submit"value="上传"></td>
        <td></td>
    </tr>
</table>
</form>