<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

		<script>
          $(function() {
            $('#addEntry').on('click', function() {
              var username = $('#username').val();
              var email = $('#email').val();
              var homepage = $('#homepage').val();
              var text = $('#text').val();
              var tags = $('#tags').val();
			  var captcha = $('#captcha').val();

			  if (
				username == null || username == "",
				email == null || email == "",
				text == null || text == "",
				captcha == null || captcha == "") {
			    alert("Please Fill All Required Field");
                return false;
			  }

              $.ajax({
                type: 'POST',
                url: '{{ route('entry.store') }}',
                data: {username:username, email:email, homepage:homepage, text:text, tags:tags, captcha:captcha},
			    headers: {
			      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			    },
                success: function(data) {
                  window.location.href = 'http://teamlead.test/entry';
                },
                error: function(data) {
					alert(JSON.stringify(data.responseJSON.error));
                }
              });
            });
          });
		</script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Add entry
                </div>

                <div class="links">
					<form name="form">
                    	<input type="text" id="username" placeholder="Username*" /><br/><br/>
                    	<input type="email" id="email" placeholder="Email*" /><br/><br/>
                    	<input type="text" id="homepage" placeholder="Homepage" /><br/><br/>
                    	<textarea id="text" placeholder="Text*" /></textarea><br/><br/>
                    	<input type="text" id="tags" placeholder="Tags" /><br/><br/>
						<p>{{ captcha_img() }}</p>
						<input type="text" id="captcha" placeholder="enter chars above" /><br/><br/>

						<input type="button" value="Send!" id="addEntry" /><br/><br/>
					</form>
                    <a href="{{ url('/entry') }}">Back</a>
                </div>
            </div>
        </div>
    </body>
</html>
