<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylestudentlogin.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="img/ImageHandler (1).png">

    <title>Student Login</title>

   </head>
<body>
    <section>
        <nav>
            <a href:="/"><img src="https://www.gu.edu.eg/wp-content/uploads/2022/06/GU-Logo-Color-Original.png"   alt=""></a>
        <div class="nav-links" id="navLink">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/">SUPPORT</a></li>
            </ul>
        </div>
       </nav>

    </section>
    <form method="post" action="login.php">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                <a for="" class="close-btn1 fa fa-close" src="./img/ImageHandler (1).png"></a>
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <header>Student Login</header>
                    <div class="input-field">
                        <input type="text" class="input" id="username" name="email" autocomplete="off">
                        <label for="username">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input" id="password" name="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="remeber-forget">
                        <label><input type="checkbox">Remember me</label>
                    </div>
                    <div class="signin">
                        <span>Forgot password? <a href="forgotPasswordStudent.html"></a></span>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Login" name="login_button">
                        <div class="login-register"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


    
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>