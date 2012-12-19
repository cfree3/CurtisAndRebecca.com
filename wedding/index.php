<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php require('weddingUtils.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
    <title>Curtis and Rebecca... together in eternity.</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="author" content="Curtis Free" />
    <meta name="copyright" content="&copy; 2009 Curtis Free and Rebecca Drake" />
    <link rel="stylesheet" type="text/css" href="style.php" />
  </head>

  <body>
    <div id="header">
      <img src="imgs/logo.png" alt="Curtis and Rebecca... together in eternity." />
    </div>
    <div id="top">
      <div id="days">
        Only <strong><?php echo getDaysUntil(); ?></strong> days!
      </div>
      <div id="nav">
          <a href="home">Home</a>
          &middot;
          <a href="event">Event</a>
          &middot;
          <a target="_blank"
             href="http://www.amazon.com/gp/registry/wedding/CZLQUFNYIFTB">Registry</a>
          &middot;
          <a href="calendar">Calendar</a>
          &middot;
          <a href="rsvp">RSVP</a>
      </div>
    </div>
    <div id="content">
<?php include('content.php'); ?>
    </div>
  </body>

</html>

