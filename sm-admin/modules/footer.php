<?php defined("_SMARTMEDIA") or die(); ?>

</div>
<!-- /#wrapper -->

<script src="static/js/jquery.js"></script>
<script src="static/js/bootstrap.min.js"></script>

<script src="static/js/plugins/morris/raphael.min.js"></script>
<script src="static/js/plugins/morris/morris.min.js"></script>
<script src="static/js/plugins/morris/morris-data.js"></script>

<?php if ($getView == "add_media" || $getView == "edit_media"): ?>
<script type="text/javascript">
	!function ($) {
		var baseimg = $("input[name='baseimg[]']").length;
		var min = 1;

		if (baseimg <= min) {$("#button-remove").attr("disabled", true);}

		$("#button-add").on("click", function(event) {
			event.preventDefault();
			$(".media").append('<input type="file" name="baseimg[]">');
			$("#button-remove").removeAttr("disabled");
		});
		
		$("#button-remove").on("click", function(event) {
			event.preventDefault();
			var total = $("input[name='baseimg[]']").length;
			if (total > min) {
			   $(this).parent().prev().children().last().fadeOut(function(){$(this).remove()});
			   if (min == total - 1) {
					$("#button-remove").attr("disabled", true);
			   }
			}
		});

	}(window.jQuery);
</script>
<?php endif; ?>

<?php if ($getView == "edit_media"): ?>
<script src="static/js/ajaxupload.js"></script>
<script type="text/javascript">

var button = $("#butUpload"), interval;
var id = <?=$st["id"]?>;
var path = '<?=$st["path"]?>';

new AjaxUpload(button, {
    action: '/sm-admin/index.php?view=edit_media&id='+id+'',
    name: 'userfile',
    data: {upload: id},
    onSubmit: function(file, ext){
        if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
            alert('Запрещенный тип файла');
            // cancel upload
            return false;
        }
        button.text("Загрузка");
        this.disable();
        
        interval = window.setInterval(function() {
            var text = button.text();
            if(text.length < 11){
                button.text(text + '.');
            }else{
                button.text("Загрузка");
            }
        },300);
    },
    onComplete: function(file, response){
        button.text("Загрузить еще?");
        window.clearInterval(interval);
        this.enable();
        var res = JSON.parse(response);
        if (res.answer == "OK") {
            $("#filesUpload").append('<img class="img-thumbnail" src="' + path + res.file + '" alt="' + res.file + '" width="200" height="200">');
        } else {
            alert(res.answer);
        }
    }
});

$("#filesUpload").on('click', 'img', function(event) {
	event.preventDefault();
	var res = confirm("Вы действительно хотите удалить фотографию?!");
    if (!res) return false;
	
	var img = $(this).attr("alt");
    var id = <?=$st["id"]?>;
	
   $.ajax({
		url: '/sm-admin/index.php?view=edit_media&id='+id+'',
		type: 'POST',
		data: {delet: img, id: id},
		success: function(res) {
			$("#filesUpload").find("img[alt='" + img + "']").hide(500);
		},
		error: function(){alert("Error");}
	});

});

</script>
<?php endif; ?>

</body>
</html>
