<h2>Simulation de match</h2>
<p>Version alpha 1.0</p>

<dl>
<?php 
foreach($matchDescriptions as $key => $description): ?>
<dt><?php echo $key ?></dt>
<dd><?php echo $description ?></dd>
<?php endforeach; ?>
</dl>

<pre>
<?php
print_r($match);
?>
</pre>
