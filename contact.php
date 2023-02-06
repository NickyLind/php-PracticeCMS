<?php require 'includes/init.php' ?>
<?php require 'includes/header.php' ?>

<h2>Contact Us</h2>

<form action="post">
  <div class="form-group">
    <label for="email">Your Email</label>
    <input class="form-control" name="email" id="email" type="email" placeholder="Your email">
  </div>

  <div class="form-group">
    <label for="subject">Subject</label>
    <input class="form-control" name="subject" id="subject" type="text" placeholder="Subject">
  </div>

  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" placeholder="Message"></textarea>
  </div>

  <button class="btn btn-primary">Send</button>
</form>

<?php require 'includes/footer.php' ?>