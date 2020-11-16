
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p><h3><?php echo $title ?></h3></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="/tasks/add" method="post">
                <div class="form-group">
                    <label for="email">Пользователь</label>
                    <input name="name" id="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Текст задачи </label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button name="register" type="submit" class="btn btn-primary">Сохранить</button>
                    <a class="btn btn-primary" href="/" role="button">Назад</a>
                </div>
            </form>
        </div>
    </div>
    <row>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <button id="id_run_script" onclick="openAlert()">Open Alert</button>
        <button id="id_run_script1" onclick="closeAlert()">Close Alert</button>
    </row>
</div>
