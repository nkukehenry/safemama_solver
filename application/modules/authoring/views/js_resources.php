
<!--script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script-->

<script src="<?php echo base_url(); ?>assets/trumb/dist/trumbowyg.min.js"></script>
<!--editor plugins-->
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/upload/trumbowyg.upload.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>

<script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/0.35/dist/jquery-resizable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/table/trumbowyg.table.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/preformatted/trumbowyg.preformatted.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/allowtagsfrompaste/trumbowyg.allowtagsfrompaste.min.js"></script>

<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/indent/trumbowyg.indent.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/pasteimage/trumbowyg.pasteimage.js"></script>
<script src="<?php echo base_url(); ?>assets/trumb/dist/plugins/my-resize/my-resize.js"></script>


<script type="text/javascript">


	$('.editor').trumbowyg({
		btnsDef: {
        // Create a new dropdown
        image: {
            dropdown: ['insertImage', 'upload'],
            ico: 'insertImage'
        }
    },
    btns:[
        ['base64'],
    	['viewHTML'],
        ['formatting'],
        ['fontsize'],
        ['fontfamily'],
        ['strong', 'em', 'del'],
        ['indent', 'outdent'],
        ['superscript', 'subscript'],
        ['link'],
        ['image'], // Our fresh created dropdown
        ['insertAudio'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['lineheight'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen'],
        ['table'], 
        ['tableCellBackgroundColor', 'tableBorderColor'],
        ['preformatted']
        ],
    plugins: {
        // Add imagur parameters to upload plugin for demo purposes
        upload: {
            serverPath: '<?php echo base_url(); ?>authoring/uploadImage',
            urlPropertyName:'file',
            fileFieldName: 'image',
            urlPropertyName: 'file'
        },
       ustomResize: true,
       customImagePaste:true
       
    },
    autogrow: true
});

	</script>
