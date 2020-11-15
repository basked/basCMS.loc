<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p><h3><?php echo $title; ?></h3></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/tasks/add" method="post">
                <div class="form-group">
                    <label for="email">Пользователь</label>
                    <input  id="user"  class="form-control" name="user" type="text" value="<?php echo $task['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" name="email"  type="email" value="<?php echo $task['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="description">Описание задачи </label>
                    <textarea name="description" id="description" class="form-control" rows="3"><?php echo $task['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="register" type="submit">Сохранить</button>
                    <a class="btn btn-primary" href="/" role="button">Назад</a>
                </div>
            </form>
        </div>

    </div>
</div>