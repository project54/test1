<html>
    <body>
        <table>
            <thead>
                <tr>
                    <td>name</td>
                    <td>size</td>
                    <td>extension</td>
                    <td>mtime</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($files as $file) : ?>
                <tr>
                    <td><?= $file['name'] ?></td>
                    <td><?= $file['isDir'] ? '[DIR]' : $file['size'] ?></td>
                    <td><?= $file['extension'] ?></td>
                    <td><?= $file['mtime'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a href="/index.php?action=flush">Обновить</a>
    </body>
</html>
