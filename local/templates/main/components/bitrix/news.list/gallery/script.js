function NewsList(params) {
	this.areaId = params.areaId;
	this.navNum = params.navNum;
	
	$(this.init.bind(this));
}

NewsList.prototype = {
	init: function() {
		/*fancybox*/
		$('[data-fancybox="gallery"]').fancybox({
			buttons: [
				"close"
			],
			loop: false,
			protect: true,
			infobar: false,

		});
		/*end fancybox*/

		this.items = $("#" + this.areaId + "_items");
		this.nav = $("#" + this.areaId + "_nav");
		
		BX.addCustomEvent(window, "OnLoadMore", this.onLoadMore.bind(this));
	},
	
	onLoadMore: function(navNum, url) {
		if(navNum === this.navNum) {
			this.ajaxLoad(url, true);
		}
	},
	
	ajaxLoad: function(url, bAppendItems) {
		if(!!this.loading) {
			return;
		}
		
		this.loading = true;
		// TODO: показать индикатор загрузки?




		$.ajax({
			url: url,
			data: {
				action: "ajaxLoad",
			},
			dataType: "json",
			method: "POST",
			context: this,
			success: function(json) {
				if(!!json) {
					if(!!bAppendItems) {
						if(!!json.items) {
							this.items.append(json.items);


							$('.gallery .row').each(function (index) {
								var id = $(this).attr('id');
								var editLink = $(this).find('[name=edit-link]').val();
								var deleteLink = $(this).find('[name=delete-link]').val();
								(new BX.CMenuOpener({
									'parent': id,
									'menu':[
										{
											'ICONCLASS':'bx-context-toolbar-edit-icon',
											'TITLE':'',
											'TEXT':'Изменить элемент',
											'ONCLICK':'(new BX.CAdminDialog({\'content_url\':\''+ editLink +'\',\'width\':\'780\',\'height\':\'500\'})).Show()'
										},
										{
											'ICONCLASS':'bx-context-toolbar-delete-icon',
											'TITLE':'',
											'TEXT':'Удалить элемент',
											'ONCLICK':'if(confirm(\'Будет удалена вся информация, связанная с этой записью. Продолжить?\')) jsUtils.Redirect([], \''+ deleteLink +'\');'
										}
									]})).Show();
								BX.admin.setComponentBorder(id);
							});


							/*fancybox*/
							$('[data-fancybox="gallery"]').fancybox({
								buttons: [
									"close"
								],
								loop: false,
								protect: true,
								infobar: false,

							});
							/*end fancybox*/
						}
					} else {
						// TODO: промотать к началу списка?
						
						if(!!json.items) {
							this.items.html(json.items);
						} else {
							this.items.html("");
						}
					}
					
					if(!!json.nav) {
						this.nav.html(json.nav);
					} else {
						this.nav.html("");
					}
				}
			},
			
			complete: function() {
				// TODO: скрыть индикатор загрузки?
				this.loading = false;
			},
		});
	},
};