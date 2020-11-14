<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p><?php echo $title ?></p>
            <hr>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Task text</th>
                    <th scope="col">Status</th>
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
                                       type="checkbox" value="">
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
