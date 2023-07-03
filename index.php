<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact form</title>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Contact Me</h1>
            <p>Feel free to contact us and we will get back to you ass sson as we can.</p>
            <form action="mail.php" id="contact_form" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" class="required" id="name">
                <label for="email">Email:</label>
                <input type="email" name="email" class="required email_validate" id="email">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" class="required" id="subject">
                <label for="message">Message</label>
                <textarea name="message" class="required" id="message" cols="30" rows="10"></textarea>
                <input type="submit" value="Send">
            </form>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#contact_form').submit(function() {
                var err = 0;
                $('#contact_form').find('.required').each(function() {
                    $(this).css('border', '1px solid white');
                    if (this.value.trim() == '') {
                        err = 1;
                        $(this).css('border', '1px solid red');
                    }
                });

                $('#contact_form').find('.email_validate').each(function() {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test(this.value)) {
                        err = 1;
                        $(this).css('border', '1px solid red');
                    }
                });

                if(err == 1) {
                    return false;
                }
            });
        });
    </script>
</html>


