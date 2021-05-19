<?php
    session_start();
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Globe Detective Agency</title>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script src="js/scripts.js"></script>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="inner-width">
      <a href="#home" class="logo"></a>
      <button class="menu-toggler">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-menu">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#awards">Awards</a>
        <a href="#works">Works</a>
        <a href="#contact">Contact</a>
        <a href="../signin.html">Sign in</a>
      </div>
    </div>
  </nav>

  <!-- Home -->
  <section id="home">
    <div class="inner-width">
      <div class="content">
        <h1></h1>
        <div class="sm">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin-in"></a>
          <a href="#" class="fab fa-youtube"></a>
        </div>
        <div class="buttons">
          <a href="#contact">Contact us</a>
          <a href="#services">Our Services</a>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about">
    <div class="inner-width">
      <h1 class="section-title">About</h1>
      <div class="about-content">
        <img src="images/GDA_logo_auto_x2.png" alt="" class="about-pic">
        <div class="about-text">
          <h2>Hi! We're Globe Detective Agency</h2>
          <h3>
            <span>Reliable</span>
            <span>Safe</span>
            <span>Efficient</span>
          </h3>
          <p>
            The <strong>Global Detective Agency</strong> portal is owned by a leading national and international investigation company. It offers a wide range of services ranging from the private sphere, marital infidelity investigations, to investigations on commercial issues, employee and / or criminal absenteeism.          </p>
        </div>
      </div>

      <div class="skills">
        <div class="skill">
          <div class="skill-info">
            <span>Reliability</span>
            <span>100%</span>
          </div>
          <div class="skill-bar reliability"></div>
        </div>

        <div class="skill">
          <div class="skill-info">
            <span>Solved Cases</span>
            <span>99%</span>
          </div>
          <div class="skill-bar sCases"></div>
        </div>

        <div class="skill">
          <div class="skill-info">
            <span>Competent Staff</span>
            <span>100%</span>
          </div>
          <div class="skill-bar staff"></div>
        </div>

        <div class="skill">
          <div class="skill-info">
            <span>Unresolved Cases</span>
            <span>1%</span>
          </div>
          <div class="skill-bar uCases"></div>
        </div>

        <div class="skill">
          <div class="skill-info">
            <span>Safety</span>
            <span>100%</span>
          </div>
          <div class="skill-bar safety"></div>
        </div>

        <div class="skill">
          <div class="skill-info">
            <span>Looking for Staff</span>
            <span>40%</span>
          </div>
          <div class="skill-bar looking"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services -->
  <section id="services" class="dark">
    <div class="inner-width">
      <h1 class="section-title">Services</h1>
      <div class="services">
        <div class="service">
          <i class="icon fa fa-users"></i>
          <h4>Missing People</h4>
          <p>Globe Detective Agency will help you find the person who is missing thanks to our best investigators.</p>
        </div>

        <div class="service">
          <i class="icon fas fa-ring"></i>
          <h4>Marital Infidelity</h4>
          <p>If you think your husband or wife is cheating on you then give us a call and we will find the answers you need.</p>
        </div>

        <div class="service">
          <i class="icon fab fa-envira"></i>
          <h4>Environmental Remediation</h4>
          <p>It carries out electronic environmental remediation using its own professional equipment suitable for the purpose.
            <br>We can carry out remediation in apartments, offices and on vehicles.</p>
        </div>

        <div class="service">
          <i class="icon fas fa-briefcase"></i>
          <h4>Business Investigations</h4>
          <p>Globe Detective Agency, as required by applicable laws, offers you the opportunity to verify any fraudulent use of the aforementioned institutions by one of your employees.</p>
        </div>

        <div class="service">
          <i class="icon fas fa-credit-card"></i>
          <h4>Asset Recovery</h4>
          <p>If you have lost something important to you, we can help you get it back.</p>
        </div>

        <div class="service">
          <i class="icon fas fa-house-damage"></i>
          <h4>Family Investigations</h4>
          <p>If you need to investigate on your family for multiple reasons, contact us and we will help you.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Awards -->
  <section id="awards">
    <div class="inner-width">
      <h1 class="section-title">Awards</h1>
      <div class="time-line">
        <div class="block">
          <h4>2021</h4>
          <h3>Norman J. Sloan Memorial Award</h3>
          <p>The Norman J. Sloan Memorial Award is The World Association of Detectives' highest honor and is presented at the Annual Conference. The recipients are members who have demonstrated outstanding service to the Association, and who have contributed their time, energy, leadership and dedication to the betterment of the investigation and security professions.</p>
        </div>

        <div class="block">
          <h4>2019 - 2020</h4>
          <h3>Investigator of the Year</h3>
          <p>A cup presented to the World Association of Detectives and is to be awarded to a member who has demonstrated outstanding professional service or achievement in the calendar year, or who has performed an outstanding investigation in the best traditions of the profession.</p>
        </div>

        <div class="block">
          <h4>2018 - 2020</h4>
          <h3>Neal Holmes Sr./J.D. Vinson, Jr. Security Professional of the Year Award</h3>
          <p>This award honors members in the security field who have demonstrated excellence, leadership, and business acumen in an entrepreneurial endeavor.</p>
        </div>

        <div class="block">
          <h4>2018 - 2021</h4>
          <h3>Hal Lipset Truth in Action Award</h3>
          <p>This award is presented to an individual for service to mankind by outstanding acts of compassion or heroism or leadership or achievement and service.</p>
        </div>

        <div class="block">
          <h4>2017 - 2021</h4>
          <h3>Consumer Choice Award Winners For The Best Private Investigators</h3>
          <p>The Globe Detective Agency since day one has taken a proud stance on the fact that “We Think Different.” We want to not only be a positive change and service to our clients but a positive difference in our industry and community. We have won various awards within the industry, but the Consumers Choice Award for Business Excellence certainly stands out. We are thankful for our customers and clients, and we vow to continue offering the best investigative services throughout Canada in Toronto, Calgary and Halifax as well as all the other areas we service. Thank you!</p>
        </div>

        <div class="block">
          <h4>2017</h4>
          <h3>Global Excellence Award</h3>
          <p>Won the Global Excellence Award of 2017 as the Most Trusted Private Investigation Services Provider.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Works -->
  <section id="works" class="dark">
    <div class="inner-width">
      <h1 class="section-title">Works</h1>
      <div class="works">
        <a href="images/works/alley.jpg" class="work">
          <img src="images/works/alley.jpg" alt="">
          <div class="info">
            <h3>Homicide in an Alley</h3>
            <div class="cat">Missing People, Resolved</div>
          </div>
        </a>

        <a href="images/works/clue.jpg" class="work">
          <img src="images/works/clue.jpg" alt="">
          <div class="info">
            <h3>Attempted Murder</h3>
            <div class="cat">Law, Resolved</div>
          </div>
        </a>

        <a href="images/works/crimescene.jpg" class="work">
          <img src="images/works/crimescene.jpg" alt="">
          <div class="info">
            <h3>Homicide in the Woods</h3>
            <div class="cat">Law, Resolved</div>
          </div>
        </a>

        <a href="images/works/missingweapon.jpeg" class="work">
          <img src="images/works/missingweapon.jpg" alt="">
          <div class="info">
            <h3>Missing Glock 19</h3>
            <div class="cat">Asset Recovery, Resolved</div>
          </div>
        </a>

        <a href="images/works/window.png" class="work">
          <img src="images/works/window.png" alt="">
          <div class="info">
            <h3>Housebreaking</h3>
            <div class="cat">Family Investigation, Resolved</div>
          </div>
        </a>

        <a href="images/works/piracycase.png" class="work">
          <img src="images/works/piracycase.png" alt="">
          <div class="info">
            <h3>Anti-Piracy</h3>
            <div class="cat">Law, Resolved</div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact">
    <div class="inner-width">
      <h1 class="section-title">Get in touch</h1>
      <div class="contact-info">
        <div class="item">
          <i class="fas fa-mobile-alt"></i>
          +44 2072343456
        </div>

        <div class="item">
          <i class="fas fa-envelope"></i>
          globedetective@agency.com
        </div>

        <div class="item">
          <i class="fas fa-map-marker-alt"></i>
          London, UK
        </div>
      </div>

      <form action="javascript:alert('You are not logged in!')" class="contact-form">
        <input type="text" class="subjectZone" placeholder="Subject" required>
        <textarea class="messageZone" placeholder="Message" required></textarea>
        <input type="submit" value="Send Message" class="btn">
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="foot">
    <div class="inner-width">
      <div class="copyright">
        &copy; 2021 | Created for <a href="#home">Globe Detective Agency</a>
      </div>
      <div class="sm">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin-in"></a>
        <a href="#" class="fab fa-youtube"></a>
      </div>
    </div>
</footer>

  <!-- Go Top BTN -->
  <button class="goTop fas fa-arrow-up"></button>

</body>
</html>