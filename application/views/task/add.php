<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p><?php echo $title ?></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="task/add" method="post">
                <div class="form-group">
                    <label for="email">Пользователь</label>
                    <input name="user" id="user" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="task_txt">Текст задачи </label>
                    <textarea name="task_txt" id="task_txt" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button name="register" type="submit" class="btn btn-primary">Сохранить</button>
                    <a class="btn btn-primary" href="/" role="button">Назад</a>
                </div>
            </form>
        </div>

    </div>
</div>