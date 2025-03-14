<?php
    $title = "Register Smoke Account || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "The Register Account Page";
    include('includes/navigation/header.php');
?>

<main>  
    <form id="registerForm" method="POST">
        <fieldset>
            <legend> Register Smoke Account </legend>
            <div>
                <label for="registerAccount"> Account Name </label>
                <input type="text" id="registerAccount">
            </div>

            <div>
                <label for="dateOfBirth"> Date of Birth </label>
                <input type="date" id="dateOfBirth">
            </div>

            <div> 
                <label for="email"> Email </label>
                <input type="email" id="email"> 
            </div>

            <div>
                <label for="fName"> First Name </label>
                <input type="text" id="fName">
            </div>

            <div>
                <label for="lName"> Last Name </label>
                <input type="text" id="lName">
            </div>

            <div>
                <label for="registerPass"> Password </label>
                <input text="password" id="registerPass">
            </div>

            <div>
                <label> Add Profile Picture </label>
                <input type="file" name="files[]">
            </div>

            <div id="buttonContainer">
                <button type="submit"> Register </button>
                <button type="reset"> Reset </button>
            </div>
        </fieldset>
    </form>
</main>

<?php
    include('includes/navigation/footer.html');
?>