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
</div><?php
