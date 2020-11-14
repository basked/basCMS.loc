<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p><h3><?php echo $title; ?></h3></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="task/add" method="post">
                <div class="form-group">
                    <label for="email">Пользователь</label>
                    <input  id="user"  class="form-control" name="user" type="text" value="<?php echo $task['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" name="email"  type="email" value="<?php echo $task['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="task_txt">Текст задачи </label>
                    <textarea name="task_txt" id="task_txt" class="form-control" rows="3"><?php echo $task['task_txt'] ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="register" type="submit">Сохранить</button>
                    <a class="btn btn-primary" href="/" role="button">Назад</a>
                </div>
            </form>
        </div>

    </div>
</div>