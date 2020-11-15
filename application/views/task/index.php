 <div class="container">
    <div class="row">
        <br>
        <?php if ($is_admin): ?>
            <div class="col-sm-12">
                <a class="btn btn-outline-danger btn-sm  float-right" href="/account/logout" role="button">Выход</a>
            </div>
        <?php endif; ?>
        <?php if (!$is_admin): ?>
            <div class="col-sm-12">
                <a class="btn btn-outline-info btn-sm  float-right" href="/account/login" role="button">Авторизация</a>
            </div>
        <?php endif; ?>
        <div class="col-sm-12">
            <p><h3><?php echo $title ?></h3></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-outline-dark btn-sm" href="/tasks/add" role="button">Новая задача</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Текст задачи</th>
                    <th scope="col">Статус</th>
                    <?php if ($is_admin): ?>
                        <th scope="col">Действия</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td> <?php echo $task['name']; ?> </td>
                        <td> <?php echo $task['email']; ?>  </td>
                        <td> <?php echo $task['task_txt']; ?>  </td>
                        <td>
                            <div class="form-check">
                                <input id="chk_completed_task"
                                    <?php if ($task['is_completed']): ?>
                                        checked
                                    <?php endif; ?>
                                    <?php if (!$is_admin): ?>
                                        disabled
                                    <?php endif; ?>
                                       type="checkbox" value="">
                            </div>
                        </td>
                        <td>
                            <?php if ($is_admin): ?>
                                <a class="btn btn-light btn-sm"
                                   <?php echo "href=/tasks/edit/" . $task['id'] ?>
                                   role="button">Редактировать</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
