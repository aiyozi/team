<meta name="csrf-token" content="{{ csrf_token() }}">
<form action="{{url('/login/store')}}"method="post">
@csrf
    <table>
        <tr>
            <td>账号</td>
            <td><input type="text"name="user_name" id="aa">
            <span id="ac"></span>
            </td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password"name="user_pwd"></td>
        </tr>
        <tr>
            <td><input type="submit"value="登录"></td>
            <td></td>
        </tr>
    </table>
</form>
<script src="/static/jquery.js"></script>
<script>
$(document).on("blur","#aa",function(){
    var _this=$(this);
    var user_name=_this.val();
    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr("content")}
    })
    $.ajax({
        url:"{{url('login/ajax')}}",
        data:{user_name:user_name},
        type:"post",
        success:function(res){
            if(res==="no"){
                $("#ac").html("该账号已有");
            }else{
                $("#ac").html("对");
            }
        }
    })
})
</script>