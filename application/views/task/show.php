<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
            <h3><?php echo $title; ?></h3></p>


            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/tasks/edit/<?php echo $id; ?>" method="post">
                <div class="form-group">
                    <label for="email">Пользователь</label>
                    <input id="name" name="name" class="form-control" type="text"
                           value="<?php echo htmlspecialchars($task['name'], ENT_QUOTES); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" class="form-control" type="email"
                           value="<?php echo htmlspecialchars($task['email'], ENT_QUOTES) ?>">
                </div>
                <div class="form-group">
                    <label for="description">Описание задачи </label>
                    <textarea name="description" name="description" class="form-control"
                              rows="3"><?php echo htmlspecialchars($task['description'], ENT_QUOTES) ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="register" type="submit">Сохранить</button>
                    <a class="btn btn-primary" href="/" role="button">Назад</a>
                </div>
            </form>
        </div>

    </div>
</div>