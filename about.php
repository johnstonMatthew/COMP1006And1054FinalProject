<?php
    $title = "About Us || Matthew Johnston & Cole Winkler-Sawdon";
    $description = "Look at the history of Smoke and contact us if you have any issues";
    require("includes/navigation/header.php");
?>
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

<?php
    require("includes/navigation/footer.php");
?>