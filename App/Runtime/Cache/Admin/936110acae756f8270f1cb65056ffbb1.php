<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="__URL__/update/navTabId/news/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>新闻标题：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="title" value="<?php echo ($vo["title"]); ?>"/></dd>
			</dl>
			<dl  class="nowrap">
				<dt>新闻内容：</dt>
				<dd>
					<textarea id="elm1" name="comment"  style="width:100%;display: none;" rows="20" ><?php echo ($vo["comment"]); ?>
					</textarea>
					<script>
						$('#elm1').xheditor({upLinkUrl:"__URL__/upload",upLinkExt:"zip,rar,txt",upImgUrl:"__URL__/upload",upImgExt:"jpg,jpeg,gif,png",upFlashUrl:"__URL__/upload",upFlashExt:"swf",upMediaUrl:"__URL__/upload",upMediaExt:"avi",urlBase:'__ROOT__/'});
					</script>
				</dd>
			</dl>
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>