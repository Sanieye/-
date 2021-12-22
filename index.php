<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหารeye</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <style>
        .container {
            background-color: bisque;
            padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="">
            <div class="form-group row">
                <label for="Nameshop" class="control-label col-sm-2">Nameshop</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="Nameshop" >
                </div>
            </div>

            <div class="form-group row">
                <label for="Id" class="control-label col-sm-2">ID</label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="ID"  >
                </div>


                <label for="Namefood" class="form-label">Namefood</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="Namefood"  placeholder="">
                </div>
                <label for="Price" class="form-label">Price</label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="Price"  placeholder="">
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-primary"  
                        autocomplete="off" id="btnadd">
                        Add

                </div >
                <div class="col-2">
                    <button type="button" class="btn btn-success"  style="display: none;"
                       id="btnupdate">
                        Update
                    </button>
                </div>
            </div>
        </form>
      


        <table class="table table-striped " id="cp1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nameshop</th>
                    <th scope="col">Namefood</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
<script>
 $(function () {
    $("#btnadd").on('click', function () {
        var Nameshop, ID, Namefood, Price;
        Nameshop = $("#Nameshop").val();
        ID = $("#ID").val();
        Namefood = $("#Namefood").val();
        Price = $("#Price").val()
        var edit = "<a class='edit' href='JavaScript:void(0);' >Edit</a>";
        var del = "<a class='delete' href='JavaScript:void(0);'>Delete</a>";
        if (Nameshop == "" || Namefood == "" || Price == " " ){
            alert("กรุณากรอกข้อมูล");
        } else {
            var table = "<tr><td>" + ID + "</td><td>" + Nameshop + "</td><td>" + Namefood + "</td><td>" + Price + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
            $("#cp1").append(table);
        }
        ID = $("#ID").val("");
        Nameshop = $("#Nameshop").val("");
        Namefood = $("#Namefood").val("");
        Price = $("#Price").val("");
        Clear();
    });
    $("#btnupdate").on('click', function () {
        var Nameshop, ID, Namefood, Price;
        Nameshop = $("#Nameshop").val();
        ID = $("#ID").val();
        Namefood = $("#Namefood").val();
        Price = $("#Price").val();
        $("#cp1 tbody tr").eq($('#hfRowIndex').val()).find('td').eq(0).html(ID);
        $("#cp1 tbody tr").eq($('#hfRowIndex').val()).find('td').eq(1).html(Nameshop);
        $("#cp1 tbody tr").eq($('#hfRowIndex').val()).find('td').eq(2).html(Namefood);
        $("#cp1 tbody tr").eq($('#hfRowIndex').val()).find('td').eq(3).html(Price);
        $("#btnadd").show();
        $("#btnupdate").hide();
        Clear();
    });
   
        $("#cp1").on("click", ".delete", function (e) {
            if (confirm("คุณต้องการลบข้อมูลใช่หรือไม่?")) {
                $(this).closest('tr').remove();
            } else {
                e.preventDefault();
            }
        });

    $("#btnClear").on('click', function () {
        Clear();
    });

    $("#cp1").on("click",".edit", function (e) {
            var row = $(this).closest('tr');
            $('#hfRowIndex').val($(row).index());
            var td = $(row).find("td");
            $('#Nameshop').val($(td).eq(1).html());
            $('#ID').val($(td).eq(0).html());
            $('#Namefood').val($(td).eq(2).html());
            $('#Price').val($(td).eq(3).html());
            $('#btnadd').hide();
            $('#btnupdate').show();
        
      
    });
   
});

function Clear() {
        $("#Nameshop").val("");
        $("#ID").val("");
        $("#Namefood").val("");
        $("#Price").val("");
        $("#hfRowIndex").val("");
    }

</script>

</html>
