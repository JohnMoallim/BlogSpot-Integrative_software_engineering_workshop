    <div class="card m-2 contact_us_form">
        <h5 class="card-header">Contact us</h5>
        <div class="card-body">
            <form id="send_email_form">
                <div class="form-outline mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" name="name" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="text" name="email" class="form-control">
                </div>

                <br><br>
                <div class="form-outline mb-4 text-white">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" class="form-control" name="message" cols="30" rows="5"></textarea>
                </div>

                <button type="button" onclick="sendEmail()" value="Send An Email" class="btn btn-primary btn-block ml-2">Submit</button>
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </form>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    function sendEmail() {

        if (isNotEmpty(document.getElementById("name")) && isNotEmpty(document.getElementById("email")) && isNotEmpty(document.getElementById("message"))) {
            $.ajax({
                url: 'sendEmail.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    name: document.getElementById("name").value,
                    email: document.getElementById("email").value,
                    message: document.getElementById("message").value
                }, success: function (response) {
                    $('#send_email_form')[0].reset();

                    if (window.location.search == "") {
                        window.location.search += "?info=email_sent"
                    } else {
                        window.location.search += "&info=email_sent"
                    }

                }
            });
        }
    }

    function isNotEmpty(caller) {
        if (caller.value == "") {
            caller.style.border = '1px solid red';
            return false;
        } else
        {
            caller.style.border = ''
        }

        return true;
    }
</script>