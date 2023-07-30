<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hospital Name - Welcome</title>
    <link rel="stylesheet" href="homestyle.css">
    <script src="https://kit.fontawesome.com/23d807d2b9.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo" id="home">
            <img src="logo.png" alt="Hospital Name Logo">
        </div>
        
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#doctors">Doctors</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><div class="dropdown">
                    <button class="dropbtn">Login</button>
                    <div class="dropdown-content">
                        <a href="adminlogin.php">Admin</a>
                        <a href="doctorlogin.php">Doctor</a>
                        <a href="receptionistlogin.php">Receptionist</a>
                    </div>
                </div></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Welcome to Hospital Admin Panel </h1>
            <p>Providing compassionate care for our patients</p>
           
        </section>

        <section class="services" id="services">
            <h2>Our Services</h2>
            <ul>
                <li style="font-weight: bold;">Emergency Care</li>
                <li style="font-weight: bold;">Intensive Care</li>
                <li style="font-weight: bold;">Surgery</li>
                <li style="font-weight: bold;">Diagnostic Imaging</li>
                <li style="font-weight: bold;">Cardiology</li>
            </ul>
        </section><br>

        <section class="doctors" id="doctors">
            <h2>Our Doctors</h2>
            <ul>
                <li>
                    <img src="doctor1.jpg" alt="Doctor Name">
                    <h3>Doctor Name</h3>
                    <p>Specialty</p>
                </li>
                <li>
                    <img src="doctor2.jpg" alt="Doctor Name">
                    <h3>Doctor Name</h3>
                    <p>Specialty</p>
                </li>
                <li>
                    <img src="doctor3.jpg" alt="Doctor Name">
                    <h3>Doctor Name</h3>
                    <p>Specialty</p>
                </li>
            </ul>
        </section>
    </main>
    <section class="about" id="about">
        <h2>About us</h2>
        <p class="centered">Our hspital is hoping to be among one of the India’s leading Super-specialty
        Centres.We have a dedicated team of experienced super-specialities. All of them
        have received specialized training in their respective fields.
        We focus on patients treatment with latest medical and surgical technology ensuring excellent outcome with utmost
        safety. It puts us in a very strong position to serve patients with complex eye problems seeking high-quality eye care.
        <br>our hospital is based on four strong pillars :</p>
        <ul class="lists">
            <li>Expertise </li><li>Technology</li><li>Dedication</li><li>Passion</li>
        </ul>
        <p class="centered">With our team of dedicated specialists along with trained health care professionals, we aim to be the leading doctors in the country. We provide a comfortable environment to our patients for a speedy recovery. We are a
        multi-speciality  hospital in Beed that encompasses various super-specialities of all fields</p>
    </section>
    <section class="about" id="contact">
        <h2>Contact us</h2>
        <div style="text-align: center;">
        <i class="fa-solid fa-location-dot" style="font-size: 30px;"></i></div>
        <p class="middle">ADDRESS</p>
        <p class="middle">Hospital </p>
        <p class="middle">Beside the secod cross,Main Road,3rd main 9876543</p><br>
        <div style="text-align: center;"> 
        <i class="fa-solid fa-phone" style="font-size: 30px;"></i></div>
        <p class="middle">DIRECT</p>
        <p class="middle">T. +91 9845621357</p>
        <p class="middle">T. +91 9876543210</p><br>
        <a href="#" class="icon"><i class="fa-brands fa-square-facebook" style="font-size: 30px; margin-left: 40%;"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-instagram" style="font-size: 30px; margin-left: 6.5%;"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-twitter" style="font-size: 30px; margin-left: 5%;"></i></a>
        <br><br>
    <footer>
        <p>&copy; 2023 SANDESH. All rights reserved.</p>
    </footer>
</body>

</html>
