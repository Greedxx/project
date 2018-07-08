<!-- 信息提醒 stat-->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li style='font-size:16px;list-style:none'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
<div class="mws-form-message success">
    {{session('success')}}
</div>
@endif
@if(session('error'))
<div class="mws-form-message error">
    {{session('error')}}
</div>
@endif
@if(session('info'))
<div class="mws-form-message info">
    {{session('info')}}
</div>
@endif
<script src="/js/jquery.js"></script>
<script>
    // setTimeout(function(){
    //     $('.mws-form-message').remove();
    // },3000)
    $.session.remove('success');
    $.session.remove('error');
    $.session.remove('info');
    
    $('.mws-form-message').fadeOut(3000);
</script>
<!-- 信息提醒 end -->
