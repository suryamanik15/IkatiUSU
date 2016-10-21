<script type="text/javascript" src="./modules/e-news/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
		var start=/@/ig; // @ Match
		var word=/@(\w+)/ig; //@abc Match

		$("#contentbox").live("keyup",function() 
		{
			var content = $(this).val(); //Content Box Data
			var go = content.match(start); //Content Matching @
			var name= content.match(word); //Content Matching @abc
			var dataString = 'searchword='+ name;
			//If @ available
			if(go.length>0)
			{
				$("#msgbox").slideDown('show');
				$("#display").slideUp('show');
				$("#msgbox").html("Ketik Nama Anggota ataupun sesuatu yang anda ketahui..");
				//if @abc avalable
				if(name.length > 0)
				{
				$.ajax({
						type: "POST",
						url: "./modules/e-news/boxsearch.php", // Database name search 
						data: dataString,
						cache: false,
					success: function(data)
						{
								$("#msgbox").hide();
								$("#display").html(data).show();
						}
				});
				}
			}	
			return false();
		});

	//Adding result name to content box.
	$(".addname").live("click",function() 
	{
		var username=$(this).attr('title');
		var old=$("#contentbox").html();
		var content=old.replace(word," "); //replacing @abc to (" ") space
		$("#contentbox").html(content);
		var E="<a class='red' contenteditable='false' href='#' >"+username+"</a>";
		//$("#contentbox").append(E);
		$("#title").append(E + '<br/>');
		$("#area-txt").append(username + ' ');
		//$("#list_mail").append(E + '<br/>');
		$("#msgbox").hide();
	});
	
	
	$(".reset").click(function(){
		$("#display").html("");
		return false;
	});
	
	$('#frm_share').submit(function(){
		var regex1 = /http/ig;
		var regex2 = /https/ig;
		var st = document.share.link.value;
		 var match1 = st.match(regex1);
		 var match2 = st.match(regex2);
		 if(st == ''){
			alert('Maaf, field link kosong');
		 }else if(!match1 || !match2){
			return true;
		 }else{
			alert('Invalid regular expression !!');
			document.share.link.value = '';
		 }
		 
		 return false;
	});
	
});
</script>
<link href="./modules/e-news/css/news-box.css" rel="stylesheet">
<!--HTML Code -->

<div id="judul_content"><h2>LINK BERITA</h2></div>

<div id="container">
	<fieldset>
		<legend>Sharing Berita</legend>
		<span style="color:green;">
			Untuk menambahkan email user, maka anda dapat mencari anggota alumni lain dengan mengetikkan 
			tanda '@' terlebih dahulu setelah itu masukkan kata kunci yang berkenaan dengan nama anggota.
			Setelah itu klik, tambah user untuk menambahkan daftar user yang ingin di share beritanya.
		</span><br/><br/>
		
		<form method="POST" action="./modules/e-news/function/insert_news.php" name="share" id="frm_share">
		<input type="text" id="contentbox" placeholder="Cari user yang anda kirim dengan tanda @"/>&nbsp;<span style="color:green;"><a href="" class="add_user"> 
		Tambah User</a></span>
		&nbsp;<span style="color:green;"><a href="" class="reset"> 
		Reset</a></span>
		<br/>
			<div id="display">
			</div><br/>
			<div id="msgbox">
		</div><br/>
			<textarea id="area-txt" name="email_list"></textarea><br/><br/>
			<input type="text" name="title" id="input-txt" id="title" placeholder=" Judul Link Berita.."/><br/><br/>
			<input type="text" name="link" id="input-txt" placeholder=" URL Link Berita"/><i color="red">*harus diawali http:// atau https://</i>
			<br/><br/>
			<input type="submit" value="Share Berita" />
		</form>
	</fieldset>	
</div>