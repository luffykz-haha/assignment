<footer id="footer">
    <div id="footer-grid">
        <!-- About us -->
        <div id="about">
            <img src="{{ asset('images/logo.png') }}" alt="CourtBook Logo">
            <p>CourtBook is your online platform for booking sports courts and facilities. Everything you need to stay active and play your favorite sports.</p>
            <div class="social-links">
                <a href="https://www.facebook.com/courtbook" class="fa fa-facebook" aria-label="Facebook"></a>
                <a href="https://www.instagram.com/courtbook" class="fa fa-instagram" aria-label="Instagram"></a>
                <a href="https://www.pinterest.com/courtbook" class="fa fa-pinterest" aria-label="Pinterest"></a>
            </div>
        </div>

        <!-- Contact us -->
        <div id="contact">
            <h2>Contact Us</h2>
            <a class="link" href="mailto:courtbook@gmail.com">courtbook@gmail.com</a>
            <a class="link" href="tel:+6012-3456789">+6012-3456789</a>

            <h4>Address</h4>
            <p>Lot 55, Jalan Sg Long 1/4, Bandar Sungai Long, 43000 Selangor</p>

            <h4>Operating Hours</h4>
            <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
            <p>Sat: 10:00 AM - 2:00 PM</p>
        </div>

        <!-- Subscribe form -->
        <div id="subscribe">
            <h2>Subscribe to our newsletter</h2>
            <p>Stay up to date on all the latest news and events from us.</p>
            <form id="subForm" onsubmit="return validateForm()">
                <input type="email" id="email" name="email" placeholder="Enter your email address">
                <div id="emailError" class="error"></div>
                <button id="submit" type="submit">Subscribe</button>
            </form>
        </div>
    </div>

    <div id="copyright">
        <p>&copy; 2026 CourtBook Sdn. Bhd. All rights reserved.</p>
    </div>
</footer>

<style>
    #footer {
        margin-top: 48px;
        border-top: 3px solid #2a5593;
        background: linear-gradient(180deg, #f8fbff 0%, #eef4ff 100%);
    }

    #footer-grid {
        max-width: 1100px;
        margin: 0 auto;
        padding: 40px 24px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 50px;
        text-align: left;
        color: #1f2937;
    }

    #footer h2,
    #footer h4 {
        margin: 0 0 10px;
        color: #2a5593;
    }

    #footer p {
        margin: 0 0 10px;
        line-height: 1.55;
    }

    #about p,
    #subscribe p {
        text-align: justify;
    }

    #footer img {
        height: 72px;
        width: auto;
        margin-bottom: 12px;
    }

    .social-links {
        margin-top: 10px;
    }

    #footer .fa {
        display: inline-block;
        width: 38px;
        height: 38px;
        line-height: 38px;
        border-radius: 9999px;
        margin: 0 4px;
        color: #ffffff;
        text-decoration: none;
        transition: transform 0.2s ease;
    }

    #footer .fa:hover {
        transform: translateY(-2px);
    }

    #footer .fa-facebook {
        background: #2a5593;
    }

    #footer .fa-instagram {
        background: #16a34a;
    }

    #footer .fa-pinterest {
        background: #ef4444;
    }

    #footer .link {
        display: block;
        color: #1f2937;
        text-decoration: none;
        margin-bottom: 8px;
    }

    #footer .link:hover {
        color: #2a5593;
    }

    #footer #subForm {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    #footer #subscribe input {
        width: 100%;
        max-width: 320px;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        background-color: #ffffff;
    }

    #footer #subscribe button {
        padding: 10px 22px;
        background-color: #2a5593;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    #footer #subscribe button:hover {
        background-color: #2a5593;
    }

    #copyright {
        background-color: #2a5593;
        color: #eaf2ff;
        text-align: center;
        padding: 14px 12px;
    }

    #copyright p {
        margin: 0;
    }
</style>