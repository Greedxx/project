
@extends('layout.homeuser')

@section('title',$title)

@section('content')
<div class="right_style">
    <!--消费记录样式-->
    <div class="user_address_style">
        <div class="title_style">
            <em>
            </em>
            修改密码
        </div>
        <!--用户信息样式-->
        <!--个人信息-->

        <div class="Personal_info" id="Personal">
          
            <ul class="xinxi">
            	  <form action="/home/gai" method="POST" >
                <li>
                    <label>
                        原密码：
                    </label>
                    <span>
                        <input name="old" type="password" value="" class="text" 
                        />

                        
                    </span>
                    <font color="red">@foreach ($errors->get('old') as $message) 
                                {{$message}}    
                            @endforeach
                            {{session('old')}}</font>	
                </li>
               
                <li>
                    <label>
                        新密码：
                    </label>
                    <span>
                        <input name="new" type="password" value="" class="text" 
                        />
                    </span>
                     <font color="red">@foreach ($errors->get('new') as $message) 
                                {{$message}}    
                            @endforeach</font>	
                </li>
               
                <li>
                    <label>
                        重复密码：
                    </label>
                    <span>
                        <input name="renew" type="password" value="" class="text" 
                        />
                    </span>
                     <font color="red">@foreach ($errors->get('renew') as $message) 
                                {{$message}}    
                            @endforeach</font>	
                </li>

                
                 <div class="bottom">
                     {{csrf_field()}}
                    <input name="" type="submit" value="确认修改" class="confirm" />
                </div>
            </form>
            </ul>
        </div>
       
    </div>
</div>
@endsection