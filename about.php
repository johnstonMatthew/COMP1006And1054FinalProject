<?php
    $title = "About Us || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "Look at the history of Smoke and contact us if you have any issues";
    require("includes/navigation/header.php");
?>
<!-- Page Main -->
<main id="notIndexMain">
    <section id="aboutPageHistory">
        <h2> History </h2>
        <p> Smoke was founded by a group a innovative students who once worked at a competitor of Smoke. They were unhappy with the working conditions and decided that they have had enough. So they took their experience working at the competitor and poured their genius and innovation into Smoke, an innovative new take on an online games launcher. Smoke offers equal opportunity for game developers to display their creativity. Having seen the bias towards triple A studios in the 'real industry'. Smoke strives for </p>
    </section>

    <form id="aboutForm">
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

<?php
    require("includes/navigation/footer.php");
?>