<footer id="footer">
    <div id="footer-grid">
            <!-- About us -->
            <div id="about">
                <a href="home.php"><img src="logo.png" alt="Crafty logo"></a>
                <p>Crafty is your online store for quality yarns, fabrics, art supplies, and more — everything you need to bring your creative ideas to life.</p>
                <!-- social media link -->
                <a href="https://www.facebook.com/crafty" class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/crafty" class="fa fa-instagram"></a>
                <a href="https://www.pinterest.com/crafty" class="fa fa-pinterest"></a>
            </div>

            <!-- Product link -->
            <div id="product">
                <ul>
                    <h2>Product</h2>
                    <li><a href = "itemListing.php?category=1">Yarn</a> </li>
                    <li><a href = "itemListing.php?category=2">Fabric</a> </li>
                    <li><a href = "itemListing.php?category=3">Art Supplies</a> </li>
                    <li><a href = "itemListing.php?category=4">Needlework Tools</a> </li>
                    <li><a href = "itemListing.php?category=5">Jewellery</a> </li>
                    <li><a href = "itemListing.php?category=6">Stationery</a> </li>
                </ul>
                
            </div>

            <!-- Contact us link -->
            <div id="contact">
                <h2>Contact Us</h2><br>
                <a  class="link" href="contact.php"><h4>Enquiry Form</h4></a>
                <a  class="link" href="mailto:crafty@gmail.com"><h4>Email</h4>crafty@gmail.com </a>
                <a  class="link" href="tel:+6012-3456789"><h4>WhatsApp Us</h4>+6012-3456789 </a>

                <h4>Address</h4>
                <p>Lot 55, Jalan Sg Long 1/4,</p>
                <p>Bandar Sungai Long, </p>
                <p> 43000 Selangor</p>

                <h4>Operated Hours</h4>
                <p>Monday-Friday: 9am to 6pm</p>
                <p>Saturday     : 10am to 2pm</p>

            </div>

            <!-- Subscribe form -->
            <div id="subscribe">
                <h2>Subscribe to our newsletter</h2>
                <p> to stay up to date on all the latest news and offers from us.</p>
                <form id="subForm" onsubmit="return validateForm()">
                    <input type="text" id="email" name="email" placeholder="Enter your email address" >
                    <div id="emailError" class="error"></div>
                    <br>
                    <button id="submit">Subscribe</button>
                </form>
            </div>

        </div>

        <div id="copyright">
            <p>&copy; 2025 Crafty Sdn. Bhd. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
    /* Set the background for the footer */
    #footer{
        position:static;
        left:60px ;
        bottom: 0px;
        width: auto;
        background-color:#C0F7B5 ;
        padding-left: 65px;
    }

    /* 4 column inline */
    #footer-grid{
        display: grid;
        grid-template-columns: 1.2fr 0.8fr 1fr 1.5fr; /* 4 column */
        row-gap: 60px;
    }

    /* Style for logo */
    #footer img{
        padding-top: 15px;
        height: 150px;
        width: auto;
    }

    /* Style for social media icon */
    #footer .fa-instagram {
    background: #125688;
    color: white;
    }

    #footer .fa-pinterest {
    background: #cb2027;
    color: white;
    }

    #footer .fa-twitter {
    background: #55ACEE;
    color: white;
    }

    #footer .fa-facebook {
    background: #3B5998;
    color: white;
    }

    #footer .fa {
    padding: 12px;
    font-size: 20px;
    width: 50px;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
    }

    /* Style for product link */
    #footer #product ul li{
        text-decoration: none;
        padding-top: 10px;
        padding-bottom: 10px;
        list-style:none;
    }

    #footer a {
        text-decoration: none;
        color: black;
    }

    #footer h2 ,h4{
        color: darkgreen;
    }

    /* Style for contact link */
    #footer #contact {
        top: 0;
        padding-bottom: 10px;
        padding-top: 10px;
        line-height: 10px;
        padding-left: 0;
    }

    /* Style for subscribe form */
    #footer #subscribe input{
        width: 300px;       
        max-width: 500px;     
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: lightcyan;
    }

    #footer #subscribe button {
        padding: 10px 20px;
        background-color: #0B6623; 
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #footer #subscribe button:hover {
    background-color:#0f8b30; 
    }

    /* Style for copyright bar */
    #copyright{
        display: block;
        width: auto;
        height: 60px;
        bottom: 0;
        background-color: rgb(4, 99, 4);
        color: aliceblue;
        font-size: 20px;
        text-align: center;
        align-content: center;
        padding: 5px;
    }
</style>