<template>
    <div class="row">
        <div class="col-sm-4">
       <form action="/action_page.php">
            <label for="fname">Scan:</label><br>
            <input type="text" id="fname" name="fname" value="John"><br>
            <label for="lname">Plan:</label><br>
            <input type="text" id="lname" name="lname" value="Doe"><br><br>
             <input type="submit" value="Submit">
      </form>
        </div>
        <div class="col-sm-8">
        <graphic-component></graphic-component>
        </div>
    </div>

</template>
