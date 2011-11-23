Loading library
===============

```php
<?php
include_once('VideoImporter.php');
```

Supported
=================
Youtube

Vimeo

Getting the video
=================

```php
<?php
// use the video URL
echo VideoImporter::get('www.youtube.com/watch?v=rqbo0qSf1V4&feature=related');
echo VideoImporter::get('http://youtu.be/rqbo0qSf1V4');
echo VideoImporter::get('http://vimeo.com/32449778');

// or the embed
echo VideoImporter::get('<iframe width="560" height="315" src="http://www.youtube.com/embed/rqbo0qSf1V4" frameborder="0" allowfullscreen></iframe>');
```
VideoImporter::get() will output something similar to:

```
<object type="application/x-shockwave-flash" style="width:300px;height:300px;" data="http://vimeo.com/moogaloop.swf?clip_id=32449778"></object>
```

You can change the object structure as well:

```php
<?php
echo VideoImporter::get('www.youtube.com/watch?v=rqbo0qSf1V4')->object(array('attrs' => array('style' => 'width:800px;height:600px;'), 'inside' => '<param name="wmode" value="opaque" />'));
// outputs:
<object type="application/x-shockwave-flash" style="width:800px;height:600px;" data="http://vimeo.com/moogaloop.swf?clip_id=32449778"><param name="wmode" value="opaque" /></object>
```