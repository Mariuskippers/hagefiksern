<?php
/**
 * Template part for displaying the contact section
 *
 * @package Hagefiksern
 */
?>

<section id="contact" class="section contact-section">
  <div class="container">
    <h2 class="section-title">Contact Us</h2>
    
    <div class="row">
      <div class="col-6 col-md-12">
        <div class="contact-info">
          <h3>Get In Touch</h3>
          <p>We're here to answer any questions you may have about our services. Reach out to us and we'll respond as soon as we can.</p>
          
          <div class="contact-details">
            <p><strong>Address:</strong> 123 Garden Street, Oslo, Norway</p>
            <p><strong>Phone:</strong> +47 123 45 678</p>
            <p><strong>Email:</strong> info@hagefiksern.no</p>
            <p><strong>Hours:</strong> Monday-Friday: 8am-5pm, Saturday: 9am-2pm</p>
          </div>
        </div>
      </div>
      
      <div class="col-6 col-md-12">
        <div class="contact-form-container">
          <h3>Send Us a Message</h3>
          <?php
          if (shortcode_exists('contact-form-7')) {
              echo do_shortcode('[contact-form-7 id="123" title="Contact Form"]');
          } else {
              echo '<p>Please install and activate Contact Form 7 plugin to display the contact form.</p>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>