<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOEFL - Login</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style1.css">
</head>

<body>
    <main>
        <form action="<?= BASEURL; ?>/login/cekAdmin" method="post">
            <div class="center">
                <div class="container">
                    <h1 style="font-family: Quicksand;">Login Admin</h1>
                    <label for="uname" style="font-family: Quicksand;"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" id="username" name="username" required>

                    <label for="psw" style="font-family: Quicksand;"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" id="password" required>

                    <button type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember" style="font-family: Quicksand;"> Remember me
                    </label>
                </div>

                <div class="container">
                    <button type="submit" class="cancelbtn" formaction="<?= BASEURL; ?>">Cancel</button>
                    <!-- <span class="psw" class="cancelbtn" style="font-family: Quicksand;"><a href="#">Forgot password?</a></span> -->
                </div>
            </div>
            </div>
        </form>
    </main>
</body>