<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/show.css">
    <title>User Info</title>
</head>
<body>
    <div class="container d-flex justify-content-between p-4 border border-5 my-4">
        <h3>User Information</h3>
        <button class="btn btn-outline-primary" id="open_add" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus"></i>  Add User</button>
    </div>
    <div class="container">
        <table class="table table-hover align-middle" style="table-layout: fixed;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Profile</th>
                <th>Action</th>
            </tr>
            <?php 
                $connection  =   new mysqli('localhost','root','','php12-1',3308);
                $sql    =  "SELECT * FROM `user` WHERE 1 ORDER BY `id` DESC";

                $result = $connection -> query($sql);

                while($row  =  mysqli_fetch_assoc($result)){
                    echo '
                        <tr>
                            <th>'.$row['id'].'</th>
                            <th>'.$row['name'].'</th>
                            <th>'.$row['gender'].'</th>
                            <th>
                                <img src="../image/'.$row['image'].'">
                            </th>
                            <th>
                                <button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </th>
                        </tr>
    
                    ';
                }
            ?>
        </table>
    </div>
    <?php 
        include 'modal.php';
    ?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#image-choose').click(function(){
            $('#file').click();
        })

        $('#file').change(function(){
            var form_data   =  new FormData(); //store image

            var imageFile   = $('#file')[0].files;
            // console.log(imageFile);
            form_data.append('_file',imageFile[0]); //_file = image-name

            $.ajax({
               method : "post",
               url    : 'save-img.php',
               data   : form_data,
               cache  : false,
               processData : false,
               contentType : false,
               success :function(response){
                    $('#image-choose').attr('src','../image/'+response);
                    $('#img').val(response);
                }
            })
        })
        $('#accept_add').click(function(){
            var name   = $("#name").val();
            var gender = $("#gender").val();
            var image  = $("#img").val();
            
            $.ajax({
                method : "post",
                url    : 'insert.php',
                data   : {
                    insert_name   :  name,
                    insert_gender : gender,
                    insert_image  : image
                },
                cache : false,
                success : function(response){
                    if(response == "Success"){
                        alert("Success");
                    }
                    else{
                        alert("Error");
                    }
                }
            })
        })
    })
</script>