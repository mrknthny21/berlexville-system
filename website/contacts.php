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
    position: fixed;
    margin-left: 15vh;
    width: 60%;
    height: 250px;  
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
    font-size: 12px;
    font-style: normal;
    font-weight: 550;
    margin-left: 50%;
    margin-bottom: 50px;
}

.contact-info__content i 
        

.content-area{

}

    </style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Contacts</title>
    </head>
    <body>
        <?php include 'website-navbar.php'; ?>

    <div class="content-area">
        <div class="container" style="margin-left: 65px; margin-top: 100px;  ">
            <div class="centered">
                <div class="Contact">
                    <h2 style="color: #4F71CA">CONTACT US</h2>
                </div>
            </div>
        </div>
        
        <div class="container" style="margin-top: 20px;">
        <div class="mapouter">
            <div class="gmap_canvas">
            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=berlexville%20imus&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
        </div>
        </div>
        
        <div class="contact-info section-padding-02" style="margin-left: 1100px;">
                            <div class="row gy-4">
                                <div class="col-lg-4 col-md-6">
                                    <!-- Contact Info Start -->
                                    <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="contact-info__content">
                                            <i class="fa-solid fa-map-location" style="color: #4F71CA" ></i>
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
                                            <i class="fa-solid fa-phone" style="color: #4F71CA"></i>
                                            <h5 class="contact-info__title">Contact</h5>
                                            <h6>BOD: (046) 471-6607 <br> President: (046) 436-6584</h6>
                                        </div>
                                    </div>
                                    <!-- Contact Info End -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <!-- Contact Info Start -->
                                    <div class="contact-info__item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="contact-info__content">
                                            <i class="fa-solid fa-business-time" style="color: #4F71CA "></i>
                                            <h5 class="contact-info__title">Office Hours</h5>
                                            <h6>Monday - Saturday: <br> 07:00 AM - 06:00 PM</h6>
                                        </div>
                                    </div>  
                                    <!-- Contact Info End -->
                                </div>
                            </div>
                        </div> 

            

            </div>
    </body>
</html>