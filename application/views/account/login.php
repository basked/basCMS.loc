<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <p>
            <h3>Авторизация пользователя</h3>
            <hr>
            <div id="alert_msg" class="alert alert-dismissible fade" role="alert">
            </div>
        </div>
        <div class="col-sm-6 offset-3">
            <div class="container-sd">
                <form action="/account/login" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя пользователя</label>
                        <input name="login" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <button name="register" type="submit" class="btn btn-primary float-left" >Авторизоваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

