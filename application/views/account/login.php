<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p>
            <h3>Авторизация пользователя</h3>
            <hr>
            <div id="alert_msg" class="alert alert-dismissible fade" role="alert">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="container-md">
                <form action="/account/login" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Login</label>
                        <input name="login" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <button name="register" type="submit" class="btn btn-primary">Авторизоваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

