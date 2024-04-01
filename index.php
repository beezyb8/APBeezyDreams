<?php 
    define('__CONFIG__', true);
    require_once "inc/config.php";
    
    // Page::ForceToDashboard($con);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My Leg Up is a recruiting resource offered to college students and universities across the country."/>
    <title>My Leg Up</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/mlu_favicon.png">
    <link rel="stylesheet" href="css/landing/landing.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Need CSS THIS WILL BE HOMEPAGE -->
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="../images/logos/navlogo.png" alt="MLU Logo"></a>
            <div class="nav-links" id="navlinks">
                <i class="bi bi-x-lg" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="https://mylegup.co/login_reg_system/login_reg.php">Login/Register</a></li>
                    <li><a href="https://mylegup.co/admin_dashboard.php">Admin Dashboard</a></li>
                    <li><a href="https://mylegup.co/about_us.php">About Us</a></li>
                </ul>
            </div>
            <i class="bi bi-justify" onclick="showMenu()"></i>
        </nav>
        <div class="rms-textbox">
            <h1>Welcome to My Leg Up</h1>
            <p>We strive to ease stress and anxiety brought from undergraduate recruiting by providing this resource to guide, teach, and organize our users throughout their recruiting experience.</p>
            <a href="https://mylegup.co/login_reg_system/login_reg.php" class="hero-btn">Sign Up For Your Account Today</a>
        </div>
    </section>
    
    
    <!--Next Section-->
    
    <section class="offer">
        <h1>What We Offer</h1>
        <p class="offer-phead">A comprehensive recruiting platform that takes you from start to finish</p>
        
        <div class="offer-row-top">
            <div class="offer-col-top">
                <h3>Top Information</h3>
                <p class="offer-pbody">We provide information about firms' recruiting processes, reputations, and cultures, gathered through conversations with analysts and interns at each firm</p>
            </div>
            <div class="offer-col-top">
                <h3>Networking Table</h3>
                <p class="offer-pbody">We have developed and iterated through numerous networking trackers to create the optimal organization system for our users</p>
            </div>
        </div>
        <div class="offer-row-bottom">
            <div class="offer-col-bottom">
                <h3>Applications</h3>
                <p class="offer-pbody">We provide personalized application trackers and post relevant applications for your desired industry as they become open, so that you never miss a deadline</p>
            </div>
            <div class="offer-col-bottom">
                <h3>Best Practices</h3>
                <p class="offer-pbody">We have aggregated, filtered, and organized advice from upperclassmen who recently completed the recruiting process, to keep our users informed</p>
            </div>
        </div>
    </section> 
    
    <!--Featured Firms-->
    
    <div class="firm-head">
        <h1>Featured Firms</h1>
        <p>We have aggregated information about the recruiting processes, reputations, and cultures at all of the firms shown below</p>
    </div>
    <section class="firms-section">
        <div class="firms">
            <div class="firms-slide">
                <img src="../banking/images/banklogos/bofa.png" class="img">
                <img src="../banking/images/banklogos/allenco.jpg" class="img">
                <img src="../banking/images/banklogos/centerview.png" class="img">
                <img src="../banking/images/banklogos/houlihan.png" class="img">
                <img src="../banking/images/banklogos/guggenheim.jpg" class="img">
                <img src="../banking/images/banklogos/goldman.png" class="img">
                <img src="../banking/images/banklogos/evercore.png" class="img">
                <img src="../banking/images/banklogos/raine.png" class="img">
                <img src="../banking/images/banklogos/mizuho.png" class="img">
                <img src="../banking/images/banklogos/ubs.png" class="img">
                <img src="../banking/images/banklogos/williamblair.png" class="img">
                <img src="../banking/images/banklogos/mklein.png" class="img">
                <img src="../banking/images/banklogos/citi.jpg" class="img">
                <img src="../banking/images/banklogos/pjt.png" class="img">
                <img src="../banking/images/banklogos/jpm.png" class="img">
                <img src="../banking/images/banklogos/lazard.jpg" class="img">
                <img src="../banking/images/banklogos/solomon.jpg" class="img">
                <img src="../banking/images/banklogos/pwp.jpg" class="img">
                <img src="../banking/images/banklogos/jefferies.jpg" class="img">
                <img src="../banking/images/banklogos/bmo.png" class="img">
            </div>
            <div class="firms-slide">
                <img src="../banking/images/banklogos/bofa.png" class="img">
                <img src="../banking/images/banklogos/allenco.jpg" class="img">
                <img src="../banking/images/banklogos/centerview.png" class="img">
                <img src="../banking/images/banklogos/houlihan.png" class="img">
                <img src="../banking/images/banklogos/guggenheim.jpg" class="img">
                <img src="../banking/images/banklogos/goldman.png" class="img">
                <img src="../banking/images/banklogos/evercore.png" class="img">
                <img src="../banking/images/banklogos/raine.png" class="img">
                <img src="../banking/images/banklogos/mizuho.png" class="img">
                <img src="../banking/images/banklogos/ubs.png" class="img">
                <img src="../banking/images/banklogos/williamblair.png" class="img">
                <img src="../banking/images/banklogos/mklein.png" class="img">
                <img src="../banking/images/banklogos/citi.jpg" class="img">
                <img src="../banking/images/banklogos/pjt.png" class="img">
                <img src="../banking/images/banklogos/jpm.png" class="img">
                <img src="../banking/images/banklogos/lazard.jpg" class="img">
                <img src="../banking/images/banklogos/solomon.jpg" class="img">
                <img src="../banking/images/banklogos/pwp.jpg" class="img">
                <img src="../banking/images/banklogos/jefferies.jpg" class="img">
                <img src="../banking/images/banklogos/bmo.png" class="img">
            </div>
        </div>
    </section>
    
    <!--Bubbles-->
    <section class="bubbles">
        <h1>Get Started Today</h1>
        <p>We highly recommend that all of our new users watch the Demo Video before creating a free account on My Leg Up</p>
        <div class="row">
            <div class="bubbles-col thumbnail" onclick="OpenYT()">
                <img src="../images/landing/newland/youtube_thumbnail.png">   
                <div class="layer">
                    <h3>Watch Demo Video</h3>
                </div>
            </div>
            <div class="bubbles-col" onclick="OpenLGRG()">
                <img src="../images/random/landing_bubbles/login_sc.png">
                <div class="layer">
                    <h3>Login/Register</h3>
                </div>
            </div>
        </div>
    </section>
    <div class="test-head">
        <h1>Testimonials</h1>
        <p>Hear from some of our past users about their My Leg Up experiences</p>
    </div>
    <section class="test-slide">
        <div class="wrapper">
          <i id="left" class="bi bi-caret-left caret"></i>
          <ul class="carousel">
            <li class="card">
                <div class="testimonial-col">
                    <div>
                        <p>I’ve never been the most organized kid, so having My Leg Up was huge for me. I trusted the descriptions more than corporate websites and presentations because they came firsthand from past applicants. I also used My Leg Up to track my calls, because the template provided by the platform was easy to interact with. I don’t think I could’ve navigated the process without the site.</p>
                        <h3>Incoming IB Analyst at Citi</h3>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="testimonial-col">
                    <div>
                        <p>My Leg Up has been transformative in my recruiting process. The most practical and helpful tool I have found for organization, which has allowed me to focus on finding the firm that’s the best fit for me. </p>
                        <h3>Incoming Management Consultant at KPMG</h3>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="testimonial-col">
                    <div>
                        <p>My Leg Up proved to be an invaluable resource throughout my recruitment process. The firm descriptions provided valuable insights into each firm and  demonstrated an intricate understanding of their distinguishing features. Leveraging the Networking page to schedule my emails and calls was instrumental and ultimately led to landing multiple offers. </p>
                        <h3>Incoming IB Analyst at Goldman Sachs</h3>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="testimonial-col">
                    <div>
                        <p>For me, I couldn’t envision recruiting without the help of My Leg Up. The website really allowed me to succeed throughout the recruiting process with regards to narrowing down the best banks for me as well as helping me with my networking efforts for those.</p>
                        <h3>Incoming IB Analyst at Jefferies</h3>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="testimonial-col">
                    <div>
                        <p>My Leg Up is the sole reason I was able to stay organized while recruiting. The platform allowed me to centralize everything I could possibly need in one place, and it saved me hours of unnecessary organizational inconvenience.</p>
                        <h3>Incoming IB Analyst at Bank of America</h3>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
            </li>
          </ul>
          <i id="right" class="bi bi-caret-right caret"></i>
        </div>
    </section>
    <footer>
        <div class="footer_cont">
            <img src="../images/logos/mlu_tranlg.png" alt="MLU logo" class="foot_logo"><br>
            <span><a href="about_us.php" class="about_us_link" target="blank">About Us</a></span>
            <span><a href="privacypolicy.php" class="privacypol_link" target="blank">Privacy Policy</a></span>
            <span><a href="pdf/TermsAndCons.pdf" class="privacypol_link" target="blank">Terms and Conditions</a></span>
            <span><p>My Leg Up LLC - support@mylegup.co</p></span>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>
    <!-- JS toggling menu -->
    <script>
        var navlinks = document.getElementById("navlinks")
        function showMenu(){
            navlinks.style.right = "0px"
        }
        function hideMenu(){
            navlinks.style.right = "-200px"
        }
        
        window.addEventListener("load", function() {
    // Wait for the page to load completely
    // Find the element you want to apply the transition to
            const rms = document.querySelector(".rms-textbox");
    // Apply the transition by changing the opacity
            rms.style.opacity = 1;
        });
    </script>
    <script>
        const wrapper = document.querySelector(".wrapper");
        const carousel = document.querySelector(".carousel");
        const firstCardWidth = carousel.querySelector(".card").offsetWidth;
        const arrowBtns = document.querySelectorAll(".wrapper i");
        const carouselChildrens = [...carousel.children];
        let isDragging = false, isAutoPlay = false, startX, startScrollLeft, timeoutId;
        // Get the number of cards that can fit in the carousel at once
        let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);
        // Insert copies of the last few cards to beginning of carousel for infinite scrolling
        carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
            carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
        });
        // Insert copies of the first few cards to end of carousel for infinite scrolling
        carouselChildrens.slice(0, cardPerView).forEach(card => {
            carousel.insertAdjacentHTML("beforeend", card.outerHTML);
        });
        // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
        // Add event listeners for the arrow buttons to scroll the carousel left and right
        arrowBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
            });
        });
        const dragStart = (e) => {
            isDragging = true;
            carousel.classList.add("dragging");
            // Records the initial cursor and scroll position of the carousel
            startX = e.pageX;
            startScrollLeft = carousel.scrollLeft;
        }
        const dragging = (e) => {
            if(!isDragging) return; // if isDragging is false return from here
            // Updates the scroll position of the carousel based on the cursor movement
            carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
        }
        const dragStop = () => {
            isDragging = false;
            carousel.classList.remove("dragging");
        }
        const infiniteScroll = () => {
            // If the carousel is at the beginning, scroll to the end
            if(carousel.scrollLeft === 0) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
                carousel.classList.remove("no-transition");
            }
            // If the carousel is at the end, scroll to the beginning
            else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.offsetWidth;
                carousel.classList.remove("no-transition");
            }
            // Clear existing timeout & start autoplay if mouse is not hovering over carousel
            clearTimeout(timeoutId);
            if(!wrapper.matches(":hover")) autoPlay();
        }
        const autoPlay = () => {
            if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
            // Autoplay the carousel after every 2500 ms
            timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
        }
        autoPlay();
        carousel.addEventListener("mousedown", dragStart);
        carousel.addEventListener("mousemove", dragging);
        document.addEventListener("mouseup", dragStop);
        carousel.addEventListener("scroll", infiniteScroll);
        wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
        wrapper.addEventListener("mouseleave", autoPlay);
    </script>
    <script>
        function OpenYT() {
            // URL to open in the new tab
            var urlToOpen = 'https://www.youtube.com/watch?v=pDgRceQa1RY&t=1s';

            // Open a new tab with the specified URL
            window.open(urlToOpen, '_blank');
        }
        function OpenLGRG() {
            // URL to open in the new tab
            var urlToOpen = 'https://mylegup.co/login_reg_system/login_reg.php';

            // Open a new tab with the specified URL
            window.open(urlToOpen, '_blank');
        }
    </script>
</body>
</html>