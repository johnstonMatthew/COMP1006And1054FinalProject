<!DOCTYPE html>

<head lang="en">
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Look at the history of Smoke and contact us if you have any issues">
    <title> About Us </title>
    
    <!-- CSS -->
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" >

    <!-- Fonts --> 
</head>

<body>
    <!-- Page Header -->
    <header>
        <?php
            include_once("includes/navigation/header.html");
        ?>
    </header>
    <!-- Page Main -->
    <main>
        <section>
            <h2> History </h2>
            <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque nihil, corrupti, quod magni officiis, enim architecto temporibus error eius cupiditate magnam. Id vel repellendus libero perspiciatis eius inventore minima debitis?</p>
        </section>

        <form>
            <fieldset>
                <legend> Contact Us </legend>
                <div>
                    <label for="contact-firstName">First Name</label>
                    <input type="text" id="contact-firstName">
                </div>
                <div>
                    <label for="contact-lastName">Last Name</label>
                    <input type="text" id="contact-lastName">
                </div>
                <div>
                    <label for="contact-reason">Reason for Contact</label>
                    <select id="contact-reason">
                        <option>Product Issue</option>
                        <option>Request Refund</option>
                        <option>Account Issue</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label for="contact-details">Details on Reason</label>
                    <textarea type="textarea" id="contact-details"> </textarea>
                </div>
                <div id="contact-btn">
                    <button type="submit">Submit</button>
                </div>
            </fieldset>
        </form>
    </main>
    <!-- Page Footer -->
    <footer>
        <?php
            include_once("includes/navigation/footer.html");
        ?>
    </footer>
</body>