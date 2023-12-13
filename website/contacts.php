<!DOCTYPE html>
<html lang="en">
    <style>
        
        
        .Contact h1{
    color: black;
    font-family: 'Poppins';
    font-size: 40px;
    font-weight: bolder;
    margin-top: 70px;  
}

.mapouter{
    position: relative;
    margin-left: 12vh;
    width: 350%;
    height: 400px;
}
.gmap_canvas{
    overflow: hidden;
    background: none!important;
    width: 100%;
    height: 400px;
}
.gmap_iframe{
    height: 400px!important;
}
.section-padding-02 {
    padding-top: 20px;
}
.contact-info__content i{
    color:#008A0E;
    position: absolute;
    font-size: 30px;
    margin-left: 100px;
}
.contact-info .row h5{
    color: black;
    font-family: 'Poppins';
    font-size: 25px;
    font-style: normal;
    font-weight: 900;
    margin-left: 145px;
    margin-top: 10px;
}
.contact-info .row h6{
    color: black;
    font-family: 'Poppins';
    font-size: 15px;
    font-style: normal;
    font-weight: 550;
    margin-left: 25%;
    margin-bottom: 50px;
}
        

    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacts</title>
    </head>
    <body>
        <?php include 'website-navbar.php'; ?>
      
        <div class="container">
    <div class="centered">
        <div class="Contact">
            <h1>CONTACT US</h1>
        </div>
    </div>
</div>

<div class="container">
  <div class="mapouter">
    <div class="gmap_canvas">
      <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=berlexville%20imus&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
  </div>
</div>

<div class="contact-info section-padding-02">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6">
                            <!-- Contact Info Start -->
                            <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                <div class="contact-info__content">
                                    <i class="fa-solid fa-map-location"></i>
                                    <h5 class="contact-info__title">Address</h5>
                                    <h6>Brgy. Buhay na Tubig, <br> Antonio Jarin, Imus City, Cavite</h6>
                                </div>
                            </div>
                            <!-- Contact Info End -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- Contact Info Start -->
                            <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                <div class="contact-info__content">
                                    <i class="fa-solid fa-phone"></i>
                                    <h5 class="contact-info__title">Contact</h5>
                                    <h6>Admin: (046) 471-6607 <br> Registrar: (046) 436-6584</h6>
                                </div>
                            </div>
                            <!-- Contact Info End -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- Contact Info Start -->
                            <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                <div class="contact-info__content">
                                    <i class="fa-solid fa-business-time"></i>
                                    <h5 class="contact-info__title">Office Hours</h5>
                                    <h6>Monday - Saturday: <br> 07:00 AM - 06:00 PM</h6>
                                </div>
                            </div>
                            <!-- Contact Info End -->
                        </div>
                    </div>
                </div> 

      


    </body>
</html>