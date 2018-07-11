@extends('layout.homeuser')

@section('title',$title)

@section('content')
<div class="right_style">
    <!--消费记录样式-->
    <div class="user_address_style">
        <div class="title_style">
            <em>
            </em>
            用户信息
        </div>
        <!--用户信息样式-->
        <!--个人信息-->

        <div class="Personal_info" id="Personal">
          
            <ul class="xinxi">
            	  <form action="/home/users/{{$res->id}}" method="POST" enctype='multipart/form-data'>
                <li>
                    <label>
                        用户名：
                    </label>
                    <span>
                        <input name="username" type="text" value="{{$res->username}}" class="text" 
                        />
                    </span>
                </li>
               
                
                <li>
                    <label>
                        用户性别：
                    </label>
                    <span class="sex">
                       <input type="radio" name="sex" value="0"  @if($res->sex == '0') checked='checked' @endif >
                        男&nbsp;&nbsp;
                        <input type="radio" name="sex" value="1" @if($res->sex == '1') checked='checked' @endif >
                        女&nbsp;&nbsp;
                    </span>
                   
                </li>
                <li>
                    <label>
                        电子邮箱：
                    </label>
                    <span>
                        <input name="email" type="text" value="{{$res->email}}" class="text" 
                        />
                    </span>
                </li>
               
                <li>
                    <label>
                        移动电话：
                    </label>
                    <span>
                        <input name="phone" type="text" value="{{$res->phone}}" class="text" 
                        />
                    </span>
                </li>

                <li>
                    <label>
                        头像:
                    </label>
                    <span>
                        <input name="profile" type="file" value="" class="text"/>
                    </span>
                </li>
                 <div class="bottom">
                     {{csrf_field()}}

                     {{method_field('PUT')}}
                    <input name="" type="submit" value="确认修改" class="confirm" />
                </div>
            </form>
            </ul>
        </div>
       
    </div>
</div>
@endsection