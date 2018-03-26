<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<center>
    <span>Class Category</span>
    <select style="width:200px" class="classcategory" id="class_cat_id">
        <option value="0" disabled="true" selected="true">-Select-</option>
        <option>tarek</option>
        <option>tanvir</option>
    </select>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $(document).on('change','.classcategory',function () {
            console.log("hmm its working");
        });
    });
</script>

</body>
</html>