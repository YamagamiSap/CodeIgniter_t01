<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
<html lang="ja"> 
<head> 
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"> 
<META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css"> 
<META HTTP-EQUIV="Content-Script-Type" CONTENT="text/javascript"> 

<title><?php echo $title;?></title>

</head>
<body text="#696969">

<CENTER>
<div align="center" style="width:50%;">
<font size="2">


<div align="center" style="width:80%;">

<?php foreach($query_list->result() as $item): ?>
<!-- メイン書込み 新着順 -->
<table border="0" bgcolor="#ccffff" cellSpacing="0" cellPadding="0" width="100%"> 
	<tr>
		<td><font size="2">
			<div align="left" style="margin-left:20px;"><font color="#ff9966"><b>★ <?php echo $item->title; ?></b></font>   ...No.<?php echo $item->id; ?></div>
		</font></td>
	</tr>
	<tr>
		<td><font size="2">
			<div align="left" style="margin-left:50px; margin-top:5px;"><?php echo $item->name; ?>・・・[<a href="mailto:<?php echo $item->mail; ?>"><font color="#606060">Mail</font></a>] : [<a href="<?php echo $item->url; ?>"><font color="#606060">URL</font></a>]</div>
		</font></td>
	</tr>
	<tr>
		<td><font size="2">
			<hr width="85%">
		</font></td>
	</tr>
	<tr>
		<td align="center"><font size="2">
			<?php echo str_replace("\r\n", "<br>", $item->body); ?>
		</font></td>
	</tr>
	<tr>
		<td><font size="2">
			<div align="right" width="100%">
			<?php echo anchor("bbs_test/bbsres?id=".$item->id, "Res:", ""); ?><br>
			<?php echo $item->up_time; ?>
			</div>
		</font></td>
	</tr>
</table>

	<!-- 返信書込み書込み レス順 -->
	<?php foreach($res_list->result() as $res_item): ?>
		<?php if($item->id === $res_item->id) { ?>
	<div align="right">
	<table border="0" bgcolor="#ffcccc" cellSpacing="0" cellPadding="0" width="80%">
		<tr>
			<td><font size="2">
				<div align="left" style="margin-left:20px;"><font color="#009999"><b>▼ Re:<?php echo $res_item->res_title; ?></b></font>   ...No.<?php echo $res_item->id; ?> - <?php echo $res_item->no; ?></div>
			</font></td>
		</tr>
		<tr>
			<td><font size="2">
				<div align="left" style="margin-left:50px; margin-top:5px;"><?php echo $res_item->res_name; ?>・・・[<a href="mailto:<?php echo $res_item->res_mail; ?>"><font color="#606060">Mail</font></a>] : [<a href="<?php echo $res_item->res_url; ?>"><font color="#606060">URL</font></a>]</div>
			</font></td>
		</tr>
		<tr>
			<td><font size="2">
				<hr width="85%">
			</font></td>
		</tr>
		<tr>
			<td align="center"><font size="2">
					<?php echo str_replace("\r\n", "<br>", $res_item->res_body); ?>
			</font></td>
		</tr>
		<tr>
			<td><font size="2">
				<div align="right" width="100%">
				<?php echo $res_item->res_up_time; ?>
				</div>
			</font></td>
		</tr>
		<tr>
			<td><font size="2">
				<hr color="#575757" size="1" width="95%">
				<hr color="#575757" size="1" width="95%">
			</font></td>
		</tr>
	</table>
	</div>
		<?php } ?>
	<?php endforeach; ?>
<br>
<br>
<?php endforeach; ?>

</div>

<br>
<br>
<hr color="#595959" />
<br>

<?php if( ! empty($proc_mess)) { ?>
<font color="#DD0000" size="1"><?php echo $proc_mess; ?></font>
<?php } ?>
<br>

<div align="right">
<?php $attr = array('name' => 'delform', 'id' => 'delform'); ?>
<?php echo form_open('bbs_test/bbs_res_delete', $attr); ?>
<font color="#FF0000" size="2">※記事を削除する場合はコチラから</font><br>
No. <?php echo $item->id; ?> - <input type="text" size="1" name="select_no" id="select_no" />  Pass: <input type="text" size="2" name="select_pass" id="select_pass" />  <input type="submit" name="del_bt" id="del_bt" value="削除" />
<input type="hidden" id="sel_id" name="sel_id" value="<?php echo $item->id; ?>" />
</form>
</div>

<br>

<font color="#FF0000" size="1"><?php echo validation_errors(); ?></font>

<?php $attributes = array('name' => 'resform', 'id' => 'resform'); ?>
<?php echo form_open('bbs_test/bbsinsertsub', $attributes); ?>
<table border="1" bordercolor=~#525252" bgColor="#FFFFFF" cellSpacing="0" cellPadding="0" width="100%"> 
	<tr>
		<td align="left" width="20%"><font size="2" >
			名前
		</font></td>
		<td align="left"><font size="2" >
			<input type="text" id="res_name" name="res_name" size="15" value="<?php echo set_value('res_name'); ?>" />
		</font></td>
	</tr>

	<tr>
		<td align="left"><font size="2" >
			題名
		</font></td>
		<td align="left"><font size="2" >
			<input type="text" id="res_title" name="res_title" size="15" value="<?php echo set_value('res_title'); ?>" />
		</font></td>
	</tr>

	<tr>
		<td align="left"><font size="2" >
			内容
		</font></td>
		<td align="left"><font size="2" >
			<textarea cols="30" rows="5" id="res_main" name="res_main"><?php echo set_value('res_main'); ?></textarea>
		</font></td>
	</tr>

	<tr>
		<td align="left"><font size="2" >
			E-mail
		</font></td>
		<td align="left"><font size="2" >
			<input type="text" id="res_email" name="res_email" size="15" value="<?php echo set_value('res_email'); ?>" />
		</font></td>
	</tr>

	<tr>
		<td align="left"><font size="2" >
			URL
		</font></td>
		<td align="left"><font size="2" >
			<input type="text" id="res_url" name="res_url" size="20" value="<?php echo set_value('res_url'); ?>" />
		</font></td>
	</tr>

	<tr>
		<td align="left" colspan="2"><font size="2" >
			Pass : <input type="text" id="del_pass" name="del_pass" size="5"/> ※削除時に必要。
		</font></td>
	</tr>

</table>

<input type="hidden" id="res_id" name="res_id" value="<?php echo $item->id; ?>" />

<input type="submit" id="submit_bt" name="submit_bt" value="投稿" />
<input type="reset" value="ｸﾘｱ" />
</form>

<?php echo anchor("bbs_test/bbs", "<<戻る", ""); ?><br>

</font>
</div>
</CENTER>

</body>
</html>