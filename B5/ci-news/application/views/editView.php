
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>style.css">
</head>

<body>
<div class="form">
    <form id="form-1" method="post" action="<?php echo site_url('UserController/update'); ?>/<?php echo $row->id; ?>">
        <h2>Edit</h2>
        <div class="form-group">
            <p type="Name:">
                <input type="text" id="fullname" name="fullname" value="<?php echo $row->name; ?>" "></input>
            </p>
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <p type="Email:">
                <input type="text" id="email" name="email" value="<?php echo $row->email; ?>" disabled></input>
            </p>
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <p type="Password:">
                <input type="text" id="password" name="password" placeholder="Không đổi password thì không nhập vào ô này !" ">
            </p>
            <span class="form-message"></span>
        </div>
<!--        <div class="form-group">-->
<!--            <p type="Confirm password:">-->
<!--                <input type="text" id="password-confirmation" name="password-confirmation">-->
<!--            </p>-->
<!--            <span class="form-message"></span>-->
<!--        </div>-->
        <div class="bt"><button>Submit</button></div>
    </form>
</div>
<script src="<?php echo base_url(); ?>index.js"></script>
<script>
    validator({
        form: '#form-1',
        errorMessage: '.form-message',
        rules: [
            validator.isRequired('#fullname', 'Trường này bắt buộc !'),
            validator.isRequired('#email','Trường này bắt buộc'),
            validator.isEmail('#email', 'Email nhập vào chưa chính xác !'),
            validator.minLength('#password',6, 'Mật khẩu cần có độ dài ít nhất 6 ký tự !'),
            validator.isRequired('#password-confirmation','Trường này bắt buộc !'),
            validator.isConfirmed('#password-confirmation',function(){
                return document.querySelector('#form-1 #password').value;
            },'Password không khớp !'),
        ]
    });
</script>
</body>

</html>