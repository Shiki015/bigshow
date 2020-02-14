<div class="account-wrap">

<a class="site-logo" href="index.php?page=pocetna">
    <img src="Public/images/template/logo-white.png" alt="Site Logo">
</a>

<form class="accountform signupform">

    <h3>Sign up, it's free..</h3>
    <div class="basic-field">
        <label>Username <br/>
            <p>
                <input  id="username" type="text" name="username" required>
            </p>
        </label>
        <label>E-mail address <br/>
            <p>
                <input  id="email" type="email" name="email" required>
            </p>
        </label>
        <label>Password <br/>
            <p>
                <input id="pass" type="password" name="password" required>
            </p>
        </label>
        <div class="row">
            <div class="col-sm-6">
                <label>First Name <br/>
                    <p>
                        <input id="fname" type="text" name="fname" required>
                    </p>
                </label>
            </div>
            <div class="col-sm-6">
                <label>Last Name <br/>
                    <p>
                        <input id="lname" type="text" name="lname" required>
                    </p>
                </label>
            </div>
        </div>
    </div>
    <button id="register" name="btn" type="button">Login</button>
    <p class="signup-recover">Do you already have an account? <a href="index.php?page=login">Login here</a></p>
</form>
</div>