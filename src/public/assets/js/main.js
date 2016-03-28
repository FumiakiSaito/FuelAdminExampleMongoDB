jQuery.event.add(window, "load", function(){
	var objPopover = $("[data-toggle=popover]");
	$(objPopover).attr("data-trigger", "hover");
	$(objPopover).popover();

	var inputs = $('input.prettyCheckable:not(#TestDisabled)').each(function() {	// ファイルアップロード時のチェックボックス
		$(this).prettyCheckable();
	});
});
$(function(){
	$('#file_input').change(function() {
		$('#dummy_file').val($(this).val());
	});
});
$(function(){
	$('.dropdown-menu a').click(function(){
		var visibleTag = $(this).parents('ul').attr('visibleTag');	//反映先の要素名を取得
		var hiddenTag = $(this).parents('ul').attr('hiddenTag');

		$(visibleTag).html($(this).attr('value'));					//選択された内容でボタンの表示を変える
		$(hiddenTag).val($(this).attr('value'));					//選択された内容でhidden項目の値を変える
	})
})
$(function(){
	$('.dropdown-menu content_type a').click(function(){
		var visibleTag = $(this).parents('ul').attr('visibleTag2');	//反映先の要素名を取得
		var hiddenTag = $(this).parents('ul').attr('hiddenTag2');

		$(visibleTag).html($(this).attr('value'));					//選択された内容でボタンの表示を変える
		$(hiddenTag).val($(this).attr('value'));					//選択された内容でhidden項目の値を変える
	})
})
$(function(){
	$('.dropdown-menu event_category a').click(function(){
		var visibleTag = $(this).parents('ul').attr('visibleTag3');	//反映先の要素名を取得
		var hiddenTag = $(this).parents('ul').attr('hiddenTag3');

		$(visibleTag).html($(this).attr('value'));					//選択された内容でボタンの表示を変える
		$(hiddenTag).val($(this).attr('value'));					//選択された内容でhidden項目の値を変える
	})
})
