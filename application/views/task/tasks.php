<div class="alert alert-warning alert-dismissible fade hide" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="container">
    <br>
    <div class="row">
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
            <p>
            <h3><?php echo $title ?></h3></p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-outline-dark btn-sm" href="/tasks/create" role="button">Новая задача</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col"><b>#</b>Имя пользователя <a href="/name_<?php echo $sortTypeTo ?>"
                                                                class="fa fa-sort-<?php echo $sortType; ?>"></a></th>
                    <th scope="col"><b>#</b>Email <a href="/email_<?php echo $sortTypeTo ?>"
                                                     class="fa fa-sort-<?php echo $sortType; ?>"></a></th>
                    <th scope="col"><b>#</b>Текст задачи <a href="/description_<?php echo $sortTypeTo ?>"
                                                            class="fa fa-sort-<?php echo $sortType; ?>"></a></th>
                    <th scope="col"><b>#</b>Статус <a href="/description_<?php echo $sortTypeTo ?>" class="fa fa-sort-desc"></a></th>
                    <?php if ($is_admin): ?>
                        <th scope="col">Действия</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td> <?php echo htmlspecialchars($task['name'], ENT_QUOTES); ?> </td>
                        <td> <?php echo htmlspecialchars($task['email'], ENT_QUOTES); ?>  </td>
                        <td>
                            <?php if ($task['edited']): ?>
                                <i class="fa fa-edit"></i>
                            <?php endif; ?>
                            <?php echo htmlspecialchars($task['description'], ENT_QUOTES); ?></td>
                        <td>
                            <div class="form-check">
                                <input id="<?php echo $task['id']; ?>"
                                       name=""
                                    <?php if ($task['completed']): ?>
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
                                   href=<?php echo '/tasks/show/' . $task['id'] ?>
                                   role="button">Редактировать</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
