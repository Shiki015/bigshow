<div class="account-wrap">

        <a class="site-logo" href="index.php?page=pocetna">
            <img src="Public/images/template/logo-white.png" alt="Site Logo">
        </a>

        <form class="accountform loginform" action="index.php?page=DoLogIn" method="POST">
            <h3>Log in</h3>
            <div class="basic-field">
                <label>Username <br/>
                    <p>
                        <input type="text" name="username" required>
                    </p>
                </label>
                <label>Password <br/>
                    <p>
                        <input type="password" name="password" required>
                    </p>
                </label>
            </div>
            <button class="stilizovan" name="btnLogin" id="login" type="submit">Login</button>
            <p class="signup-recover">Don't you have an account yet? <a href="index.php?page=signup">Sign up here</a></p>
        </form>
    </div>