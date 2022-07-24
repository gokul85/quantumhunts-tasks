<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task - 1</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>
<?php require_once('config.php');
$sql = "Select * FROM students where class='A' order by rank";
$datas = $mysqli->query($sql);
?>

<body>
    <div class="container">
        <h3 class="text-center m-5">TASK - 1 | Make Rank of Students using drag and drop</h3>
        <table class="table table-hover" id="mytable">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>class</th>
            </thead>
            <tbody class="row-position">
                <?php while ($data = $datas->fetch_assoc()) {?>
                <tr id="<?php echo $data['id']?>">
                    <td><?php echo $data['id']; ?>
                    </td>
                    <td><?php echo $data['name']; ?>
                    </td>
                    <td><?php echo $data['class']; ?>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
        <p class="text-center m-5">BY: GOKUL K</p>
    </div>


</body>
<script type="text/javascript">
$(".row-position").sortable({
    delay: 150,
    stop: function() {
        var selectedData = new Array();
        $(".row-position>tr").each(function() {
            selectedData.push($(this).attr("id"));
        });
        updateRank(selectedData);
    }
});

function updateRank(selectedData) {
    $.ajax({
        url: 'reorder.php',
        type: 'POST',
        data: {
            allData: selectedData
        },
        success: function() {
            alert("Reordered Successfully");
        }
    });
}
</script>

</html>