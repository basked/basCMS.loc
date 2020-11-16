<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p>
            <h3><?php echo $title ?></h3></p>
            <hr>
            <div id="alert_msg" class="alert alert-dismissible fade" role="alert">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="/tasks/add" method="post">
                <div class="form-group">
                    <label for="name">Имя пользователя</label>
                    <input name="name" id="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Описание задачи </label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button name="register" type="submit" class="btn btn-primary">Сохранить</button>
                    <a class="btn btn-primary" href="/" role="button">Назад</a>
                </div>
            </form>
        </div>
    </div>
</div>
