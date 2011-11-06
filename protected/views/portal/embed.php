<p>Add the following code anywhere within the &lt;body&gt; element of
your site: </p>

<textarea rows="5" cols="80" wrap="virtual">&lt;script
language="JavaScript"
src="http://sponsorportal.fastfedora.com/yii/sponsorportal/index.php?r=script/
view&amp;id=<?php echo
User::model()->findByPk(Yii::app()->user->id)->portal->id
?>"&gt;&lt;/script&gt; </textarea>

<div id="toolportal" style="text-align: center;"> <a href="">Copy Code</a> </div>

<br>

<!--
function copy(text) { if (window.clipboardData) {
window.clipboardData.setData("Text",text); } }

<input type="button" value="Copy To Clipboard"
onclick="copy(document.your_form_name.your_textarea_name.value);">
-->

<p>Or use the following code within the Sponsor Portal WordPress plugin: &#160;
<b><?php echo User::model()->findByPk(Yii::app()->user->id)->portal->id ?></b>

<p><b>To install the Sponsor Portal WordPress plugin:</b>

<ol>
<li>Download the plugin from <a href="/the-sponsor-portal.zip">here</a>.
<li>Go to the 'Add New' plugins screen in your WordPress admin area
<li>Click 'Upload' on the navigation portal
<li>Press 'Choose File' and select "the-sponsor-portal.zip"
<li>Press 'Install Now' to upload and install the plugin.
<li>Activate the plugin
<li>Go to the 'Sponsor Portal' page underneath the 'Options' menu 
<li>Enter your Sponsor Portal ID from above and press Save
</ol>
