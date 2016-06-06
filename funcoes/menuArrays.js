var posicao = 00;
	menu[0] = new Array();
	menu[0][0] = new Menu(true, '<a class="menuJsBranco">&raquo;</a>', 0, 75, 50, '#dedbdb', '#909090', '', '#909090');
	menu[0][1] = new Item(' Principal','documentoControle.php', '', 20, 30, 0,'','&nbsp;&nbsp;<img src="img/setaMenu.gif" border="0">&nbsp;&nbsp;&nbsp;&nbsp;', 00 , 00);
	
	menu[1] = new Array();
	menu[1][0] = new Menu(true, '&raquo;', 0, 75, 50, '#dedbdb', '#909090', '', '#909090');
	menu[1][1] = new Item('Item dois','documentoControle.php', '', 40, 60, 0, '', '', 20 , 40 );