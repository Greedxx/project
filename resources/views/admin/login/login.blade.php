<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>后台登陆</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""
	/>
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="/login/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="/login/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	

	<link rel="stylesheet" type="text/css" href="/login/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/login/css/default.css">
	<link rel="stylesheet" type="text/css" href="/login/css/set2.css" />
	

	<!-- //web-fonts -->
</head>
<script language="javascript"> //JavaScript脚本标注
</script>
<body>
	<!-- bg effect -->
	<div id="bg">
		<canvas></canvas>
		<canvas></canvas>
		<canvas></canvas>
	</div>
	<!-- //bg effect -->
	<!-- title -->
	<h1>后台登陆</h1> <br>
	 		
	 	<h1>@if(session('error'))
                <div class="mws-form-message warning">
                    {{session('error')}}
                </div>
            @endif</h1>	
	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
		
		<form action="/admin/dologin" method="post">
			<h2>仙<(￣︶￣)>女
				<i class="fas fa-level-down-alt"></i>
			</h2>
				
			<!-- <div class="form-style-agile"> -->
			<br>
			<br>
		
			<span class="input input--shoko">
					<input class="input__field input__field--shoko" type="text"  name="vname" />
					<label class="input__label input__label--shoko" for="input-4">
						<span class="input__label-content input__label-content--shoko">账号</span>
					</label>
					<svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
						<path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
<!-- 				<label>
					<i class="fas fa-user"></i>
					Username
				</label>
				<input placeholder="Username" name="Name" type="text" required=""> -->
			<!-- </div> -->
			<span class="input input--shoko">
					<input class="input__field input__field--shoko" type="password"  name="password"  />
					<label class="input__label input__label--shoko" for="input-4">
						<span class="input__label-content input__label-content--shoko">密码</span>
					</label>
					<svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
						<path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>


				<span class="input input--shoko">
					<input class="input__field input__field--shoko" type="text"  name="code" />
					

					<label class="input__label input__label--shoko" for="input-4">
						<span class="input__label-content input__label-content--shoko">验证码</span>
						
					</label>
					
					<svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
						<path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
				<span class="input input--shoko">
				<div class="pull-right ">
						<img class="thumbnail captcha" src="/admin/captcha" onclick="this.src='/admin/captcha/?'+Math.random()" title="点击图片重新获取验证码" >
					</div>
				</span>
				
			<!-- <div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					Password
				</label>
				<input placeholder="Password" name="Password" type="password" required="">
			</div> -->
			<!-- checkbox -->
			
			<!-- //checkbox -->

			{{csrf_field()}}
			<input type="submit" value="gogogo">
		</form>
	</div>
	<!-- //content -->


	

	<!-- Jquery -->
	<script src="/login/js/jquery-3.3.1.min.js"></script>
	<!-- //Jquery -->
    
    <!-- jQuery-UI Dependent Scripts -->
   
	<!-- effect js -->
	<script src="/login/js/canva_moving_effect.js"></script>
	<!-- //effect js -->
	<script src="/login/js/classie.js"></script>
	<script>
		(function() {
			// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
			if (!String.prototype.trim) {
				(function() {
					// Make sure we trim BOM and NBSP
					var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
					String.prototype.trim = function() {
						return this.replace(rtrim, '');
					};
				})();
			}

			[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
				// in case the input is already filled..
				if( inputEl.value.trim() !== '' ) {
					classie.add( inputEl.parentNode, 'input--filled' );
				}

				// events:
				inputEl.addEventListener( 'focus', onInputFocus );
				inputEl.addEventListener( 'blur', onInputBlur );
			} );

			function onInputFocus( ev ) {
				classie.add( ev.target.parentNode, 'input--filled' );
			}

			function onInputBlur( ev ) {
				if( ev.target.value.trim() === '' ) {
					classie.remove( ev.target.parentNode, 'input--filled' );
				}
			}
		})();
	</script>
	
</body>

</html>