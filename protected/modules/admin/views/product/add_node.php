<div class="block">
    <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2>Products / Node / Add product</h2>
    </div>
    <div class="block_content">
        <?php 
        echo $this->renderPartial('_form_node', array(
            'errors' => $errors,
            'model' => $model,
            'colors' => $colors,
            'sizes' => $sizes,
        ));
        ?>
    </div>
    <div class="bendl"></div>
    <div class="bendr"></div>
</div>
<div class="block">
    <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2>Attachments</h2>
    </div>
    <div class="block_content">
        <div id="photo-uploader"><noscript>Please enable JavaScript to use file uploader.</noscript></div>
        <ul id="tmp-attachment-list" class="imglist"></ul>
    </div>
    <div class="bendl"></div>
    <div class="bendr"></div>
</div>
<script src="/js/fileuploader.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(createUploader('photo-uploader'));
</script>