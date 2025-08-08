<html>
<head>
    <title>Contact Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="index.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2 py-5">

                <h1>Contact form Tutorial from 
                    <a href="http://www.codebind.com" target="_blank">ProgrammingKnowledge</a>
                </h1>

                <p class="lead">This is a demo for our tutorial dedicated to crafting working Bootstrap contact form with PHP and AJAX background.</p>

                <form id="contact-form" method="post" action="contact.php" role="form">
                    <div class="controls">

                        <div class="form-group">
                            <label for="form_name">Fullname *</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your full name *" required="required" data-error="Firstname is required.">
                        </div>

                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                        </div>

                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Your message *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-send" value="Send message">
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" 
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46Jbk0WLuAUdn689aCwoqbBJI snjAK/1BlwCWPIlPm49" 
    crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ60W/JmZQ5stwEULTy" 
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" 
    integrity="sha256-dhf/YjH1A4tweKsKUsmNnV05DDbfGN3g7NMq86xgGh8=" 
    crossorigin="anonymous"></script>

  <script src="contact.js"></script>
</body>
</html>


</body>
</html>
