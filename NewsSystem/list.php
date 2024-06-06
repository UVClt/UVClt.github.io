<style>
    table {
        width: 90%;
        border: solid 1px #000;
        margin: auto;
    }

    th,td {
        border: solid 1px #000;
    }
    
    .add {
        margin: auto;
        /* display: flex;
        justify-content: center; */
        width: 80px;
        height: 80px;
        border: #000 2px ;
        /* background-color: #000; */

    }
</style>

<body>
    <?php
    require './conn.php';
    $link = mysqli_query($db, 'select * from news order by id ');
    var_dump($link)
    ?>
    <table>
        <tr>
            <th>编号</th>
            <th>标题</th>
            <th>内容</th>
            <th>时间</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php
        while ($data = $link->fetch_assoc()) {
            echo "<tr><td>" . $data['id'] .
                "</td><td>" . $data['title'] .
                "</td><td>" . $data['content'] .
                "</td><td>" . $data['createtime'] .
                "<td><input type='button' value='修改' onclick='location.href=\"./upde.php?id={$data['id']}\"'></td>" .
                "<td><input type='button' value='删除' onclick='location.href=\"./del.php?id={$data['id']}\"'></td>";
        }
        ?>
    </table>
    <div class="add">
        <a href="./add.html">添加新闻</a>
    </div>
    
</body>